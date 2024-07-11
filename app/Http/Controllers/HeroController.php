<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heros = Hero::all();

        return view('admin.hero', [
            'heros' => $heros
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
        $heroData = $request->validate([
            'name' => 'required',
            'content' => 'required'
        ]);

        Hero::create($heroData);

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
        // dd($id);
        $request->validate([
            'id' => '',
            'name' => 'required',
            'content' => 'required'
        ]);

        $hero = Hero::find($request->id);
        $hero->name = $request->name;
        $hero->content = $request->content;
        $hero->save();

        return redirect()->back()->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // dd($request);
        Hero::destroy($request->id);

        return redirect()->back()->with('success', 'Data has been deleted');
    }
}
