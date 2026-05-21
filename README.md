# TaskNest — To-Do App with Categories

Aplikasi manajemen tugas berbasis web, dibangun dengan Laravel + MySQL + Tailwind CSS.

## Setup (ikuti urutan ini)

### 1. Taruh folder ini ke dalam project Laravel yang sudah ada, ATAU install Laravel dulu:
```bash
composer create-project laravel/laravel tasknest-app
```
Lalu copy isi folder ini ke dalam project Laravel tersebut.

### 2. Copy file .env
```bash
cp .env.example .env
php artisan key:generate
```

### 3. Sesuaikan database di .env
```
DB_DATABASE=tasknest
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Buat database MySQL
```sql
CREATE DATABASE tasknest CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 5. Jalankan migration & seeder
```bash
php artisan migrate
php artisan db:seed
```

### 6. Jalankan server
```bash
php artisan serve
```

Buka http://localhost:8000

## Akun Demo (setelah db:seed)
- Email: demo@tasknest.com
- Password: password

## Tech Stack
| Layer    | Teknologi                  |
|----------|---------------------------|
| Frontend | Blade + Tailwind CSS (CDN) |
| Backend  | Laravel 10+ (PHP 8.1+)    |
| Database | MySQL                      |
| Auth     | Laravel built-in           |

## Fitur
- Login & Register
- Dashboard tugas per kategori
- Tambah / Edit / Hapus tugas
- Tandai tugas selesai/belum selesai
- Manajemen kategori
- Search tugas
