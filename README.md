## About Gameshark

Gameshark merupakan platform web untuk peminjaman gim dan konsol gim. Proyek ini dibuat untuk memenuhi assesment Pelatihan dan Sertifikasi Pengembang Web LSP Informatika.  

## Team

Tim kami terdiri dari:
1. Rafi Ahmad Khairan (1202200199)
2. Ikram Zaidan Wicaksono (1202204216)

## Feature

Terdapat 2 role pengguna dalam proyek ini. Berikut merupakan role dengan masing-masing fiturnya:
1. Admin
   - Menambahkan, menampilkan, mengubah, menghapus data Game.
   - Menambahkan, menampilkan, mengubah, menghapus data Tag/Genre Game.
   - Menambahkan, menampilkan, mengubah, menghapus data Platform Game.
   - Menambahkan, menampilkan, mengubah, menghapus data User.
   - Menampilkan seluruh riwayat data peminjaman semua user.
   - Mengubah status data peminjaman.
   - Mengubah profil User lain yang memiliki role _user_.
   - Mengubah profil User sendiri.
2. User
   - Mengajukan peminjaman Game kepada User dengan role _admin_ (batas peminjaman yang berlangsung adalah 2 game).
   - Mengajukan pengembalian Game kepada User dengan role _admin_.
   - Mencari data game berdasarkan nama game.
   - Menampilkan seluruh riwayat peminjaman sendiri.
   - Mengubah profil.
  
Selain itu, beberapa fitur lainnya adalah sebagai berikut:
- Menambahkan denda secara otomatis ketika waktu peminjaman melebihi 5 hari.

## Scheme

Berikut merupakan skema database pada proyek ini:
<img src="https://github.com/rafikhairan/pelatihan-sertifikasi/blob/master/public/assets/img/Skema%20Database.png" alt="Database Scheme">

## Preview

### Halaman utama pengguna
<img src="https://github.com/rafikhairan/pelatihan-sertifikasi/blob/master/public/assets/img/preview/preview_01.png" alt="Preview 1">

### Halaman game
<img src="https://github.com/rafikhairan/pelatihan-sertifikasi/blob/master/public/assets/img/preview/preview_02.png" alt="Preview 2">

### Halaman profil pengguna
<img src="https://github.com/rafikhairan/pelatihan-sertifikasi/blob/master/public/assets/img/preview/preview_03.png" alt="Preview 3">

### Halaman list peminjaman pengguna
<img src="https://github.com/rafikhairan/pelatihan-sertifikasi/blob/master/public/assets/img/preview/preview_04.png" alt="Preview 4">

## Video Demo
https://drive.google.com/file/d/19I_Jl22bYTFxD2LW6PlQhPEuQ7vjjdqc/view?usp=sharing

## Made with

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Laravel is a web application framework with expressive, elegant syntax. They believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects.
