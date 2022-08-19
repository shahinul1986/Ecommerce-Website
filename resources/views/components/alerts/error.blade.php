@props(['name', 'message'])

@error($name)
    <span {{ $attributes->merge(['class' => 'invalid-feedback']) }} role="alert">
        <strong style="color: red">{{ $message }}</strong>
    </span>
@enderror