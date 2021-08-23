<h1 align="center">
  Tinify API client for Laravel
</h1>

<p align="center">
  <a href="https://packagist.org/packages/orh/laravel-tinify">
    <img alt="Packagist PHP Version Support" src="https://img.shields.io/packagist/php-v/orh/laravel-tinify">
  </a>
  <a href="https://packagist.org/packages/orh/laravel-tinify">
    <img alt="Packagist Version" src="https://img.shields.io/packagist/v/orh/laravel-tinify?color=df8057">
  </a>
  <a href="https://packagist.org/packages/orh/laravel-tinify">
    <img alt="Packagist Downloads" src="https://img.shields.io/packagist/dt/orh/laravel-tinify">
  </a>
</p>

* 适用于 Laravel 5.5+
* 基于 [tinify-php](https://github.com/tinify/tinify-php)

## 安装

```
$ composer require orh/laravel-tinify
```

## 发布配置

```
$ php artisan vendor:publish --tag=tinify-config
```

## 使用

```php
$tinify = app('tinify');
$source = $tinify->fromFile("unoptimized.webp");
$source->toFile("optimized.webp");
```

## License

MIT
