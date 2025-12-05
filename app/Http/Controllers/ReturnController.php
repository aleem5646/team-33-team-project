<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function showForm()
    {
        return view('pages.return');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'order_number' => 'required',
            'comment' => 'required',
            'terms' => 'accepted',
        ]);

        return back()->with('status', 'Return submitted.');
    }
}
