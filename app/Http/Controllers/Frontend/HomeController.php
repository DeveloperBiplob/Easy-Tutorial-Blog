<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Subscriber;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $date = [];
        $data['randPosts'] = Post::with('author', 'category')->inRandomOrder()->take(6)->get();
        $data['latestPosts'] = Post::with('category', 'author', 'tags')->latest()->limit(3)->get();
        $data['categories'] = Category::get();
        $data['tags'] = Tag::get();
        return view('Frontend.Pages.home', $data);
    }

    public function subscriber(Request $request)
    {
        $request->validate(['email' => ['required', 'email', 'unique:subscribers,email']]);

        Subscriber::create($request->only(['email']));
    }
    public function search($query)
    {
        // info($query);
        return Post::withOnly('author')->where('title', 'like', "%$query%")->get(['title', 'slug', 'user_id']);
    }
}
