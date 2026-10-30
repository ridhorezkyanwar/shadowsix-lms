-- ShadowSix LMS starter learning materials
-- Original introductory lessons: one starter lesson for each of the 13 subjects shown on the homepage.
-- Safe to import more than once: a row is skipped when the same subject + title already exists.
-- This file does not modify users, passwords, roles, or existing material rows.
SET NAMES utf8mb4;

INSERT INTO `materi` (`nama_pelajaran`, `judul_materi`, `isi_materi`, `gambar_materi`, `gambar_mapel`, `nama_guru`)
SELECT 'Bahasa Indonesia', 'Mengenal Teks Eksposisi dan Menyusun Gagasan', '<h2>Tujuan Pembelajaran</h2><p>Setelah mempelajari materi ini, siswa dapat menjelaskan tujuan teks eksposisi, mengenali strukturnya, dan menyusun paragraf yang didukung alasan serta fakta.</p><h2>1. Pengertian</h2><p>Teks eksposisi menyampaikan pendapat atau penjelasan mengenai suatu topik secara jelas dan logis. Pendapat penulis perlu didukung alasan, contoh, atau data yang relevan agar pembaca dapat memahami dasar pemikirannya.</p><h2>2. Struktur Teks</h2><ul><li><strong>Tesis:</strong> memperkenalkan topik dan sudut pandang penulis.</li><li><strong>Argumentasi:</strong> menyajikan alasan, bukti, contoh, atau penjelasan yang mendukung tesis.</li><li><strong>Penegasan ulang:</strong> merangkum kembali pendapat utama dengan bahasa yang meyakinkan.</li></ul><h2>3. Ciri Kebahasaan</h2><p>Teks eksposisi menggunakan kata-kata yang bermakna jelas, konjungsi sebab-akibat seperti karena dan sehingga, serta istilah yang sesuai dengan topik. Fakta dan pendapat perlu dibedakan.</p><h2>Contoh Singkat</h2><p>Membaca secara rutin dapat memperluas wawasan. Melalui buku dan artikel, pembaca menemukan kosakata, informasi, serta sudut pandang baru. Karena itu, menyediakan waktu membaca setiap hari merupakan kebiasaan belajar yang bermanfaat.</p><h2>Latihan</h2><ol><li>Tentukan tesis dari contoh paragraf tersebut.</li><li>Tuliskan dua alasan yang mendukung kebiasaan membaca.</li><li>Buat satu paragraf eksposisi tentang kebersihan kelas dengan struktur tesis, argumentasi, dan penegasan ulang.</li></ol>', NULL, NULL, 'Tim ShadowSix'
WHERE NOT EXISTS (
    SELECT 1 FROM `materi`
    WHERE `nama_pelajaran` = 'Bahasa Indonesia'
      AND `judul_materi` = 'Mengenal Teks Eksposisi dan Menyusun Gagasan'
);

INSERT INTO `materi` (`nama_pelajaran`, `judul_materi`, `isi_materi`, `gambar_materi`, `gambar_mapel`, `nama_guru`)
SELECT 'Bahasa Inggris', 'Introducing Yourself and Simple Present Tense', '<h2>Learning Objectives</h2><p>After this lesson, students can introduce themselves, ask simple questions, and use the simple present tense to describe routines and facts.</p><h2>1. Self-Introduction</h2><p>A simple introduction usually includes your name, place of study, interests, and a short personal detail. Use polite expressions and speak clearly.</p><p><strong>Example:</strong> Hello, my name is Rani. I am a student. I study software engineering. I enjoy reading and learning new things. Nice to meet you.</p><h2>2. Simple Present Tense</h2><p>Use the simple present for habits, routines, and general facts. For I, you, we, and they, use the base verb. For he, she, and it, usually add -s or -es.</p><ul><li>I study English every day.</li><li>She reads a book after school.</li><li>They play badminton on Friday.</li></ul><h2>3. Asking Questions</h2><ul><li>What is your name?</li><li>Where do you study?</li><li>What do you like doing?</li></ul><h2>Practice</h2><ol><li>Write five sentences to introduce yourself.</li><li>Write three daily routines using the simple present tense.</li><li>Change “She studies English” into a negative sentence and a question.</li></ol>', NULL, NULL, 'Tim ShadowSix'
WHERE NOT EXISTS (
    SELECT 1 FROM `materi`
    WHERE `nama_pelajaran` = 'Bahasa Inggris'
      AND `judul_materi` = 'Introducing Yourself and Simple Present Tense'
);

