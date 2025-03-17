# FeatureFlow

[![Build Status](https://github.com/laravel/framework/workflows/tests/badge.svg)](https://github.com/laravel/framework/actions)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/framework)

## Proje Hakkında

FeatureFlow, kullanıcıların özellik isteklerini gönderebileceği, oylayabileceği ve yorum yapabileceği bir web uygulamasıdır. Bu uygulama, ürün geliştirme ekiplerinin kullanıcı geri bildirimlerini toplamasına ve önceliklendirmesine yardımcı olmayı amaçlar.

## İçindekiler

- [Proje Hakkında](#proje-hakkında)
- [İçindekiler](#i̇çindekiler)
- [Açıklama](#açıklama)
- [Kurulum](#kurulum)
- [Çalıştırma](#çalıştırma)
- [Bağımlılıklar](#bağımlılıklar)
- [Katkıda Bulunma](#katkıda-bulunma)
- [Lisans](#lisans)
- [package.json ve requirements.txt Açıklaması](#packagejson-ve-requirementstxt-açıklaması)
- [Yapılandırma Dosyaları](#yapılandırma-dosyaları)
- [API Referansı](#api-referansı)

## Açıklama

Bu depo, Laravel ve React kullanılarak oluşturulmuş bir özellik istekleri yönetim uygulamasıdır. Başlıca özellikleri şunlardır:

- Kullanıcı kimlik doğrulaması ve yetkilendirmesi.
- Özellik istekleri oluşturma, düzenleme ve silme.
- Özellik isteklerine oy verme (yukarı/aşağı).
- Özellik isteklerine yorum yapma.
- Kullanıcı rolleri ve izinleri (örneğin, yönetici, yorumcu, kullanıcı).

## Kurulum

1.  Depoyu klonlayın:

    ```bash
    git clone https://github.com/muhammetalifidan/FeatureFlow.git
    cd FeatureFlow
    ```

2.  Composer bağımlılıklarını yükleyin:

    ```bash
    composer install
    ```

3.  Node bağımlılıklarını yükleyin:

    ```bash
    npm install
    ```

4.  Ortam dosyasını kopyalayın ve yapılandırın:

    ```bash
    cp .env.example .env
    ```

    `.env` dosyasını projenizin gereksinimlerine göre düzenleyin. Özellikle, veritabanı bağlantı ayarlarını yapılandırın. Örnek ortam değişkenleri:

    ```
    APP_NAME=FeatureFlow
    APP_ENV=local
    APP_KEY=Buraya_32_karakterlik_bir_anahtar_girin
    APP_DEBUG=true
    APP_URL=http://localhost

    DB_CONNECTION=sqlite
    DB_DATABASE=database.sqlite
    ```

    Eğer `DB_CONNECTION` olarak `sqlite` kullanılıyorsa, `database/database.sqlite` dosyasını oluşturmanız gerekir.

5.  Uygulama anahtarını oluşturun:

    ```bash
    php artisan key:generate
    ```

6.  Veritabanı şemalarını uygulayın ve başlangıç verilerini yükleyin:

    ```bash
    php artisan migrate --seed
    ```

## Çalıştırma

1.  Geliştirme sunucusunu başlatın:

    ```bash
    php artisan serve
    ```

2.  Vite geliştirme sunucusunu başlatın:

    ```bash
    npm run dev
    ```

Uygulamaya `http://localhost` adresinden erişebilirsiniz (veya `.env` dosyasında yapılandırdığınız `APP_URL`).

## Bağımlılıklar

*   **PHP**: >= 8.2
*   **Composer**: Bağımlılık yönetimi için.
*   **Node.js**: JavaScript bağımlılıkları ve derleme araçları için.
*   **npm**: Node paket yöneticisi.
*   **Laravel**: PHP framework.
*   **Inertia.js**: Front-end ve back-end arasındaki bağlantıyı sağlayan kütüphane.
*   **React**: Kullanıcı arayüzü oluşturmak için JavaScript kütüphanesi.
*   **Ziggy**: Laravel rotalarını JavaScript'te kullanmak için paket.
*   **Spatie Laravel Permission**: Rol ve izin yönetimi için paket.

## Katkıda Bulunma

Lütfen katkıda bulunmadan önce [Katkıda Bulunma Rehberi](https://laravel.com/docs/contributions) ve [Davranış Kuralları](https://laravel.com/docs/contributions#code-of-conduct) belgelerini okuyun.

## Lisans

Bu proje, [MIT lisansı](https://opensource.org/licenses/MIT) altında lisanslanmıştır.

## package.json ve requirements.txt Açıklaması

*   **package.json**: Bu dosya, projenin JavaScript bağımlılıklarını ve derleme betiklerini içerir. `npm install` komutuyla yüklenen bağımlılıklar burada listelenir.
    *   `build`: TypeScript derlemesi ve Vite ile front-end assetlerinin oluşturulmasını sağlar. Hem istemci hem de sunucu tarafı için derleme işlemleri içerir.
    *   `dev`: Vite geliştirme sunucusunu başlatır, böylece değişiklikler anında tarayıcıda görülebilir.

*   **composer.json**: Bu dosya, projenin PHP bağımlılıklarını ve betiklerini içerir. `composer install` komutuyla yüklenen bağımlılıklar burada listelenir.
    *   `post-autoload-dump`: Autoload dosyalarını günceller ve paket keşfini başlatır.
    *   `post-update-cmd`: Vendor dosyalarını yayınlar.
    *   `post-root-package-install`: `.env` dosyası yoksa `.env.example` dosyasını kopyalar.
    *   `post-create-project-cmd`: Uygulama anahtarını oluşturur, SQLite veritabanı dosyasını oluşturur ve migrasyonları çalıştırır.
    *   `dev`: Aynı anda birden fazla komutu çalıştırmak için `concurrently` paketini kullanır. Bu komutlar şunlardır: `php artisan serve`, `php artisan queue:listen --tries=1`, `php artisan pail --timeout=0` ve `npm run dev`.

## Yapılandırma Dosyaları

*   **config/app.php**: Uygulama adı, ortam, hata ayıklama modu, URL, saat dilimi, yerel ayar ve şifreleme anahtarı gibi temel uygulama ayarlarını içerir.
*   **config/auth.php**: Kimlik doğrulama ayarlarını içerir, örneğin kullanılan "guard" ve "provider".
*   **config/cache.php**: Önbellekleme ayarlarını içerir, örneğin kullanılan önbellek deposu.
*   **config/database.php**: Veritabanı bağlantı ayarlarını içerir.
*   **config/filesystems.php**: Dosya sistemi yapılandırma ayarlarını içerir.
*   **config/logging.php**: Günlükleme ayarlarını içerir.
*   **config/mail.php**: E-posta ayarlarını içerir.
*   **config/queue.php**: Kuyruk ayarlarını içerir.
*   **config/permission.php**: Spatie Laravel Permission paketi için yapılandırma dosyası. İzinlerin ve rollerin nasıl yönetileceğini tanımlar.

## API Referansı

Aşağıda, uygulamanın sunduğu API uç noktalarının bir özeti bulunmaktadır:

| Uç Nokta                                   | Metot   | Parametreler                                 | Açıklama                                                                  | Tip      |
| :----------------------------------------- | :------ | :------------------------------------------- | :------------------------------------------------------------------------ | :------- |
| `/login`                                  | POST    | `email`, `password`, `remember`              | Kullanıcının oturum açmasını sağlar.                                       | string   |
| `/logout`                                 | POST    | Yok                                          | Oturumu kapatır.                                                          | Yok      |
| `/register`                               | POST    | `name`, `email`, `password`, `password_confirmation` | Yeni bir kullanıcı kaydeder.                                               | string   |
| `/profile`                                | GET     | Yok                                          | Kullanıcının profil bilgilerini görüntüler.                                  | Yok      |
| `/profile`                                | PATCH   | `name`, `email`                              | Kullanıcının profil bilgilerini günceller.                                  | string   |
| `/profile`                                | DELETE  | `password`                                   | Kullanıcının hesabını siler.                                              | string   |
| `/password`                               | PUT     | `current_password`, `password`, `password_confirmation` | Kullanıcının parolasını günceller.                                           | string   |
| `/forgot-password`                        | POST    | `email`                                      | Parola sıfırlama bağlantısı isteği gönderir.                                  | string   |
| `/reset-password`                         | POST    | `token`, `email`, `password`, `password_confirmation` | Parolayı sıfırlar.                                                          | string   |
| `/email/verification-notification`          | POST    | Yok                                          | E-posta doğrulama bildirimi gönderir.                                       | Yok      |
| `/feature`                                 | GET     | Yok                                          | Özellik isteklerinin listesini görüntüler.                                  | Yok      |
| `/feature`                                 | POST    | `name`, `description`                        | Yeni bir özellik isteği oluşturur.                                         | string   |
| `/feature/{feature}`                        | GET     | `feature` (ID)                               | Belirli bir özellik isteğini görüntüler.                                     | integer  |
| `/feature/{feature}`                        | PUT     | `name`, `description`                        | Belirli bir özellik isteğini günceller.                                      | integer  |
| `/feature/{feature}`                        | DELETE  | `feature` (ID)                               | Belirli bir özellik isteğini siler.                                         | integer  |
| `/feature/{feature}/upvote`               | POST    | `upvote` (boolean)                           | Bir özellik için yukarı veya aşağı oy gönderir.                                | integer  |
| `/upvote/{feature}`                        | DELETE  | `feature` (ID)                               | Bir özellik için gönderilen oyu siler.                                     | integer  |
| `/feature/{feature}/comments`              | POST    | `comment`                                    | Bir özellik isteğine yorum ekler.                                          | integer  |
| `/comment/{comment}`                      | DELETE  | `comment` (ID)                               | Bir yorumu siler.                                                           | integer  |
| `/user`                                    | GET     | Yok                                          | Kullanıcı listesini görüntüler (Yönetici ayrıcalıkları gerektirir).         | Yok      |
| `/user/{user}/edit`                         | GET     | `user` (ID)                                  | Belirli bir kullanıcıyı düzenlemek için formu görüntüler (Yönetici gerektirir). | integer  |
| `/user/{user}`                             | PUT     | `roles` (array)                              | Kullanıcının rollerini günceller (Yönetici ayrıcalıkları gerektirir).      | integer  |