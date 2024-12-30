<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\Review;
class UserContactController extends Controller
{
   public function show()
   {
    
    return view('user.contact.contact');
   }
   
   public function store(Request $request)
   {
      $validatedData = $request->validate([
         'full_name' => 'nullable|string|max:255',
         'user_id'   => 'nullable|integer',
         'email'     => 'required|email|max:255',
         'category'  => 'required|string|max:255',
         'message'   => 'required|string|max:1000',
     ]);

    

     if ($request->input('category') != "Review")
     {
        $contact = new ContactUs;
        if (auth()->check()) {
            $contact->user_id = auth()->user()->id;
            $contact->email = auth()->user()->email;
        } else {
            $contact->name = $request->input('full_name');
            $contact->email = $request->input('email');
        }
       
       
        $contact->category = $request->input('category');
        $contact->message = $request->input('message');
   
        // Save the contact entry
        $contact->save();
   
        // Redirect or respond after successful submission
        return redirect()->back()->with('success', 'Your message has been sent successfully!');

      
     }
     else 
     {
      $review=new Review;
      $review->user_id=auth()->user()->id;
      $review->rating=$request->input('rating');
      $review->review_text = $request->input('message');
      $review->created_at=now();

      $review->save();
      return redirect()->back()->with('success', 'review submitted successfully!');
     }

   }
}
