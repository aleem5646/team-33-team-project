<?php

namespace App\Http\Controllers;

use App\Models\Review; 
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([

            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:2000',
        ]);



        Review::create([

            'user_id' => auth()->id(),

            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'review' => $request->review,

        ]);

        

        return back()->with('success', 'Review submitted.');
    }
}