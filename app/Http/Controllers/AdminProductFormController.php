<?php

namespace App\Http\Controllers;

class AdminProductFormController extends Controller
{
    public function create()
    {
        return view('admin.product-form', [
            'mode' => 'create',
            'product' => null
        ]);
    }

    public function edit($id)
    {
        include resource_path('views/data/products.blade.php');

        if (!isset($products[$id])) {
            abort(404);
        }

        return view('admin.product-form', [
            'mode' => 'edit',
            'product' => $products[$id]
        ]);
    }
}
