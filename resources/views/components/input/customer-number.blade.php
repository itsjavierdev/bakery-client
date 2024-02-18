@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'bg-yellow-primary border-2 border-border w-16 focus:border-border focus:ring-white pl-3',
]) !!} type="number" id="miInput">
