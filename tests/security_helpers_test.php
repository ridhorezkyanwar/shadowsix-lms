<?php
declare(strict_types=1);

require_once __DIR__ . '/../security.php';

function test_expect(bool $condition, string $message): void
{
    if (!$condition) {
        fwrite(STDERR, "FAIL: " . $message . PHP_EOL);
        exit(1);
    }
}

$token = shadowsix_csrf_token();
test_expect(strlen($token) === 64, 'CSRF token should contain 32 random bytes encoded as hex.');
test_expect(shadowsix_verify_csrf_token($token), 'Current CSRF token should verify.');
test_expect(!shadowsix_verify_csrf_token('incorrect-token'), 'An incorrect CSRF token must be rejected.');
test_expect(!shadowsix_verify_csrf_token(['array']), 'A non-string CSRF value must be rejected.');

$noUpload = shadowsix_store_uploaded_image(null, 'materi');
test_expect($noUpload['path'] === null && $noUpload['error'] === null, 'An absent optional upload should not fail.');

$unsafeHtml = '<p onclick="alert(1)">Safe text</p><script>alert(2)</script><a href="javascript:alert(3)" onmouseover="alert(4)">Open</a>';
$safeHtml = shadowsix_sanitize_rich_html($unsafeHtml);
test_expect(!preg_match('/<\s*script\b/i', $safeHtml), 'Script elements must not be emitted.');
test_expect(!preg_match('/<\s*iframe\b/i', $safeHtml), 'Iframe elements must not be emitted.');
test_expect(!preg_match('/<[^>]+\s+on[a-z]+\s*=/i', $safeHtml), 'Event-handler attributes must not be emitted.');
test_expect(!preg_match('/(?:href|src)\s*=\s*["\x27]\s*(?:javascript|data|vbscript):/i', $safeHtml), 'Executable URL schemes must not be emitted.');

$schemaPath = dirname(__DIR__) . '/shadowsix.sql';
$schema = file_get_contents($schemaPath);
test_expect(is_string($schema) && strpos($schema, 'CREATE TABLE IF NOT EXISTS `login`') !== false, 'Schema should create the login table.');
test_expect(is_string($schema) && strpos($schema, '`role` varchar(20)') !== false, 'Schema should include the role field used by the application.');
test_expect(is_string($schema) && stripos($schema, 'INSERT INTO `login`') === false, 'Schema must not seed user accounts or password hashes.');
test_expect(is_string($schema) && stripos($schema, 'INSERT INTO `kontak`') === false, 'Schema must not seed contact messages.');

echo "PASS: CSRF, safe HTML output, optional uploads, and schema privacy checks." . PHP_EOL;
