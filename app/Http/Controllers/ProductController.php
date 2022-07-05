<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'width' => 'required|numeric|min:2',
            'height' => 'required|numeric|min:2',
            'type' => 'required'
        ]);
        $array = $request->only([
            'name', 'width', 'height', 'type'
        ]);
        $product = Product::create($array);
        return redirect()->route('products.index')
            ->with('success_message', 'Produk baru telah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if (!$product) return redirect()->route('products.index')
            ->with('error_message', 'Barang dengan id '.$id.' tidak ditemukan');
        return view('products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'width' => 'required|numeric|min:2',
            'height' => 'required|numeric|min:2',
            'type' => 'required'
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->width = $request->width;
        $product->height = $request->height;
        $product->type = $request->type;
        $product->save();
        return redirect()->route('products.index')
            ->with('success_message', 'Produk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product) $product->delete();
        return redirect()->route('products.index')
            ->with('success_message', 'Produk berhasil dihapus');
    }
}
