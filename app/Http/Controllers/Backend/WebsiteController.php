<?php

namespace App\Http\Controllers\Backend;

use App\Actions\File;
use App\Http\Controllers\Controller;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websites = Website::get();
        return view('Backend.Pages.Website.index', compact('websites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Website $website)
    {
        return view('Backend.Pages.Website.edit', compact('website'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Website $website)
    {
        // return $request->all();
        $request->validate([
            'title' => ['max:20', 'min:5'],
            'logo' => ['mimes:png,jpg'],
            'address' => ['required', 'max:200'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'footer' => ['required', 'max:100'],
        ]);

        if($request->has('logo')){
            File::deleteFile($website->logo);

            $website->update([
                'title' => $request->title,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'behance' => $request->behance,
                'footer' => $request->footer,
                'logo' => File::upload($request->file('logo'), 'Website')
            ]);
        }else{
            $website->update([
                'title' => $request->title,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'behance' => $request->behance,
                'footer' => $request->footer
            ]);
        }

        if($website){
            $this->notification('Webstie Information Update Successfully!');
            return redirect()->route('admin.website.index');
        }else{
            // return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
