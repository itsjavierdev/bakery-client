<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Address;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Attributes\On;
use App\Livewire\Forms\Addresses\CheckoutAddresses;

class Checkout extends Component
{
    //FORM OBJECT
    public CheckoutAddresses $checkoutAddress;
    //VALIDATION RULES
    #[Rule('required', as: 'metodo de pago')]
    public $payment;
    #[Rule('required', as: 'información de envío')]
    public $delivery;

    public $description;

    public $address;
    //SHOW ADDRESS
    public function render()
    { 
        $this->address = Address::where('users_id', Auth::user()->id)
            ->where('is_active', 1)
            ->first();
        return view('livewire.checkout');
        
    }
    //STORE ORDER
    public function store(){
        //VALIDATION
        $this->validate([
            'delivery' => 'required',
            'payment' => 'required',
        ]);
        //STORE ROW ORDER
        $newOrder = new Order();
        $newOrder->total=Cart::getTotal();
        $newOrder->total_quantity=Cart::getTotalQuantity();
        $newOrder->payment=$this->payment;
        $newOrder->description=$this->description;
        $newOrder->users_id=Auth::user()->id;
        //IF IS DELIVERY
        if($this->delivery=='delivery'){
            //IF USER HAS ADDRESS
            if($this->address==null){
                $this->checkoutAddress->store();
                $newOrder->addresses_id=$this->checkoutAddress->address->id;
            }else{
                $newOrder->addresses_id=$this->address->id;
            }
        }
        $newOrder->save();
        $order = Order::latest('created_at')->first();
        //STORE DETAIL ORDER
        $items=Cart::getContent();
        foreach($items as $item){
            $product=Product::find($item->id);
            $newOrder_Detail = new Order_Detail();
            $newOrder_Detail->quantity =$item->quantity;
            $newOrder_Detail->subtotal =Cart::get($item->id)->getPriceSum();
            $newOrder_Detail->products_id=$product->id;
            $newOrder_Detail->orders_id=$order->id;
            $newOrder_Detail->save();
        }
        Cart::clear();
        return Redirect::route('thankyou');
    }
}
