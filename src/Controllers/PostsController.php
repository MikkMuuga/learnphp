<?php

namespace App\Controllers;

use App\DB;
use App\Models\Post;
use App\Models\User;

class PostsController
{
    public function __construct()
    {  
    }

    public function index()
    {
       $posts = Post::all();
       foreach ($posts as $p) {
           $p->author = null;
           if (!empty($p->user_id)) {
               $p->author = User::find($p->user_id);
           }
       }
       view('posts/index', compact('posts'));
    }

    public function create() {
        if (!auth()) {
            redirect('/login');
            die;
        }
        view('posts/create');
    }

    public function store() {
        if (!auth()) {
            redirect('/login');
            die;
        }
        $from = $_FILES['image']['tmp_name'];
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        do {
            $name = md5($_FILES['image']['name'] . microtime() . rand(PHP_INT_MIN, PHP_INT_MAX)) . '.' . $ext;
        } while(file_exists(__DIR__ . '/../../public/uploads/' . $name));
        $to = __DIR__ . '/../../public/uploads/' . $name;
        move_uploaded_file($from, $to);

        $post = new Post();
        $post->title = $_POST['title'];
        $post->body = $_POST['body'];
        $post->user_id = $_SESSION['userID'] ?? null;
        $post->save();
        redirect('/posts');
    }

    public function view() {
        $post = Post::find($_GET['id']);
        $post->author = null;
        if (!empty($post->user_id)) {
            $post->author = User::find($post->user_id);
        }
        view('posts/view', compact('post'));
    }

    public function edit() {
        if (!auth()) {
            redirect('/login');
            die;
        }
        $post = Post::find($_GET['id']);
        view('posts/edit', compact('post'));
    }

    public function update() {
        if (!auth()) {
            redirect('/login');
            die;
        }
        $post = Post::find($_GET['id']);
        $post->title = $_POST['title'];
        $post->body = $_POST['body'];
        $post->save();
        redirect('/posts');
    }

    public function destroy() {
        if (!auth()) {
            redirect('/login');
            die;
        }
        $post = Post::find($_GET['id']);
        $post->delete();
        redirect('/posts');
    }
}
