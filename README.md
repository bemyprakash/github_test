# A. Prakash & Co. (Since 1928) - Production-Ready PHP E-Commerce Starter

Hostinger-compatible MVC e-commerce foundation using **PHP 8 + MySQL + PDO + Tailwind-style static frontend**.

## 1) Project Structure

- `index.php` front controller + route dispatcher
- `app/controllers` public + auth + admin controllers
- `app/models` PDO-based models
- `app/views` reusable templates
- `config` app config + route map
- `database/schema.sql` normalized schema with indexes/FKs
- `database/seed.sql` sample categories/products/admin
- `scripts/generate_sitemap.php` SEO sitemap generator

## 2) Hostinger Deployment Steps

1. Upload project to `public_html` (or a subfolder) using File Manager/FTP.
2. In file manager, copy `.env.example.php` to `.env.php` and set DB + app values.
3. Create MySQL DB/user from hPanel and grant all privileges.
4. Import `database/schema.sql`, then `database/seed.sql` via phpMyAdmin.
5. Ensure Apache rewrite is enabled (default on Hostinger) and keep root `.htaccess`.
6. In hPanel SSL tab, activate SSL certificate and force HTTPS rewrite (optional lines in `.htaccess`).
7. Set cron for sitemap generation:
   - `php /home/USERNAME/public_html/scripts/generate_sitemap.php`
8. Verify permissions for upload folder: `public/assets/images/uploads` (755 dir / 644 files).

## 3) Security Baseline Included

- CSRF tokens (`csrf_token`, `verify_csrf`)
- Prepared PDO statements
- Output escaping helper `e()` for XSS prevention
- Session-based auth for user/admin
- Optional HTTP Basic layer for `/admin` via `admin/.htaccess`
- Sensitive file protection in root `.htaccess`

## 4) Payment Integration Example

- COD works out-of-the-box in checkout flow.
- Razorpay/Stripe payload builders provided in `app/helpers/PaymentGatewayExample.php`.
- Add official PHP SDK under `vendor/` and call payload methods before API requests.
- Use sandbox keys in `.env.php` first.

## 5) Email Confirmation (PHPMailer-ready)

- SMTP keys are prepared in `.env.php`.
- Integrate PHPMailer in checkout success hook for order confirmations.

## 6) SEO + Performance

- Clean URLs with rewrites (`/product/{slug}`, `/blog/{slug}`)
- Open Graph + meta baseline in layout
- `robots.txt` + sitemap generation script
- Lazy-load enhancement in `public/assets/js/main.js`
- Pagination-ready product model query

## 7) Example Admin Login

- URL: `/admin/login`
- Seed email: `admin@aprakashco.com`
- Seed password hash corresponds to placeholder password; reset after first login.

## 8) Future-Ready Modules (Not Built)

- Loyalty program
- WhatsApp integration
- Multi-language storefront
- Advanced analytics
- Offline + online inventory sync

## 9) Visual Theme & UI Notes

- Logo-aligned palette: deep heritage green + mint + premium gold accents.
- Responsive, mobile-first navigation with a clean menu button for smaller screens.
- Enhanced storefront cards, hero, badges, table views, and dashboard blocks for a premium look.
- Dummy SVG product images included under `public/assets/images/products`.

## 10) Portal Coverage (Dummy Data Ready)

- User portal routes:
  - `/account`, `/account/orders`, `/account/addresses`, `/account/profile`
- Admin portal routes:
  - `/admin`, `/admin/products`, `/admin/orders`, `/admin/customers`, `/admin/content`

These are structured for production wiring and currently include demonstration data where DB content is unavailable.
