<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.project', [
            'projects' => $projects
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
        $projectData = $request->validate([
            'title' => 'required',
            'tools' => 'required',
            'content' => 'required',
            'link' => 'required'
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('assets/img'), $imageName);
        $request->image = 'assets/img/'. $imageName;
        $request->tools = $request->finalCreateTool;
        
        $projectData['image'] = $request->image;
        $projectData['tools'] = $request->tools;

        Project::create($projectData);

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
            'title' => 'required',
            'tools' => 'required',
            'content' => 'required',
            'link' => 'required'
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('assets/img'), $imageName);


        $project = Project::find($request->id);
        $project->title = $request->title;
        $project->tools = $request->finalEditTool;
        $project->content = $request->content;
        $project->link = $request->link;
        $project->image = 'assets/img/'. $imageName;
        $project->save();

        return redirect()->back()->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Project::destroy($request->id);

        return redirect()->back()->with('success', 'Data has been deleted');
    }
}
