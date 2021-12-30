<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;

class AddressController extends Controller
{
    protected function create(){
        $user = User::findOrFail(1);
        $post = new Post(['title'=>'My first post 2', 'body'=>'I love laravel 2']);
        $user->posts()->save($post);
    }

    protected function read(){
        $user = User::findOrFail(1);
        foreach ($user->posts as $post) {
            echo $post->title.'<br>';
        }
    }

    protected function update(){
        $user = User::find(1);
        $user->posts()->where('id', '=', '2')->update(['title'=>'I love 2', 'body'=>'This is awesome 2']);
    }

    protected function delete(){
        $user = User::find(1);
        $user->posts()->where('id', 1)->delete();
    }
}
