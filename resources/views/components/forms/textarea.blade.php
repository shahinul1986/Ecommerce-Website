@props(['name','value'])

<textarea name="{{ $name }}" id="{{ $name.'Input' }}" rows="2" width="100%"
    {{ $attributes->merge(['class' => 'form-control']) }}>{{ $value }}</textarea>
            