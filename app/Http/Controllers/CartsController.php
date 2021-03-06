<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Order;
use App\Comanded;
use Session;
use URL;
use Auth;

/*
*Controller of the shopping cart
*/
class CartsController extends Controller
{
    /*
    * show the shopping cart of the user
    */
    public function showCart()
    {

        if(Auth::user() !== null)
        {
            $temp_id_user = Auth::user()->id;
            
            /////     Cart     /////
            //look up cart
            $haveCart = 0;

            $orders = Order::where('id_users', '=', $temp_id_user)->get();

            foreach($orders as $order)
            {
                if(!$order->paid)
                { $haveCart = $order->id; }
            }

            //creation of the cart if needed
            if($haveCart == 0)
            {
                $cartData = Order::create(['paid'=>'0', 'delivered'=>'0', 'id_users'=>$temp_id_user]);
                $haveCart = $cartData->id;
            }

            $cartData = Order::find($haveCart);
            ////////////////////////


            //calculate total price
            $total = 0;
            foreach($cartData->comanded as $comand)
            {
                $total += $comand->article->price * $comand->quantity;
            }

            return view('cart', compact('cartData'), compact('total'));
        }
        else
        {
            return redirect('/home')->with('messageRed', 'Veuillez vous connecter pour accéder à votre panier.');
        }
    }

    /*
    *change the quantity of an item in the shopping cart
    */
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

        return redirect()->action('CartsController@showCart');
    }
    
    /*
    *delete an item in the shopping cart
    */
    public function deleteComande()
    {
        $id_order = request('id_order');
        $id_article = request('id_article');

        $obj = Comanded::where('id_orders', $id_order)->where('id_articles', $id_article);

        $obj->delete();
        return redirect()->action('CartsController@showCart')->with('messageGreen', 'Article supprimé');

    }

    /*
    *pay the articles
    */
    public function valideComande()
    {
        // don't work now, wait for real payment method
        /*request()->validate([
            'exp'=>'required',
            'cname'=>'required',
            'cnum'=>'required',
            'cvv'=>'required'
        ]);*/

		$id_order = request('id_order');
		$obj = Order::find($id_order);

		
		$empty = true;
		foreach($obj->comanded as $comand)
		{
			$empty = false;
		}

		if($empty)
		{
			return redirect('/cart')->with('messageRed', 'Votre panier est vide');
		}
		else
		{
            foreach($obj->comanded as $comand)
            {
                $article = $comand->article;
                $article->update(['stock' => ($article->stock - $comand->quantity)]);
            }
			$obj->update(['paid' => 1]);
        	return redirect('/home')->with('messageGreen', 'Paiement validé');
		}
    }

    /*
    *show the payment methods
    */
    public function showCheckout()
    {
        if(Auth::user() !== null)
        {
            $temp_id_user = Auth::user()->id;

            /////     Cart     /////
            //look up cart
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
                $haveCart = $cartData->id;
            }

            $cartData = Order::find($haveCart);
            ////////////////////////


            //calculate total price
            $total = 0;
            foreach($cartData->comanded as $comand)
            {
                $total += $comand->article->price * $comand->quantity;
            }

            return view('checkout', compact('cartData'), compact('total'));
        }
        else
        {
            return redirect('/home')->with('messageRed', 'Veuillez vous connecter pour accéder à votre panier.');
        }
    }

    /**
	 * function to set to delivered an order
	 */
	public function setDeliverOrder()
	{
		// restraint access
		if(Auth::user() !== null)
		{
			if(Auth::user()->id_roles == 2)
			{
				// get post data
				$id_order = request('id_order');

				// delete
				$obj = Order::find($id_order);
				$obj->update(['delivered'=>'1']);

				// success
				return redirect('/profile')->with('messageGreen', 'Commande livrée.');
			}
			else
			{
				// reject
				return redirect('/home')->with('messageRed', 'Vous n\'avez pas le droit d\'accéder à cette page.');
			}
		}
		else
		{
			// reject
			return redirect('/home')->with('messageRed', 'Vous n\'avez pas le droit d\'accéder à cette page.');
		}
	}
}