INSERT INTO `materi` (`nama_pelajaran`, `judul_materi`, `isi_materi`, `gambar_materi`, `gambar_mapel`, `nama_guru`)
SELECT 'DK RPL', 'Dasar Rekayasa Perangkat Lunak dan Siklus Pengembangan', '<h2>Tujuan Pembelajaran</h2><p>Siswa memahami peran rekayasa perangkat lunak, tahapan pengembangan aplikasi, dan pentingnya dokumentasi serta pengujian.</p><h2>1. Apa Itu RPL?</h2><p>Rekayasa Perangkat Lunak (RPL) adalah bidang yang mempelajari cara merancang, membuat, menguji, dan memelihara perangkat lunak secara terencana. Produk perangkat lunak dapat berupa aplikasi web, aplikasi desktop, atau aplikasi seluler.</p><h2>2. Tahapan Pengembangan</h2><ol><li><strong>Analisis kebutuhan:</strong> memahami masalah pengguna dan menentukan fitur yang diperlukan.</li><li><strong>Perancangan:</strong> menyusun alur, tampilan, struktur data, dan arsitektur aplikasi.</li><li><strong>Implementasi:</strong> menerjemahkan rancangan menjadi kode program.</li><li><strong>Pengujian:</strong> memeriksa apakah fitur bekerja dan menemukan kesalahan.</li><li><strong>Pemeliharaan:</strong> memperbaiki masalah serta menyesuaikan aplikasi dengan kebutuhan baru.</li></ol><h2>3. Contoh Kasus</h2><p>Sebuah perpustakaan sekolah membutuhkan aplikasi peminjaman buku. Kebutuhan awalnya dapat mencakup pencarian buku, pencatatan anggota, transaksi pinjam-kembali, dan laporan. Tim perlu memvalidasi kebutuhan tersebut kepada calon pengguna sebelum mulai membuat aplikasi.</p><h2>Latihan</h2><ol><li>Pilih satu masalah di sekolah yang dapat dibantu oleh aplikasi.</li><li>Tuliskan minimal empat kebutuhan fungsional aplikasi tersebut.</li><li>Jelaskan mengapa pengujian diperlukan sebelum aplikasi digunakan.</li></ol>', NULL, NULL, 'Tim ShadowSix'
WHERE NOT EXISTS (
    SELECT 1 FROM `materi`
    WHERE `nama_pelajaran` = 'DK RPL'
      AND `judul_materi` = 'Dasar Rekayasa Perangkat Lunak dan Siklus Pengembangan'
);

INSERT INTO `materi` (`nama_pelajaran`, `judul_materi`, `isi_materi`, `gambar_materi`, `gambar_mapel`, `nama_guru`)
SELECT 'Seni Rupa', 'Unsur dan Prinsip Dasar Seni Rupa', '<h2>Tujuan Pembelajaran</h2><p>Siswa dapat mengenali unsur visual dan menjelaskan bagaimana unsur tersebut disusun menjadi karya yang menarik.</p><h2>1. Unsur Seni Rupa</h2><ul><li><strong>Titik dan garis:</strong> membentuk jejak, arah, batas, dan pola.</li><li><strong>Bidang dan bentuk:</strong> membangun siluet dua dimensi maupun kesan volume.</li><li><strong>Warna:</strong> memberi suasana, penekanan, dan identitas visual.</li><li><strong>Tekstur:</strong> memberi kesan permukaan halus, kasar, atau berpola.</li><li><strong>Ruang dan gelap-terang:</strong> membantu menciptakan kedalaman dan volume.</li></ul><h2>2. Prinsip Penataan</h2><p>Prinsip seni rupa antara lain keseimbangan, kesatuan, irama, proporsi, kontras, dan penekanan. Prinsip-prinsip ini membantu mengatur hubungan antarunsur agar karya mudah dipahami.</p><h2>3. Mengamati Karya</h2><p>Ketika mengamati poster, perhatikan bagian yang paling menarik perhatian, kombinasi warna, keterbacaan tulisan, dan jarak antarobjek. Tanyakan apakah unsur-unsurnya mendukung pesan poster.</p><h2>Praktik</h2><ol><li>Buat sketsa poster ajakan menjaga kebersihan sekolah.</li><li>Gunakan paling sedikit tiga unsur seni rupa.</li><li>Jelaskan pilihan warna dan bagian yang ingin paling ditonjolkan.</li></ol>', NULL, NULL, 'Tim ShadowSix'
WHERE NOT EXISTS (
    SELECT 1 FROM `materi`
    WHERE `nama_pelajaran` = 'Seni Rupa'
      AND `judul_materi` = 'Unsur dan Prinsip Dasar Seni Rupa'
);

