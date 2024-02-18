@props(['disabled' => false])

<div class="relative">
    <textarea rows="3" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' => 'w-full bg-yellow-secondary border-2 border-border rounded focus:border-border focus:ring-white',
    ]) !!}></textarea>
</div>
