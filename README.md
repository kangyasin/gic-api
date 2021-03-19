<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## GIC API

GIC API merupakan REST API untuk kebutuhan test saya untuk crud data contact berikut step instalasinya :

- Pastikan composer telah terinstall

- Jalankan command berikut pada directory project ini dilocal berikut commandnya.

```php
composer install
```

- Ubah .env.example menjadi .env.

- Buat database baru pada mysql dengan nama database **gic** (*****bisa disesuaikan)

- Update konfigurasi database pada file .env update DB_DATABASE dengan **gic** database yang sudah dibuat atau dengan nama lain sesuai dengan nama database yang dibutuhkan.

```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gic
DB_USERNAME=root
DB_PASSWORD=
```

- Jalankan perintah artisan berikut commandnya.

```php
php php artisan config:cache
php artisan migrate
php artisan db:seed
```



## Running Valet Service

Laravel valet (selanjutnya disebut valet saja) merupakan lingkungan kerja untuk membangun aplikasi berbasis web, dari namanya jelas ini secara khusus ditujukan untuk *developer* yang sedang bekerja menggunakan *framework* Laravel meski tidak menutup untuk beberapa platform php [lainnya](https://laravel.com/docs/8.x/valet#introduction).

Ketika valet terpasang, web server yang akan terpasang adalah [Nginx](https://www.nginx.com/), valet juga akan memasang [dnsmasq](https://en.wikipedia.org/wiki/Dnsmasq), ini yang memungkinkan kita memiliki satu nama untuk sebuah *project* kita yang secara *default* berakhiran .test (dot test).

Laravel valet untuk kebutuh test API GIC sebagai REST api pada repository saya di [GIC Mobile](https://github.com/kangyasin/gic-mobile), jalankan command berikut :

`valet share`

Otomatis akan dibuatkan link public dimana pc kita sebagai servernya misalnya pada valet saya adalah link publicnya :

`http://e6c034d5561e.ngrok.io atau https://e6c034d5561e.ngrok.io`

Yang akan mengarahkan aksesnya langsung ke pc atau laptop kita lalu set pada ConfigNetwork di repor [GIC Mobile](https://github.com/kangyasin/gic-mobile)



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