INSERT INTO `materi` (`nama_pelajaran`, `judul_materi`, `isi_materi`, `gambar_materi`, `gambar_mapel`, `nama_guru`)
SELECT 'Coding & AI', 'Berpikir Komputasional, Algoritma, dan Etika AI', '<h2>Tujuan Pembelajaran</h2><p>Siswa mampu menjelaskan algoritma, memecah masalah menjadi langkah kecil, dan menggunakan teknologi AI secara bertanggung jawab.</p><h2>1. Berpikir Komputasional</h2><p>Berpikir komputasional adalah pendekatan untuk menyelesaikan masalah melalui dekomposisi, pengenalan pola, abstraksi, dan penyusunan algoritma. Pendekatan ini dapat digunakan sebelum menulis kode.</p><h2>2. Algoritma</h2><p>Algoritma merupakan urutan langkah yang jelas untuk mencapai tujuan. Contoh algoritma mengirim tugas: buka platform, masuk ke akun, pilih kelas, unggah berkas, periksa nama berkas, lalu kirim.</p><h2>3. Contoh Pseudocode</h2><pre><code>MULAI
  baca nilai
  JIKA nilai &gt;= 75
    tampilkan "Lulus"
  JIKA TIDAK
    tampilkan "Perlu belajar lagi"
SELESAI</code></pre><h2>4. Menggunakan AI dengan Bijak</h2><p>AI dapat membantu membuat ide, menjelaskan konsep, atau menyusun contoh. Namun, hasil AI dapat keliru atau tidak lengkap. Periksa informasi melalui sumber tepercaya, jangan memasukkan data pribadi atau rahasia, dan jelaskan bantuan AI yang digunakan sesuai aturan tugas.</p><h2>Latihan</h2><ol><li>Buat algoritma untuk menghitung rata-rata tiga nilai.</li><li>Gambarkan percabangan jika rata-rata minimal 75 dinyatakan lulus.</li><li>Tulis dua risiko dan dua cara aman menggunakan AI untuk belajar.</li></ol>', NULL, NULL, 'Tim ShadowSix'
WHERE NOT EXISTS (
    SELECT 1 FROM `materi`
    WHERE `nama_pelajaran` = 'Coding & AI'
      AND `judul_materi` = 'Berpikir Komputasional, Algoritma, dan Etika AI'
);

