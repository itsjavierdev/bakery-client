<?php

namespace App\Livewire\Addresses;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Address;
use Illuminate\Support\Facades\URL;

class ShowAddresses extends Component
{   

    public $addresses;
    public $previousCheckout;

    //SHOW ADDRESSES
    #[On('render')]
    public function render()
    {   
        $this->addresses=Address::where('users_id', Auth::user()->id)->get();
        return view('livewire.addresses.show-addresses');
    }
    //SELECT ADDRESS
    #[On('select-address')]
    public function selectAddress($id){
        //SELECT NEW ADDRESS
        $newActiveAddress=Address::where('id',$id)->where('users_id', Auth::user()->id)->first();
        $newActiveAddress->is_active=1;
        $newActiveAddress->save();
        //DESELECT OLD ADDRESS
        $noneActiveAddresses=Address::where('id','!=',$id)->where('users_id', Auth::user()->id)->get();
        foreach($noneActiveAddresses as $noneActiveAddress){
            $noneActiveAddress->is_active=0;
            $noneActiveAddress->save();
        }
    }
    //REDIRECT BACK TO CHECKOUT
    public function mount(){
        
        $previousUrl = URL::previous();
        if (strpos($previousUrl, 'checkout') !== false) {
            $this->previousCheckout = true;
        } else {
            $this->previousCheckout = false;
        }
    }
}