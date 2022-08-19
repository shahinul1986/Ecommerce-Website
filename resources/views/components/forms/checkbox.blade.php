@props(['name', 'text', 'checked', 'value' => '1', 'id' => null])

<input type="checkbox" id="{{ $name . $id . 'Input' }}" name="{{ $name }}" value="{{ $value }}"  
    {{ $attributes->merge(['class' => 'chk-col-pink filled-in']) }} {{ $checked }}/>

<x-forms.label for="{{ $name . $id }}" text="{{ $text }}" style="font-weight: bold; font-size: 16px;"/>