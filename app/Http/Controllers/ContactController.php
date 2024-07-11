<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();

        return view('admin.contact', [
            'contacts' => $contacts
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
        $contactData = $request->validate([
            'icon' => 'required',
            'name' => 'required',
            'link' => 'required'
        ]);

        $request->icon = $request->finalCreateSocial;
        
        $contactData['icon'] = $request->icon;

        Contact::create($contactData);

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
            'icon' => 'required',
            'name' => 'required',
            'link' => 'required'
        ]);

        $contact = Contact::find($request->id);
        $contact->icon = $request->finalEditSocial;
        $contact->name = $request->name;
        $contact->link = $request->link;
        $contact->save();

        return redirect()->back()->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Contact::destroy($request->id);

        return redirect()->back()->with('success', 'Data has been deleted');
    }
}
