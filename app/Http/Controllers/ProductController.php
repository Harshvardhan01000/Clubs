<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductValidationRequest;
use App\Models\Club;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Product::with('club')->get();
            $view =  View::make('Product', compact('data'))->render();
            return response($view);
        } catch (Exception $e) {
            return response($e);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Club::get();
        return view('AddProductForm', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductValidationRequest $request)
    {
        Product::create([
            'club_id' => $request->club_id,
            'title' => $request->title,
            'product_title' => $request->product_title,
            'type' => $request->type
        ]);
        // return redirect()->route('product.index');
        return response('true');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Product::find($id);
        return response($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductValidationRequest $request, string $id)
    {
        Product::find($id)->update([
            'club_id' => $request->club_id,
            'title' => $request->title,
            'product_title' => $request->product_title,
            'type' => $request->type,
        ]);
        return response(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::find($id)->delete();
        return response(true);
    }
}
