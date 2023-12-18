<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StoreController extends Controller
{

    public function report()
    {
        return view('dashboard', [
            'salesToday' => DB::table('sales')->whereDate('created_at', today())->sum('price'),
            'salesYesterday' => DB::table('sales')->whereDate('created_at', today()->subDay())->sum('price'),
            'salesThisMonth' => DB::table('sales')->whereMonth('created_at', today())->sum('price'),
            'salesLastMonth' => DB::table('sales')->whereMonth('created_at', today()->subMonth())->sum('price'),
        ]);
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        DB::table('products')->insert([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        return redirect()->route('dashboard');
    }

    public function showStore()
    {
        $products = DB::table('products')->get();

        return view('store', ['products' => $products]);
    }

    public function saleProduct($id)
    {
        
        $product = DB::table('products')->where('id', $id)->first();
        if ($product->quantity > 0) {
            
            DB::table('sales')->insert([
                'product_name' => $product->name,
                'quantity' => 1,  
                'price' => $product->price,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            
            DB::table('products')->where('id', $id)->decrement('quantity', 1);

            return redirect()->route('store')->with('success', 'Product sold successfully!');
        } else {
            return redirect()->route('store')->with('error', 'Not enough quantity to sell!');
        }
    }


    public function editProduct($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        return view('edit-product', ['product' => $product]);
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        DB::table('products')->where('id', $id)->update([
            'price' => $request->input('price'),
            'quantity' => DB::raw('quantity + ' . $request->input('quantity',default:0)),
            'updated_at' => now(),
        ]);

        return redirect()->route('store')->with('success', 'Product updated successfully!');
    }

    public function deleteProduct($id)
    {
        DB::table('products')->where('id', $id)->delete();

        return redirect()->route('store')->with('success', 'Product deleted successfully!');
    }


}
    