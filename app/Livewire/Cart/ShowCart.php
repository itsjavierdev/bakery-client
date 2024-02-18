<?php

namespace App\Livewire\Cart;

use Livewire\Component;
use App\Models\Product;
use Cart;
use App\Livewire\Cart\CartButton;

class ShowCart extends Component
{
    public $quantities = [];

    public function render()
    {    
        $this->quantities = Cart::getContent()->pluck('quantity', 'id')->toArray();
        return view('livewire.cart.show-cart');
    }

    public function updatedQuantities()
    {
        foreach ($this->quantities as $productId => $quantity) {
            Cart::update($productId, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $quantity
                ),
            ));
        }
        $this->dispatch('renderCart')->to(CartButton::class);
    }

    public function delete($id){
        Cart::remove($id);
        $this->dispatch('renderCart')->to(CartButton::class);
    }
}
