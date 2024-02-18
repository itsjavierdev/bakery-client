<?php

namespace App\Livewire\Forms\Addresses;

use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Auth;
use Livewire\Form;
use App\Models\Address;

class CreateFormAddresses extends Form
{
    //VALIDATION RULES
    #[Rule('required|max:150', as: 'dirección')]
    public $street;

    #[Rule('required|max:40', as: 'ciudad')]
    public $city;

    #[Rule('max:80', as: 'referencia')]
    public $reference;

    #[Rule('required|max:40', as: 'alias')]
    public $alias;

    //SAVE
    public function save(){
        $this->validate();
        $address=Address::create([
            'street'=>$this->street,
            'city'=>$this->city,
            'reference'=>$this->reference,
            'alias'=>$this->alias,
            'users_id'=>(Auth::user()->id),
            'is_active'=>true,
        ]);
        //DESELECT OLD ADDRESS
        $oldAddresses=Address::where('id','!=',$address->id)->where('users_id', Auth::user()->id)->get();
        foreach($oldAddresses as $oldAddress){
            $oldAddress->is_active=0;
            $oldAddress->save();
        }
        //TOAST
        session()->flash('status', 'Dirección agregada correctamente');
        session()->flash('accion', 'create');

        $this->reset();
    }
}
