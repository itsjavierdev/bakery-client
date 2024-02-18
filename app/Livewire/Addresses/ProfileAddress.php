<?php

namespace App\Livewire\Addresses;


use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Address;

class ProfileAddress extends Component
{   
    public $address;

    //SHOW ADDRESS
    public function render()
    {
        $this->address=Address::where('users_id',Auth::user()->id)->first();
        return view('livewire.addresses.profile-address');
    }
}
