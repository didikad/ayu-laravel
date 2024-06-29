<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Nama Aplikasi
    |--------------------------------------------------------------------------
    |
    | Nilai ini adalah nama aplikasi Anda, yang akan digunakan saat framework
    | perlu menampilkan nama aplikasi dalam notifikasi atau elemen UI lainnya
    | di mana nama aplikasi perlu ditampilkan.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Lingkungan Aplikasi
    |--------------------------------------------------------------------------
    |
    | Nilai ini menentukan "lingkungan" di mana aplikasi Anda saat ini berjalan.
    | Ini dapat menentukan cara Anda mengonfigurasi berbagai layanan yang
    | digunakan oleh aplikasi Anda. Atur ini dalam file ".env" Anda.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Mode Debug Aplikasi
    |--------------------------------------------------------------------------
    |
    | Saat aplikasi Anda dalam mode debug, pesan kesalahan yang rinci dengan
    | stack trace akan ditampilkan pada setiap kesalahan yang terjadi dalam
    | aplikasi Anda. Jika dinonaktifkan, halaman kesalahan generik sederhana ditampilkan.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | URL Aplikasi
    |--------------------------------------------------------------------------
    |
    | URL ini digunakan oleh konsol untuk menghasilkan URL dengan benar saat
    | menggunakan alat baris perintah Artisan. Anda harus mengatur ini ke root
    | dari aplikasi Anda sehingga tersedia dalam perintah Artisan.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Zona Waktu Aplikasi
    |--------------------------------------------------------------------------
    |
    | Di sini Anda dapat menentukan zona waktu default untuk aplikasi Anda, yang
    | akan digunakan oleh fungsi tanggal dan waktu PHP. Zona waktu ini diatur
    | ke "UTC" secara default karena sesuai untuk sebagian besar kasus penggunaan.
    |
    */

    'timezone' => env('APP_TIMEZONE', 'UTC'),

    /*
    |--------------------------------------------------------------------------
    | Konfigurasi Locale Aplikasi
    |--------------------------------------------------------------------------
    |
    | Locale aplikasi menentukan locale default yang akan digunakan oleh metode
    | terjemahan / lokalisasi Laravel. Opsi ini dapat diatur ke locale mana pun
    | yang Anda rencanakan untuk memiliki string terjemahan.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Kunci Enkripsi
    |--------------------------------------------------------------------------
    |
    | Kunci ini digunakan oleh layanan enkripsi Laravel dan harus diatur ke
    | string acak 32 karakter untuk memastikan bahwa semua nilai terenkripsi
    | aman. Anda harus melakukan ini sebelum menyebarkan aplikasi.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Driver Mode Pemeliharaan
    |--------------------------------------------------------------------------
    |
    | Opsi konfigurasi ini menentukan driver yang digunakan untuk menentukan dan
    | mengelola status "mode pemeliharaan" Laravel. Driver "cache" akan
    | memungkinkan mode pemeliharaan dikontrol di beberapa mesin.
    |
    | Driver yang didukung: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Penyedia Layanan Autoloaded
    |--------------------------------------------------------------------------
    |
    | Penyedia layanan yang tercantum di sini akan secara otomatis dimuat pada
    | permintaan ke aplikasi Anda. Jangan ragu untuk menambahkan layanan Anda
    | sendiri ke array ini untuk memberikan fungsionalitas yang diperluas ke aplikasi Anda.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */
        Spatie\Permission\PermissionServiceProvider::class,

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Kelas Alias
    |--------------------------------------------------------------------------
    |
    | Array alias ini akan didaftarkan saat aplikasi ini dimulai. Namun, jangan
    | ragu untuk mendaftarkan alias Anda sendiri sebanyak yang Anda inginkan
    | karena alias ini dimuat "malas" sehingga tidak memperlambat kinerja.
    |
    */

];
