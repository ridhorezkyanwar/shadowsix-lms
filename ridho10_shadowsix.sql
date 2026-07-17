-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2026 at 05:26 PM
-- Server version: 10.11.16-MariaDB
-- PHP Version: 8.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ridho10_shadowsix`
--

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

DROP TABLE IF EXISTS `kontak`;
CREATE TABLE `kontak` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(191) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `email`, `pesan`, `created_at`) VALUES
(1, 'testing', 'testing@gmail.com', 'Lorem Ipsum Dolor Sit Amet', '2026-05-22 04:18:34'),
(2, 'testing', 'testing@gmail.com', 'efasadasdsadsa', '2026-05-22 15:54:30'),
(3, 'login', 'login@gmail.com', 'bisa login mantep euyy', '2026-05-22 15:55:39'),
(4, 'testing', 'testing@gmail.com', 'HALLOWWW', '2026-05-24 01:04:03'),
(5, 'testing', 'testing@gmail.com', 'Lagi di sekolah', '2026-05-26 04:09:11'),
(6, 'login', 'login@gmail.com', 'aman?', '2026-06-09 03:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `fullname`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'testing', 'testing@gmail.com', '$2y$10$7HXIMM49HEbX9nb5DZT.Bef9wmqYSyoaqEAbCLLOpQ5lz1BaiLcPq', 'user', '2026-05-20 10:14:50'),
(2, 'loremipsum', 'loremipsum@gmail.com', '$2y$10$CFE6JeMwvrozzSMqcqekAeWunbkKSHcPnK/uuWWPyRe2kAswOuaqy', 'user', '2026-05-22 04:20:25'),
(3, 'login', 'login@gmail.com', '$2y$10$w8NCnA1RsdaJBAAprEu6/.aEh8Ak2QMYEQhlSQkJibS75hDz1P0pK', 'user', '2026-05-22 15:55:16'),
(4, 'yuhuuwww', 'yuhuww@gmail.com', '$2y$10$kuf8B8/CfdkABLt8LzDlteP9AvQU5vVy3JxwutA0xqpaBnrDsz3QK', 'user', '2026-05-24 13:03:30'),
(5, 'svylmgqwsh', 'iuoxzryp@immenseignite.info', '$2y$10$NgS3MYUSwEcTk3UoY4Q1WuFSRi0jH.uR/Hyg7EK3mbjmWk67G41OK', 'user', '2026-05-24 14:17:11'),
(6, 'slebew', 'example@gmail.com', '$2y$10$mUs.M3.WV8psYIrLOUJ/eO4Rq4PlhY6HsB60Risl6YL6hJ5TuoBVy', 'user', '2026-06-01 22:15:44'),
(7, 'TES', 'smkn6ukkrpl@gmail.com', '$2y$10$Rr5zhntDP690KRfzQfalg.Q6qzkO59zzeBhigelB8jNxj1N9.PPWi', 'user', '2026-06-06 01:45:32'),
(8, 'TES1', 'mr.purnama83@gmail.com', '$2y$10$36e2QjQT22UqamxHbh8Kc.5pCaGpXpCivAyqw16M85xOeMV/j6Rwi', 'user', '2026-06-06 01:46:25'),
(9, 'imlyhqiprw', 'uhyhexhl@immenseignite.info', '$2y$10$ciZb.dltzXySWHeTgl3Rpef0j3x4Q2xRJbpeZY.jFG/NRglgi/jjy', 'user', '2026-06-06 12:14:35'),
(10, 'pvyqhyozyy', 'pymwnrii@immenseignite.info', '$2y$10$Ro0QZkzuPEL6K7asyLTkJuDt5.LqhtrXvSgWx8BGcoj0NQnF60KdK', 'user', '2026-06-06 12:14:49'),
(11, 'admin', 'admin@gmail.com', '$2y$10$DehMoHeERUxYMpAxeFEsbe4PXwr1aC/CgZs.Lwag4DCrSMHiim1.m', 'admin', '2026-06-09 03:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

DROP TABLE IF EXISTS `materi`;
CREATE TABLE `materi` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nama_pelajaran` varchar(100) NOT NULL,
  `judul_materi` varchar(191) NOT NULL,
  `isi_materi` text NOT NULL,
  `gambar_materi` varchar(255) DEFAULT NULL,
  `gambar_mapel` varchar(255) DEFAULT NULL,
  `nama_guru` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`nama_pelajaran`, `judul_materi`, `isi_materi`, `gambar_materi`, `gambar_mapel`, `nama_guru`) VALUES
