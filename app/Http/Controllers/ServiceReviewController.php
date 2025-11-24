<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceReview;

class ServiceReviewController extends Controller
{
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'login to review.');
        }

        $validated = $request->validate([
            'rating' => ['required', 'integer', 'between:1,5'],
            'review' => ['required', 'string', 'max:1000'],
        ]);
        ServiceReview::create([
            'userId' => Auth::id(),
            'rating' => $validated['rating'],
            'review' => $validated['review'],
        ]);
        return back()->with('success',);
    }
}
