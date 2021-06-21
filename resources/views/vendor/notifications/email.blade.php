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
{!! $line !!}

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
{!! $actionText !!}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{!! $line !!}

@endforeach

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
"If you’re having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
'into your web browser:',
[
'actionText' => $actionText,
]
) <span class="break-all">[{!! $displayableActionUrl !!}]({!! $actionUrl !!})</span>
@endslot
@endisset

{{-- Salutation --}}
@if (! empty($salutation))
{!! $salutation !!}
@else
<h3 style="margin-bottom: 0px;">
    Warm Regard, {{config('app.name')}} Organizing Committee, <br>
    Website : <a href="icemine.upnyk.ac.id">http://icemine.upnyk.ac.id</a><br>
    Email : <a href="#">icemine@upnyk.ac.id</a>
</h3>
@endif
@endcomponent