# TLD-BPAD Deployment Guide

## Project Overview

- **App**: Tindak Lanjut Disiplin (TLD) - BPAD NTT
- **Framework**: Laravel 12 (PHP 8.2+)
- **Database**: MySQL
- **Domain**: https://tld.bpadntt.cloud
- **VPS**: Hostinger KVM 4, Ubuntu 22.04, Jakarta
- **IP**: 212.85.26.65
- **Server Path**: `/www/wwwroot/tld-bpad`
- **GitHub**: https://github.com/ihsanmokhsen/tindaklanjutdisiplin-bpad.git

---

## Default Admin Credentials

- **URL**: https://tld.bpadntt.cloud/admin/login
- Default admin account is created via database seeder
- Check `database/seeders/DatabaseSeeder.php` for the default username and password

> **Important**: Change the default password after first login in production.

---

## First-Time Deployment Steps

### 1. SSH to VPS
```bash
ssh root@212.85.26.65
```

### 2. Clone Repository
```bash
cd /www/wwwroot
git clone https://github.com/ihsanmokhsen/tindaklanjutdisiplin-bpad.git tld-bpad
cd tld-bpad
```

### 3. Install Composer Dependencies
```bash
composer install --no-dev --optimize-autoloader
```

### 4. Setup Environment
```bash
cp .env.example .env
nano .env
```

Set these values:
```env
APP_NAME="TLD BPAD NTT"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tld.bpadntt.cloud

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=tld_bpad
DB_USERNAME=tld_bpad
DB_PASSWORD=<your_secure_password>

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
```

### 5. Create MySQL Database in aaPanel
- **aaPanel** > **Database** > **Add Database**
- Database name: `tld_bpad`
- Username: `tld_bpad`
- Password: (same as `.env`)

### 6. Generate App Key
```bash
php artisan key:generate
```

### 7. Run Migrations
```bash
php artisan migrate --force
```

### 8. Seed Database (creates default admin user)
```bash
php artisan db:seed --force
```

### 9. Create Storage Link
```bash
php artisan storage:link
```

### 10. Build Frontend
```bash
npm install
npm run build
```

### 11. Set Permissions
```bash
chmod -R 775 storage bootstrap/cache
chown -R www:www storage bootstrap/cache
```

### 12. Cache for Production
```bash
php artisan route:cache
php artisan view:cache
php artisan config:cache
```

### 13. Add Website in aaPanel
- **aaPanel** > **Website** > **Add Site**
- Domain: `tld.bpadntt.cloud`
- Root directory: `/www/wwwroot/tld-bpad/public`
- PHP version: 8.3

### 14. Fix Nginx Config for Laravel

Edit:
```bash
nano /www/server/panel/vhost/nginx/tld.bpadntt.cloud.conf
```

Required changes:
1. **Comment out** `error_page 404 /404.html;` (aaPanel injects this, breaks Laravel 404)
2. **Add** Laravel `location /` block:
   ```nginx
   location / {
       try_files $uri $uri/ /index.php?$query_string;
   }
   ```
3. Ensure PHP include is `enable-php-83.conf` (not 84)

Reload Nginx:
```bash
/www/server/nginx/sbin/nginx -s reload
```

### 15. DNS Record
Add A record at your domain registrar/Cloudflare:
- **Type**: A
- **Name**: `tld`
- **Value**: `212.85.26.65`

### 16. SSL Certificate
- **aaPanel** > **Website** > `tld.bpadntt.cloud` > **SSL** > **Let's Encrypt** > **Apply**
- Enable **Force HTTPS**

---

## Updating the App (After Code Changes)

### From Local (Push)
```bash
cd "/Users/ihsanmokhsen/Documents/@Project Sistem Informasi/TLD-BPAD"
git add .
git commit -m "your commit message"
git push origin main
```

### On VPS (Pull & Deploy)
```bash
ssh root@212.85.26.65
cd /www/wwwroot/tld-bpad

# Pull latest code
git pull origin main

# Install dependencies (if composer.json changed)
composer install --no-dev --optimize-autoloader

# Run migrations (if new migrations exist)
php artisan migrate --force

# Rebuild frontend (if views/assets changed)
npm run build

# Clear and rebuild cache
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Fix permissions if needed
chmod -R 775 storage bootstrap/cache
chown -R www:www storage bootstrap/cache
```

---

## Troubleshooting

### 404 Error (aaPanel default page)
- Check Nginx config has `try_files $uri $uri/ /index.php?$query_string;`
- Ensure `error_page 404 /404.html;` is commented out
- Reload Nginx: `/www/server/nginx/sbin/nginx -s reload`

### 500 Server Error
- Check Laravel log: `cat storage/logs/laravel.log`
- Clear cache: `php artisan config:clear && php artisan cache:clear`
- Check permissions: `chmod -R 775 storage bootstrap/cache`

### Database Connection Error
- Ensure `DB_HOST=localhost` (uses socket auth on aaPanel)
- Test connection: `mysql -h 127.0.0.1 -u tld_bpad -p tld_bpad`

### Fileinfo Warning (harmless)
- `Module "fileinfo" is already loaded` — duplicate loading in aaPanel PHP config, safe to ignore

---

## Key File Paths

| Item | Path |
|------|------|
| App root | `/www/wwwroot/tld-bpad` |
| Public dir | `/www/wwwroot/tld-bpad/public` |
| .env | `/www/wwwroot/tld-bpad/.env` |
| Laravel logs | `/www/wwwroot/tld-bpad/storage/logs/laravel.log` |
| Nginx config | `/www/server/panel/vhost/nginx/tld.bpadntt.cloud.conf` |
| Uploads | `/www/wwwroot/tld-bpad/storage/app/public/uploads/` |
| Nginx binary | `/www/server/nginx/sbin/nginx` |
