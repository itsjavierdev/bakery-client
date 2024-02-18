<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Cart;
use Livewire\Attributes\On;
use App\Livewire\Cart\CartButton;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ShowRecommendedProducts extends Component
{
    //PRODUCTS
    public $recommendedProducts;
    public $bestsellerProducts;
    public $recentProducts;
    //SHOW PRODUCTS
    public function render()
    {
        return view('livewire.products.show-recommended-products');
    }
    public function mount(){
        //LAST MONTH
        $ultimoMes = Carbon::now()->subMonth();
        //RECOMMENDED
        $this->recommendedProducts=Product::inRandomOrder()->take(3)->get();
        //BEST SELLERS
        $this->bestsellerProducts = DB::table('sale__details')
        ->select('products.*', DB::raw('SUM(subtotal) as total_income'))
        ->join('products', 'sale__details.products_id', '=', 'products.id')
        ->join('sales', 'sale__details.sales_id', '=', 'sales.id')
        ->where('sales.created_at', '>=', $ultimoMes)
        ->groupBy('products.id') // Agrupa por el ID del producto
        ->orderByDesc('total_income')
        ->limit(3)
        ->get();
        //RECENTS PRODUCTS
        $this->recentProducts=Product::latest('created_at')->take(3)->get();
    }
    //ADD TO CART
    #[On('add-cart')]
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
