<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Users extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new \App\Models\UserModel();
    }

    public function viewSignin()
    {
        $data = [
            'title' => 'Sign In | JustBookStore',
            'page' => 'sign in'
        ];
        return view('users/signin', $data);
    }

    public function viewSignup()
    {
        $data = [
            'title' => 'Sign Up | JustBookStore',
            'page' => 'sign up'
        ];
        return view('users/signup', $data);
    }

    public function signUp()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'firstName' => [
                'rules' => 'required|alpha|max_length[32]',
                'errors' => [
                    'required' => 'First name is required',
                    'alpha' => 'First name must be alphabetic',
                    'max_length' => 'First name must be less than 32 characters'
                ]
            ],
            'lastName' => [
                'rules' => 'required|alpha|max_length[32]',
                'errors' => [
                    'required' => 'Last name is required',
                    'alpha' => 'Last name must be alphabetic',
                    'max_length' => 'Last name must be less than 32 characters'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'erros' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Email is not valid',
                    'is_unique' => 'Email has already been registered'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]|alpha_numeric',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must be at least 8 characters',
                    'alpha_numeric' => 'Password must be alphanumeric'
                ]
            ],
            'repeatPassword' => [
                'rules' => 'required|matches[password]|alpha_numeric',
                'errors' => [
                    'required' => 'Password is required',
                    'matches' => 'Password does not match',
                    'alpha_numeric' => 'Password must be alphanumeric'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('validation_errors', $validation->getErrors());
            return redirect()->to('/signup')->withInput();
        }

        $this->userModel->save([
            'firstName' => $this->request->getVar('firstName'),
            'lastName' => $this->request->getVar('lastName'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'isAdmin' => $this->request->getVar('isAdmin')
        ]);

        session()->setFlashdata('message', 'Sign up successful');
        return redirect()->to('/signin');
    }

    public function signIn()
    {

        $validation = \Config\Services::validation();

        $rules = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Email is not valid'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must be at least 8 characters',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('validation_errors', $validation->getErrors());
            return redirect()->to('/signin')->withInput();
        }

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $this->userModel->getUser($email);

        if ($user) {
            if ($user['password'] == $password) {
                session()->set('user', $user);
                session()->setFlashdata('message', 'Welcome to JustBookStore');
                return redirect()->to('/books');
            } else {
                session()->setFlashdata('error', 'Email or Password is incorrect');
                return redirect()->to('/signin')->withInput();
            }
        } else {
            session()->setFlashdata('error', 'Email or Password is incorrect');
            return redirect()->to('/signin')->withInput();
        }
    }

    public function signOut()
    {
        session()->destroy();
        return redirect()->to('/signin');
    }

    public function signInFirst()
    {
        session()->setFlashdata('message', 'You have to sign in first to add to cart or buy the book');
        return redirect()->to('/signin');
    }
}
