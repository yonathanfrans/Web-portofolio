<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\About;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Contact;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $latesthero = Hero::latest()->first();

        $name = $latesthero->name;
        $parts = explode(' ', $name);
        $firstName = $parts[0];
        $lastName = $parts[1];

        $latestabout = About::latest()->first();
        $aboutContent = $latestabout->content;
        $fullcontentinAbout = strlen($aboutContent)-1;
        $contentPart1 = strlen($aboutContent) > 150 ? substr($aboutContent, 0, 373) : substr($aboutContent, 0, 50);
        $contentPart2 = strlen($aboutContent) > 150 ? substr($aboutContent, 373, $fullcontentinAbout) : substr($aboutContent, 51, $fullcontentinAbout);
        
        
        $skillFrontend = Skill::where('type', 'Frontend Development')->get();
        $skillBackend = Skill::where('type', 'Backend Development')->get();

        $sortProject = Project::orderBy('created_at', 'desc')->get();
        
        $contact = Contact::all();

        




        return view('index', [
            'hero' => $latesthero,
            'hero_firstName' => $firstName,
            'hero_lastName' => $lastName,
            'about' => $latestabout,
            'contentPart1' => $contentPart1,
            'contentPart2' => $contentPart2,
            'skillFrontend' => $skillFrontend,
            'skillBackend' => $skillBackend,
            'projects' => $sortProject,
            'contacts' => $contact

        ]);
    }
}
