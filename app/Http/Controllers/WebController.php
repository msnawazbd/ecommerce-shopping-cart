<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetails;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::check() AND Cart::count() > 0){
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'order_total' => (float) Cart::total(),
                'status' => 0
            ]);

            foreach(Cart::content() as $row){
                OrderDetails::create([
                    'order_id' => $order->id,
                    'product_id' => $row->id,
                    'name' => $row->name,
                    'quantity' => $row->qty,
                    'price' => $row->price,
                ]);
            }
            Cart::destroy();
            return redirect()->route('web')->with('message', 'Order placed successfully.');
        } else {
            return redirect()->route('login');
        }
    }

    public function orders()
    {
        $orders = Order::with('order_details')->orderBy('id', 'desc')->get();
        return view('orders', compact('orders'));
    }
}
