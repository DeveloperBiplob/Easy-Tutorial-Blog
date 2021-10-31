<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::get();
        return view('Backend.Pages.Tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Pages.Tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name' => ['required', 'min:2', 'max:50', 'unique:tags,name']]);

        $tag = Tag::create([
            'name' => $request->name,
            'slug' => $request->name
        ]);

        if($tag){
            $this->notification('Data Create Successfully!');
            return redirect()->route('admin.tag.create');
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('Backend.Pages.Tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate(['name' => ['required', 'min:2', 'max:50', "unique:tags,name,{$tag->id}"]]);

        $tag = $tag->update([
            'name' => $request->name,
            'slug' => $request->name
        ]);

        if($tag){
            $this->notification('Data Update Successfully!');
            return redirect()->route('admin.tag.index');
        }else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag = $tag->delete();
        if($tag){
            $this->notification('Data Delete Successfully!');
            return redirect()->route('admin.tag.index');
        }else{
            return back();
        }
    }
}
