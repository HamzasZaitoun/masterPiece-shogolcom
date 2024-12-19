<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class WebsiteReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('user')->get();
        return view('admin.websiteReviewsTable.index', compact('reviews'));
    }

    public function create()
    {
        return view('admin.websiteReviewsTable.create');
    }

    public function store(ReviewRequest $request)
    {
        Review::create($request->validated());
        return redirect()->route('admin.websiteReviews.index')->with('success', 'Review created successfully.');
    }

    public function show(Review $review)
    {
        return view('admin.websiteReviewsTable.show', compact('review'));
    }

    public function edit(Review $review)
    {
        return view('admin.websiteReviewsTable.update', compact('review'));
    }

    public function update(ReviewRequest $request, Review $review)
    {
        $review->update($request->validated());
        return redirect()->route('admin.websiteReviews.index')->with('success', 'Review updated successfully.');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.websiteReviews.index')->with('success', 'Review deleted successfully.');
    }
}
