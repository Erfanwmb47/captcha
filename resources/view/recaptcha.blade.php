
<div class="g-recaptcha" data-theme="{{$theme_captcha ?? config('captcha.connection.default_theme')}}"  data-sitekey="{{config("$config_root.recaptcha.SECURITY_RECAPTCHA_SITE_KEY")}}"></div>


<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
