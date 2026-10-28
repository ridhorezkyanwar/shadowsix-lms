<?php
declare(strict_types=1);

function database_test_expect(bool $condition, string $message): void
{
    if (!$condition) {
        fwrite(STDERR, 'FAIL: ' . $message . PHP_EOL);
        exit(1);
    }
}

$dbHost = getenv('DB_HOST') ?: '127.0.0.1';
$dbUser = getenv('DB_USER');
$dbPassword = getenv('DB_PASSWORD');
$dbName = getenv('DB_NAME');

database_test_expect(is_string($dbUser) && $dbUser !== '', 'DB_USER must be configured.');
database_test_expect(is_string($dbPassword), 'DB_PASSWORD must be configured.');
database_test_expect(is_string($dbName) && $dbName !== '', 'DB_NAME must be configured.');
database_test_expect(class_exists(mysqli::class), 'mysqli extension must be available.');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
$connection->set_charset('utf8mb4');

$schemaPath = dirname(__DIR__) . '/shadowsix.sql';
$schema = file_get_contents($schemaPath);
database_test_expect(is_string($schema) && $schema !== '', 'Schema file must be readable.');

function database_test_import_schema(mysqli $connection, string $schema): void
{
    $connection->multi_query($schema);
    do {
        $result = $connection->store_result();
        if ($result instanceof mysqli_result) {
            $result->free();
        }

        if (!$connection->more_results()) {
            break;
        }

        $connection->next_result();
    } while (true);
}

database_test_import_schema($connection, $schema);
database_test_import_schema($connection, $schema);

$expectedTables = ['kontak', 'login', 'materi'];
$result = $connection->query('SHOW TABLES');
$actualTables = [];
while ($row = $result->fetch_row()) {
    $actualTables[] = (string) $row[0];
}
$result->free();
sort($actualTables);
sort($expectedTables);
database_test_expect($actualTables === $expectedTables, 'Schema must create exactly the expected three LMS tables.');

$connection->begin_transaction();

try {
    $fullName = 'ShadowSix CI Test';
    $email = 'shadowsix-ci-test@example.invalid';
    $plainPassword = 'Only-for-ephemeral-CI-123!';
    $passwordHash = password_hash($plainPassword, PASSWORD_DEFAULT);
    database_test_expect(is_string($passwordHash) && password_verify($plainPassword, $passwordHash), 'A test password must be hashed and verifiable.');

    $insertUser = $connection->prepare('INSERT INTO login (fullname, email, password) VALUES (?, ?, ?)');
    $insertUser->bind_param('sss', $fullName, $email, $passwordHash);
    $insertUser->execute();
    $insertUser->close();

    $fetchUser = $connection->prepare('SELECT fullname, password, role FROM login WHERE email = ? LIMIT 1');
    $fetchUser->bind_param('s', $email);
    $fetchUser->execute();
    $user = $fetchUser->get_result()->fetch_assoc();
    $fetchUser->close();

    database_test_expect(is_array($user), 'A registered test user should be retrievable.');
    database_test_expect($user['fullname'] === $fullName, 'User name should round-trip correctly.');
    database_test_expect(password_verify($plainPassword, (string) $user['password']), 'Database should store the password hash, not the plaintext password.');
    database_test_expect($user['role'] === 'user', 'New accounts must receive the least-privileged default role.');

    $duplicateRejected = false;
    try {
        $duplicate = $connection->prepare('INSERT INTO login (fullname, email, password) VALUES (?, ?, ?)');
        $duplicate->bind_param('sss', $fullName, $email, $passwordHash);
        $duplicate->execute();
        $duplicate->close();
    } catch (mysqli_sql_exception $exception) {
        $duplicateRejected = (int) $exception->getCode() === 1062;
    }
    database_test_expect($duplicateRejected, 'Duplicate account emails must be rejected by the unique constraint.');

    $subject = 'Testing';
    $title = 'Database integration test';
    $body = 'Temporary test content';
    $image = null;
    $teacher = 'CI';
    $insertMaterial = $connection->prepare(
        'INSERT INTO materi (nama_pelajaran, judul_materi, isi_materi, gambar_materi, gambar_mapel, nama_guru) VALUES (?, ?, ?, ?, ?, ?)'
    );
    $insertMaterial->bind_param('ssssss', $subject, $title, $body, $image, $image, $teacher);
    $insertMaterial->execute();
    $insertMaterial->close();

    $contactName = 'CI Test';
    $contactEmail = 'contact-ci@example.invalid';
    $contactMessage = 'Temporary contact message';
    $insertContact = $connection->prepare('INSERT INTO kontak (nama, email, pesan) VALUES (?, ?, ?)');
    $insertContact->bind_param('sss', $contactName, $contactEmail, $contactMessage);
    $insertContact->execute();
    $insertContact->close();

    $materialCount = (int) $connection->query(
        "SELECT COUNT(*) AS count FROM materi WHERE judul_materi = 'Database integration test'"
    )->fetch_assoc()['count'];
    $contactCount = (int) $connection->query(
        "SELECT COUNT(*) AS count FROM kontak WHERE email = 'contact-ci@example.invalid'"
    )->fetch_assoc()['count'];

    database_test_expect($materialCount === 1, 'Material records should be insertable.');
    database_test_expect($contactCount === 1, 'Contact records should be insertable.');

    echo "PASS: schema import, idempotence, account constraints, password hashing and LMS CRUD." . PHP_EOL;
} finally {
    $connection->rollback();
    $connection->close();
}
