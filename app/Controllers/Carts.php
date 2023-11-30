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

        $cart = $this->cartsModel->getActiveCart($user['id']);

        if (!$cart) {
            $data = [
                'title' => 'Carts | JustBookStore',
                'page' => 'carts',
                'cart' => [],
                'cartItems' => [],
                'books' => []
            ];
            return view('carts/index', $data);
        } else {
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

    public function transactionsIndex()
    {
        $user = session()->get('user');
        if (!$user) {
            return redirect()->to('/signin');
        }

        $carts = $this->cartsModel->getInactiveCarts($user['id']);

        $totalCarts = $this->cartsModel->getTotalInactiveCarts($user['id']);

        $data = [
            'title' => 'Transactions | JustBookStore',
            'page' => 'transactions',
            'carts' => $carts,
            'totalCarts' => $totalCarts
        ];
        return view('transactions/index', $data);
    }

    public function checkout()
    {
        $user = session()->get('user');
        if (!$user) {
            return redirect()->to('/signin');
        }

        $cart = $this->cartsModel->getActiveCart($user['id']);

        $cart_id = $cart['id'];


        $this->cartsModel->save([
            'id' => $cart_id,
            'isActive' => false,
            'totalPrice' => $this->request->getVar('totalPrice')
        ]);

        session()->setFlashdata('message', 'Checkout success!');
        return redirect()->to('/transactions');
    }

    public function detail($id) {
        $user = session()->get('user');
        if (!$user) {
            return redirect()->to('/signin');
        }

        $cart = $this->cartsModel->getCartById($id);

        $cartItems = $this->cartItemModel->getItems($id);

        $itemIds = $this->cartItemModel->getItemsId($id);

        $books = $this->booksModel->getBooksByIds($itemIds);

        $data = [
            'title' => 'Transaction Detail | JustBookStore',
            'page' => 'transactions',
            'cart' => $cart,
            'cartItems' => $cartItems,
            'books' => $books
        ];
        return view('transactions/detail', $data);
    }
}
