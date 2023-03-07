<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MainConroller extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        $this->filter($request, $query);
        return view('index', [
            'max_price' => Product::max('price'),
            'session_count' => Cart::instance('default')->count(),
            'products' => $query->get(),
            'categories' => Category::get(),
        ]);
    }

    public function category(Request $request)
    {
        $category = Category::where('name', $request->category)->first();
        $query = Product::query()->where('category_id', $category->id);
        $this->filter($request, $query);
        return view('category', [
            'max_price' => Product::max('price'),
            'session_count' => Cart::instance('default')->count(),
            'category' => $category,
            'products' => $query->get(),
            'categories' => Category::get(),
        ]);
    }

    public function productCart($category, $product)
    {
        return view('product_cart', [
            'session_count' => Cart::instance('default')->count(),
            'categories' => Category::get(),
            'product' => Product::where('code', $product)->first(),
        ]);
    }

    public function filter($request, $query)
    {
        Session::put('old_name', ['name' => $request->name, 'max' => $request->price_max, 'min' => $request->price_min]);
        $data = $request->validate([
            'name' => 'string|max:255|nullable',
        ]);
        if (isset($data['name'])) {
            $query->where('name', 'like', "%{$data['name']}%");
        }
        if (isset($request->price_min) && isset($request->price_max)) {
            $query->whereBetween('price', [$request->price_min, $request->price_max]);
        }
        return $query;
    }
}
