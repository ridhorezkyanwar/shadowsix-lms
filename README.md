# 🎓 ShadowSix - Learning Management System

---

## 📚 **PENJELASAN PROJECT** 

### Apa sih ShadowSix itu? 🤔

Yaaah, gampangnya gini... ShadowSix itu kayak **Sekolah Online Canggih** yang bisa diakses dari mana aja!

Bayangkan aja, kamu bisa buka website ini dari rumah, dari kafe, dari mana aja... terus ada **semua mata pelajaran yang kamu butuh** udah siap disitu! Dari Bahasa Indonesia, Matematika, sampai Coding & AI... semuanya ada!

### Apa aja yang bisa dilakukan? ✨

**Kalau kamu siswa:**

- ✅ Login/Register (daftar akun biar bisa akses materi)
- ✅ Pilih mata pelajaran favorit kamu
- ✅ Baca materi pembelajaran yang udah disusun rapi per BAB
- ✅ Lihat info guru yang mengajar tiap mata pelajaran
- ✅ Bisa akses dari HP atau Laptop (responsive banget!)

**Kalau kamu admin/guru:**

- 🔧 Login ke Dashboard Admin
- ➕ Tambah materi baru
- ✏️ Edit materi yang udah ada
- 🗑️ Hapus materi kalau perlu
- 👀 Kelola semua data pembelajaran

### Kenapa harus pakai ShadowSix? 🚀

1. **Materi Lengkap** 📖 - Ada 13+ mata pelajaran dengan ratusan topik pembelajaran!
2. **Gratis Total** 💰 - Nggak perlu bayar, semua materi 100% GRATIS!
3. **Fleksibel** 🕐 - Belajar kapan aja sesuai waktu kamu
4. **User-Friendly** 🎨 - Tampilannya bagus dan mudah dipake
5. **Responsif** 📱 - Jalan lancar di semua device (PC, Tablet, HP)

---

## 📖 **PENJELASAN PROSES BERTAHAP**

### **TAHAP 1: MEMAHAMI STRUKTUR PROJECT** 🏗️

Project ShadowSix ini terdiri dari beberapa bagian penting:

```
Project-Ukk-30/
├── index.php                     ← Halaman utama
├── login.php                     ← Login page
├── register.php                  ← Registrasi user
├── dashboard_admin.php           ← Kelola admin
├── databasecpnel.php            ← Koneksi database
├── style.css & features.css     ← Styling/tampilan
│
├── materi-bahasa-indonesia/     ← Folder materi Bahasa Indonesia
├── materi-matematika/           ← Folder materi Matematika
├── materi-bahasainggris/        ← Folder materi Bahasa Inggris
├── materi-informatika/          ← Folder materi Informatika
├── materi-dkrpl/                ← Folder materi DK RPL
├── materi-coding-dan-ai/        ← Folder materi Coding & AI
├── materi-sejarah/              ← Folder materi Sejarah
├── materi-ppkn/                 ← Folder materi PPKN
├── materi-pjok/                 ← Folder materi PJOK
├── materi-pai/                  ← Folder materi Pendidikan Agama
├── materi-ipas/                 ← Folder materi IPAS
├── materi-senirupa/             ← Folder materi Seni Rupa
├── materi-bk/                   ← Folder materi Bimbingan Konseling
│
├── img/                         ← Folder gambar/icon
├── kontak/                      ← Folder halaman kontak
│
└── shadowsix.sql                ← Database file
```

---

### **TAHAP 2: SETUP AWAL** ⚙️

#### **Step 2.1: Siapkan Database**

1. Buka **phpMyAdmin** (akses dari `http://localhost/phpmyadmin`)
2. Buat database baru dengan nama: `shadowsix`
3. Import file `shadowsix.sql` ke database tersebut
   - Cara: Pilih database → Tab "Import" → Pilih file `shadowsix.sql` → Klik "Go"

#### **Step 2.2: Setup File Koneksi**

File `databasecpnel.php` udah berisi konfigurasi database:

```php
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "shadowsix";
```

> ✅ Kalau pake XAMPP default, ini udah benar!

---

