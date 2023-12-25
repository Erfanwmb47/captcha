@inject('obj','erfanwmb\captcha\captcha')

<div class="row" style='display: flex;align-items:flex-end;width: 100%;height: 100% ;gap:14px'>
    <div style="flex: 120px 0;margin-bottom: 2px; overflow: hidden; border-radius: 4px">
        <img src="{{$obj->render()}}" alt="">
    </div>
    <div style="flex: 1"
    >


        <input class="border-gray-300 dark:border-gray-700
        @if(config('captcha.connection.default_theme') =='dark') dark:bg-gray-900 @endif dark:text-gray-300 focus:border-indigo-500
         dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600
          rounded-md shadow-sm block mt-1 w-full text-center" id="g-recaptcha-response" type="text" name="g-recaptcha-response" placeholder="عبارت امنیتی را وارد کنید" required="required" >

    </div>
</div>

