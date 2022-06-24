@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Regards'),<br>
{{ config('app.name') }}
@endif
@if ($address = config('app.address'))
<br>{{data_get($address, 'street')}}, {{ data_get($address, 'number')}} - @if(data_get($address, 'complement')) {{data_get($address, 'complement')}} - @endif {{data_get($address, 'district')}}
<br>CEP: {{data_get($address,'zip')}} | {{data_get($address, 'city' )}}-{{data_get($address, 'state')}}
@endif
{{-- Subcopy --}}
@isset($actionText)
    @slot('subcopy')
        @lang("Se estiver com problemas para clicar no botão \":actionText\", copie e cole o URL abaixo\n".
        'ipara o seu navegador:', [
            'actionText' => $actionText,
        ])
        <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
    @endslot
@endisset
@endcomponent
