<?php

namespace App\Livewire\Addresses;

use Livewire\Component;
use App\Livewire\Forms\Addresses\CreateFormAddresses;
use App\Livewire\Forms\Addresses\EditFormAddresses;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use App\Models\Address;
use App\Models\Order;

class FormAddresses extends Component
{
    //FORM OBJECT
    public CreateFormAddresses $addressCreate;
    public EditFormAddresses $addressEdit;

    //MODAL
    public $formtitle="Agregar dirección";
    public $editform=false;
    public $open = false;

    //SAVE
    public function save(){
        $this->addressCreate->save();
        $this->dispatch('render')->to(ShowAddresses::class);
        $this->dispatch('saved');
        $this->resetExcept('addressCreate','addressEdit');
    }
    //UPDATE
    public function update(){
        $this->addressEdit->update();
        $this->updatingOpen();
        $this->dispatch('render')->to(ShowAddresses::class);
        $this->dispatch('saved');
        $this->resetExcept('addressCreate','addressEdit');
    }
    //DELETE
    #[On('delete')]
    public function delete(Address $addressId){
        //VERIFY IF ANY ORDER HAVE THE ADDRESS
        $hasOrders = Order::where('addresses_id', $addressId->id)->exists();
    
        if ($hasOrders) {
            //TOAST FAIL
            session()->flash('status', 'Hay un pedido en curso a esta dirección.');
            session()->flash('accion', 'delete');
            $this->dispatch('saved');
        } else {
            //SELECT ANOTHER ADDRESS
            if($addressId->is_active){
                $newAddressActive = Address::where('id','!=',$addressId->id)
                    ->where('users_id', Auth::user()->id)
                    ->first();
    
                if ($newAddressActive) {
                    $newAddressActive->is_active = 1;
                    $newAddressActive->save();
                }
            }
            //DELETE
            $addressId->delete();
            
            $this->dispatch('render')->to(ShowAddresses::class);
    
            //TOAST
            session()->flash('status', 'Dirección eliminada correctamente');
            session()->flash('accion', 'delete');
            $this->dispatch('saved');
        }
    }
    //MODAL UPDATE
    #[On('edit-mode')]
    public function edit($id){
        $this->editform=true;
        $this->open=true;
        $this->formtitle="Editar dirección";
        $this->addressEdit->edit($id);
    }

    public function render()
    {
        return view('livewire.addresses.form-addresses');
    }

    //MODAL RESET
    public function updatingOpen(){
        if($this->open==true){
            $this->resetExcept('addressCreate','addressEdit');
            $this->resetValidation();
            $this->addressCreate->reset();
            $this->addressEdit->reset();
        }
    }
}

