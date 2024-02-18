@props(['disabled' => false])

<div class="relative">
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' => 'w-full border-2 border-border rounded focus:border-border focus:ring-white',
    ]) !!} type="text">
</div>
