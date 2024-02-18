<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CustomerController extends Controller
{
    //ALL PRODUCTS PAGE
    public function shop()
    {
        return view('customer.products.all-products');
    }
    //CART PAGE
    public function cart()
    {
        return view('customer.cart.cart');
    }
    //PRODUCT SINGLE PAGE
    public function showProduct($productSlug)
    {
        $product = Product::where('slug', '=', $productSlug)->first();

        return view('customer.products.product', [
            'product' => $product,
        ]);
    }
    //CHECKOUT PAGE
    public function checkout()
    {
        //IF HAS CART ITEMS
        if (count(Cart::getContent()) == 0) {
            return redirect('/');
        } else {
            return view('customer.cart.checkout');
        }
    }
    //CRUD ADDRESSES PAGE
    public function addresses()
    {
        return view('customer.user.addresses');
    }
    //THANKYOU PAGE
    public function thankyou()
    {
        return view('customer.cart.thankyou');
    }
}
