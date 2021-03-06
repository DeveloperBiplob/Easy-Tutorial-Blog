<?php

namespace App\Http\Controllers\Backend;

use App\Actions\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

use function Symfony\Component\String\b;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['category', 'author', 'tags'])->latest()->get();
        return view('Backend.Pages.Post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $tags = Tag::get();
        return view('Backend.Pages.Post.create', compact(['categories', 'tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:100', 'min:2', 'unique:posts,title'],
            'category_id' => ['required', 'numeric'],
            'description' => ['required', 'string', 'min:5'],
            'image' => ['required', 'mimes:jpg,jpeg,png,gif,svg'],
        ]);

        $file = $request->file('image');

        $post = Post::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => $request->title,
            'description' => $request->description,
            // 'image' => File::upload($file, 'Post'),
            'image' => $this->upload($file, 'Post'),
        ]);

        if($post){
            $post->tags()->sync($request->tags);
            $this->notification('Data Create Successfullly!');
            return redirect()->route('admin.post.create');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('Backend.Pages.Post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::get();
        $tags = Tag::get();
        $postTags = $this->getIDByFunction($post->tags);
        return view('Backend.Pages.Post.edit', compact(['post', 'categories', 'tags', 'postTags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:100', 'min:2', "unique:posts,title,{$post->id}"],
            'category_id' => ['required', 'numeric'],
            'description' => ['required', 'string', 'min:5'],
            'image' => ['mimes:jpg,jpeg,png,gif,svg'],
        ]);

        $file = $request->file('image');
        $oldImage = $post->image;

        if($request->file('image')){
            if(file_exists($oldImage)){
                // File::deleteFile($oldImage);
                $this->deleteFile($oldImage);
            }

            $post->update([
                'user_id' => auth()->user()->id,
                'category_id' => $request->category_id,
                'title' => $request->title,
                'slug' => $request->title,
                'description' => $request->description,
                // 'image' => File::upload($file, 'Post'),
                'image' => $this->upload($file, 'Post'),
            ]);
        }else{
            $post->update([
                'user_id' => auth()->user()->id,
                'category_id' => $request->category_id,
                'title' => $request->title,
                'slug' => $request->title,
                'description' => $request->description
            ]);
        }
        $post->tags()->sync($request->tags);
        $this->notification('Data Update Successfullly!');
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $tags = $this->getIDByFunction($post->tags);
        // File::deleteFile($post->image);
        $this->deleteFile($post->image);
        $post->tags()->detach($tags);
        $deletePsot = $post->delete();
        if($deletePsot){
            $this->notification('Data Delete Successfully!');
            return redirect()->route('admin.post.index');
        }else{
            return back();
        }

    }

    public function changeStatus(Post $post)
    {
        if($post->status === 'Active'){
            $post->status = 'Inactive';
            $post->save();
            $this->notification('Status Inactive Successfully!');
            return back();
        }else{
            $post->status = 'Active';
            $post->save();
            $this->notification('Status Active Successfully!');
            return back();
        }
    }

    protected function getIDByFunction($items)
    {
        $ids = [];
        foreach ($items as $id) {
            $ids[] = $id->id;
        }

        return $ids;
    }
}
