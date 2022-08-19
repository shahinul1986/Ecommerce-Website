@props(['text', 'icon' => null, 'btnType' => null])

<a {{ $attributes->merge(['class' => 'btn btn-' . $btnType . ' waves-effect']) }}>
    @if ($icon)
        <i class="material-icons">{{ $icon }}</i>        
    @endif    
    <span>{{ $text }}</span>
</a>