INSERT INTO `materi` (`nama_pelajaran`, `judul_materi`, `isi_materi`, `gambar_materi`, `gambar_mapel`, `nama_guru`)
SELECT 'Sejarah', 'Berpikir Sejarah: Kronologi, Sumber, dan Sebab Akibat', '<h2>Tujuan Pembelajaran</h2><p>Siswa dapat menjelaskan cara kerja sejarah sebagai kajian masa lalu dan menilai informasi dari sumber sejarah secara kritis.</p><h2>1. Sejarah dan Kronologi</h2><p>Sejarah mempelajari pengalaman manusia pada masa lalu berdasarkan bukti. Kronologi menyusun peristiwa menurut urutan waktu agar hubungan antarperistiwa dapat dipahami.</p><h2>2. Jenis Sumber Sejarah</h2><ul><li><strong>Sumber primer:</strong> berasal dari masa atau pelaku peristiwa, misalnya surat, foto, arsip, artefak, atau kesaksian.</li><li><strong>Sumber sekunder:</strong> karya yang membahas atau menafsirkan sumber primer, misalnya buku kajian sejarah.</li></ul><p>Sebuah sumber perlu diperiksa asal-usul, waktu pembuatan, pembuat, tujuan, dan kemungkinan sudut pandangnya.</p><h2>3. Sebab dan Akibat</h2><p>Peristiwa sejarah biasanya dipengaruhi banyak faktor. Hindari menyimpulkan sebab hanya dari satu informasi. Bandingkan beberapa sumber dan bedakan fakta yang tercatat dengan interpretasi penulis.</p><h2>Latihan</h2><ol><li>Pilih satu peristiwa sejarah Indonesia yang pernah dipelajari.</li><li>Buat garis waktu berisi minimal lima kejadian penting.</li><li>Temukan satu sumber primer dan satu sumber sekunder, lalu bandingkan informasi serta sudut pandangnya.</li></ol>', NULL, NULL, 'Tim ShadowSix'
WHERE NOT EXISTS (
    SELECT 1 FROM `materi`
    WHERE `nama_pelajaran` = 'Sejarah'
      AND `judul_materi` = 'Berpikir Sejarah: Kronologi, Sumber, dan Sebab Akibat'
);

INSERT INTO `materi` (`nama_pelajaran`, `judul_materi`, `isi_materi`, `gambar_materi`, `gambar_mapel`, `nama_guru`)
SELECT 'PJOK', 'Kebugaran Jasmani dan Keselamatan Saat Berolahraga', '<h2>Tujuan Pembelajaran</h2><p>Siswa mengenali komponen kebugaran jasmani dan memahami kebiasaan aman sebelum, selama, dan setelah aktivitas fisik.</p><h2>1. Komponen Kebugaran</h2><ul><li><strong>Daya tahan:</strong> kemampuan tubuh melakukan aktivitas dalam waktu tertentu.</li><li><strong>Kekuatan:</strong> kemampuan otot menghasilkan tenaga.</li><li><strong>Kelenturan:</strong> kemampuan sendi bergerak dalam rentang gerak yang sesuai.</li><li><strong>Kecepatan dan koordinasi:</strong> kemampuan melakukan gerak secara cepat dan terarah.</li><li><strong>Keseimbangan:</strong> kemampuan menjaga posisi tubuh.</li></ul><h2>2. Pemanasan dan Pendinginan</h2><p>Pemanasan dilakukan secara bertahap untuk mempersiapkan tubuh sebelum aktivitas inti. Pendinginan membantu menurunkan intensitas aktivitas secara perlahan. Pilih gerakan sesuai kondisi tubuh dan arahan guru.</p><h2>3. Keselamatan</h2><p>Gunakan pakaian dan alas kaki yang sesuai, minum air secukupnya, perhatikan kondisi lapangan, dan hentikan aktivitas bila muncul nyeri, pusing, atau sesak yang tidak biasa. Beri tahu guru jika memiliki kondisi kesehatan yang perlu diperhatikan.</p><h2>Latihan</h2><ol><li>Sebutkan empat komponen kebugaran jasmani.</li><li>Buat urutan pemanasan ringan sebelum pelajaran olahraga.</li><li>Jelaskan tiga aturan keselamatan saat berolahraga di lapangan.</li></ol>', NULL, NULL, 'Tim ShadowSix'
WHERE NOT EXISTS (
    SELECT 1 FROM `materi`
    WHERE `nama_pelajaran` = 'PJOK'
      AND `judul_materi` = 'Kebugaran Jasmani dan Keselamatan Saat Berolahraga'
);

