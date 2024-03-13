<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('type', 'technologies')->paginate(6);

        return response()->json([
            'success' => true,
            'results' => $posts,
        ]);

        // OPPURE 
            //'code'=> 200, (vuol dire che è vero)
            //'message' => 'success',
            //'results'=> [ 
            //    'posts' => $posts,
            //],
    }

    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return response()->json([
            'success'=> true,
            'results'=> $post,
        ]);
    }
}
