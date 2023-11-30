<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CartItems extends BaseController
{
    protected $cartItemModel;
    protected $cartsModel;

    public function __construct()
    {
        $this->cartItemModel = new \App\Models\CartItemModel();
        $this->cartsModel = new \App\Models\CartModel();
    }

    public function saveItem()
    {

        // dd($this->request->getVar());

        $activeCart = $this->cartsModel->getActiveCart($this->request->getVar('user_id'));

        if (!$activeCart) {
            $this->cartsModel->save([
                'user_id' => $this->request->getVar('user_id'),
                'isActive' => true
            ]);

            $activeCart = $this->cartsModel->getActiveCart($this->request->getVar('user_id'));

            $this->cartItemModel->save([
                'cart_id' => $activeCart['id'],
                'book_id' => $this->request->getVar('book_id'),
                'quantity' => $this->request->getVar('quantity')
            ]);

            session()->setFlashdata('success', 'Item added to cart');
            return redirect()->to('/carts');
        } else {

            $isItemExist = $this->cartItemModel->isItemExist($activeCart['id'], $this->request->getVar('book_id'));

            if ($isItemExist) {
                $this->cartItemModel->save([
                    'id' => $isItemExist['id'],
                    'quantity' => $isItemExist['quantity'] + $this->request->getVar('quantity')
                ]);

                session()->setFlashdata('success', 'Item added to cart');
                return redirect()->to('/carts');
            } else {
                $this->cartItemModel->save([
                    'cart_id' => $activeCart['id'],
                    'book_id' => $this->request->getVar('book_id'),
                    'quantity' => $this->request->getVar('quantity')
                ]);

                session()->setFlashdata('success', 'Item added to cart');
                return redirect()->to('/carts');
            }
        }
    }
}
