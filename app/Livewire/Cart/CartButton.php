<?php

namespace App\Livewire\Cart;

use Livewire\Component;
use Livewire\Attributes\On;

class CartButton extends Component
{
    #[On('renderCart')]
    public function render()
    {
        return view('livewire.cart.cart-button');
    }
}
