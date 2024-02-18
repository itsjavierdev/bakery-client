<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Cart;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Livewire\Cart\CartButton;

class ShowAllProducts extends Component
{
    use WithPagination;

    //FILTERS
    public $search;
    public $orderBy='orderAZ';
    public $categoryOrder='todos';
    public $cant=9;

    public function render()
    {   //SHOW CATEGORIES
        $categories=Category::all();
        //SHOW PRODUCT
        $query = Product::query();
        //FILTER BY CATEGORY
        if ($this->categoryOrder !== 'todos') {
            $query->where('category_id', $this->categoryOrder);
        }
        //SEARCH
        $query->where('name', 'like', '%' . $this->search . '%');
        //FILTER BY SELECT
        switch ($this->orderBy) {
            case 'orderAZ':
                $query->orderBy('name', 'asc');
                break;
            case 'orderZA':
                $query->orderBy('name', 'desc');
                break;
            case 'priceLowHigh':
                $query->orderBy('price', 'asc');
                break;
            case 'priceHighLow':
                $query->orderBy('price', 'desc');
                break;
            case 'dateOldNew':
                $query->orderBy('created_at', 'asc');
                break;
            case 'dateNewOld':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->orderBy('name', 'asc');
        }
        $products = $query->paginate($this->cant);
        return view('livewire.products.show-all-products', compact('products','categories'));
    }
    //ADD CART
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
    public function updatingSearch(){
        $this->resetPage();
    }
    public function updatingCategoryOrder(){
        $this->resetPage();
    }
}
