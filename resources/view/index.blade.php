@php($config_root = 'captcha.driver')

@isset($exclusive_captcha)
    <input type="hidden" name="exclusive_captcha" value="{{$exclusive_captcha}}">
    @includeIf("captcha.$exclusive_captcha")
@else
    @foreach(config('captcha.driver') as $key=>$value)
        @if(config('captcha.connection.captcha') == $key)
            @include("captcha.$key")
        @endif
    @endforeach
@endisset


@error('g-recaptcha-response')
<span class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2" role="alert">
           <strong>{{$message}}</strong>
       </span>
@enderror


