<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $products = DB::table('products') // Menggunakan query builder Laravel utk access tabel products di database
        ->when($request->input('name'), function($query, $name){
            return $query->where('name', 'like', '%' . $name . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate(10);

        return view('pages.products.index', compact('products'));
    }

    public function create()
    {
        return view('pages.products.create');
    }

    public function store(Request $request)
    {

        // dd($request->file('image'));


        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                'category' => 'required|in:food,drink,snack',
                'stock' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

        $filename = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/products', $filename);


        $data = $request->all();
        $data['image'] = $filename;
        Product::create($data);

        return redirect()->route('product.index')->with('success', 'Product successfully created');

        }catch (\Throwable $th) {
        return redirect()->route('product.index')->with('error', $th->getMessage());

        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // dd($request->input('category'));

        $data = $request->all();
        $product->update($data);
        return redirect()->route('product.index')->with('success', 'Product successfully updated');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            $imagePath = storage_path('app/public/products/' . $product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product successfully deleted');
    }

}
