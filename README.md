
## Captcha for Laravel

[![Latest Stable Version](http://poser.pugx.org/erfanwmb/captcha/v)](https://packagist.org/packages/erfanwmb/captcha) [![Total Downloads](http://poser.pugx.org/erfanwmb/captcha/downloads)](https://packagist.org/packages/erfanwmb/captcha) [![Latest Unstable Version](http://poser.pugx.org/erfanwmb/captcha/v/unstable)](https://packagist.org/packages/erfanwmb/captcha) [![License](http://poser.pugx.org/erfanwmb/captcha/license)](https://packagist.org/packages/erfanwmb/captcha) [![PHP Version Require](http://poser.pugx.org/erfanwmb/captcha/require/php)](https://packagist.org/packages/erfanwmb/captcha)

![Captcha 1.0 Screenshot](https://uploadkon.ir/uploads/61df23_23captcha.jpg)


## Installation

Require this package with composer. It is recommended to only require the package for development.

```shell
composer require erfanwmb/captcha
```



You can change `SECURITY_CAPTCHA` in `.env` to `gd` or `recaptcha` or `hcaptcha`

#### Copy the package config to your local config with the publish command:

```shell
php artisan vendor:publish --provider="erfanwmb\captcha\CaptchaServiceProvider"
```

If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```php
erfanwmb\captcha\CaptchaServiceProvider::class,
```

If you want to use the facade to log messages, add this to your facades in app.php:

```php
'captcha'   => erfanwmb\captcha\CaptchaFacade::class
```



## Usage
 - set your recaptcha(google) `SECURITY_RECAPTCHA_SITE_KEY` and `SECURITY_RECAPTCHA_SECRET_KEY` for user recaptcha in config`.env`


 - set your hcaptcha `SECURITY_RECAPTCHA_SITE_KEY` and `SECURITY_RECAPTCHA_SECRET_KEY` for user hcaptcha  in config`.env`

 - add flowing code to view to show captcha
```php
@include('captcha.index')
```
### example
```php
@include('captcha.index',['theme_captcha'=>'light','exclusive_captcha'=>'gd'])
```
you can use `exclusive_captcha` for customize captcha in views
you can use `theme_captcha` for customize theme captcha in views

- use this to your request or validation 
```php
'g-recaptcha-response'=> [CaptchaFacade::validate($this->exclusive_captcha ?? null)]
```
#### warning
you don't need to add `required` for validation `g-recaptcha-response`

## Update
- for update, you can use following command for just update views
```shell 
php artisan vendor:publish --provider="erfanwmb\captcha\CaptchaServiceProvider" --tag="view"
```
-and if you want to update captcha config you can use following command
### warning
this command rewrite all captcha config so recaptcha and hcaptcha (site_key & secret_key) delete 
```shell 
php artisan vendor:publish --provider="erfanwmb\captcha\CaptchaServiceProvider" --tag="config"
```
if you want to disable captcha temporally use following command
``` php
SECURITY_CAPTCHA=null
```

