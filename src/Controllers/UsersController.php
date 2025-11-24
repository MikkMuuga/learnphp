<?php

namespace App\Controllers;

use App\Models\User;

class UsersController
{
    public function __construct()
    {
        if (!auth()) {
            redirect('/login');
            die;
        }
    }

    public function index()
    {
        if (!auth()) {
            view('auth/login-required');
            return;
        }
        $users = User::all();
        view('auth/users', compact('users'));
    }

    public function edit()
    {
        $user = User::find($_GET['id']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user->email = $_POST['email'];
            if (!empty($_POST['password'])) {
                $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            }
            $user->save();
            redirect('/users');
        }
        view('auth/edit', compact('user'));
    }

    public function delete()
    {
        if ($user = User::find($_GET['id'])) {
            $user->delete();
        }
        redirect('/users');
    }
}
