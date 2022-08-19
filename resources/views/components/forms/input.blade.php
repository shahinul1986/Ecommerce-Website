@props(['name'])


<input id="{{ $name.'Input' }}" name="{{ $name }}" placeholder="Enter {{ ucwords(str_replace('_', ' ', $name)) }}" 
    {{ $attributes->merge(['class' => 'form-control']) }}>