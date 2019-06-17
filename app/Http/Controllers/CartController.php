<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Quality;
use App\Cart;
use App\Friend;
use Auth;
use Session;
use Redirect;


class CartController extends Controller
{

    public function viewItem(Request $request){
        $article = Article::find($request->article_id);
        $qualities = Quality::all();
        return view('client.sales.show', compact('article', 'qualities'));
    }

    public function store(Request $request)
    {
        $cart = new Cart();
        $cart->article_id = $request->article_id;
        $cart->user_id = Auth::user()->id;
        $cart->save();
        Session::flash('message', 'Articulo agregado al carrito');
        return Redirect::to('/');
    }

    public function show($id)
    {
        $carts = Cart::where('user_id', $id)->get();
        $qualities = Quality::all();
        return view('client.sales.viewCarts', compact('carts', 'qualities'));
    }

    public function showFriend($id)
    {
        $carts = Cart::where('user_id', $id)->get();
        $qualities = Quality::all();
        return view('friend.viewCart', compact('carts', 'qualities'));
    }

    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        Session::flash('message', 'Item eliminado del carrito');
        return Redirect::back();
    }

    public function friends($id)
    {
        $carts = Cart::all();
        $friends = Friend::where('user_id', Auth::user()->id)->get();
        foreach ($friends as $friend) {
            foreach ($carts as $cart) {
                if($cart->user_id != $friend->friend_id){
                    $cart->delete();
                }
            }
        }
        return view('friend.carts', compact('carts'));
    }

    public function storeArticle($id)
    {
        $cart = new Cart();
        $cart->article_id = $id;
        $cart->user_id = Auth::user()->id;
        $cart->save();
        Session::flash('message', 'Article add to my cart');
        return Redirect::to('/');
    }

}
