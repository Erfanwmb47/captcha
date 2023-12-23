
## Captcha for Laravel

[![Latest Stable Version](http://poser.pugx.org/erfanwmb/captcha/v)](https://packagist.org/packages/erfanwmb/captcha) [![Total Downloads](http://poser.pugx.org/erfanwmb/captcha/downloads)](https://packagist.org/packages/erfanwmb/captcha) [![Latest Unstable Version](http://poser.pugx.org/erfanwmb/captcha/v/unstable)](https://packagist.org/packages/erfanwmb/captcha) [![License](http://poser.pugx.org/erfanwmb/captcha/license)](https://packagist.org/packages/erfanwmb/captcha) [![PHP Version Require](http://poser.pugx.org/erfanwmb/captcha/require/php)](https://packagist.org/packages/erfanwmb/captcha)

![Captcha 1.0 Screenshot](https://uploadkon.ir/uploads/61df23_23captcha.jpg)


## Installation

Require this package with composer. It is recommended to only require the package for development.

```shell
composer composer require erfanwmb/captcha
```



You can change `SECURITY_CAPTCHA` in `.env` to `gd` or `recaptcha` or `hcaptcha`

#### Copy the package config to your local config with the publish command:

```shell
php artisan vendor:publish --provider="packages\captcha\CaptchaServiceProvider"
```

ery:

If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```php
erfanwmb\captcha\CaptchaServiceProvider::class,
```

If you want to use the facade to log messages, add this to your facades in app.php:

```php
'Captcha'   => erfanwmb\captcha\CaptchaFacade::class
```



## Usage
 - set your recaptcha(google) `SECURITY_RECAPTCHA_SITE_KEY` and `SECURITY_RECAPTCHA_SECRET_KEY` for user recaptcha in config`captcha.php`


 - set your hcaptcha `SECURITY_RECAPTCHA_SITE_KEY` and `SECURITY_RECAPTCHA_SECRET_KEY` for user hcaptcha  in config`captcha.php`

 - add flowing code to view to show captcha
```php
@include('captcha.index')
```
