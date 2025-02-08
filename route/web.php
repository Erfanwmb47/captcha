<?php

use Illuminate\Support\Facades\Route;
use erfanwmb\captcha\Captcha;


Route::post('refresh_code_gd', function () {
    $session=new Captcha();
    $captcha=$session->render();


    return response()->json([
        'captcha' => $captcha
    ]);
})->middleware('web');
