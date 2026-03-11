# E-Commerce MVP API (Lumen)

Proyek ini adalah implementasi REST API untuk layanan E-Commerce menggunakan Micro-Framework Lumen (Bootcamp Backend Programming Day 31).

## 🚀 Fitur Utama
- **Authentication & Authorization** menggunakan API Token (Bearer).
- **Caching** pada endpoint daftar produk (Redis/File).
- **Integrasi Email** menggunakan SMTP Gmail untuk notifikasi pesanan.
- **Mockup Payment Gateway** untuk simulasi pembayaran.
- **Error Logging** terintegrasi.

---

## 📚 Dokumentasi API (Postman)

Anda dapat mengimpor file `Lumen_Ecommerce_API.json` yang ada di repositori ini langsung ke aplikasi Postman Anda untuk melakukan pengujian.

Berikut adalah hasil *response* dari *endpoint* yang tersedia:

### 1. Register User (`POST /register`)
Mendaftarkan pengguna baru ke dalam sistem.
```json
{
    "message": "User registered successfully"
}