### **TAHAP 3: FITUR UTAMA** 🎯

#### **A. Sistem Autentikasi**

- **Login** → User masuk dengan username/password
- **Register** → User baru bisa daftar sendiri
- **Session Management** → Sistem cek siapa yang login, apa rolenya (user/admin)
- **Logout** → Aman keluar dari sistem

#### **B. Tampilan Mata Pelajaran**

Homepage menampilkan semua mata pelajaran dalam bentuk kartu yang cantik:

- Icon/Gambar mata pelajaran
- Nama mata pelajaran
- Deskripsi singkat
- Nama guru yang mengajar

#### **C. Halaman Materi**

Setiap mata pelajaran punya struktur folder sendiri dengan BAB-BAB pembelajaran:

- **Bab 1, Bab 2, ... Bab N** (sesuai jumlah topik)
- Setiap file bab berisi konten pembelajaran lengkap
- User bisa navigasi antar bab dengan mudah

#### **D. Dashboard Admin**

Tempat guru/admin mengelola:

- ➕ **Tambah Materi Baru** → Upload materi baru
- ✏️ **Edit Materi** → Update/perbaiki materi existing
- 🗑️ **Hapus Materi** → Hapus materi yang gak perlu
- 📊 **View Materi** → Lihat semua materi yang ada

#### **E. Halaman Kontak**

- Visitor bisa kirim pesan/pertanyaan
- Database menyimpan semua contact messages

---

### **TAHAP 4: TEKNOLOGI YANG DIPAKAI** 💻

| Aspek                  | Teknologi                |
| ---------------------- | ------------------------ |
| **Backend**            | PHP 7+                   |
| **Database**           | MySQL/MariaDB            |
| **Frontend**           | HTML5, CSS3              |
| **Session Management** | PHP Sessions             |
| **Server**             | Apache (XAMPP)           |
| **Database Query**     | MySQLi (Object-Oriented) |

---

### **TAHAG 5: WORKFLOW PENGGUNAAN** 📊

#### **Untuk Siswa:**

```
1. Akses website
   ↓
2. [Bukan user?] → Register akun
   ↓
3. Login dengan username/password
   ↓
4. Lihat dashboard (homepages dengan semua mata pelajaran)
   ↓
5. Pilih mata pelajaran yang ingin dipelajari
   ↓
6. Baca materi per BAB
   ↓
7. Logout ketika selesai
```

#### **Untuk Admin/Guru:**

```
1. Login dengan akun admin
   ↓
2. Redirect ke Dashboard Admin
   ↓
3. [Tambah Materi] → Upload materi baru
   [Edit Materi] → Update materi existing
   [Hapus Materi] → Hapus materi
   [View Materi] → Lihat semua materi
   ↓
4. Logout
```

---

### **TAHAP 6: DATABASE STRUCTURE** 📋

Database `shadowsix` memiliki beberapa tabel penting:

#### **Tabel Users**

```
- id_user (PK)
- username (unique)
- password (hashed)
- email
- role (user/admin)
- created_at
```

#### **Tabel Materi**

```
- id (PK)
- judul_materi
- nama_pelajaran
- deskripsi_materi
- konten_materi
- nama_guru
- gambar_mapel
- created_at
- updated_at
```

#### **Tabel Kontak**

```
- id (PK)
- nama
- email
- pesan
- created_at
```

---

## 🌐 **ENGLISH EXPLANATION**

---

### **PROJECT OVERVIEW**

**ShadowSix** is a modern **Learning Management System (LMS)** developed as a school project (UKK - Uji Kompetensi Keahlian) to provide a comprehensive, user-friendly platform for online education. The system enables students to access educational materials from multiple subjects and allows administrators to manage course content efficiently.

### **KEY FEATURES**

#### **1. User Authentication System**

- User registration and login functionality
- Role-based access control (Student/Admin)
- Secure session management
- Password protection and logout mechanism

#### **2. Educational Content Management**

- 13+ subjects with structured, chapter-based learning materials
- Subject cards with visual representations
- Teacher information for each course
- Organized folder structure for easy content navigation

#### **3. Administrative Dashboard**

