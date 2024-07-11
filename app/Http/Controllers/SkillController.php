<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all();

        return view('admin.skill', [
            'skills' => $skills
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
        $skillData = $request->validate([
            'name' => 'required',
            'level' => 'required',
            'type' => 'required'
        ]);
        
        Skill::create($skillData);

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
            'name' => 'required',
            'level' => 'required',
            'type' => 'required'
        ]);

        $skill = Skill::find($request->id);
        $skill->name = $request->name;
        $skill->level = $request->level;
        $skill->type = $request->type;
        $skill->save();

        return redirect()->back()->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Skill::destroy($request->id);

        return redirect()->back()->with('success', 'Data has been deleted');
    }
}
