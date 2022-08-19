@props(['text',
        'color' => 'default'])

<a {{ $attributes->merge(['class' => 'btn btn-' . $color . ' m-t-15 waves-effect']) }}>
    {{ strtoupper($text) }}
</a>