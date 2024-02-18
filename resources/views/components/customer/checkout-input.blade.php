@props(['action' => false, 'label', 'idInput', 'nameInput'])

<div>
    <div class="p-5 cursor-pointer bg-yellow-secondary" onclick="document.getElementById('{{ $nameInput }}').click();">
        <x-input.customer-radio name="{{ $idInput }}" id="{{ $nameInput }}"></x-input.customer-radio>
        <label for="{{ $nameInput }}" class="ml-3">{{ $label }}</label>
    </div>
    <div class="overflow-hidden transition-all duration-500" style="max-height: {{ $action ? '1000px' : '0' }}">
        <div class="bg-yellow-primary p-5">
            {{ $slot }}
        </div>
    </div>
</div>
