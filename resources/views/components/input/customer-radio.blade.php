@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'bg-black checked:bg-border focus:bg-border active:bg-transparent checked:ring-0 text-border active:ring-0 focus:border-transparent active:border-transparent transition-all duration-200',
]) !!} type="radio">