INSERT INTO `materi` (`nama_pelajaran`, `judul_materi`, `isi_materi`, `gambar_materi`, `gambar_mapel`, `nama_guru`)
SELECT 'BK', 'Mengenal Diri dan Menyusun Tujuan Belajar', '<h2>Tujuan Pembelajaran</h2><p>Siswa dapat mengenali kekuatan dan kebutuhan pengembangan diri serta membuat tujuan belajar yang realistis.</p><h2>1. Mengenal Diri</h2><p>Mengenal diri berarti mengamati minat, nilai, kebiasaan, kekuatan, dan hal yang masih perlu dilatih. Refleksi diri bukan untuk membandingkan diri dengan orang lain, melainkan untuk menentukan langkah pengembangan.</p><h2>2. Tujuan SMART</h2><p>Tujuan yang baik dapat disusun dengan pendekatan SMART: Specific (jelas), Measurable (terukur), Achievable (dapat dicapai), Relevant (sesuai kebutuhan), dan Time-bound (memiliki batas waktu).</p><p>Contoh: “Selama dua minggu, saya mengerjakan latihan matematika 20 menit setiap Senin sampai Kamis dan mencatat soal yang belum dipahami.”</p><h2>3. Mengelola Waktu</h2><p>Buat daftar tugas, tentukan prioritas, pecah pekerjaan besar menjadi bagian kecil, dan sisihkan waktu istirahat. Evaluasi rencana secara berkala agar dapat disesuaikan.</p><h2>Refleksi</h2><ol><li>Tuliskan dua kekuatan diri yang membantu proses belajar.</li><li>Tentukan satu kebiasaan yang ingin diperbaiki.</li><li>Buat satu tujuan SMART untuk dua minggu ke depan dan cara mengevaluasinya.</li></ol>', NULL, NULL, 'Tim ShadowSix'
WHERE NOT EXISTS (
    SELECT 1 FROM `materi`
    WHERE `nama_pelajaran` = 'BK'
      AND `judul_materi` = 'Mengenal Diri dan Menyusun Tujuan Belajar'
);

INSERT INTO `materi` (`nama_pelajaran`, `judul_materi`, `isi_materi`, `gambar_materi`, `gambar_mapel`, `nama_guru`)
SELECT 'Pendidikan Agama', 'Nilai Moral, Tanggung Jawab, dan Toleransi dalam Kehidupan', '<h2>Tujuan Pembelajaran</h2><p>Siswa memahami pentingnya nilai moral, tanggung jawab, kepedulian, dan sikap saling menghormati dalam kehidupan sehari-hari.</p><h2>1. Nilai Moral</h2><p>Nilai moral menjadi pedoman dalam membedakan tindakan yang bertanggung jawab dan tindakan yang merugikan. Kejujuran, kepedulian, disiplin, dan kesediaan menepati janji membantu membangun kepercayaan.</p><h2>2. Tanggung Jawab</h2><p>Tanggung jawab ditunjukkan dengan menyelesaikan kewajiban, mengakui kesalahan, memperbaiki akibat tindakan, serta mempertimbangkan hak orang lain. Tanggung jawab berlaku di rumah, sekolah, dan masyarakat.</p><h2>3. Toleransi dan Kepedulian</h2><p>Masyarakat memiliki latar belakang dan keyakinan yang beragam. Sikap toleran berarti menghormati perbedaan, tidak memaksakan keyakinan, tidak merendahkan orang lain, dan bekerja sama dalam kebaikan.</p><h2>4. Penerapan</h2><ul><li>Berkata jujur dan menghindari menyontek.</li><li>Menghormati teman yang berbeda latar belakang.</li><li>Membantu orang lain tanpa mengharapkan imbalan.</li><li>Menjaga kebersihan dan fasilitas bersama.</li></ul><h2>Refleksi</h2><ol><li>Berikan dua contoh tanggung jawab di sekolah.</li><li>Mengapa menghormati perbedaan penting dalam pertemanan?</li><li>Tuliskan satu tindakan nyata yang akan kamu lakukan minggu ini.</li></ol>', NULL, NULL, 'Tim ShadowSix'
WHERE NOT EXISTS (
    SELECT 1 FROM `materi`
    WHERE `nama_pelajaran` = 'Pendidikan Agama'
      AND `judul_materi` = 'Nilai Moral, Tanggung Jawab, dan Toleransi dalam Kehidupan'
);

