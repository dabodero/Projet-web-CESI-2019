<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Order;
use App\Comanded;
use URL;

class CartsController extends Controller
{
    public function showCart()
    {
        $temp_id_user = 1;

        /////     Cart     /////
        //cherche cart
        $haveCart = 0;

        $orders = Order::where('id_users', '=', $temp_id_user)->get();

        foreach($orders as $order)
        {
            if(!$order->paid)
            { $haveCart = $order->id; }
        }

        //creation of cart if needed
        if($haveCart == 0)
        {
            $cartData = Order::create(['paid'=>'0', 'delivered'=>'0', 'id_users'=>$temp_id_user]);
            $haveCart = $cart->id;
        }

        $cartData = Order::find($haveCart);
        ////////////////////////


        //calculate total
        $total = 0;
        foreach($cartData->comanded as $comand)
        {
            $total += $comand->article->price * $comand->quantity;
        }

    	return view('cart', compact('cartData'), compact('total'));
    }

    public function changequantity()
    {
        $id_order = request('id_order');
        $id_article = request('id_article');
        $quantity = request('quantityChanger');

        $order = Order::find($id_order);
        
        $haveComand = 0;
        foreach($order->comanded as $comand)
        {
            if($comand->article->id == $id_article)
            {
                $haveComand = $id_article;
            }
        }
        
        $obj = Comanded::where('id_orders', $id_order)->where('id_articles', $id_article)->update(['quantity' => $quantity]);

        //return view('cart');
        //return URL::action('CartsController@showCart');
        return redirect()->action('CartsController@showCart');
    }
    


    public function showCheckout()
    {
    	return view('checkout');
    }
}
