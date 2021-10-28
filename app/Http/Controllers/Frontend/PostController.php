<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function singlePost(Post $post)
    {
        $date = [];
        $data['latestPosts'] = Post::with('category', 'author', 'tags')->latest()->limit(3)->get();
        $data['categories'] = Category::get();
        $data['tags'] = Tag::get();
        return view('Frontend.Pages.single_post', $data , compact('post'));
    }

    public function comment(Request $request, Post $post)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50', 'min:2'],
            'email' => ['required', 'email', 'max:50'],
            'subject' => ['max:100'],
            'comment' => ['required', 'string', 'min:2', 'max:1000'],
        ]);

        $commentExistOrNots = $post->comments()->get();
        foreach($commentExistOrNots as $commentExistOrNot){
            $email =  $commentExistOrNot->email;
        }
        if($email === $request->email){
            session()->flash('warning', 'You are already Commented!');
        }else{
            $post->comments()->create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'comment' => $request->comment
            ]);
            session()->flash('success', 'Comment Added Successfully!');
        }

        return back();
    }
}