INSERT INTO `materi` (`nama_pelajaran`, `judul_materi`, `isi_materi`, `gambar_materi`, `gambar_mapel`, `nama_guru`)
SELECT 'PPKN', 'Pancasila, Hak, Kewajiban, dan Musyawarah', '<h2>Tujuan Pembelajaran</h2><p>Siswa dapat menjelaskan hubungan nilai Pancasila dengan perilaku warga negara serta menerapkan hak, kewajiban, dan musyawarah dalam kehidupan sekolah.</p><h2>1. Pancasila sebagai Dasar Negara</h2><p>Pancasila menjadi dasar negara dan pedoman nilai dalam kehidupan berbangsa. Kelima silanya saling berkaitan dan mengarahkan warga untuk menghormati keyakinan, kemanusiaan, persatuan, musyawarah, serta keadilan sosial.</p><h2>2. Hak dan Kewajiban</h2><p>Hak adalah sesuatu yang patut diterima, sedangkan kewajiban merupakan sesuatu yang harus dilaksanakan. Di sekolah, siswa berhak memperoleh pembelajaran dan lingkungan aman, serta berkewajiban menaati aturan dan menghormati warga sekolah.</p><h2>3. Musyawarah</h2><p>Musyawarah memberi kesempatan kepada anggota kelompok untuk menyampaikan pendapat, mendengarkan alasan orang lain, dan mencari keputusan bersama. Perbedaan pendapat perlu disampaikan dengan sopan dan didukung alasan yang jelas.</p><h2>Latihan</h2><ol><li>Berikan satu contoh perilaku yang mencerminkan masing-masing sila Pancasila.</li><li>Tuliskan tiga hak dan tiga kewajiban siswa di sekolah.</li><li>Jelaskan tahapan musyawarah untuk menentukan kegiatan kelas.</li></ol>', NULL, NULL, 'Tim ShadowSix'
WHERE NOT EXISTS (
    SELECT 1 FROM `materi`
    WHERE `nama_pelajaran` = 'PPKN'
      AND `judul_materi` = 'Pancasila, Hak, Kewajiban, dan Musyawarah'
);

INSERT INTO `materi` (`nama_pelajaran`, `judul_materi`, `isi_materi`, `gambar_materi`, `gambar_mapel`, `nama_guru`)
SELECT 'Matematika', 'Persamaan Linear Satu Variabel', '<h2>Tujuan Pembelajaran</h2><p>Siswa dapat mengenali persamaan linear satu variabel dan menentukan nilai variabel dengan melakukan operasi yang setara pada kedua ruas.</p><h2>1. Pengertian</h2><p>Persamaan linear satu variabel adalah kalimat matematika yang memiliki satu variabel berpangkat satu dan tanda sama dengan. Contoh: 3x + 5 = 20.</p><h2>2. Langkah Penyelesaian</h2><p>Tujuan penyelesaian adalah memperoleh nilai variabel. Lakukan operasi yang sama pada kedua ruas agar kesetaraan tetap terjaga.</p><pre><code>3x + 5 = 20
3x = 20 - 5
3x = 15
x = 15 / 3
x = 5</code></pre><p>Pemeriksaan: substitusikan x = 5 ke persamaan awal. Hasilnya 3(5) + 5 = 20, sehingga jawaban benar.</p><h2>3. Penerapan</h2><p>Jika harga tiga buku yang sama ditambah biaya pembungkus Rp2.000 adalah Rp17.000, maka harga satu buku dapat dicari dengan persamaan 3x + 2.000 = 17.000.</p><h2>Latihan</h2><ol><li>Selesaikan 2x + 7 = 19.</li><li>Selesaikan 5x - 4 = 21.</li><li>Buat satu soal cerita yang dapat dimodelkan dengan persamaan linear satu variabel.</li></ol>', NULL, NULL, 'Tim ShadowSix'
WHERE NOT EXISTS (
    SELECT 1 FROM `materi`
    WHERE `nama_pelajaran` = 'Matematika'
      AND `judul_materi` = 'Persamaan Linear Satu Variabel'
);

