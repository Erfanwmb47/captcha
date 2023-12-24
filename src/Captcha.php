<?php

namespace erfanwmb\captcha;

use Illuminate\Support\Facades\Session;

class captcha{

    public  function render($width='120',$height='40',$characters='6') {


        $font=__DIR__.'\\..\\'.'\\assets\\INGEN.TTF';
        $code = Self::createCode($characters);
        Session::put('g-recaptcha-response',$code);
        /* font size will be 75% of the image height */
        $font_size = $height * 0.3;
        $image = @imagecreate($width, $height) or die('Cannot initialize new GD image stream');
        /* set the colours */
        $background_color = imagecolorallocate($image, 255, 255, 255);

        $text_color = imagecolorallocate($image, 70, 40, 200);
        /* create textbox and add text */
        $textbox = imagettfbbox($font_size, 0, $font, $code) or die('Error in imagettfbbox function');
        $x = ($width - $textbox[4])/2;
        $y = ($height - $textbox[5])/2;

        imagettftext($image, $font_size, 5, $x, $y, $text_color, $font , $code) or die('Error in imagettftext function');
        /* output captcha image to browser  Download By www.vebscript.com */
//        header('Content-Type: image/jpeg');
//
//        dd('ya zeinab');


        ob_start();
        imagejpeg($image);
        $image_data = ob_get_contents ();
        imagedestroy($image);
        ob_end_clean ();
        $image_data_base64 = base64_encode ($image_data);


        return 'data:image/jpg;base64,'.$image_data_base64;


    }


    public static function createCode($characters = 6)
    {
        $possible = '23456789bcdfghjkmnpqrstvwxyz';
        $code = '';
        $i = 0;
        while ($i < $characters) {
            $code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
            $i++;
        }
        return $code;
    }

}
