<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    public function index ()
    {
        $products = Product::where('active', 1)
                           ->latest()
                           ->paginate(50);
        $count = 1;

        return view('products.index', compact('products', 'count'));
    }

    public function create ()
    {
        return view('products.create', compact('title'));
    }

    public function store (ProductAddRequest $request)
    {
        $product = new Product();
        $product->storeId = $request->get('storeId');
        $product->idCatalog = $request->get('idCatalog');
        $product->vendorId = $request->get('vendorId');
        $product->model = $request->get('model');
        $product->product_url = $request->get('product_url');
        $product->product_name = $request->get('product_name');
        $product->ship_weight = $request->get('ship_weight');
        $product->productCost = $request->get('productCost');
        $product->mcategory = $request->get('mcategory');
        $product->cat = $request->get('cat');
        $product->sub = $request->get('sub');
        $product->price = $request->get('price');
        $product->sale_price = $request->get('sale_price');
        $product->wPrice = $request->get('wPrice');
        $product->taxable = $request->get('taxable');
        $product->upc = $request->get('upc');
        $product->brand = $request->get('brand');
        $product->ASIN = $request->get('ASIN');
        $product->su_code = $request->get('su_code');
        $product->acct_code = $request->get('acct_code');
        $product->product_condition = $request->get('product_condition');
        $product->image_url_4P = $request->get('image_url_4P');
        $product->inset_url = $request->get('inset_url');
        $product->save();

        return redirect(url('products'));
    }

    public function show ($id)
    {
        // if searching for inactive or deleted product
        $product = Product::where('active', 1)
                          ->find($id);
        if ( !$product ) {
            return view('errors.404');
        }

        return view('products.show', compact('product'));
    }

    public function edit ($id)
    {
        // if searching for inactive or deleted product
        $product = Product::where('active', 1)
                          ->find($id);
        if ( !$product ) {
            return view('errors.404');
        }

        return view('products.edit', compact('product'));
    }

    public function update (ProductUpdateRequest $request, $id)
    {
        $product = Product::where('active', 1)
                          ->find($id);
        if ( !$product ) {
            return view('errors.404');
        }

        $product->storeId = $request->get('storeId');
        $product->idCatalog = $request->get('idCatalog');
        $product->vendorId = $request->get('vendorId');
        $product->model = $request->get('model');
        $product->product_url = $request->get('product_url');
        $product->product_name = $request->get('product_name');
        $product->ship_weight = $request->get('ship_weight');
        $product->productCost = $request->get('productCost');
        $product->mcategory = $request->get('mcategory');
        $product->cat = $request->get('cat');
        $product->sub = $request->get('sub');
        $product->price = $request->get('price');
        $product->sale_price = $request->get('sale_price');
        $product->wPrice = $request->get('wPrice');
        $product->taxable = $request->get('taxable');
        $product->upc = $request->get('upc');
        $product->brand = $request->get('brand');
        $product->ASIN = $request->get('ASIN');
        $product->su_code = $request->get('su_code');
        $product->acct_code = $request->get('acct_code');
        $product->product_condition = $request->get('product_condition');
        $product->image_url_4P = $request->get('image_url_4P');
        $product->inset_url = $request->get('inset_url');
        $product->save();

        return redirect(url('products'));
    }

    public function destroy ($id)
    {
        $product = Product::where('active', 1)
                          ->find($id);
        if ( !$product ) {
            return view('errors.404');
        }

        $product->active = 0;
        $product->save();

        return redirect(url('products'));
    }
}
