
# E-Commerce MVP API (Lumen) 🚀

Proyek ini adalah Minimum Viable Product (MVP) REST API untuk layanan E-Commerce, dibangun menggunakan Micro-Framework **Lumen**. Proyek ini dibuat untuk memenuhi tugas **Bootcamp Backend Programming Day 31**.

## 🎯 Fitur Utama
- **Authentication & Authorization:** Sistem Login dan Register menggunakan Bearer API Token.
- **Caching:** Implementasi Cache (Redis/File) pada endpoint daftar produk untuk mempercepat waktu respons.
- **Integrasi Email (Gmail SMTP):** Pengiriman email otomatis saat checkout berhasil.
- **Mockup Payment Gateway:** Simulasi pembuatan link pembayaran (*Payment URL*).
- **Error Logging:** Pencatatan log (*logging*) terintegrasi untuk proses login gagal dan kegagalan pengiriman email.

---

## 🛠️ Persiapan & Instalasi

Jika Anda ingin menjalankan proyek ini secara lokal, ikuti langkah-langkah berikut:

1. **Clone repositori ini:**
   ```bash
   git clone [https://github.com/USERNAME_GITHUB_ANDA/nama-repo-anda.git](https://github.com/USERNAME_GITHUB_ANDA/nama-repo-anda.git)
   cd nama-repo-anda

```

2. **Instal dependensi (termasuk mailer):**
```bash
composer install

```


3. **Pengaturan Environment (.env):**
Salin file `.env.example` menjadi `.env` (atau buat file `.env` baru), lalu sesuaikan konfigurasi Database dan Email (Gunakan *App Password* Gmail):
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lumen_ecommerce
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=email_anda@gmail.com
MAIL_PASSWORD=app_password_gmail_anda
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=email_anda@gmail.com
MAIL_FROM_NAME="E-Commerce API"

```


4. **Jalankan Migrasi dan Seeder (Untuk mengisi data produk dummy):**
```bash
php artisan migrate --seed

```


5. **Jalankan Server Lokal:**
```bash
php -S localhost:8000 -t public

```



---

## 📚 Dokumentasi API (Endpoint)

> 💡 **Tip:** Anda juga bisa langsung mengimpor file `Lumen_Ecommerce_API.json` yang ada di repositori ini ke aplikasi **Postman** Anda untuk melakukan pengujian secara instan.

### 1. Register User

Mendaftarkan pengguna baru ke dalam sistem dan mengenkripsi *password*.

* **Endpoint:** `/register`
* **Method:** `POST`
* **Body (JSON):**
```json
{
    "name": "Adam Rafano",
    "email": "adam@example.com",
    "password": "password123"
}

```


* **Response (201 Created):**
```json
{
    "message": "User registered successfully"
}

```



### 2. Login User

Melakukan otentikasi pengguna dan menghasilkan `api_token`.

* **Endpoint:** `/login`
* **Method:** `POST`
* **Body (JSON):**
```json
{
    "email": "adam@example.com",
    "password": "password123"
}

```


* **Response (200 OK):**
```json
{
    "token": "U29tZVJhbmRvbVRva2VuR2VuZXJhdGVkQnlMdW1lbg=="
}

```



### 3. Get Products (Cached)

Menampilkan daftar produk komputer/gaming yang tersedia. Data ini di-cache selama 60 detik.

* **Endpoint:** `/products`
* **Method:** `GET`
* **Response (200 OK):**
```json
{
    "data": [
        {
            "id": 1,
            "name": "Laptop Asus ROG",
            "price": 15000000,
            "created_at": "2026-03-11T06:01:41.000000Z",
            "updated_at": "2026-03-11T06:01:41.000000Z"
        },
        {
            "id": 2,
            "name": "Keyboard Mechanical Noir",
            "price": 950000,
            "created_at": "2026-03-11T06:01:41.000000Z",
            "updated_at": "2026-03-11T06:01:41.000000Z"
        }
    ]
}

```



### 4. Checkout (Protected & Email Integration)

Membuat pesanan baru, menghasilkan *link* pembayaran simulasi, dan **mengirimkan email bukti pesanan** ke email pengguna.

* **Endpoint:** `/checkout`
* **Method:** `POST`
* **Headers:** - `Authorization: Bearer <token_dari_login>`
* `Accept: application/json`


* **Body (JSON):**
```json
{
    "product_id": 1
}

```


* **Response (201 Created):**
```json
{
    "message": "Checkout berhasil",
    "payment_url": "[https://mock-payment-gateway.com/pay/sandbox-69b107e105d68](https://mock-payment-gateway.com/pay/sandbox-69b107e105d68)",
    "data": {
        "user_id": 1,
        "product_id": 1,
        "total_price": 15000000,
        "payment_status": "paid",
        "updated_at": "2026-03-11T06:12:49.000000Z",
        "created_at": "2026-03-11T06:12:49.000000Z",
        "id": 2
    }
}

```



---

git push origin main

```
