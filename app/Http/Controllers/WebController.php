<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('web', compact('products'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function add_cart($id)
    {
        $product = Product::findOrFail($id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price,
            'weight' => 0
        ]);

        return redirect()->back();
    }

    public function view_cart(){
        return view('cart');
    }

    public function destroy_cart()
    {
        Cart::destroy();
        return redirect()->back();
    }

    public function remove_cart($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function update_cart(Request $request, $rowId)
    {
        Cart::update($rowId, $request->input('qty'));
        return redirect()->back();
    }

    public function checkout_cart()
    {
        return Cart::content();
    }
}
