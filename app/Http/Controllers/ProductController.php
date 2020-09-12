<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProduct;
use function GuzzleHttp\Promise\all;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $products = Product::where('name', 'LIKE', '%'.$search.'%')->paginate(20);
        return view('product.index', compact('products', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
//        dd($request->all());
        $path = $request->file('photo')->store('public/images');
//        $request['photo'] = $path;
        if ($path):
            $product = Product::create([
                "name"=>$request->name,
                    "description"=>$request->description,
                    "amount"=>$request->amount,
                    "photo"=>$path,
                    "value"=>$request->value,
                    "category_id"=>$request->category_id
                ]);
        endif;
        return redirect("products");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit')->with('product', $product)->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           Product::find($id)
            ->update($request->all());
        return redirect("products/".$id."/edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->photo);
        $product->delete();
        return redirect("products");
    }
}
