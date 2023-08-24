# Laravel-Kutuphane-Otomasyonu
 Laravel Kütüphane Otomasyonu

 ## Özellikler

- Yeni kitap ekleyebilme
- Kitapları düzenleyebilme
- Kitapları listeleme
- Kitapları silme

## Gereksinimler

- PHP 7.4 veya daha yükseği
- Composer
- Laravel 8.x

## Kurulum

1. Projeyi klonlayın:

```bash
git clone https://github.com/Sleexc/Laravel-Kutuphane-Otomasyonu.git

Proje dizinine gidin:
```bash
cd kutuphane-otomasyon

Composer ile bağımlılıkları yükleyin:
```bash
composer install

.env dosyasını kopyalayın ve düzenleyin:
```bash
cp .env.example .env

Uygulama anahtarını oluşturun:
```bash
php artisan key:generate

Veritabanını oluşturun ve migre edin:
```bash
php artisan migrate

Laravel geliştirme sunucusunu başlatın:
```bash
php artisan serve

Kullanım
Uygulama başarıyla başlatıldıktan sonra, tarayıcınızda http://localhost:8000 adresine giderek projeyi görüntüleyebilirsiniz.

Katkıda Bulunma:

Bu projeyi fork edin.
Yeni bir dal (branch) oluşturun: git checkout -b feature/yeni-ozellik
Değişikliklerinizi commit edin: git commit -am 'Yeni özellik eklendi'
Dalınıza (branch) push yapın: git push origin feature/yeni-ozellik
Bir Pull Talebi (Pull Request) oluşturun.
