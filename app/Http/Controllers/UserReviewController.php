<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\UserToUserReview;
use Illuminate\Http\Request;
use App\Http\Requests\UserToUserReviewRequest;

class UserReviewController extends Controller
{
    public function index()
    {
        // Get all reviews with related applications
        $reviews = UserToUserReview::with('application')->get();
        $applications = Application::with('user')->get();
        return view('admin.usersReviewsTable.index', compact('reviews'));
    }

    public function create(Request $request)
    {
        $applications = Application::with('user')->get();

        return view('admin.usersReviewsTable.create', compact('applications'));
    }


    public function store(UserToUserReviewRequest $request)
    {
        // Store the new review in the database
        UserToUserReview::create($request->validated());
        return redirect()->route('admin.usersReviews.index')->with('success', 'Review created successfully!');
    }

    public function show($id)
    {
        $review = UserToUserReview::findOrFail($id);
        return view('admin.usersReviewsTable.show', compact('review'));
    }

    public function edit($id)
    {
        $review = UserToUserReview::findOrFail($id);
        $applications = Application::all();
        return view('admin.usersReviewsTable.edit', compact('review', 'applications'));
    }

    public function update(UserToUserReviewRequest $request, $id)
    {
        $review = UserToUserReview::findOrFail($id);
        $review->update($request->validated());
        return redirect()->route('admin.usersReviews.index')->with('success', 'Review updated successfully!');
    }

    public function destroy($id)
    {
        $review = UserToUserReview::findOrFail($id);
        $review->delete();
        return redirect()->route('admin.usersReviews.index')->with('success', 'Review deleted successfully!');
    }
}