- Content management capabilities:
  - **Create** new learning materials
  - **Read** existing materials
  - **Update** course content
  - **Delete** outdated materials
- Material overview and analytics

#### **4. Responsive User Interface**

- Mobile-friendly design
- Cross-device compatibility (desktop, tablet, smartphone)
- Intuitive navigation
- Modern styling with CSS3

#### **5. Contact Management**

- User inquiry system
- Database storage for messages
- Contact form with validation

---

### **TECHNICAL ARCHITECTURE**

#### **Backend Stack**

- **Language**: PHP 7+
- **Database**: MySQL/MariaDB
- **Database Connector**: MySQLi (Object-Oriented)
- **Session Management**: PHP Session Control

#### **Frontend Stack**

- **Markup**: HTML5
- **Styling**: CSS3
- **Responsive Design**: Mobile-first approach

#### **Server Environment**

- **Web Server**: Apache (XAMPP)
- **Development Environment**: XAMPP
- **Platform**: Windows/Cross-platform

---

### **PROJECT STRUCTURE**

```
Project-Ukk-30/
├── Core Files
│   ├── index.php                 (Landing page)
│   ├── login.php                 (User authentication)
│   ├── register.php              (User registration)
│   ├── dashboard_admin.php       (Admin control panel)
│   ├── databasecpnel.php         (Database connection)
│   └── logout.php                (Session termination)
│
├── Material Folders (13+ subjects)
│   ├── materi-bahasa-indonesia/
│   ├── materi-matematika/
│   ├── materi-bahasainggris/
│   ├── materi-informatika/
│   ├── materi-dkrpl/
│   ├── materi-kodingdanai/
│   ├── materi-sejarah/
│   ├── materi-ppkn/
│   ├── materi-pjok/
│   ├── materi-pai/
│   ├── materi-ipas/
│   ├── materi-senirupa/
│   └── materi-bk/
│
├── Supporting Directories
│   ├── img/                      (Subject images and icons)
│   └── kontak/                   (Contact form system)
│
├── Styling
│   ├── style.css                 (Main stylesheet)
│   ├── features.css              (Component styling)
│   ├── login.css
│   └── [subject-specific].css
│
└── Database
    └── shadowsix.sql             (Database schema & initial data)
```

---

### **INSTALLATION & SETUP GUIDE**

#### **Prerequisites**

- XAMPP or similar local server with Apache & MySQL
- PHP 7.0 or higher
- Modern web browser
- Text editor (VSCode recommended)

#### **Step 1: Database Setup**

1. Start XAMPP Control Panel
2. Start **Apache** and **MySQL** services
3. Open phpMyAdmin: `http://localhost/phpmyadmin`
4. Create new database: `shadowsix`
5. Import database schema:
   - Select the database → Import tab
   - Choose `shadowsix.sql` file
   - Click "Go"

#### **Step 2: Project Placement**

1. Navigate to XAMPP installation folder
2. Place project in: `xampp/htdocs/Project-Ukk-30/`

#### **Step 3: Database Connection**

The file `databasecpnel.php` contains connection credentials:

```php
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "shadowsix";
```

> Default XAMPP configuration. Modify if necessary.

#### **Step 4: Access Application**

Open browser and navigate to:

```
http://localhost/Project-Ukk-30/index.php
```

---

### **DATABASE SCHEMA**

#### **Users Table**

| Column     | Type                 | Constraint                  |
| ---------- | -------------------- | --------------------------- |
| id_user    | INT                  | PRIMARY KEY, AUTO_INCREMENT |
| username   | VARCHAR(255)         | UNIQUE, NOT NULL            |
| password   | VARCHAR(255)         | NOT NULL                    |
| email      | VARCHAR(255)         | UNIQUE                      |
| role       | ENUM('user','admin') | DEFAULT 'user'              |
| created_at | TIMESTAMP            | DEFAULT CURRENT_TIMESTAMP   |

#### **Materi (Materials) Table**

