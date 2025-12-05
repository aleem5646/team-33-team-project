<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductListingController extends Controller
{
   public function index(Request $request)
{
    $query = Product::with('category', 'filters');
    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where('name', 'like', "%{$search}%");
    }
    if ($request->filled('category')) {
        $query->where('categoryId', $request->input('category'));
    }
    if ($request->filled('filters')) {
    $filterIds = array_values($request->input('filters'));
    foreach ($filterIds as $fid) {
        $query->whereHas('filters', function ($q) use ($fid) {
            $q->where('filters.filterId', $fid);
        });
    }
}
    $products = $query->paginate(9)->withQueryString();

    return view('pages.auth.product-listing', compact('products'));
}
    public function show($id)
    {
        $product = Product::where('productId', $id)->firstOrFail();
        return view('pages.auth.product-detail', compact('product'));
    }
}
