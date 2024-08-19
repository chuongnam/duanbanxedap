<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Car;
use App\Models\User;







class CartController extends Controller
{
    public function add_cart(Request $request)
    {
         $car_id = $request->id;
         $car_quantity = $request->quantity;
         if(is_null(Session::get('cart')))
         {
            Session::put('cart',[
                $car_id => $car_quantity
             ]);
             return redirect('/cart');
         }
         else{
            $cart = Session::get('cart');
            if(Arr::exists($cart,$car_id)){
               $cart[$car_id] =  $cart[$car_id] + $car_quantity;
               Session::put('cart',$cart);
               return redirect('/cart');
            }
            else{
                $cart[$car_id] = $car_quantity;
                Session::put('cart',$cart);
                return redirect('/cart');
            }
         }
       
     
    }
    public function show(Request $request)
    {
        $cart = Session::get('cart', []);
        $car_ids = array_keys($cart);
        $cars = Car::whereIn('id', $car_ids)->get();

        $total = 0;
        foreach ($cars as $car) {
            $total += floatval($car->price) * intval($cart[$car->id]);
        }

        return view('car.cart', [
            'cars' => $cars,
            'cart' => $cart,
            'total' => $total
        ]);
    }

    public function updateCart(Request $request)
    {
        $cart = $request->input('cart', []);
        Session::put('cart', $cart);
        return redirect()->route('cart.show');
    }

    public function removeItem($carId)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$carId])) {
            unset($cart[$carId]);
            Session::put('cart', $cart);
        }
        return redirect()->route('cart.show');
    }

    public function checkoutForm()
{
    $cart = Session::get('cart');

    if (!$cart) {
        return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống!');
    }

 
    $carIds = array_keys($cart);
    $cars = Car::whereIn('id', $carIds)->get();

   
    $total = 0;
    foreach ($cars as $car) {
        $quantity = $cart[$car->id] ?? 0;
        $total += $car->price * $quantity;
    }

    return view('car.checkout', [
        'cars' => $cars,
        'cart' => $cart,
        'total' => $total,
    ]);
}

    public function processCheckout(Request $request)
    {
       
        $request->validate([
            'shipping_address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'payment_method' => 'required|string|max:50',
        ]);

     
        $cart = Session::get('cart');

        if (!$cart) {
            return redirect()->route('cart.checkoutForm')->with('error', 'Giỏ hàng trống!');
        }

    
        $total = 0;
        foreach ($cart as $carId => $quantity) {
            $car = Car::find($carId);
            $total += $car->price * $quantity;
        }

   
        $order = new Order();
        $order->shipping_address = $request->input('shipping_address');
        $order->phone_number = $request->input('phone_number');
        $order->payment_method = $request->input('payment_method');
        $order->trangthai = $request->input('trangthai');
        $order->name = $request->input('name');
        $order->total = $total;
        $order->items = json_encode($cart); 
        $order->save();
        Session::forget('cart');
        return redirect()->route('order.show', $order->id)->with('success', 'Thanh toán thành công!');
    }
    public function show_oder($id)
    {
        
        $order = Order::findOrFail($id);
        return view('car.order', compact('order'));
    }
}