| Column           | Type         | Constraint                  |
| ---------------- | ------------ | --------------------------- |
| id               | INT          | PRIMARY KEY, AUTO_INCREMENT |
| judul_materi     | VARCHAR(255) | NOT NULL                    |
| nama_pelajaran   | VARCHAR(255) | NOT NULL                    |
| deskripsi_materi | TEXT         |                             |
| konten_materi    | LONGTEXT     |                             |
| nama_guru        | VARCHAR(255) |                             |
| gambar_mapel     | VARCHAR(255) |                             |
| created_at       | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP   |
| updated_at       | TIMESTAMP    | ON UPDATE CURRENT_TIMESTAMP |

#### **Kontak (Contact) Table**

| Column     | Type         | Constraint                  |
| ---------- | ------------ | --------------------------- |
| id         | INT          | PRIMARY KEY, AUTO_INCREMENT |
| nama       | VARCHAR(255) | NOT NULL                    |
| email      | VARCHAR(255) | NOT NULL                    |
| pesan      | LONGTEXT     | NOT NULL                    |
| created_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP   |

---

### **USER WORKFLOWS**

#### **Student Journey**

```
1. Visit Homepage
2. View Features (if not logged in)
3. Proceed to Login/Register
4. Enter Credentials
5. Access Dashboard
6. Browse Subjects
7. Select Subject
8. Read Material by Chapters
9. Navigate Between Topics
10. Logout
```

#### **Administrator Journey**

```
1. Login with Admin Credentials
2. Access Admin Dashboard
3. Manage Materials:
   - Add New Material (+ Button)
   - Edit Existing Material (Edit Icon)
   - Delete Material (Delete Icon)
   - View All Materials
4. Review Contact Messages
5. Logout
```

---

### **KEY FUNCTIONALITIES**

| Feature               | Functionality                | Accessibility       |
| --------------------- | ---------------------------- | ------------------- |
| **Authentication**    | Login/Register/Logout        | Public              |
| **Subject Browsing**  | View all available courses   | Authenticated Users |
| **Material Access**   | Read chapter-based content   | Authenticated Users |
| **Admin Panel**       | CRUD operations on materials | Admin Only          |
| **Contact Form**      | Send inquiries               | Public              |
| **Responsive Design** | Mobile & Desktop Support     | All Users           |

---

### **SECURITY FEATURES**

- ✅ Session-based authentication
- ✅ Password protection
- ✅ Role-based access control
- ✅ SQL prepared statements (MySQLi)
- ✅ HTML content escaping
- ✅ Logout functionality

---

### **FILE NAMING CONVENTION**

- Main pages: `lowercase.php` (e.g., `index.php`, `login.php`)
- Subject pages: `subjectname.php` (e.g., `matematika.php`)
- Stylesheets: `module.css` (e.g., `style.css`, `login.css`)
- Folder structure: `materi-[subject]/`

---

### **FUTURE ENHANCEMENT OPPORTUNITIES**

- 🎯 Add quiz/assessment features
- 📊 Implement progress tracking
- 🏆 Add gamification (badges, points)
- 💬 Integrate discussion forum
- 📧 Email notifications
- 🔐 Two-factor authentication
- 📱 Mobile app version
- 🎓 Certificate generation

---

### **PROJECT CREDITS**

**Developer**: Ridho Rezky Anwar / No. Absen 30  
**Project Type**: UKK (Uji Kompetensi Keahlian)  
**Institution**: SMK (Vocational High School)  
**Year**: 2026

---

## 🚀 **GETTING STARTED**

### Quick Start

```bash
1. Extract project files
2. Place in XAMPP htdocs folder
3. Import database via phpMyAdmin
4. Access: http://localhost/Project-Ukk-30/
5. Login with admin credentials or register as new user
```

### Default Admin Access

- Username: `admin`
- Password: `admin` (Change immediately for security)

---

## 📞 **SUPPORT & CONTACT**

For questions, suggestions, or bug reports:

- Visit: `http://localhost/Project-Ukk-30/kontak/kontak.php`
- Submit your inquiry through the contact form

---

## 📜 **LICENSE**

This project is created for educational purposes as part of UKK assessment.

---

**Last Updated**: 2026  
**Status**: Active & Maintained  
**Version**: 1.0.0

---

> "Learn Today, Lead Tomorrow!" 🎓✨
