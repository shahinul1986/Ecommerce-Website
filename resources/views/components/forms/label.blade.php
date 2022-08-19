@props(['for', 'text', 'style'=> null])

<label for="{{ $for.'Input' }}" style="{{ $style }}">{{ ucwords($text) }}</label>