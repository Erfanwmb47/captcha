<?php
namespace packages\captcha\http;
use Illuminate\Http\Client\Response;

class gdCaptcha
{
    public  function render($width='120',$height='40',$characters='6') {


        $font=base_path().'\\packages\\captcha\\assets\\INGEN.TTF';
        //var_dump($this->font);
        $code = Self::createCode($characters);
       // Session::put('security_code',$code);
        /* font size will be 75% of the image height */
        $font_size = $height * 0.3;
        $image = @imagecreate($width, $height) or die('Cannot initialize new GD image stream');
        /* set the colours */
        $background_color = imagecolorallocate($image, 255, 255, 255);

        $text_color = imagecolorallocate($image, 70, 40, 200);

        // dd(file_get_contents($font),$this->font);
        /* create textbox and add text */
        $textbox = imagettfbbox($font_size, 0, $font, $code) or die('Error in imagettfbbox function');
        $x = ($width - $textbox[4])/2;
        $y = ($height - $textbox[5])/2;
        imagettftext($image, $font_size, 5, $x, $y, $text_color, $font , $code) or die('Error in imagettftext function');
        /* output captcha image to browser  Download By www.vebscript.com */
        header('Content-Type: image/jpeg');

        imagejpeg($image);
        imagedestroy($image);

        /*ob_start();
        $rendered_buffer = imagejpeg($image);
        $buffer = ob_get_contents();
        imagedestroy($image);
        ob_end_clean();

        $response = \Illuminate\Support\Facades\Response::make($rendered_buffer);
        $response->header('Content-Type', 'image/jpeg');
        return $response;*/


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