INSERT INTO `materi` (`nama_pelajaran`, `judul_materi`, `isi_materi`, `gambar_materi`, `gambar_mapel`, `nama_guru`)
SELECT 'IPAS', 'Metode Ilmiah dan Pengamatan Lingkungan', '<h2>Tujuan Pembelajaran</h2><p>Siswa memahami cara melakukan pengamatan, menyusun pertanyaan, mengumpulkan data, dan menarik kesimpulan berdasarkan bukti.</p><h2>1. Pengamatan Ilmiah</h2><p>Pengamatan dilakukan menggunakan pancaindra atau alat ukur untuk memperoleh informasi. Catat waktu, tempat, kondisi, dan hasil pengukuran agar data dapat ditinjau kembali.</p><h2>2. Langkah Metode Ilmiah</h2><ol><li>Mengamati suatu fenomena.</li><li>Merumuskan pertanyaan yang dapat diuji.</li><li>Menyusun dugaan sementara atau hipotesis.</li><li>Merancang pengumpulan data secara adil dan aman.</li><li>Menganalisis hasil dan membuat kesimpulan.</li><li>Mengomunikasikan hasil serta keterbatasannya.</li></ol><h2>3. Contoh Pengamatan</h2><p>Kelompok siswa ingin mengetahui apakah jumlah sampah di kelas berubah setelah tempat sampah diberi label pemilahan. Catat jumlah atau berat sampah pada periode yang sama sebelum dan sesudah perubahan. Faktor lain, seperti jumlah siswa dan jadwal kebersihan, perlu diperhatikan.</p><h2>Latihan</h2><ol><li>Buat satu pertanyaan tentang lingkungan sekolah yang dapat diteliti.</li><li>Tentukan data yang perlu dicatat dan alat yang dibutuhkan.</li><li>Jelaskan satu faktor yang dapat membuat hasil pengamatan kurang adil.</li></ol>', NULL, NULL, 'Tim ShadowSix'
WHERE NOT EXISTS (
    SELECT 1 FROM `materi`
    WHERE `nama_pelajaran` = 'IPAS'
      AND `judul_materi` = 'Metode Ilmiah dan Pengamatan Lingkungan'
);

INSERT INTO `materi` (`nama_pelajaran`, `judul_materi`, `isi_materi`, `gambar_materi`, `gambar_mapel`, `nama_guru`)
SELECT 'Informatika', 'Data, Informasi, dan Keamanan Digital Dasar', '<h2>Tujuan Pembelajaran</h2><p>Siswa membedakan data dan informasi serta menerapkan kebiasaan dasar untuk melindungi akun dan perangkat digital.</p><h2>1. Data dan Informasi</h2><p>Data adalah fakta atau catatan mentah, misalnya angka kehadiran harian. Informasi adalah data yang telah diolah sehingga membantu menjawab pertanyaan, misalnya persentase kehadiran satu kelas dalam sebulan.</p><h2>2. Sistem Komputer</h2><p>Sistem komputer melibatkan perangkat keras, perangkat lunak, dan pengguna. Ketiganya bekerja sama untuk menerima masukan, memproses data, menyimpan, dan menghasilkan keluaran.</p><h2>3. Keamanan Digital</h2><ul><li>Gunakan kata sandi yang panjang dan unik untuk setiap akun.</li><li>Aktifkan autentikasi dua faktor bila tersedia.</li><li>Jangan membagikan kode OTP atau kata sandi.</li><li>Periksa alamat situs sebelum memasukkan informasi akun.</li><li>Cadangkan file penting dan perbarui perangkat lunak.</li></ul><h2>4. Jejak Digital</h2><p>Unggahan, komentar, dan informasi yang dibagikan dapat tersimpan atau disalin pihak lain. Pertimbangkan tujuan, audiens, dan dampak sebelum membagikan sesuatu. Hindari mengunggah data pribadi diri sendiri maupun orang lain tanpa izin.</p><h2>Latihan</h2><ol><li>Berikan contoh data dan informasi dari kegiatan piket kelas.</li><li>Sebutkan tiga ciri kata sandi yang kuat tanpa menuliskan kata sandi pribadimu.</li><li>Jelaskan cara mengenali pesan phishing.</li></ol>', NULL, NULL, 'Tim ShadowSix'
WHERE NOT EXISTS (
    SELECT 1 FROM `materi`
    WHERE `nama_pelajaran` = 'Informatika'
      AND `judul_materi` = 'Data, Informasi, dan Keamanan Digital Dasar'
);
