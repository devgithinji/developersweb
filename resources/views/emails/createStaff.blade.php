@component('mail::layout')
    {{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
<img src="{{asset('frontendImages/small_image10-47-33_1451666.png')}}" alt="{{ config('app.name') }} Logo">
@endcomponent
@endslot

Dear {{$data['name']}},

Congratulations on your offer from <a href="{{route('hometwo')}}">Densoft Developers</a>.We are delighted to offer
you the position of {{$data['position']}} with an anticipated start date of April 20th 2020.

As discussed over the phone, Please find attached your detailed offer letter.If you choose to accept this offer,
please sign, scan and email your letter to me at {{$data['mailer_email']}}.

In the meantime, please don't hesitate to reach out to us, either through email or by calling me
directly at {{$data['mailer_phone']}} if you should have any questions or concerns.

We are looking forward to hearing from you and hope you'll join our team!

Click on the button below to login in your account with your email and the password below:
<br>
password: {{$data['password']}}
    {{-- Subcopy --}}
@component('mail::button', ['url' => $data['loginUrl']])
        Login to Account
@endcomponent

Best regards,

{{$data['mailer_name']}}<br>
{{$data['mailer_position']}}<br>
{{$data['mailer_email']}}<br>
{{$data['mailer_phone']}}


Thanks,<br>
{{ config('app.name') }}

    {{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