('Coding & AI', 'Pengantar Coding & AI', '<h2>Inti Materi</h2><p>Memperkenalkan apa itu pemrograman (coding) dan kecerdasan buatan (AI).</p><ul><li>Coding: instruksi komputer.</li><li>AI: sistem meniru kognitif manusia.</li></ul>', 'img/Buku-Koding-Kelas-10-860x1208.jpg', 'img/Buku-Koding-Kelas-10-860x1208.jpg', 'Slamet Sutrisno, M.Pd'),
('Coding & AI', 'Algoritma & Pemecahan Masalah', '<h2>Inti Materi</h2><p>Langkah sistematis untuk solusi sebelum coding.</p>', 'img/Buku-Koding-Kelas-10-860x1208.jpg', NULL, 'Slamet Sutrisno, M.Pd'),
('Coding & AI', 'Pemrograman Dasar (Python)', '<h2>Inti Materi</h2><p>Mempelajari dasar bahasa Python.</p>', 'img/Buku-Koding-Kelas-10-860x1208.jpg', NULL, 'Slamet Sutrisno, M.Pd'),
('Informatika', 'Pengenalan Informatika & Sistem Komputer', '<h2>Inti Materi</h2><p>Memahami konsep dasar informatika dan komponen sistem komputer.</p><ul><li>Informatika = ilmu pengolahan data menjadi informasi.</li><li>Sistem komputer terdiri dari: hardware, software, brainware.</li><li>Proses kerja komputer: input → processing → output → storage.</li><li>Perangkat input: keyboard, mouse, scanner.</li><li>Perangkat output: monitor, printer, speaker.</li><li>Perangkat penyimpanan: HDD, SSD, flashdisk.</li></ul>', 'img/informatika.jpg', 'img/informatika.jpg', 'Purnama Hadi Setiawan, S.Kom'),
('Informatika', 'Jaringan Komputer & Internet', '<h2>Inti Materi</h2><p>Memahami dasar-dasar jaringan, perangkatnya, dan cara kerja internet.</p><ul><li>Jaringan = menghubungkan komputer untuk bertukar data.</li><li>Jenis jaringan: LAN, MAN, WAN.</li><li>Topologi: bus, star, ring, mesh.</li><li>Perangkat jaringan: router, switch, modem, access point.</li><li>Internet bekerja dengan IP Address dan DNS.</li><li>Keamanan jaringan: firewall, enkripsi, password kuat.</li></ul>', 'img/informatika.jpg', NULL, 'Purnama Hadi Setiawan, S.Kom'),
('Informatika', 'Algoritma & Flowchart', '<h2>Inti Materi</h2><p>Mempelajari langkah-langkah sistematis untuk menyelesaikan masalah.</p><ul><li>Algoritma = urutan langkah logis untuk menyelesaikan masalah.</li><li>Ciri algoritma: jelas, terstruktur, dapat dijalankan.</li><li>Representasi: pseudocode & flowchart.</li><li>Simbol flowchart: start/end, proses, input-output, keputusan.</li><li>Contoh: algoritma menghitung luas bangun datar.</li></ul>', 'img/informatika.jpg', NULL, 'Purnama Hadi Setiawan, S.Kom'),
('Informatika', 'Dasar Pemrograman', '<h2>Inti Materi</h2><p>Mengenal cara kerja bahasa pemrograman dan menulis program sederhana.</p><ul><li>Bahasa pemrograman: Python, C, Java, JavaScript.</li><li>Struktur dasar program: input, proses, output.</li><li>Tipe data: integer, float, string, boolean.</li><li>Operator matematis dan logika.</li><li>Kontrol alur: if–else, looping (for, while).</li><li>Fungsi: blok kode untuk tugas tertentu.</li></ul>', 'img/informatika.jpg', NULL, 'Purnama Hadi Setiawan, S.Kom'),
('Informatika', 'Basis Data & Pengelolaan Data', '<h2>Inti Materi</h2><p>Mempelajari cara menyimpan, mengelola, dan mengakses data.</p><ul><li>Basis data = kumpulan data terstruktur.</li><li>DBMS: MySQL, PostgreSQL, SQLite.</li><li>Istilah penting: tabel, field, record, key.</li><li>SQL dasar: SELECT, INSERT, UPDATE, DELETE.</li><li>Relasi antar tabel: one-to-one, one-to-many.</li></ul>', 'img/informatika.jpg', NULL, 'Purnama Hadi Setiawan, S.Kom'),
('Informatika', 'Desain Grafis & Media Digital', '<h2>Inti Materi</h2><p>Mempelajari cara membuat desain digital dan mengenal perangkat lunaknya.</p><ul><li>Prinsip desain: keseimbangan, kontras, tipografi, warna.</li><li>Format gambar: JPG, PNG, SVG, GIF.</li><li>Software desain: Canva, CorelDraw, Photoshop, Figma.</li><li>Teknik dasar: cropping, layering, blending.</li><li>Latihan: membuat poster atau logo sederhana.</li></ul>', 'img/informatika.jpg', NULL, 'Purnama Hadi Setiawan, S.Kom'),
('Informatika', 'TI dalam Dunia Kerja', '<h2>Inti Materi</h2><p>Peran teknologi dalam industri modern dan transformasi digital.</p><ul><li>TI digunakan dalam perkantoran, industri, kesehatan, pendidikan.</li><li>Software penting: spreadsheet, word processing, presentasi.</li><li>Cloud computing: Google Drive, OneDrive.</li><li>Pekerjaan bidang TI: programmer, network engineer, data analyst.</li></ul>', 'img/informatika.jpg', NULL, 'Purnama Hadi Setiawan, S.Kom'),
('Informatika', 'Keamanan Digital & Etika Teknologi', '<h2>Inti Materi</h2><p>Mempelajari perlindungan data dan etika dalam penggunaan teknologi.</p><ul><li>Jenis ancaman: malware, phishing, hacking.</li><li>Proteksi: antivirus, enkripsi, backup, password kuat.</li><li>Privasi digital & jejak digital.</li><li>Etika teknologi: plagiarisme, izin sumber, perilaku online.</li></ul>', 'img/informatika.jpg', NULL, 'Purnama Hadi Setiawan, S.Kom'),
('DK RPL', 'Pengenalan RPL', '<h2>Rangkuman</h2><ul><li>RPL mempelajari proses merancang, membuat, dan memelihara perangkat lunak.</li><li>Lingkup kerja meliputi analisis kebutuhan, desain sistem, implementasi, pengujian, dan perawatan.</li><li>Perangkat lunak berbeda dengan perangkat keras; software bersifat digital.</li><li>Jenis software meliputi sistem operasi, aplikasi, dan utility.</li><li>SDLC adalah tahapan yang digunakan dalam pengembangan perangkat lunak.</li></ul>', 'img/dk rpl.jpg', 'img/dk rpl.jpg', 'Angrilla Musfaranniss Chanti, S.Pd'),
('DK RPL', 'Algoritma dan Logika Pemrograman', '<h2>Rangkuman</h2><ul><li>Algoritma adalah langkah-langkah terstruktur untuk menyelesaikan masalah.</li><li>Ciri algoritma: jelas, efektif, finite, dan terurut.</li><li>Bentuk algoritma: flowchart, pseudocode, dan deskripsi teks.</li><li>Logika dasar meliputi operasi AND, OR, dan NOT.</li><li>Struktur kontrol terdiri dari sequence, selection, dan iteration.</li></ul>', 'img/dk rpl.jpg', NULL, 'Angrilla Musfaranniss Chanti, S.Pd'),
('DK RPL', 'Dasar-Dasar Pemrograman', '<h2>Rangkuman</h2><ul><li>Pemrograman adalah proses memberi instruksi logis kepada komputer.</li><li>Bahasa pemrograman memiliki level berbeda seperti low-level dan high-level.</li><li>Konsep dasar: variabel, tipe data, operator aritmatika dan logika.</li><li>Input/output digunakan untuk menerima dan menampilkan data.</li><li>Contoh bahasa pemrograman: Python, C, Java, Javascript.</li></ul>', 'img/dk rpl.jpg', NULL, 'Angrilla Musfaranniss Chanti, S.Pd'),
('DK RPL', 'Struktur Data Dasar', '<h2>Rangkuman</h2><ul><li>Struktur data membantu mengorganisasi data agar mudah diproses.</li><li>Jenis struktur data dasar: array, list, dan string.</li><li>Operasi dasar: akses elemen, menambah, menghapus, dan mengubah data.</li><li>Data primitif seperti integer dan boolean; non-primitif seperti array dan objek.</li></ul>', 'img/dk rpl.jpg', NULL, 'Angrilla Musfaranniss Chanti, S.Pd'),
('DK RPL', 'Pengenalan Basis Data', '<h2>Rangkuman</h2><ul><li>Basis data adalah tempat menyimpan data secara terstruktur.</li><li>DBMS yang umum digunakan antara lain MySQL, PostgreSQL, SQLite.</li><li>Elemen utama database: tabel, kolom, baris, primary key.</li><li>CRUD adalah operasi dasar: Create, Read, Update, Delete.</li></ul>', 'img/dk rpl.jpg', NULL, 'Angrilla Musfaranniss Chanti, S.Pd'),
('DK RPL', 'Pengenalan Pengembangan Aplikasi', '<h2>Rangkuman</h2><ul><li>Pengembangan aplikasi melalui tahap analisis, desain, implementasi, pengujian, dan rilis.</li><li>Front-end menangani tampilan; back-end menangani logika dan database.</li><li>Tools umum developer: VSCode, Git/GitHub, Figma, Postman.</li><li>Jenis aplikasi meliputi aplikasi mobile, web, dan desktop.</li><li>Testing diperlukan untuk memastikan aplikasi bebas bug dan layak digunakan.</li></ul>', 'img/dk rpl.jpg', NULL, 'Angrilla Musfaranniss Chanti, S.Pd'),
('Matematika', 'Bilangan dan Aljabar', '<h2>Bilangan Real</h2><p>Bilangan real terdiri dari bilangan rasional dan irasional yang dapat direpresentasikan pada garis bilangan.</p><h3>Kategori bilangan real</h3><ul><li>Bilangan bulat (… -2, -1, 0, 1, 2 …)</li><li>Bilangan rasional (dapat ditulis a/b)</li><li>Bilangan irasional (π, √2, dll)</li></ul><h2>Operasi Aljabar</h2><p>Operasi pada bentuk aljabar meliputi penjumlahan, pengurangan, perkalian, dan pemfaktoran.</p><h3>Contoh operasi</h3><ul><li>Penyederhanaan bentuk aljabar</li><li>Mengalikan dua suku dan polinomial</li><li>Memfaktorkan bentuk kuadrat</li></ul><h2>Bentuk Pangkat & Akar</h2><p>Pangkat dan akar digunakan untuk menyederhanakan bentuk matematika yang melibatkan eksponen.</p><ul><li>Pangkat positif dan negatif</li><li>Akar kuadrat dan akar pangkat n</li><li>Aturan eksponen</li></ul>', 'img/20200616_105716matematika.jpg', 'img/20200616_105716matematika.jpg', 'Muzn Mubarak, S.Pd.'),
('Matematika', 'Persamaan dan Pertidaksamaan', '<h2>Persamaan Linear Satu Variabel</h2><p>Bentuk umum persamaan linear adalah ax + b = 0 dengan a ≠ 0.</p><h3>Metode penyelesaian</h3><ul><li>Operasi aljabar dasar</li><li>Substitusi nilai</li></ul><h2>Pertidaksamaan Linear</h2><p>Pertidaksamaan dapat berbentuk <, >, ≤, atau ≥ dan memiliki himpunan penyelesaian pada garis bilangan.</p><h2>Persamaan Kuadrat</h2><p>Persamaan kuadrat memiliki bentuk ax² + bx + c = 0 dengan a ≠ 0.</p><h3>Metode penyelesaian</h3><ul><li>Faktorisasi</li><li>Melengkapkan kuadrat</li><li>Rumus kuadrat</li></ul>', 'img/20200616_105716matematika.jpg', NULL, 'Muzn Mubarak, S.Pd.'),
('Matematika', 'Relasi dan Fungsi', '<h2>Relasi</h2><p>Relasi adalah hubungan antara dua himpunan yang memasangkan setiap elemen dari satu himpunan dengan himpunan lainnya.</p><h2>Fungsi</h2><p>Fungsi adalah relasi khusus yang memasangkan setiap elemen domain dengan tepat satu elemen kodomain.</p><h3>Konsep penting</h3><ul><li>Domain</li><li>Kodomain</li><li>Range</li></ul><h2>Grafik Fungsi</h2><p>Fungsi dapat direpresentasikan pada bidang koordinat kartesius untuk menunjukkan pola hubungan.</p>', 'img/20200616_105716matematika.jpg', NULL, 'Muzn Mubarak, S.Pd.'),
('Matematika', 'Sistem Persamaan Linear Dua Variabel', '<h2>Pengertian SPLDV</h2><p>SPLDV adalah dua persamaan linear dengan dua variabel yang diselesaikan secara bersamaan.</p><h3>Metode penyelesaian</h3><ul><li>Substitusi</li><li>Eliminasi</li><li>Grafik</li></ul><h2>Aplikasi SPLDV</h2><p>SPLDV digunakan untuk menyelesaikan masalah jual-beli, perbandingan, dan sistem biaya.</p>', 'img/20200616_105716matematika.jpg', NULL, 'Muzn Mubarak, S.Pd.'),
('Matematika', 'Geometri Dasar', '<h2>Bangun Datar</h2><p>Bangun datar adalah bentuk dua dimensi yang memiliki panjang dan lebar.</p><h3>Contoh bangun datar</h3><ul><li>Segitiga</li><li>Persegi dan persegi panjang</li><li>Lingkaran</li><li>Jajargenjang dan trapesium</li></ul><h2>Rumus dasar</h2><ul><li>Luas dan keliling</li><li>Konsep sudut</li><li>Teorema Pythagoras</li></ul><h2>Transformasi Geometri</h2><p>Transformasi meliputi translasi, refleksi, rotasi, dan dilatasi.</p>', 'img/20200616_105716matematika.jpg', NULL, 'Muzn Mubarak, S.Pd.'),
('Matematika', 'Trigonometri Dasar', '<h2>Perbandingan Trigonometri</h2><p>Trigonometri mempelajari rasio dalam segitiga siku-siku.</p><ul><li>Sinus = depan / miring</li><li>Cosinus = samping / miring</li><li>Tangen = depan / samping</li></ul><h2>Pemanfaatan Trigonometri</h2><p>Digunakan untuk menghitung tinggi bangunan, panjang bayangan, dan jarak yang sulit diukur langsung.</p>', 'img/20200616_105716matematika.jpg', NULL, 'Muzn Mubarak, S.Pd.'),
('Bahasa Inggris', 'Introduction & Greetings', '<h2>Inti Materi</h2><p>Mempelajari cara memperkenalkan diri dan memberi salam dalam Bahasa Inggris.</p><ul><li>Basic greetings: Hello, Hi, Good morning, Good afternoon.</li><li>Introducing yourself: name, age, school, hobby.</li><li>Introducing others: This is my friend…, He/She is…</li><li>Expressions of polite conversation: Nice to meet you, How are you?</li></ul>', 'img/bahasa inggris.jpg', 'img/bahasa inggris.jpg', 'Wasi Ikhsan Dimasqy, S.Pd'),
('Bahasa Inggris', 'Describing People & Objects', '<h2>Inti Materi</h2><p>Menggunakan adjective untuk menggambarkan orang, benda, dan sifat.</p><ul><li>Physical description: tall, short, slim, curly hair, etc.</li><li>Personality traits: kind, friendly, honest, confident.</li><li>Describing objects: size, color, shape, material.</li><li>Sentence patterns: <ul><li>He is… / She has…</li><li>It is … (for objects)</li></ul></li></ul>', 'img/bahasa inggris.jpg', NULL, 'Wasi Ikhsan Dimasqy, S.Pd'),
('Bahasa Inggris', 'Describing Places', '<h2>Inti Materi</h2><p>Mempelajari cara menggambarkan tempat, lokasi, dan suasana.</p><ul><li>Using prepositions: in, on, at, near, behind, next to.</li><li>Describing places: school, market, park, city, room.</li><li>Expressions:<ul><li>The place is crowded / quiet / beautiful.</li><li>It is located near…</li></ul></li></ul>', 'img/bahasa inggris.jpg', NULL, 'Wasi Ikhsan Dimasqy, S.Pd'),
('Bahasa Inggris', 'Recount Text', '<h2>Inti Materi</h2><p>Menceritakan pengalaman masa lalu menggunakan bentuk lampau.</p><ul><li>Purpose: to retell past events.</li><li>Generic structure:<ul><li>Orientation</li><li>Events</li><li>Re-orientation</li></ul></li><li>Past tense verbs: went, saw, played, visited.</li><li>Time expressions: yesterday, last week, two days ago.</li></ul>', 'img/bahasa inggris.jpg', NULL, 'Wasi Ikhsan Dimasqy, S.Pd'),
('Bahasa Inggris', 'Procedure Text', '<h2>Inti Materi</h2><p>Menjelaskan langkah-langkah melakukan sesuatu.</p><ul><li>Purpose: to show how to make or operate something.</li><li>Structure:<ul><li>Goal</li><li>Materials</li><li>Steps</li></ul></li><li>Imperative verbs: mix, cut, heat, turn on.</li><li>Sequence words: first, next, then, finally.</li></ul>', 'img/bahasa inggris.jpg', NULL, 'Wasi Ikhsan Dimasqy, S.Pd'),
('Bahasa Inggris', 'Descriptive Text', '<h2>Inti Materi</h2><p>Mendeskripsikan hewan, tempat wisata, dan objek menarik.</p><ul><li>Structure:<ul><li>Identification</li><li>Description</li></ul></li><li>Descriptive details: appearance, behavior, uniqueness.</li><li>Example topics: Bali Beach, Komodo Dragon, School Library.</li><li>Using adjectives: beautiful, dangerous, peaceful, wide.</li></ul>', 'img/bahasa inggris.jpg', NULL, 'Wasi Ikhsan Dimasqy, S.Pd'),
('Bahasa Inggris', 'Announcement Text', '<h2>Inti Materi</h2><p>Membuat dan memahami pengumuman resmi.</p><ul><li>Purpose: giving information to the public.</li><li>Common contents:<ul><li>Title</li><li>Date & Time</li><li>Place</li><li>Details and instructions</li></ul></li><li>Formal expressions: please attend…, you are invited…</li></ul>', 'img/bahasa inggris.jpg', NULL, 'Wasi Ikhsan Dimasqy, S.Pd'),
('Bahasa Inggris', 'Asking & Giving Opinions', '<h2>Inti Materi</h2><p>Menyampaikan pendapat dan menanggapi pendapat orang lain.</p><ul><li>Asking for opinions:<ul><li>What do you think about…?</li><li>How do you feel about…?</li></ul></li><li>Giving opinions:<ul><li>I think…</li><li>In my opinion…</li><li>I believe that…</li></ul></li><li>Agreeing & disagreeing:<ul><li>I agree / I disagree.</li><li>That’s true / I don’t think so.</li></ul></li></ul>', 'img/bahasa inggris.jpg', NULL, 'Wasi Ikhsan Dimasqy, S.Pd'),
('Bahasa Indonesia', 'Membaca Kritis & Literasi', '<h2>Inti Materi</h2><p>Mengembangkan kemampuan memahami, mengevaluasi, dan menarik kesimpulan dari berbagai teks (informatif, naratif, deskriptif).</p><ul><li>Strategi membaca: pra-baca, baca aktif, pasca-baca.</li><li>Menentukan gagasan pokok & tujuan penulis.</li><li>Membedakan fakta dan opini.</li><li>Evaluasi kredibilitas sumber.</li><li>Membuat ringkasan dan peta konsep.</li></ul>', 'img/Bahasa_Indonesia_BG_KLS_X_Rev_Cover.png', 'img/Bahasa_Indonesia_BG_KLS_X_Rev_Cover.png', 'Olis Suharlaedani, S.Pd.'),
('Bahasa Indonesia', 'Menulis Teks Deskripsi & Prosedur', '<h2>Inti Materi</h2><p>Mengembangkan kemampuan menggambarkan objek secara detail (deskripsi) dan menulis langkah sistematis (prosedur).</p><ul><li>Teks deskripsi memakai kata-kata pancaindra.</li><li>Teks prosedur memiliki tujuan, bahan, dan langkah berurutan.</li><li>Menggunakan bahasa imperatif & penanda urutan.</li><li>Diksi tepat dan kohesi antar-paragraf.</li><li>Latihan: membuat deskripsi produk & SOP sederhana.</li></ul>', 'img/Bahasa_Indonesia_BG_KLS_X_Rev_Cover.png', NULL, 'Olis Suharlaedani, S.Pd.'),
('Bahasa Indonesia', 'Menulis Eksposisi & Esei Singkat', '<h2>Inti Materi</h2><p>Menyampaikan argumen dan menjelaskan ide secara logis dan terstruktur.</p><ul><li>Eksposisi: tesis, argumen, bukti, penegasan ulang.</li><li>Esei: pendahuluan → isi → penutup.</li><li>Kohesi paragraf dan penggunaan konjungsi logis.</li><li>Latihan: menulis opini tentang isu aktual.</li></ul>', 'img/Bahasa_Indonesia_BG_KLS_X_Rev_Cover.png', NULL, 'Olis Suharlaedani, S.Pd.'),
('Bahasa Indonesia', 'Sastra: Puisi & Cerita Pendek', '<h2>Inti Materi</h2><p>Mengenal unsur dan teknik penciptaan karya sastra puisi dan cerpen.</p><ul><li>Puisi: diksi, rima, majas, citraan.</li><li>Cerpen: orientasi, konflik, resolusi.</li><li>Menganalisis tema, karakter, dan pesan moral.</li><li>Latihan: menulis puisi & cerpen mini.</li></ul>', 'img/Bahasa_Indonesia_BG_KLS_X_Rev_Cover.png', NULL, 'Olis Suharlaedani, S.Pd.'),
('Bahasa Indonesia', 'Drama, Dialog, & Pidato', '<h2>Inti Materi</h2><p>Melatih kemampuan berbicara dan ekspresi melalui pementasan serta pidato.</p><ul><li>Drama: menulis naskah, mengembangkan karakter.</li><li>Pidato: struktur (pembuka–isi–penutup).</li><li>Bicara efektif: intonasi, artikulasi, gesture.</li><li>Latihan: role-play, presentasi, pidato singkat.</li></ul>', 'img/Bahasa_Indonesia_BG_KLS_X_Rev_Cover.png', NULL, 'Olis Suharlaedani, S.Pd.'),
('Bahasa Indonesia', 'Kebahasaan: EYD, Tanda Baca & Struktur Kalimat', '<h2>Inti Materi</h2><p>Penguasaan kaidah penulisan sesuai PUEBI.</p><ul><li>Penulisan huruf, kata depan, imbuhan, serapan.</li><li>Tanda baca: titik, koma, titik dua, tanda kutip.</li><li>Struktur kalimat efektif: SPOK.</li><li>Latihan: editing kalimat & paragraf.</li></ul>', 'img/Bahasa_Indonesia_BG_KLS_X_Rev_Cover.png', NULL, 'Olis Suharlaedani, S.Pd.'),
('Bahasa Indonesia', 'Berbicara: Presentasi, Diskusi, Wawancara', '<h2>Inti Materi</h2><p>Meningkatkan kemampuan komunikasi lisan dalam kegiatan formal.</p><ul><li>Presentasi: slide efektif & penyampaian jelas.</li><li>Diskusi: argumentasi & mendengarkan aktif.</li><li>Wawancara: teknik bertanya & etika wawancara.</li><li>Latihan: simulasi presentasi & wawancara kerja.</li></ul>', 'img/Bahasa_Indonesia_BG_KLS_X_Rev_Cover.png', NULL, 'Olis Suharlaedani, S.Pd.'),
('Bahasa Indonesia', 'Literasi Media & Teks Digital', '<h2>Inti Materi</h2><p>Memahami cara kerja media dan kemampuan membaca teks digital secara kritis.</p><ul><li>Jenis teks media: berita, feature, iklan, opini.</li><li>Mengecek kredibilitas sumber & deteksi hoaks.</li><li>Penulisan web: judul pendek, paragraf efektif, hyperlink.</li><li>Latihan: menulis ringkasan berita & postingan blog.</li></ul>', 'img/Bahasa_Indonesia_BG_KLS_X_Rev_Cover.png', NULL, 'Olis Suharlaedani, S.Pd.'),
('IPAS', 'Keberlanjutan Lingkungan', '<h2>Pengertian keberlanjutan</h2><p>Keberlanjutan adalah upaya menjaga keseimbangan antara kebutuhan manusia dengan kelestarian lingkungan agar tetap dapat mendukung kehidupan di masa depan.</p><h2>Komponen lingkungan</h2><p>Lingkungan terdiri dari komponen biotik (makhluk hidup) dan abiotik (benda tak hidup) yang saling memengaruhi.</p><h2>Isu-isu lingkungan</h2><ul><li>Pencemaran air dan udara</li><li>Penurunan kualitas tanah</li><li>Kepunahan keanekaragaman hayati</li><li>Perubahan iklim</li></ul><h2>Upaya menjaga keberlanjutan</h2><p>Beberapa langkah untuk mendukung keberlanjutan lingkungan adalah:</p><ul><li>Reduce, Reuse, Recycle (3R)</li><li>Konservasi sumber daya alam</li><li>Pengelolaan limbah yang baik</li><li>Edukasi dan kampanye lingkungan</li></ul>', 'img/Projek-IPAS-untuk-SMK-MAK-Kelas-X.png', 'img/Projek-IPAS-untuk-SMK-MAK-Kelas-X.png', 'Shinta Listiana, S.Pd'),
('IPAS', 'Energi dan Perubahannya', '<h2>Pengertian energi</h2><p>Energi adalah kemampuan untuk melakukan usaha atau menyebabkan perubahan pada suatu benda atau sistem.</p><h2>Macam-macam energi</h2><ul><li>Energi panas</li><li>Energi cahaya</li><li>Energi kimia</li><li>Energi listrik</li><li>Energi gerak</li></ul><h2>Transformasi energi</h2><p>Energi dapat berubah dari satu bentuk ke bentuk lainnya, misalnya energi kimia pada makanan berubah menjadi energi gerak pada tubuh.</p><h2>Sumber energi</h2><ul><li>Energi terbarukan: matahari, angin, air</li><li>Energi tak terbarukan: batu bara, minyak bumi</li></ul>', 'img/Projek-IPAS-untuk-SMK-MAK-Kelas-X.png', NULL, 'Shinta Listiana, S.Pd'),
('IPAS', 'Teknologi untuk Kehidupan', '<h2>Pengertian teknologi</h2><p>Teknologi adalah penerapan ilmu pengetahuan untuk mempermudah aktivitas manusia.</p><h2>Jenis teknologi</h2><ul><li>Teknologi informasi</li><li>Teknologi komunikasi</li><li>Teknologi transportasi</li><li>Teknologi kesehatan</li></ul><h2>Dampak teknologi</h2><ul><li>Dampak positif: efisiensi, akses informasi cepat, inovasi kesehatan</li><li>Dampak negatif: kecanduan gadget, polusi elektronik, kesenjangan digital</li></ul>', 'img/Projek-IPAS-untuk-SMK-MAK-Kelas-X.png', NULL, 'Shinta Listiana, S.Pd'),
('IPAS', 'Kesehatan dan Kesejahteraan', '<h2>Pengertian kesehatan</h2><p>Kesehatan adalah kondisi sejahtera secara fisik, mental, dan sosial, bukan hanya bebas dari penyakit.</p><h2>Faktor yang memengaruhi kesehatan</h2><ul><li>Pola makan</li><li>Aktivitas fisik</li><li>Kesehatan mental</li><li>Kebersihan lingkungan</li></ul>', 'img/Projek-IPAS-untuk-SMK-MAK-Kelas-X.png', NULL, 'Shinta Listiana, S.Pd'),
('IPAS', 'Kearifan Lokal dan Kelestarian', '<h2>Pengertian kearifan lokal</h2><p>Kearifan lokal adalah nilai, kebiasaan, dan praktik tradisional suatu masyarakat yang membantu menjaga harmoni dengan lingkungan.</p><h2>Contoh kearifan lokal di Indonesia</h2><ul><li>Sistem Subak di Bali</li><li>Sasi di Maluku</li><li>Dewi Sri di Jawa</li><li>Uma di Mentawai</li></ul>', 'img/Projek-IPAS-untuk-SMK-MAK-Kelas-X.png', NULL, 'Shinta Listiana, S.Pd'),
('IPAS', 'Perubahan Sosial dan Budaya', '<h2>Pengertian perubahan sosial</h2><p>Perubahan sosial adalah pergeseran struktur, perilaku, atau pola hidup masyarakat dari waktu ke waktu.</p><h2>Faktor penyebab perubahan</h2><ul><li>Teknologi</li><li>Pendidikan</li><li>Ekonomi</li><li>Interaksi budaya</li></ul>', 'img/Projek-IPAS-untuk-SMK-MAK-Kelas-X.png', NULL, 'Shinta Listiana, S.Pd'),
('Seni Rupa', 'Dasar-Dasar Menggambar', '<h2>Pengertian menggambar</h2><p>Menggambar adalah seni menciptakan gambar atau ilustrasi menggunakan berbagai alat dan teknik.</p><h2>Identifikasi bentuk</h2><p>Dalam menggambar, penting untuk mengidentifikasi bentuk dasar dari objek yang akan digambar.</p><h3>Media kering</h3><ul><li>Pensil</li><li>Arang</li><li>Pulpen</li></ul>', 'img/Seni_Rupa_BG_KLS_X_Rev_Cover.png', 'img/Seni_Rupa_BG_KLS_X_Rev_Cover.png', 'Muhammad Eraz, S.Pd.'),
('Seni Rupa', 'Gambar Teknik', '<h2>Pengertian Gambar Teknik</h2><p>Gambar teknik adalah gambar yang digunakan untuk menyampaikan informasi teknis secara akurat, jelas, dan universal.</p><h2>Peralatan Gambar Teknik</h2><ul><li>Pensil mekanik</li><li>Penggaris segitiga</li><li>Jangka</li></ul>', 'img/Seni_Rupa_BG_KLS_X_Rev_Cover.png', NULL, 'Muhammad Eraz, S.Pd.'),
('Seni Rupa', 'Desain Dasar Tiga Dimensional', '<h2>Pengertian Desain 3 Dimensi</h2><p>Desain tiga dimensi adalah proses merancang objek atau karya seni yang memiliki panjang, lebar, dan tinggi.</p><h2>Unsur-Unsur Bentuk 3 Dimensi</h2><ul><li>Garis</li><li>Bidang</li><li>Volume</li></ul>', 'img/Seni_Rupa_BG_KLS_X_Rev_Cover.png', NULL, 'Muhammad Eraz, S.Pd.'),
('PJOK', 'Kebugaran Jasmani', '<h2>Inti Materi</h2><p>Mempelajari pentingnya kebugaran jasmani, teknik olahraga, dan pola hidup sehat.</p><ul><li>Kebugaran Jasmani: daya tahan, kekuatan, kecepatan, kelenturan.</li><li>Manfaat: meningkatkan kesehatan, mencegah penyakit, meningkatkan produktivitas.</li><li>Latihan: lari, push-up, sit-up, peregangan.</li></ul>', 'img/pjok.jpg', 'img/pjok.jpg', 'Bimo Sidiq Purnomo, S.Pd.'),
('PJOK', 'Permainan Bola Besar', '<h2>Inti Materi</h2><p>Mempelajari teknik dasar dan peraturan permainan bola besar.</p><ul><li>Sepak Bola: dribbling, passing, shooting, heading.</li><li>Bola Voli: passing bawah, passing atas, servis, smash, block.</li><li>Bola Basket: dribbling, passing, shooting, lay-up.</li></ul>', 'img/pjok.jpg', NULL, 'Bimo Sidiq Purnomo, S.Pd.'),
('PJOK', 'Permainan Bola Kecil', '<h2>Inti Materi</h2><p>Mempelajari teknik dasar dan peraturan permainan bola kecil.</p><ul><li>Bulu Tangkis: servis, forehand, backhand, smash, drop shot.</li><li>Tenis Meja: servis, forehand, backhand, smash, chop.</li><li>Softball/Baseball: melempar, menangkap, memukul, berlari.</li></ul>', 'img/pjok.jpg', NULL, 'Bimo Sidiq Purnomo, S.Pd.'),
('PJOK', 'Atletik', '<h2>Inti Materi</h2><p>Mempelajari teknik dasar cabang olahraga atletik.</p><ul><li>Lari: sprint, jarak menengah, jarak jauh.</li><li>Lompat: lompat jauh, lompat tinggi.</li><li>Lempar: lempar lembing, tolak peluru.</li></ul>', 'img/pjok.jpg', NULL, 'Bimo Sidiq Purnomo, S.Pd.'),
('PJOK', 'Aktivitas Bela Diri', '<h2>Inti Materi</h2><p>Mempelajari teknik dasar dan filosofi bela diri.</p><ul><li>Pencak Silat: kuda-kuda, pukulan, tendangan, tangkisan.</li><li>Karate: kihon, kata, kumite.</li><li>Taekwondo: tendangan, pukulan, blok.</li></ul>', 'img/pjok.jpg', NULL, 'Bimo Sidiq Purnomo, S.Pd.'),
('PJOK', 'Aktivitas Ritmik', '<h2>Inti Materi</h2><p>Mempelajari gerakan tubuh yang terkoordinasi dengan irama.</p><ul><li>Senam Irama: langkah dasar, ayunan lengan, kombinasi gerakan.</li><li>Senam Aerobik: gerakan kardio, kekuatan, kelenturan.</li></ul>', 'img/pjok.jpg', NULL, 'Bimo Sidiq Purnomo, S.Pd.'),
('PJOK', 'Aktivitas Air (Renang)', '<h2>Inti Materi</h2><p>Mempelajari teknik dasar renang dan keselamatan di air.</p><ul><li>Gaya Renang: gaya bebas, gaya dada, gaya punggung, gaya kupu-kupu.</li><li>Keselamatan Air: teknik mengapung, menyelamatkan diri, pertolongan pertama.</li></ul>', 'img/pjok.jpg', NULL, 'Bimo Sidiq Purnomo, S.Pd.'),
('PJOK', 'Pendidikan Kesehatan', '<h2>Inti Materi</h2><p>Mempelajari pentingnya menjaga kesehatan dan pola hidup sehat.</p><ul><li>Gizi Seimbang: karbohidrat, protein, lemak, vitamin, mineral.</li><li>Pencegahan Penyakit: menjaga kebersihan, imunisasi, istirahat cukup.</li><li>Kesehatan Reproduksi: pubertas, organ reproduksi, menjaga kebersihan.</li></ul>', 'img/pjok.jpg', NULL, 'Bimo Sidiq Purnomo, S.Pd.'),
('Sejarah', 'Manusia Purba di Indonesia', '<h2>Inti Materi</h2><p>Mempelajari asal-usul dan perkembangan manusia purba di Indonesia.</p><ul><li>Jenis-jenis manusia purba: Pithecanthropus Erectus, Meganthropus Paleojavanicus, Homo Sapiens.</li><li>Ciri-ciri fisik dan kebudayaan mereka.</li><li>Situs penemuan: Sangiran, Trinil, Ngandong.</li></ul>', 'img/sejarah.jpg', 'img/sejarah.jpg', 'Muhammad Eraz, S.Pd.'),
('Sejarah', 'Kehidupan Sosial-Budaya Masa Praaksara', '<h2>Inti Materi</h2><p>Mempelajari kehidupan masyarakat Indonesia sebelum mengenal tulisan.</p><ul><li>Sistem kepercayaan: animisme, dinamisme, totemisme.</li><li>Sistem sosial: berburu, meramu, bercocok tanam.</li><li>Peninggalan: kapak perimbas, dolmen, menhir, sarkofagus.</li></ul>', 'img/sejarah.jpg', NULL, 'Muhammad Eraz, S.Pd.'),
('Sejarah', 'Masuk & Berkembangnya Hindu-Buddha', '<h2>Inti Materi</h2><p>Mempelajari proses masuknya agama Hindu-Buddha ke Indonesia dan pengaruhnya.</p><ul><li>Teori masuknya: Brahmana, Ksatria, Waisya, Arus Balik.</li><li>Kerajaan Hindu-Buddha: Kutai, Tarumanegara, Sriwijaya, Mataram Kuno, Majapahit.</li><li>Peninggalan: candi, prasasti, kitab.</li></ul>', 'img/sejarah.jpg', NULL, 'Muhammad Eraz, S.Pd.'),
('Sejarah', 'Masa Kerajaan Islam', '<h2>Inti Materi</h2><p>Mempelajari perkembangan kerajaan Islam di Indonesia.</p><ul><li>Proses Islamisasi: perdagangan, perkawinan, pendidikan, kesenian.</li><li>Kerajaan Islam: Samudra Pasai, Demak, Aceh, Ternate, Tidore.</li><li>Peninggalan: masjid, makam, kaligrafi.</li></ul>', 'img/sejarah.jpg', NULL, 'Muhammad Eraz, S.Pd.'),
('Sejarah', 'Masuknya Bangsa Eropa', '<h2>Inti Materi</h2><p>Mempelajari kedatangan bangsa Eropa ke Indonesia dan motifnya.</p><ul><li>Motif: Gold, Glory, Gospel.</li><li>Bangsa Eropa: Portugis, Spanyol, Belanda, Inggris.</li><li>Dampak: monopoli perdagangan, VOC.</li></ul>', 'img/sejarah.jpg', NULL, 'Muhammad Eraz, S.Pd.'),
('Sejarah', 'Sistem Tanam Paksa & Kolonial', '<h2>Inti Materi</h2><p>Mempelajari kebijakan tanam paksa dan sistem pemerintahan kolonial Belanda.</p><ul><li>Latar belakang dan pelaksanaan tanam paksa.</li><li>Dampak tanam paksa bagi rakyat Indonesia.</li><li>Sistem pemerintahan kolonial: Gubernur Jenderal, Residen.</li></ul>', 'img/sejarah.jpg', NULL, 'Muhammad Eraz, S.Pd.'),
('Sejarah', 'Pergerakan Nasional Indonesia', '<h2>Inti Materi</h2><p>Mempelajari perjuangan bangsa Indonesia melawan penjajahan.</p><ul><li>Organisasi pergerakan: Budi Utomo, Sarekat Islam, Indische Partij, PNI.</li><li>Tokoh-tokoh pergerakan: Soekarno, Hatta, Ki Hajar Dewantara.</li><li>Sumpah Pemuda.</li></ul>', 'img/sejarah.jpg', NULL, 'Muhammad Eraz, S.Pd.'),
('Sejarah', 'Pendudukan Jepang', '<h2>Inti Materi</h2><p>Mempelajari masa pendudukan Jepang di Indonesia.</p><ul><li>Latar belakang dan tujuan pendudukan Jepang.</li><li>Kebijakan Jepang: Romusha, Jugun Ianfu, Pengerahan Tenaga Kerja.</li><li>Dampak pendudukan Jepang.</li></ul>', 'img/sejarah.jpg', NULL, 'Muhammad Eraz, S.Pd.'),
('Sejarah', 'Perumusan Pancasila & Proklamasi', '<h2>Inti Materi</h2><p>Mempelajari proses perumusan Pancasila dan proklamasi kemerdekaan.</p><ul><li>BPUPKI dan PPKI.</li><li>Tokoh-tokoh perumus Pancasila.</li><li>Detik-detik proklamasi kemerdekaan Indonesia.</li></ul>', 'img/sejarah.jpg', NULL, 'Muhammad Eraz, S.Pd.'),
('Sejarah', 'Perjuangan Mempertahankan Kemerdekaan', '<h2>Inti Materi</h2><p>Mempelajari perjuangan fisik dan diplomasi mempertahankan kemerdekaan.</p><ul><li>Pertempuran: Surabaya, Ambarawa, Bandung Lautan Api.</li><li>Perundingan: Linggarjati, Renville, Roem-Royen.</li><li>Konferensi Meja Bundar.</li></ul>', 'img/sejarah.jpg', NULL, 'Muhammad Eraz, S.Pd.'),
('Coding & AI', 'Struktur Data & Pemrosesan Data', '<h2>Inti Materi</h2><p>Mempelajari cara mengorganisasi dan memproses data.</p><ul><li>Struktur data: list, tuple, dictionary, set.</li><li>Pemrosesan data: pengumpulan, pembersihan, transformasi, analisis.</li></ul>', 'img/Buku-Koding-Kelas-10-860x1208.jpg', NULL, 'Slamet Sutrisno, M.Pd'),
('Coding & AI', 'Pengenalan Machine Learning', '<h2>Inti Materi</h2><p>Memahami konsep dasar machine learning.</p><ul><li>Jenis ML: supervised, unsupervised, reinforcement learning.</li><li>Algoritma: regresi, klasifikasi, clustering.</li><li>Aplikasi: rekomendasi produk, deteksi spam.</li></ul>', 'img/Buku-Koding-Kelas-10-860x1208.jpg', NULL, 'Slamet Sutrisno, M.Pd'),
('Coding & AI', 'Preprocessing & Fitur Engineering', '<h2>Inti Materi</h2><p>Mempelajari persiapan data untuk model ML.</p><ul><li>Preprocessing: membersihkan, menormalisasi, menangani missing values.</li><li>Fitur Engineering: membuat fitur baru dari data mentah.</li></ul>', 'img/Buku-Koding-Kelas-10-860x1208.jpg', NULL, 'Slamet Sutrisno, M.Pd'),
('Coding & AI', 'Model & Evaluasi', '<h2>Inti Materi</h2><p>Membangun dan mengevaluasi model machine learning.</p><ul><li>Membangun model: memilih algoritma, melatih model.</li><li>Evaluasi: akurasi, presisi, recall, F1-score.</li></ul>', 'img/Buku-Koding-Kelas-10-860x1208.jpg', NULL, 'Slamet Sutrisno, M.Pd'),
('Coding & AI', 'Pengenalan Deep Learning & Computer Vision', '<h2>Inti Materi</h2><p>Mempelajari konsep deep learning dan computer vision.</p><ul><li>Deep Learning: jaringan saraf tiruan dengan banyak lapisan.</li><li>Computer Vision: memungkinkan komputer "melihat" dan memahami gambar.</li><li>Aplikasi: pengenalan wajah, deteksi objek.</li></ul>', 'img/Buku-Koding-Kelas-10-860x1208.jpg', NULL, 'Slamet Sutrisno, M.Pd'),
('Coding & AI', 'Etika, Privasi & Keamanan AI', '<h2>Inti Materi</h2><p>Memahami isu etika, privasi, dan keamanan dalam pengembangan AI.</p><ul><li>Etika AI: bias, diskriminasi, transparansi.</li><li>Privasi data: perlindungan informasi pribadi.</li><li>Keamanan AI: serangan adversarial, kerentanan model.</li></ul>', 'img/Buku-Koding-Kelas-10-860x1208.jpg', NULL, 'Slamet Sutrisno, M.Pd'),
('Coding & AI', 'Tools, Deployment & Proyek Praktik', '<h2>Inti Materi</h2><p>Mempelajari tools, deployment, dan praktik proyek AI.</p><ul><li>Tools: TensorFlow, Keras, PyTorch, Scikit-learn.</li><li>Deployment: mengintegrasikan model ke aplikasi.</li><li>Proyek Praktik: membangun proyek AI sederhana.</li></ul>', 'img/Buku-Koding-Kelas-10-860x1208.jpg', NULL, 'Slamet Sutrisno, M.Pd'),
('Pendidikan Agama', 'Konsep Ketuhanan dalam Islam', '<h2>Inti Materi</h2><p>Memahami konsep tauhid dan keesaan Allah SWT.</p><ul><li>Pengertian Tauhid</li><li>Asmaul Husna</li><li>Sifat-sifat Allah</li></ul>', 'img/pai.jpg', 'img/pai.jpg', 'Hilaliyah, M.Pd'),
('Pendidikan Agama', 'Rukun Iman dan Rukun Islam', '<h2>Inti Materi</h2><p>Mempelajari dasar-dasar keyakinan dan praktik dalam Islam.</p><ul><li>Rukun Iman: Iman kepada Allah, Malaikat, Kitab, Rasul, Hari Akhir, Qada dan Qadar.</li><li>Rukun Islam: Syahadat, Shalat, Zakat, Puasa, Haji.</li></ul>', 'img/pai.jpg', NULL, 'Hilaliyah, M.Pd'),
('Pendidikan Agama', 'Akhlak Terpuji', '<h2>Inti Materi</h2><p>Membiasakan diri dengan perilaku dan sifat-sifat mulia.</p><ul><li>Jujur</li><li>Amanah</li><li>Sabar</li><li>Syukur</li><li>Tawakal</li></ul>', 'img/pai.jpg', NULL, 'Hilaliyah, M.Pd'),
('Pendidikan Agama', 'Sejarah Peradaban Islam', '<h2>Inti Materi</h2><p>Mengenal perkembangan Islam dari masa Nabi Muhammad SAW hingga masa kejayaan.</p><ul><li>Masa Nabi Muhammad SAW</li><li>Khulafaur Rasyidin</li><li>Dinasti Umayyah dan Abbasiyah</li><li>Perkembangan Ilmu Pengetahuan dalam Islam</li></ul>', 'img/pai.jpg', NULL, 'Hilaliyah, M.Pd'),
('Pendidikan Agama', 'Ibadah dalam Islam', '<h2>Inti Materi</h2><p>Memahami tata cara dan hikmah berbagai ibadah.</p><ul><li>Shalat Fardhu dan Sunnah</li><li>Puasa Ramadhan</li><li>Zakat Fitrah dan Mal</li><li>Haji dan Umrah</li></ul>', 'img/pai.jpg', NULL, 'Hilaliyah, M.Pd'),
('PPKN', 'Pancasila sebagai Dasar Negara', '<h2>Inti Materi</h2><p>Memahami Pancasila sebagai ideologi dan dasar negara Indonesia.</p><ul><li>Sejarah Perumusan Pancasila</li><li>Makna Setiap Sila Pancasila</li><li>Pancasila sebagai Sumber Hukum</li></ul>', 'img/ppkn.jpg', 'img/ppkn.jpg', 'Ahmad Baidawi, S.Pd.'),
('PPKN', 'UUD 1945 dan Konstitusi', '<h2>Inti Materi</h2><p>Mempelajari Undang-Undang Dasar 1945 sebagai hukum dasar negara.</p><ul><li>Sejarah UUD 1945</li><li>Struktur dan Isi UUD 1945</li><li>Amandemen UUD 1945</li></ul>', 'img/ppkn.jpg', NULL, 'Ahmad Baidawi, S.Pd.'),
('PPKN', 'Hak dan Kewajiban Warga Negara', '<h2>Inti Materi</h2><p>Memahami hak dan kewajiban warga negara Indonesia.</p><ul><li>Hak Asasi Manusia (HAM)</li><li>Kewajiban Warga Negara</li><li>Hubungan Hak dan Kewajiban</li></ul>', 'img/ppkn.jpg', NULL, 'Ahmad Baidawi, S.Pd.'),
('PPKN', 'Bhinneka Tunggal Ika', '<h2>Inti Materi</h2><p>Mempelajari keberagaman Indonesia dan pentingnya persatuan.</p><ul><li>Makna Bhinneka Tunggal Ika</li><li>Keberagaman Suku, Agama, Ras, dan Antargolongan</li><li>Toleransi dan Kerukunan</li></ul>', 'img/ppkn.jpg', NULL, 'Ahmad Baidawi, S.Pd.'),
('PPKN', 'Demokrasi Pancasila', '<h2>Inti Materi</h2><p>Memahami sistem pemerintahan demokrasi di Indonesia.</p><ul><li>Prinsip-prinsip Demokrasi Pancasila</li><li>Lembaga-lembaga Negara</li><li>Partisipasi Warga Negara dalam Demokrasi</li></ul>', 'img/ppkn.jpg', NULL, 'Ahmad Baidawi, S.Pd.'),
('BK', 'Pengembangan Diri dan Potensi', '<h2>Inti Materi</h2><p>Mengenali dan mengembangkan potensi diri untuk mencapai tujuan hidup.</p><ul><li>Mengenali minat, bakat, dan kekuatan diri.</li><li>Mengembangkan kepercayaan diri dan motivasi.</li><li>Menetapkan tujuan hidup yang realistis.</li></ul>', 'img/bk.jpg', 'img/bk.jpg', 'Sri Respati Retnaningtyas, M.M'),
('BK', 'Interaksi Sosial & Komunikasi', '<h2>Inti Materi</h2><p>Meningkatkan kemampuan berinteraksi dan berkomunikasi secara efektif.</p><ul><li>Keterampilan komunikasi verbal dan non-verbal.</li><li>Membangun hubungan yang positif.</li><li>Mengelola konflik dan perbedaan pendapat.</li></ul>', 'img/bk.jpg', NULL, 'Sri Respati Retnaningtyas, M.M'),
('BK', 'Manajemen Waktu & Belajar', '<h2>Inti Materi</h2><p>Mengelola waktu dan mengembangkan kebiasaan belajar yang efektif.</p><ul><li>Membuat jadwal belajar yang efektif.</li><li>Teknik belajar yang efisien (misal: Pomodoro).</li><li>Mengatasi prokrastinasi.</li></ul>', 'img/bk.jpg', NULL, 'Sri Respati Retnaningtyas, M.M'),
('BK', 'Perencanaan Karir di SMK', '<h2>Inti Materi</h2><p>Membantu siswa merencanakan karir sesuai jurusan dan mempersiapkan diri untuk dunia kerja atau studi lanjut.</p><ul><li>Mengenali peluang karir di bidang SMK.</li><li>Menyusun CV dan surat lamaran kerja.</li><li>Mempersiapkan diri untuk wawancara kerja.</li></ul>', 'img/bk.jpg', NULL, 'Sri Respati Retnaningtyas, M.M');

--
-- Indexes for dumped tables


--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_kontak_email` (`email`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_login_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
