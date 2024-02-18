<?php

namespace App\Livewire\Forms\Addresses;

use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use Livewire\Form;

class EditFormAddresses extends Form
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

    #[Rule('required')]
    public $is_active=true;

    public $address;

    //MODAL UPDATE
    public function edit($id){
        $this->address=Address::findOrFail($id);
        $this->street=$this->address->street;
        $this->city=$this->address->city;
        $this->reference=$this->address->reference;
        $this->alias=$this->address->alias;
    }
    //UPDATE
    public function update(){
        $validated=$this->validate();
        Address::findOrFail($this->address->id)->update($validated);
        //DESELECT ANOTHER ADDRESS
        $oldAddresses=Address::where('id','!=',$this->address->id)->where('users_id', Auth::user()->id)->get();
        foreach($oldAddresses as $oldAddress){
            $oldAddress->is_active=0;
            $oldAddress->save();
        }
        //TOAST
        session()->flash('status', 'Dirección modificada correctamente');
        session()->flash('accion', 'update');

        $this->reset();
    }
}
