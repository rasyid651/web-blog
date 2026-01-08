# 🌐 Go IT - Portal Informasi Teknologi

**Go IT** adalah sebuah platform web blog berbasis CRUD yang menyajikan informasi terkini seputar dunia teknologi, mulai dari AI, Software Development, hingga tren Cloud Computing. Website ini dirancang untuk memudahkan pengelolaan konten artikel melalui panel admin yang intuitif.

---

## 🎯 Tujuan Project
Project ini dibuat untuk menyediakan wadah edukasi bagi peminat IT. Dengan sistem manajemen konten (CMS) sederhana, admin dapat dengan mudah memperbarui informasi, sementara pembaca mendapatkan pengalaman navigasi yang bersih dan modern.

---

## 🚀 Fitur Utama

### 👤 Pengunjung (User)
* **Membaca Artikel:** Menjelajahi berbagai artikel terbaru di bidang IT.
* **Detail Artikel:** Melihat isi konten secara mendalam melalui halaman detail.
* **Hubungi Kami:** Form interaktif untuk mengirimkan pesan atau pertanyaan kepada tim.
* **Navigasi Cepat:** Menu navigasi yang memudahkan akses ke bagian Beranda, Artikel, Tentang Kami, dan Kontak.

### 🛠 Admin (Content Manager)
* **Autentikasi Aman:** Sistem Login dan Logout untuk melindungi dashboard.
* **Dashboard CRUD:** * **Create:** Menambah artikel baru lengkap dengan gambar.
    * **Read:** Melihat daftar seluruh artikel dalam tabel yang rapi.
    * **Update:** Memperbarui judul, isi, atau gambar artikel yang sudah ada.
    * **Delete:** Menghapus artikel yang sudah tidak relevan.

---

## 📱 Responsivitas
Berbeda dengan versi sebelumnya, website **Go IT** kini telah dioptimalkan agar **Fully Responsive**. Website dapat diakses dengan nyaman melalui:
* 🖥️ Desktop / Laptop
* 📱 Tablet
* 📲 Smartphone (Mobile Friendly)

---

## ⚙️ Teknologi yang Digunakan
* **Frontend:** HTML5, CSS3 (Custom Styling)
* **Backend:** PHP (Native)
* **Database:** MySQL (MariaDB)
* **Tools:** Visual Studio Code, XAMPP, Figma (UI Design)

---

## 📂 Struktur Folder
```text
├── admin/              # Halaman fungsionalitas admin
├── auth/               # Sistem autentikasi (Login/Logout)
├── img/                # Asset gambar artikel
├── img_logo/           # Asset logo website
├── src/                # Source code tambahan/library
├── .gitignore          # File konfigurasi git
├── card.md             # Dokumentasi komponen card
├── detail.php          # Halaman detail artikel
├── index.php           # Halaman utama (Landing Page)
├── koneksi.php         # Konfigurasi database
├── logout.php          # Handler logout
├── package.json        # Dependensi project
├── user.php            # Halaman manajemen user (Admin side)
└── README.md           # Dokumentasi project
