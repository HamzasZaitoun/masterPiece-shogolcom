<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Governorate;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function show(Request $request): View
    {
        // dd($request->user());
        $userPosts = Job::where('user_id', $request->user()->id)->paginate(5);
        return view('user.profile.profile', [
            'user' => $request->user(),
            'userPosts'=>$userPosts,
        ]);
    }


    public function edit(Request $request): View
    {
        $governorates=Governorate::all();
        return view('user.profile.edit',
         [ 'governorates' => $governorates,
            'user' => $request->user(),
         ]
    );
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
{
    // Validate the incoming request
    $validated = $request->validate([
        'first_name' => 'nullable|string|max:255',
        'last_name' => 'nullable|string|max:255',
        'mobile_number' => 'nullable|regex:/^07\d{8}$/',
        'email' => 'nullable|email|unique:users,email,' . $request->user()->id,
        'bio' => 'nullable|string',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image upload
        'user_governorate' => 'nullable|string|max:255',
        'user_city' => 'nullable|string|max:255',
    ]);

    // Fill the user data with the validated data
    $user = $request->user();
    $user->fill($validated);

    // Check if the email has been modified and set email_verified_at to null
    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    // Handle profile picture upload if a new picture is provided
    if ($request->hasFile('profile_picture')) {
        // Get the uploaded file
        $profilePicture = $request->file('profile_picture');
        
        // Create a new filename using a timestamp to avoid conflicts
        $fileName = time() . '.' . $profilePicture->getClientOriginalExtension();
        
        // Move the file to the 'uploads/users' directory
        $profilePicture->move(public_path('uploads/users'), $fileName);
        
        // Update the user's profile picture in the database
        $user->profile_picture = $fileName;
    }

    // Save the updated user data
    $user->save();

    // Redirect back to the profile edit page with a success message
    return Redirect::route('profile')->with('status', 'profile-updated');
}

public function showProfile($id)
{
    $user = User::findOrFail($id);
    $userPosts = Job::where('user_id', $user->id)->paginate(5);
    // dd($user);
        return view('user.profile.profile', [
            'user' => $user,
            'userPosts'=>$userPosts,
        ]);
}


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
