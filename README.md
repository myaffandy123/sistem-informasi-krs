## SIAKAD (Sistem Informasi Akademik)

SIAKAD merupakan seubuah website yang bertujuan untuk menyediakan informasi dan manajemen akademik bagi sebuah institusi pendidikan (Sistem KRS). Repositori ini berisi kode sumber dan dokumentasi untuk website Sistem Informasi Akademik. 

## Fitur SIAKAD
- Regristrasi akun dengan role yang berbeda(admin, mahasiswa, dan dosen).
- Pengisian, pengeditan, dan penghapusan list mata kuliah yang bisa diambil.
- Pengambilan dan penghapusan "Dosen pengajar" pada mata kuliah oleh dosen pengampu terkait.
- pengambilan dan penghapusan mata kuliah pada KRS oleh mahasiswa terkait.

## Instalasi
### 1. Clone Repository and install depedency
```bash
git clone https://github.com/myaffandy123/sistem-informasi-krs.git
cd sistem-informasi-krs
composer install
npm install
cp .env.example .env
```
### 2. Buka .env lalu ubah variabel sesuai dengan database yang ada
```
DB_PORT=3306
DB_DATABASE=sistem_informasi_krs
DB_USERNAME=root
DB_PASSWORD=
```
### 3. Migrasi tabel beserta seednya
```bash
php artisan key:generate
php artisan migrate:fresh --seed
```
### 4. Menjalankan website secara lokal
```bash
php artisan serve
```
## Dokumentasi Website
### 1. Landing Page
![ss0.jpg](./public/landingpage/img/ss0.png)
### 2. Dashboard Page
![ss1.jpg](./public/landingpage/img/ss1.png)