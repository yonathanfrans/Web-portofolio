<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::all();

        return view('admin.about', [
            'abouts' => $abouts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $aboutData = $request->validate([
            'achievement' => 'required',
            'path' => 'required',
            'content' => 'required'
        ]);
        
        $fileName = time().'.'.$request->path->extension();  
        $request->path->move(public_path('assets/file'), $fileName);
        $request->path = 'assets/file/'. $fileName;

        $aboutData['path'] = $request->path;
        
        About::create($aboutData);

        return redirect()->back()->with('success', 'Data created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => '',
            'achievement' => 'required',
            'content' => 'required'
        ]);


        $fileName = time().'.'.$request->path->extension();  
        $request->path->move(public_path('assets/file'), $fileName);

        $about = About::find($request->id);
        $about->achievement = $request->achievement;
        $about->path = 'assets/file/'. $fileName;
        $about->content = $request->content;
        $about->save();

        return redirect()->back()->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        About::destroy($request->id);

        return redirect()->back()->with('success', 'Data has been deleted');
    }
}
