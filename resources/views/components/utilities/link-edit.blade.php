@props(['text'])

<a {{ $attributes->merge(['class' => 'btn btn-warning btn-sm waves-effect']) }} data-toggle="tooltip" 
        data-placement="top" title="{{ $text }}">
    <i class="material-icons">edit</i>
</a>