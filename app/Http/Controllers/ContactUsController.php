<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactUsController extends Controller
{
    /**
     * Ensure only authenticated users can access these routes.
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a paginated listing of the resource.
     */
    public function index()
    {
        $contacts = ContactUs::paginate(10); // Fetch 10 records per page
        return view('admin.contactUsTable.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contactUsTable.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        // Save the validated data
        ContactUs::create($request->validated());

        // Redirect with success message
        return redirect()->route('admin.contactUs.index')->with('success', 'Message created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contact = ContactUs::findOrFail($id);
        return view('admin.contactUsTable.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contact = ContactUs::findOrFail($id);
        return view('admin.contactUsTable.update', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, $id)
    {
        $contact = ContactUs::findOrFail($id);

        // Debugging: Check incoming data
        $validatedData = $request->validated();
        $validatedData['responded_at'] = now();

        // Debugging: Check before update
        logger('Updating ContactUs:', $validatedData);

        // Update contact message
        $contact->update($validatedData);

        // Redirect with success message
        return redirect()->route('admin.contactUs.index')->with('success', 'Message updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contact = ContactUs::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contactUs.index')->with('success', 'Message deleted successfully.');
    }
}
