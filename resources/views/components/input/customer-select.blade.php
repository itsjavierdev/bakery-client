<select {!! $attributes->merge([
    'class' => 'md:w-auto w-full bg-yellow-primary border-2 border-border rounded focus:border-border focus:ring-white',
]) !!}>
    {{ $slot }}
</select>
