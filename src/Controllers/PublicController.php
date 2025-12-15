<?php

namespace App\Controllers;

class PublicController
{
    public function index()
    {
        $posts = [
            [
                'title' => 'World news 1',
                'published' => '16.09.2025',
                'author' => 'Mikk',
                'body' => 'Some world news body 1'
            ],
            [
                'title' => 'World news 2',
                'published' => '15.09.2025',
                'author' => 'Muuga',
                'body' => 'Some world news body 2'
            ],
            [
                'title' => 'World news 3',
                'published' => '14.09.2025',
                'author' => 'Pets',
                'body' => 'Some world news body 3'
            ],
            [
                'title' => 'World news 4',
                'published' => '13.09.2025',
                'author' => 'John',
                'body' => 'Some world news body 4'
            ],
        ];
        view('index', compact('posts'));
    }

    public function us() {
        $posts = [
            [
                'title' => 'U.S news 1',
                'published' => '16.09.2025',
                'author' => 'Mikk',
                'body' => 'Some U.S news body 1'
            ],
            [
                'title' => 'U.S news 2',
                'published' => '15.09.2025',
                'author' => 'Bergert',
                'body' => 'Some U.S news body 2'
            ],
            [
                'title' => 'U.S news 3',
                'published' => '14.09.2025',
                'author' => 'Pets',
                'body' => 'Some U.S news body 3'
            ],
            [
                'title' => 'U.S news 4',
                'published' => '13.09.2025',
                'author' => 'John',
                'body' => 'Some U.S news body 4'
            ],
        ];
        view('us', compact('posts'));
    }

    public function form(){
        view('form');
    }

    public function answer(){
        dump($_GET);
        dump($_POST);
    }
}

