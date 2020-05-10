@component('mail::layout')
    {{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
<img src="{{asset('frontendImages/'.$logo->value)}}" alt="{{ config('app.name') }} Logo">
@endcomponent
@endslot

    {{-- Body --}}
Hello {{$name}},

Welcome to Densoft developers, Your partner in all your computing needs.

    {{-- Subcopy --}}
@component('mail::button', ['url' => $url])
Verify Email Address
@endcomponent

If you did not create an account, no further action is required.


Thanks,<br>
{{ config('app.name') }}

    {{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
