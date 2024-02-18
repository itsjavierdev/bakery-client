<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\On;
use Cart;
use App\Livewire\Cart\CartButton;

class ShowRelatedProducts extends Component
{
    //PARAMETERS SHOW
    public $productId;
    public $relatedProducts;

    public function render()
    {      
        //SHOW RELATED PRODUCTS
        $product=Product::where('id','=',$this->productId)->first();
        $this->relatedProducts=Product::where([
            ['category_id','=', $product->category_id],
            ['id','!=', $product->id]
            ])->inRandomOrder()->take(3)->get();
        return view('livewire.products.show-related-products');
    }
    //ADD TO CART
    #[On('add-cart-single')]
    public function addCart($id){
        $productsCart =Product::find($id);
        $userID = 2;

        Cart::add(array(
            'id' => $productsCart->id,
            'name' => $productsCart->name,
            'price' => $productsCart->price,
            'quantity' => 1,
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
}
