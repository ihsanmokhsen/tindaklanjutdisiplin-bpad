# TLD-BPAD — Panduan Hosting Lengkap ke VPS

> Panduan ini berdasarkan pengalaman nyata hosting pada 18 Juni 2026.
> File ini masuk `.gitignore` dan **TIDAK** dipush ke GitHub.

---

## Informasi Server

| Item | Detail |
|------|--------|
| VPS | Hostinger KVM 4, Ubuntu 22.04, Jakarta |
| IP | 212.85.26.65 |
| Hostname | srv1743535.hstgr.cloud |
| CPU/RAM/Disk | 4 CPU, 16GB RAM, 200GB |
| Control Panel | aaPanel (https://212.85.26.65:8888) |
| Web Server | Nginx (via aaPanel) |
| PHP | 8.3 |
| Database | MySQL (via aaPanel) |

---

## Informasi Aplikasi

| Item | Detail |
|------|--------|
| Nama App | Tindak Lanjut Disiplin (TLD) - BPAD NTT |
| Framework | Laravel 12 |
| PHP Required | 8.2+ |
| Domain | https://tld.bpadntt.cloud |
| GitHub | https://github.com/ihsanmokhsen/tindaklanjutdisiplin-bpad.git |
| Path di VPS | `/www/wwwroot/tld-bpad` |
| Web Root | `/www/wwwroot/tld-bpad/public` |

---

## Kredensial

### Database MySQL (aaPanel)
- **Database**: `tld_bpad`
- **Username**: `tld_bpad`
- **Password**: `tldbpadntt`
- **Host**: `localhost` (pakai socket auth, bukan TCP)

### Admin Default
- **URL Login**: https://tld.bpadntt.cloud/admin/login
- **Username**: `admin_bpad`
- **Password**: `Admin@BPAD2025`

> Ganti password setelah login pertama kali!

---

## TAHAPAN HOSTING (Langkah demi Langkah)

### 1. Persiapan Lokal (MacBook)

#### 1.1 Install Dependencies
```bash
cd "/Users/ihsanmokhsen/Documents/@Project Sistem Informasi/TLD-BPAD"
composer install
npm install
```

#### 1.2 Setup Database Lokal
```bash
mysql -u root -e "CREATE DATABASE IF NOT EXISTS \`TLD-BPAD\`;"
```

#### 1.3 Jalankan Migrasi & Seeder
```bash
php artisan migrate
php artisan db:seed
php artisan storage:link
```

#### 1.4 Test Aplikasi Lokal
```bash
composer dev
```
Buka http://localhost:8000 — cek semua fitur berjalan normal.
- Homepage: http://localhost:8000
- Admin: http://localhost:8000/admin/login

#### 1.5 Push ke GitHub
```bash
git init
git add .
git commit -m "Initial commit - TLD BPAD"
git branch -M main
git remote add origin https://github.com/ihsanmokhsen/tindaklanjutdisiplin-bpad.git
git push -u origin main
```

---

### 2. Persiapan VPS

#### 2.1 SSH ke VPS
```bash
ssh root@212.85.26.65
```

#### 2.2 Clone Repository
```bash
cd /www/wwwroot
git clone https://github.com/ihsanmokhsen/tindaklanjutdisiplin-bpad.git tld-bpad
cd tld-bpad
```

#### 2.3 Install Composer Dependencies (Production)
```bash
composer install --no-dev --optimize-autoloader
```
> Warning `Module "fileinfo" is already loaded` = normal, abaikan saja (aaPanel duplicate loading).

---

### 3. Setup Environment

#### 3.1 Buat File .env
```bash
cp .env.example .env
nano .env
```

Isi dengan:
```env
APP_NAME="TLD BPAD NTT"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://tld.bpadntt.cloud

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=tld_bpad
DB_USERNAME=tld_bpad
DB_PASSWORD=tldbpadntt

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

VITE_APP_NAME="${APP_NAME}"
```

Save: **Ctrl+O** → **Enter** → **Ctrl+X**

#### 3.2 Buat Database di aaPanel
1. Buka **aaPanel** → **Database** → **Add Database**
2. Database name: `tld_bpad`
3. Username: `tld_bpad`
4. Password: `tldbpadntt`

#### 3.3 Generate App Key
```bash
php artisan key:generate
```

#### 3.4 Jalankan Migrasi
```bash
php artisan migrate --force
```

#### 3.5 Jalankan Seeder (buat admin default)
```bash
php artisan db:seed --force
```

#### 3.6 Buat Storage Link
```bash
php artisan storage:link
```

---

### 4. Build Frontend & Optimasi

#### 4.1 Install NPM & Build
```bash
npm install
npm run build
```

#### 4.2 Set Permissions
```bash
chmod -R 775 storage bootstrap/cache
chown -R www:www storage bootstrap/cache
```

#### 4.3 Cache untuk Production
```bash
php artisan route:cache
php artisan view:cache
php artisan config:cache
```

---

### 5. Setup Nginx di aaPanel

#### 5.1 Tambah Website
1. **aaPanel** → **Website** → **Add Site**
2. Domain: `tld.bpadntt.cloud`
3. Root directory: `/www/wwwroot/tld-bpad/public`
4. PHP version: **8.3**
5. Klik **Submit**

#### 5.2 Edit Konfigurasi Nginx (PENTING!)

aaPanel otomatis menambahkan `error_page 404 /404.html` yang **memblokir custom 404 Laravel**. Juga perlu menambahkan `location /` block untuk routing Laravel.

```bash
nano /www/server/panel/vhost/nginx/tld.bpadntt.cloud.conf
```

Ganti seluruh isi dengan:
```nginx
server
{
    listen 80;
    listen 443 ssl;
    listen 443 quic;
    http2 on;
    http3 on;
    server_name tld.bpadntt.cloud;
    index index.php index.html index.htm default.php default.htm default.html;
    root /www/wwwroot/tld-bpad/public;
    include /www/server/panel/vhost/nginx/extension/tld.bpadntt.cloud/*.conf;

    #CERT-APPLY-CHECK--START
    include /www/server/panel/vhost/nginx/well-known/tld.bpadntt.cloud.conf;
    #CERT-APPLY-CHECK--END
    #SSL-START
    ssl_certificate    /www/server/panel/vhost/cert/tld.bpadntt.cloud/fullchain.pem;
    ssl_certificate_key    /www/server/panel/vhost/cert/tld.bpadntt.cloud/privkey.pem;
    ssl_protocols TLSv1.1 TLSv1.2 TLSv1.3;
    ssl_ciphers EECDH+CHACHA20:EECDH+CHACHA20-draft:EECDH+AES128:RSA+AES128:EECDH+AES256:RSA+AES256:EECDH+3DES:RSA+3DES:!MD5;
    ssl_prefer_server_ciphers on;
    ssl_session_tickets on;
    ssl_session_cache shared:SSL:10m;
    ssl_session_timeout 10m;
    add_header Strict-Transport-Security "max-age=31536000";
    add_header Alt-Svc 'quic=":443"; h3=":443"; h3-29=":443"; h3-27=":443";h3-25=":443"; h3-T050=":443"; h3-Q050=":443";h3-Q049=":443";h3-Q048=":443"; h3-Q046=":443"; h3-Q043=":443"';
    quic_retry on;
    quic_gso on;
    ssl_early_data on;
    error_page 497  https://$host$request_uri;
    #SSL-END

    #ERROR-PAGE-START
    # error_page 404 /404.html;    ← INI DI-COMMENT (PENTING!)
    error_page 502 /502.html;
    #ERROR-PAGE-END

    #PHP-INFO-START
    include enable-php-83.conf;
    #PHP-INFO-END

    # Laravel routing (WAJIB ADA)
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    #REWRITE-START
    include /www/server/panel/vhost/rewrite/tld.bpadntt.cloud.conf;
    #REWRITE-END

    location ~ ^/(\.user.ini|\.htaccess|\.git|\.env|\.svn|\.project|LICENSE|README.md)
    {
        return 404;
    }

    location ~ \.well-known{
        allow all;
    }

    if ( $uri ~ "^/\.well-known/.*\.(php|jsp|py|js|css|lua|ts|go|zip|tar\.gz|rar|7z|sql|bak)$" ) {
        return 403;
    }

    location ~ .*\.(js|css)?$
    {
        expires      12h;
        error_log /dev/null;
        access_log /dev/null; 
    }
    access_log  /www/wwwlogs/tld.bpadntt.cloud.log;
    error_log  /www/wwwlogs/tld.bpadntt.cloud.error.log;
}
```

#### 5.3 Reload Nginx
```bash
/www/server/nginx/sbin/nginx -s reload
```

---

### 6. Setup DNS

Tambahkan A record di domain registrar atau Cloudflare:

| Type | Name | Value |
|------|------|-------|
| A | `tld` | `212.85.26.65` |

Tunggu propagasi DNS (biasanya beberapa menit).

---

### 7. Setup SSL

1. **aaPanel** → **Website** → klik `tld.bpadntt.cloud`
2. Tab **SSL** → **Let's Encrypt** → **Apply**
3. Setelah SSL aktif, enable **Force HTTPS**

---

### 8. Verifikasi

Buka browser:
- **Homepage**: https://tld.bpadntt.cloud
- **Admin Login**: https://tld.bpadntt.cloud/admin/login
- Login dengan `admin_bpad` / `Admin@BPAD2025`

---

## UPDATE APLIKASI (Setelah Ada Perubahan Code)

### Dari Lokal (Push)
```bash
cd "/Users/ihsanmokhsen/Documents/@Project Sistem Informasi/TLD-BPAD"
git add .
git commit -m "deskripsi perubahan"
git push origin main
```

### Di VPS (Pull & Deploy)
```bash
ssh root@212.85.26.65
cd /www/wwwroot/tld-bpad

# Pull code terbaru
git pull origin main

# Install dependencies (jika composer.json berubah)
composer install --no-dev --optimize-autoloader

# Jalankan migrasi baru (jika ada)
php artisan migrate --force

# Rebuild frontend (jika views/assets berubah)
npm run build

# Clear dan rebuild cache
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Fix permissions jika perlu
chmod -R 775 storage bootstrap/cache
chown -R www:www storage bootstrap/cache
```

---

## TROUBLESHOOTING

### Error 404 (Halaman Default aaPanel)
**Penyebab**: `error_page 404 /404.html;` masih aktif di Nginx config.
**Solusi**: Comment baris tersebut dan pastikan ada `location /` block dengan `try_files`.
```bash
nano /www/server/panel/vhost/nginx/tld.bpadntt.cloud.conf
# Comment: error_page 404 /404.html;
/www/server/nginx/sbin/nginx -s reload
```

### Error 500 Server Error
```bash
# Cek log Laravel
cat /www/wwwroot/tld-bpad/storage/logs/laravel.log | tail -50

# Clear cache
cd /www/wwwroot/tld-bpad
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

### Database Connection Error
**Penyebab**: DB_HOST harus `localhost` (socket auth), bukan `127.0.0.1` di aaPanel.
```bash
# Test koneksi
mysql -h 127.0.0.1 -u tld_bpad -p tld_bpad
```

### Fileinfo Warning
`Module "fileinfo" is already loaded` — ini normal di aaPanel, aman diabaikan.

### Cache Error Setelah Update
Jika error setelah update code, clear semua cache:
```bash
cd /www/wwwroot/tld-bpad
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear
# Lalu rebuild
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## PATH PENTING

| Item | Path |
|------|------|
| App root | `/www/wwwroot/tld-bpad` |
| Public dir | `/www/wwwroot/tld-bpad/public` |
| .env | `/www/wwwroot/tld-bpad/.env` |
| Laravel logs | `/www/wwwroot/tld-bpad/storage/logs/laravel.log` |
| Nginx config | `/www/server/panel/vhost/nginx/tld.bpadntt.cloud.conf` |
| Uploads | `/www/wwwroot/tld-bpad/storage/app/public/uploads/` |
| Nginx binary | `/www/server/nginx/sbin/nginx` |
| aaPanel | https://212.85.26.65:8888 |

---

## CATATAN PENTING

1. **Jangan pernah push `.env` ke GitHub** — sudah di-handle oleh `.gitignore`
2. **DB_HOST harus `localhost`** di VPS (aaPanel pakai socket auth)
3. **Selalu clear cache** setelah update code di production
4. **Backup database** sebelum menjalankan migrasi besar
5. **Nginx `error_page 404`** harus di-comment untuk Laravel
6. **PHP versi 8.3** — pastikan `enable-php-83.conf` (bukan 84)
