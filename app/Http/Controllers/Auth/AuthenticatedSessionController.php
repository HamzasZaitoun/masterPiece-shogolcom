<?php

namespace App\Http\Controllers\Auth;


use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;

class AuthenticatedSessionController extends Controller
{

  public function create(): View{
      return view('auth.login');}



  public function store(Request $request){$credentials = $request->only('email', 'password');

        // Validate the incoming request data
        $validator = Validator::make($credentials, [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt($credentials)) {
            // Successful login
            $request->session()->regenerate();

            if (Auth::user()->role ==='admin') {
                return redirect()->route('admin.dashboard'); 
            }

            return redirect()->route('home'); 
        }

        // If the credentials are incorrect, or the user is not found
        return back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }


    
  public function destroy(Request $request): RedirectResponse{Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}