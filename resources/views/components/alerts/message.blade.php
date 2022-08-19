@props(['type', 'message'])
{{--  @dd($attributes)  --}}

    @if($message)
        <div role="alert" {{ $attributes->merge(['class' => 'm-5 alert alert-' . $type]) }}>
            {{ $message }}
        </div>
    @endif
