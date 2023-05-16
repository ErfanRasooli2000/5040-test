<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add_to_cart($id)
    {
        $user = Auth()->user();
        $user_id = $user->id;

        if(Cart::where('user_id' , $user_id)->where('product_id' , $id)->exists())
        {
            $cart = Cart::where('user_id' , $user_id)->where('product_id' , $id)->first();
            $cart->count = $cart->count + 1;
            $cart->save();
        }
        else
        {
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $id ,
                'count' => 1
            ]);
        }

        return redirect(route('user.cart'));
    }

    public function remove_from_cart($id)
    {
        $user = Auth()->user();
        $user_id = $user->id;

        if(Cart::where('user_id' , $user_id)->where('product_id' , $id)->exists())
        {
            $cart = Cart::where('user_id' , $user_id)->where('product_id' , $id)->first();

            if($cart->count<=0)
            {
                $cart->delete();
            }
            else
            {
                $cart->count = $cart->count - 1;
                $cart->save();
            }
        }

        return redirect(route('user.cart'));
    }

    public function delete_from_cart($id)
    {
        $user = Auth()->user();
        $user_id = $user->id;

        if(Cart::where('user_id' , $user_id)->where('product_id' , $id)->exists())
        {
            Cart::where('user_id' , $user_id)->where('product_id' , $id)->delete();
        }

        return redirect(route('user.cart'));
    }

    public function cart()
    {
        $user = Auth()->user();
        $user_id = $user->id;

        $all = Cart::where('user_id' , $user_id)->get();
        return view('user.cart' , compact('all'));
    }

    public function buy()
    {
        $user = Auth()->user();
        $user_id = $user->id;

        $all = Cart::where('user_id' , $user_id)->get();
        foreach ($all as $one)
        {
            $product = $one->product;
            if($product->count>=$one->count)
            {
                $product->count = $product->count - $one->count;
                $product->save();
                $one->delete();

                //TODO : add order
            }
            else
            {
                return redirect(route('user.cart'));
            }
        }
        return redirect(route('user.cart'));
    }
}
