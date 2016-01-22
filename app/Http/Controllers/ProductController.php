<?php

namespace App\Http\Controllers;

use App\BatchRoute;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\MessageBag;

class ProductController extends Controller
{
    public function index (Request $request)
    {
        $products = Product::with('batch_route')
                           ->where('is_deleted', 0)
                           ->search($request->get('search_in'), $request->get('search_for'))
                           ->latest()
                           ->paginate(50);

        $batch_routes = BatchRoute::where('is_deleted', 0)
                                  ->lists('batch_code', 'id');

        $batch_routes->prepend('Not selected', 'null');
        $count = 1;

        $search_in = Product::$searchable_fields;
        return view('products.index', compact('products', 'count', 'batch_routes', 'request', 'search_in'));
    }

    public function create ()
    {
        $batch_routes = BatchRoute::where('is_deleted', 0)
                                  ->lists('batch_code', 'id');
        $is_taxable = [
            '1' => 'Yes',
            '0' => 'No',
        ];

        return view('products.create', compact('title', 'batch_routes', 'is_taxable'));
    }

    public function store (ProductAddRequest $request)
    {
        $product = new Product();
        $product->store_id = $request->get('store_id');
        $product->id_catalog = $request->get('id_catalog');
        $product->product_name = $request->get('product_name');
        $product->product_model = $request->get('product_model');
        $product->product_keywords = $request->get('product_keywords');
        $product->product_description = $request->get('product_description');
        $product->product_category = $request->get('product_category');
        $product->product_price = $request->get('product_price');
        $product->product_url = $request->get('product_url');
        $product->product_thumb = $request->get('product_thumb');
        $product->batch_route_id = $request->get('batch_route_id');
        $product->is_taxable = $request->get('is_taxable');
        /*$product->sale_price = $request->get('sale_price');
        $product->wPrice = $request->get('wPrice');
        $product->taxable = $request->get('taxable');
        $product->upc = $request->get('upc');
        $product->brand = $request->get('brand');
        $product->ASIN = $request->get('ASIN');
        $product->su_code = $request->get('su_code');
        $product->acct_code = $request->get('acct_code');
        $product->product_condition = $request->get('product_condition');
        $product->image_url_4P = $request->get('image_url_4P');
        $product->inset_url = $request->get('inset_url');*/
        $product->save();

        return redirect(url('products'));
    }

    public function show ($id)
    {
        // if searching for inactive or deleted product
        $product = Product::with('batch_route')
                          ->where('is_deleted', 0)
                          ->find($id);
        if ( !$product ) {
            return view('errors.404');
        }

        return view('products.show', compact('product'));
    }

    public function edit ($id)
    {
        // if searching for inactive or deleted product
        $product = Product::with('batch_route')
                          ->where('is_deleted', 0)
                          ->find($id);
        if ( !$product ) {
            return view('errors.404');
        }

        $batch_routes = BatchRoute::where('is_deleted', 0)
                                  ->lists('batch_code', 'id');
        $is_taxable = [
            '1' => 'Yes',
            '0' => 'No',
        ];

        return view('products.edit', compact('product', 'batch_routes', 'is_taxable'));
    }

    public function update (ProductUpdateRequest $request, $id)
    {
        $product = Product::where('is_deleted', 0)
                          ->find($id);
        if ( !$product ) {
            return view('errors.404');
        }
        $is_error = false;
        $error_messages = [ ];
        if ( $request->exists('store_id') ) {
            $product->store_id = $request->get('store_id');
        }
        if ( $request->exists('product_name') ) {
            $product->product_name = $request->get('product_name');
        }
        if ( $request->exists('product_model') ) {
            $product->product_model = $request->get('product_model');
        }
        if ( $request->exists('product_keywords') ) {
            $product->product_keywords = $request->get('product_keywords');
        }
        if ( $request->exists('product_description') ) {
            $product->product_description = $request->get('product_description');
        }
        if ( $request->exists('product_category') ) {
            $product->product_category = $request->get('product_category');
        }
        if ( $request->exists('product_price') ) {
            $product->product_price = $request->get('product_price');
        }
        if ( $request->exists('product_url') ) {
            $product->product_url = $request->get('product_url');
        }
        if ( $request->exists('product_thumb') ) {
            $product->product_thumb = $request->get('product_thumb');
        }
        if ( $request->exists('batch_route_id') ) {
            // update request via form for overall change
            if ( is_numeric($request->get('batch_route_id')) ) {
                $requested_batch_route_id = $request->get('batch_route_id');
                $batch_route = BatchRoute::where('is_deleted', 0)
                                         ->find($requested_batch_route_id);
            } else {
                // update request from lists
                // only for batch route
                $requested_batch_route_text = $request->get('batch_route_id');
                $batch_route = BatchRoute::where('batch_code', $requested_batch_route_text)
                                         ->first();
            }

            if ( $batch_route ) {
                $product->batch_route_id = $batch_route->id;
            } else {
                $is_error = true;
                $error_messages[] = [ 'batch_code' => 'Batch code is not correct' ];
            }
        }
        if ( $request->exists('is_taxable') ) {
            $product->is_taxable = $request->get('is_taxable');
        }

        if ( $is_error ) {
            return redirect()
                ->back()
                ->withErrors(new MessageBag($error_messages));
        } else {
            $product->save();
            Session::flash('success', sprintf('Product: <b>%s</b> is updated successfully', $product->id_catalog));

            return redirect()->back();
        }

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
