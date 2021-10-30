<?php

namespace App\Http\Controllers\Backend;

use App\Actions\File;
use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $abouts = AboutUs::get();
        return view('Backend.Pages.About-us.index', compact('abouts'));
    }

    public function edit(AboutUs $about_u)
    {
        return view('Backend.Pages.About-us.edit', compact('about_u'));
    }

    public function update(Request $request, AboutUs $about_u)
    {
        // return $request->all();
        $request->validate([
            'title'=> ['required', 'string', 'max:100', 'min:5'],
            'description'=> ['required'],
            'image'=> ['mimes:png,jpg']
        ]);

        $about_u-> title = $request->title;
        $about_u-> description = $request->description;
        if($request->has('image')){
            $about_u->image = File::deleteFile($about_u->image);
            $about_u->image = File::upload($request->file('image'), 'About-us');
        }

        $about_u->save();
        $this->notification('Information Update Successfully!');
        return redirect()->route('admin.about-us.index');
    }
}
