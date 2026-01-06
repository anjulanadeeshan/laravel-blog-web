<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    public function createPost(Request $request) {
        $incommingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incommingFields['title'] = strip_tags($incommingFields['title']);
        $incommingFields['body'] = strip_tags($incommingFields['body']);
        $incommingFields['user_id'] = auth()->id();

        Post::create($incommingFields);
        return redirect('/');
    }
}