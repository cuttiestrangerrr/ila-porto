# Portofolio — Vue + Laravel

Website portofolio UI/UX designer. Backend Laravel menyediakan data (profil,
skill, proyek) lewat API JSON; frontend Vue 3 menampilkannya.

```
portfolio/
├── backend/    Laravel 11 (API)
└── frontend/   Vue 3 + Vite + Tailwind
```

## 1. Setup Backend (Laravel)

Butuh PHP >= 8.2, Composer, dan salah satu database (default: SQLite, paling mudah).

```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
```

Buat file database SQLite (kalau pakai default):

```bash
touch database/database.sqlite
```

Lalu pastikan di `.env` baris berikut aktif:

```
DB_CONNECTION=sqlite
```

Jalankan migration + seeder (mengisi contoh data skill & proyek):

```bash
php artisan migrate --seed
```

Ubah nama & role kamu di `.env`:

```
PROFILE_NAME="Nama Kamu"
PROFILE_ROLE="UI/UX Designer"
```

Detail bio, email, dan link sosial media lainnya ada di `config/profile.php`
— edit langsung file itu.

Jalankan server:

```bash
php artisan serve
```

Backend akan aktif di `http://localhost:8000`. Coba buka
`http://localhost:8000/api/portfolio` di browser untuk lihat data JSON-nya.

## 2. Setup Frontend (Vue)

Butuh Node.js >= 18.

```bash
cd frontend
npm install
cp .env.example .env
npm run dev
```

Buka `http://localhost:5173`. Kalau backend Laravel sudah jalan di
`http://localhost:8000`, frontend otomatis memakai data dari sana. Kalau
belum, frontend memakai data contoh dari `src/data/fallback.js` supaya
tampilan tetap bisa dilihat.

## 3. Mengganti isi dengan data kamu

Ada dua cara, sesuai kebutuhan:

- **Tanpa database (paling cepat):** edit langsung
  `frontend/src/data/fallback.js`. Cocok kalau kamu tidak mau repot setup
  Laravel dulu dan hanya butuh tampilan statis.
- **Dengan database (disarankan):** edit
  `backend/database/seeders/PortfolioSeeder.php` lalu jalankan ulang
  `php artisan migrate:fresh --seed`. Nanti proyek bisa ditambah/diedit
  lewat Tinker atau kamu bisa buat halaman admin sendiri di atas API yang
  sudah ada.

Foto-foto (avatar & screenshot proyek) ditaruh di
`frontend/public/images/` — lihat `README.txt` di folder itu.

## 4. Build untuk production

```bash
cd frontend
npm run build
```

Hasilnya ada di `frontend/dist/`, tinggal di-deploy ke hosting statis mana
saja (Netlify, Vercel, dsb). Backend Laravel di-deploy terpisah seperti
biasa (Forge, VPS, dll), lalu set `VITE_API_URL` di frontend ke alamat
API production sebelum build.

## Endpoint API

| Method | Endpoint          | Keterangan                          |
|--------|-------------------|--------------------------------------|
| GET    | `/api/portfolio`  | profil + skill + proyek sekaligus    |
| GET    | `/api/profile`    | data profil                          |
| GET    | `/api/skills`     | daftar skill                         |
| GET    | `/api/projects`   | daftar proyek                        |
| GET    | `/api/projects/{slug}` | detail satu proyek             |
| POST   | `/api/contact`    | kirim pesan dari form kontak         |

## Catatan

Pesan dari form kontak saat ini hanya dicatat ke
`backend/storage/logs/laravel.log`. Kalau mau dikirim ke email, edit
`app/Http/Controllers/Api/ContactController.php` dan pakai `Mail::send()`.
