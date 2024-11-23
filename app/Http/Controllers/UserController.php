<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            return view('admin.usersTable.index'); 
    }
    public function adminProfile()
    {
            return view('admin.adminsTable.profile'); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.usersTable.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeUserRequest $request)
    {
        $validatedData=$request->validated();
    //    $request->validate([
    //     'firstName'=>['required','string','min:4','max:20'],

    //    ]); 
       dd($validatedData);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
