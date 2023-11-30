<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Carts extends BaseController
{

    protected $cartsModel;
    protected $cartItemModel;
    protected $booksModel;

    public function __construct()
    {
        $this->cartsModel = new \App\Models\CartModel();
        $this->cartItemModel = new \App\Models\CartItemModel();
        $this->booksModel = new \App\Models\BooksModel();
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

        $cart_id = $cart['id'];

        $cartItems = $this->cartItemModel->getItems($cart_id);

        $itemIds = $this->cartItemModel->getItemsId($cart_id);

        if (!$itemIds) {
            $data = [
                'title' => 'Carts | JustBookStore',
                'page' => 'carts',
                'cart' => $cart,
                'cartItems' => $cartItems,
                'books' => []
            ];
            return view('carts/index', $data);
        } else {
            $books = $this->booksModel->getBooksByIds($itemIds);

            $data = [
                'title' => 'Carts | JustBookStore',
                'page' => 'carts',
                'cart' => $cart,
                'cartItems' => $cartItems,
                'books' => $books
            ];
            return view('carts/index', $data);
        }
    }
}
