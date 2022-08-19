@props(['text'])

<a {{ $attributes->merge(['class' => 'btn btn-info btn-sm waves-effect']) }} data-toggle="tooltip" 
        data-placement="top" title="{{ $text }}">
    <i class="material-icons">visibility</i>
</a>