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
        $user = User::findOrFail(auth()->user()->id);
        return view('admin.adminsTable.profile', compact('user'));
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
    public function updateStatus(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'account_status' => 'required|in:active,banned,suspended',
        ]);

        // Find the user and update the account status
        $user = User::findOrFail($id);
        $user->account_status = $request->account_status;
        $user->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Account status updated successfully.');
    }
    public function editProfile()
    {
        $user = auth()->user();
        return view('admin.adminsTable.update', compact('user')); // Ensure the correct view is returned
    }


    public function updateProfile(Request $request)
    {
        $user = auth()->user(); // Ensure it's a User model instance

        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'mobile_number' => ['nullable', 'string', 'max:15'],
            'birth_date' => ['nullable', 'date'],
            'profile_picture' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'user_governorate' => ['required', 'string', 'max:255'],
            'user_city' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:255'],
        ]);


        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if it exists
            if ($user->profile_picture && file_exists(public_path('uploads/users/' . $user->profile_picture))) {
                unlink(public_path('uploads/users/' . $user->profile_picture));
            }

            // Upload new profile picture
            $fileName = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('uploads/users'), $fileName);
            $validatedData['profile_picture'] = $fileName;
        }

        // ✅ Ensure $user is an instance of User before calling update
        if ($user instanceof \App\Models\User) {
            $user->update($validatedData);
        } else {
            return redirect()->back()->withErrors(['error' => 'User not found.']);
        }

        return redirect()->route('admin.users.adminProfile')->with('success', 'Profile updated successfully.');
    }
    
};