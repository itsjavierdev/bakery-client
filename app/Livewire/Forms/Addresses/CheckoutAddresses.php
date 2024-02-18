<?php

namespace App\Livewire\Forms\Addresses;

use Livewire\Attributes\Rule;
use Livewire\Form;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;

class CheckoutAddresses extends Form
{
    //VALIDATION RULES
    #[Rule('required|max:150', as: 'dirección')]
    public $street;
    #[Rule('required|max:40', as: 'ciudad')]
    public $city;
    #[Rule('max:80', as: 'referencia')]
    public $reference;

    public $address;

    public function store(){
        $this->validate();
        $this->address=Address::create([
            'street'=>$this->street,
            'city'=>$this->city,
            'reference'=>$this->reference,
            'alias'=>'Principal',
            'users_id'=>(Auth::user()->id),
            'is_active'=>true,
        ]);
    }
}
