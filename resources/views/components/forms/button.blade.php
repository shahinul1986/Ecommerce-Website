@props(['type' => 'submit', 
        'icon' => null, 
        'color' => 'default',
        'text' => null])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'btn btn-' . $color . ' btn-sm waves-effect']) }}>  
    @if ($icon)
        <i class="material-icons">{{ $icon }}</i>
    @else 
        {{ strtoupper($text) }}
    @endif 
</button>