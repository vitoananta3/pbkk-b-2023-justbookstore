<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Carts extends BaseController
{

    protected $cartsModel;
    protected $cartItemModel;

    public function __construct()
    {
        $this->cartsModel = new \App\Models\CartModel();
        $this->cartItemModel = new \App\Models\CartItemModel();
    }

    public function index()
    {
        $user = session()->get('user');
        if (!$user) {
            return redirect()->to('/signin');
        }

        // $user_id = $user['id'];

        // $cart = $this->cartsModel->getUserCart($user_id);

        // if (!$cart) {
        //     $data = [
        //         'title' => 'Carts | JustBookStore',
        //         'page' => 'carts',
        //     ];
        //     return view('carts/index', $data);
        // } else {
        //     $cart_id = $cart['id'];

        //     $cartItems = $this->cartItemModel->getCartItems($cart_id);

        //     $data = [
        //         'title' => 'Carts | JustBookStore',
        //         'page' => 'carts',
        //         'cart' => $cart,
        //         'cartItems' => $cartItems
        //     ];
        //     return view('carts/index', $data);
        // }

        $cart = $this->cartsModel->getActiveCart($user['id']);

        if (!$cart) {
            $data = [
                'title' => 'Carts | JustBookStore',
                'page' => 'carts',
            ];
            return view('carts/index', $data);
        } else {
            $cart_id = $cart['id'];

            $cartItems = $this->cartItemModel->getItems($cart_id);

            $data = [
                'title' => 'Carts | JustBookStore',
                'page' => 'carts',
                'cart' => $cart,
                'cartItems' => $cartItems
            ];
            return view('carts/index', $data);
        }

        // $data = [
        //     'title' => 'Carts | JustBookStore',
        //     'page' => 'carts',
        //     'cart' => $cart,
        //     'cartItems' => $cart_items
        // ];

        // return view('carts/index', $data);
    }
}
