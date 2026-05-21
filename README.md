# TaskNet — To-Do App with Categories

Aplikasi manajemen tugas berbasis web, dibangun dengan Laravel + MySQL + Tailwind CSS.

## Setup (ikuti urutan ini)

### 1. Taruh folder ini ke dalam project Laravel yang sudah ada, ATAU install Laravel dulu:
```bash
composer create-project laravel/laravel tasknet-app
```
Lalu copy isi folder ini ke dalam project Laravel tersebut.

### 2. Copy file .env
```bash
cp .env.example .env
php artisan key:generate
```

### 3. Sesuaikan database di .env
```
DB_DATABASE=tasknet
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Buat database MySQL
```sql
CREATE DATABASE tasknet CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
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
- Email: demo@tasknet.com
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

# Kelompok 9
- Rakha Aljiva Prabaswara			21120124140126
- Mayo Pinto Denai 				    21120124140133
- Josh Peter Sirait 				21120124140155
- Kiara Wulan Turnauli M			21120124140162
