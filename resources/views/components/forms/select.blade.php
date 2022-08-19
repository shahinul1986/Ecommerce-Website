@props(['name', 'text', 'selected' => null])

{{--  <select id="{{ $name.'Input' }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'form-control show-tick']) }} data-live-search="true">
    {{ $options }}
</select>  --}}

<select id="{{ $name.'Input' }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'form-control show-tick']) }} data-live-search="true">
    <option value="" disabled selected>Select {{ ucfirst($text) }}</option>
    @foreach ($options as $option)
        <option value="{{ $option['id'] }}" {{ $option['id']  == $selected ? 'selected' : ''}}>{{ $option['value'] }}</option>
    @endforeach
</select>