<?php

namespace App\Livewire\Cart;

use Livewire\Component;
use App\Models\Product;
use Cart;
use Livewire\Attributes\On;
use App\Livewire\Cart\CartButton;

class AddToCart extends Component
{   
    //PARAMETERS ADD
    public $productId;
    public $quantityInput=1;

    //ADD TO CART
    #[On('add-cart')]
    public function addCart($id){
        $productsCart =Product::find($id);
        $userID = 2;

        Cart::add(array(
            'id' => $productsCart->id,
            'name' => $productsCart->name,
            'price' => $productsCart->price,
            'quantity' => $this->quantityInput,
            'attributes' => array(),
            'featured' =>$productsCart->featured,
            'associatedModel' => $productsCart
        ));
        //TOAST
        session()->flash('status', '"'.$productsCart->name.'" se agrego al carrito');
        session()->flash('accion', 'create');
        $this->dispatch('saved');

        $this->dispatch('renderCart')->to(CartButton::class);
    }


    public function render()
    {
        return view('livewire.cart.add-to-cart');
    }
}
