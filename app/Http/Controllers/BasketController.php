<?php

namespace Musicshop\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Request;
use Musicshop\Album;
use Musicshop\Http\Requests;
use Musicshop\Http\Controllers\Controller;

class BasketController extends Controller
{
    public function basket()
    {
        if (Request::isMethod('post')) {
            $album_id = Request::get('album_id');
            $album = Album::findOrFail($album_id);
            Cart::add(['id' => $album_id, 'name' => $album->album_name, 'qty' => 1, 'price' => $album->price]);

            return back()->withSuccess("Albums has been added to basket.");
        }

        //increment the quantity
        if (Request::get('album_id') && (Request::get('increment')) == 1) {
            $rowId = Cart::search(array('id' => Request::get('album_id')));
            $item = Cart::get($rowId[0]);

            Cart::update($rowId[0], $item->qty + 1);
        }

        //decrease the quantity
        if (Request::get('album_id') && (Request::get('decrease')) == 1) {
            $rowId = Cart::search(array('id' => Request::get('album_id')));
            $item = Cart::get($rowId[0]);

            Cart::update($rowId[0], $item->qty - 1);
        }

        //remove remove item from the Cart collection
        if(Request::get('album_id') && (Request::get('remove')) == 'all'){
            $rowId = Cart::search(array('id' => Request::get('album_id')));
            Cart::remove($rowId[0]);
        }
        
        $basket = Cart::content();

        return view('basket.index', compact('basket'));
    }

    public function clear()
    {
        Cart::destroy();

        return back();
    }
}
