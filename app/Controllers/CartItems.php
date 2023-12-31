<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CartItems extends BaseController
{
    protected $cartItemModel;
    protected $cartsModel;
    protected $booksModel;

    public function __construct()
    {
        $this->cartItemModel = new \App\Models\CartItemModel();
        $this->cartsModel = new \App\Models\CartModel();
        $this->booksModel = new \App\Models\BooksModel();
    }

    public function saveItem($id)
    {

        // dd($this->request->getVar());

        $book = $this->booksModel->getBookById($id);
        $stock = $book['stock'];

        if ($book['stock'] < 1) {
            session()->setFlashdata('message', 'Book is out of stock');
            return redirect()->to('/books/' . $id);
        } else {

            $this->booksModel->save([
                'id' => $book['id'],
                'stock' => $book['stock'] - 1
            ]);

            $activeCart = $this->cartsModel->getActiveCart($this->request->getVar('user_id'));

            if (!$activeCart) {
                $this->cartsModel->save([
                    'user_id' => $this->request->getVar('user_id'),
                    'isActive' => true,
                ]);

                $activeCart = $this->cartsModel->getActiveCart($this->request->getVar('user_id'));

                $this->cartItemModel->save([
                    'cart_id' => $activeCart['id'],
                    'book_id' => $this->request->getVar('book_id'),
                    'quantity' => $this->request->getVar('quantity')
                ]);

                session()->setFlashdata('message', 'Item added to cart');
                return redirect()->to('/carts');
            } else {

                $isItemExist = $this->cartItemModel->isItemExist($activeCart['id'], $this->request->getVar('book_id'));

                if ($isItemExist) {
                    $this->cartItemModel->save([
                        'id' => $isItemExist['id'],
                        'quantity' => $isItemExist['quantity'] + $this->request->getVar('quantity')
                    ]);

                    session()->setFlashdata('message', 'Item added to cart');
                    return redirect()->to('/carts');
                } else {
                    $this->cartItemModel->save([
                        'cart_id' => $activeCart['id'],
                        'book_id' => $this->request->getVar('book_id'),
                        'quantity' => $this->request->getVar('quantity')
                    ]);

                    session()->setFlashdata('message', 'Item added to cart');
                    return redirect()->to('/carts');
                }
            }
        }
    }

    public function updateItemDecrement($id)
    {
        $item = $this->cartItemModel->find($id);
        $book = $this->booksModel->getBookById($item['book_id']);

        if ($item['quantity'] > 1) {
            $this->cartItemModel->save([
                'id' => $id,
                'quantity' => $item['quantity'] - 1
            ]);
            $this->booksModel->save([
                'id' => $item['book_id'],
                'stock' => $book['stock'] + 1
            ]);
        } else if ($item['quantity'] == 1) {
            session()->setFlashdata('message', 'Click Remove to delete item');
            return redirect()->to('/carts');
        }

        session()->setFlashdata('message', 'Item updated');
        return redirect()->to('/carts');
    }

    public function updateItemIncrement($id)
    {
        $item = $this->cartItemModel->find($id);

        $book = $this->booksModel->find($item['book_id']);

        if ($book['stock'] <= 0) {
            session()->setFlashdata('message', 'Item quantity cannot be more than stock');
            return redirect()->to('/carts');
        }

        $this->cartItemModel->save([
            'id' => $id,
            'quantity' => $item['quantity'] + 1
        ]);

        $this->booksModel->save([
            'id' => $item['book_id'],
            'stock' => $book['stock'] - 1
        ]);

        session()->setFlashdata('message', 'Item updated');
        return redirect()->to('/carts');
    }

    public function updateStockBeforeDeleteItem($id)
    {
        $item = $this->cartItemModel->find($id);

        if (!$item) {
            return redirect()->to('/carts')->with('error', 'Item not found');
        }

        $book = $this->booksModel->getBookById($item['book_id']);

        if (!$book) {
            return redirect()->to('/carts')->with('error', 'Book not found');
        }

        $cartStock = $item['quantity'];
        $stock = $book['stock'] + $cartStock;

        $this->booksModel->save([
            'id' => $book['id'],
            'stock' => (string)$stock
        ]);
        
        return $this->deleteItem($id);
    }

    public function deleteItem($id)
    {
        $this->cartItemModel->delete($id);
        return redirect()->to('/carts')->with('message', 'Item deleted from cart');
    }
}
