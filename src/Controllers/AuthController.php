<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
    public function __construct()
    {
        if (in_array($_SERVER['REQUEST_URI'], ['/users', '/users/edit', '/users/delete'])) {
            if (!auth()) {
                redirect('/login');
                die;
            }
        }
    }
    public function registerForm()
    {
       view('auth/register');
    }

    public function register(){
        $user = User::where('email', $_POST['email'])[0] ?? null;
        if($user || $_POST['password'] !== $_POST['password_confirm']) {
            return redirect('/register');
        }
        $user = new User();
        $user->email = $_POST['email'];
        $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $user->save();
        redirect('/login');
    }

    public function loginForm() {
        view('auth/login');
    }

    public function login() {
        $user = User::where('email', $_POST['email'])[0] ?? null;
        if(!$user || !password_verify($_POST['password'], $user->password)) {
            return redirect('/login');
        }
        $_SESSION['userID'] = $user->id;
        redirect('/');
    }

    public function logout() {
        unset($_SESSION['userID']);
        redirect('/');
    }

    public function users() {
        $users = User::all();
        view('auth/users', compact('users'));
    }

    public function editUser() {
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

    public function deleteUser() {
        if ($user = User::find($_GET['id'])) {
            $user->delete();
        }
        redirect('/users');
    }
}
