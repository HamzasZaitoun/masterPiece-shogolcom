<?php

namespace App\Http\Controllers;

use    App\Models\Governate;
use Illuminate\Support\Facades\File;


use App\Http\Requests\storeUserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        //    dd($data);
        // $data=User::find(2);
        // $data->delete();
        // dd($data);

        return view('admin.usersTable.index', compact('data'));
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

    public function getCitiesByGovernate($governorate)
    {
        // Load the JSON file containing cities
        $json = File::get(resource_path('data/cities.json'));
        $cities = json_decode($json, true);

        // Filter cities based on the selected governate
        if (isset($cities[$governorate])) {
            $filteredCities = $cities[$governorate];
        } else {
            $filteredCities = [];
        }

        return response()->json($filteredCities);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(storeUserRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('profilePicture')) {
            $fileName = time() . '.' . $request->profilePicture->extension();
            $request->profilePicture->move(public_path('uploads/users'), $fileName);
            $validatedData['profile_picture'] = $fileName;
        }

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/admin/users/')->with('success', 'User created successfully');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        return view('admin.usersTable.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.usersTable.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(storeUserRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $user = User::findOrFail($id);

        if ($request->hasFile('profilePicture')) {
            if ($user->profile_picture && file_exists(public_path('uploads/users/' . $user->profile_picture))) {
                unlink(public_path('uploads/users/' . $user->profile_picture));
            }

            $fileName = time() . '.' . $request->profilePicture->extension();
            $request->profilePicture->move(public_path('uploads/users'), $fileName);
            $validatedData['profile_picture'] = $fileName;
        }

        $user->update($validatedData);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
};
