<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->paginate(10);

        return view('dashboard.reviews.index', compact('reviews'));
    }

    public function edit(Review $review)
    {
        return view('dashboard.reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'product' => 'required|string|max:255',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $review->update($validated);

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Review updated successfully.');
    }
}