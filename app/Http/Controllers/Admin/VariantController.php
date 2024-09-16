<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VariantController extends Controller
{

    public function index (int $id = null, int $ma = null) {

        $product = null;
        $list = null;
        $detail = null;

        if (!empty($id)) {
            $product = Product::find($id);
            if (empty($product)) {
                return redirect()->route('admin.variant.index');
            }else{
                $list = Variant::where('product_id', $product->id)->get();
                if(!empty($ma)){
                    $detail = Variant::find($ma);
                    if(empty($detail)){
                        return redirect()->route('admin.variant.index');
                    }
                }
            }
        }

        $colors = Color::all();
        $sizes = Size::all();
        $products = Product::all();

        return view('admin.module.variant.index', compact(['products', 'product', 'colors', 'sizes', 'list', 'detail']));

    }


    public function store (int $id = null, Request $request) {

        $product = null;

        if (!empty($id)) {
            $product = Product::find($id);
            if (empty($product)) {
                return redirect()->route('admin.variant.index');
            }
        }

        $validator = Validator::make(
            $request->all(),
            [
                'price' => 'required|integer',
                'color_id' => 'required',
                'size_id' => 'required',
            ],
        );

        $errors = $validator->errors()->messages();

        if($validator->fails()) return back()->withErrors($errors)->withInput();

        $varianted = Variant::where('product_id', $product->id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->exists();

        if(!empty($varianted)) return back()->with('alert_msg', 'This variant ( '.$product->name.' ) already exist')->with('alert_type', 'danger');

        $detail = new Variant();

        $detail->price = $request->price;
        $detail->color_id = $request->color_id;
        $detail->size_id = $request->size_id;
        $detail->product_id = $product->id;
        if (!empty($request->active)) {
            $detail->active = $request->active;
        }

        $detail->save();

        return back()->with('alert_msg', 'Add variant ( '.$product->name.' ) success')->with('alert_type', 'success');

    }


    public function update (int $id = null, int $ma = null, Request $request) {

        $product = null;
        $detail = null;

        if (!empty($id)) {
            $product = Product::find($id);
            if (empty($product)) {
                return redirect()->route('admin.variant.index');
            }else{
                if(!empty($ma)){
                    $detail = Variant::find($ma);
                    if(empty($detail)){
                        return redirect()->route('admin.variant.index');
                    }
                }
            }
        }

        $validator = Validator::make(
            $request->all(),
            [
                'price' => 'required|integer',
                'color_id' => 'required',
                'size_id' => 'required',
            ],
        );

        $errors = $validator->errors()->messages();

        if($validator->fails()) return back()->withErrors($errors)->withInput();

        $varianted = Variant::where('product_id', $product->id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->where('id', '<>', $detail->id)->exists();

        if(!empty($varianted)) return back()->with('alert_msg', 'This variant ( '.$product->name.' ) already exist')->with('alert_type', 'danger');

        $detail->price = $request->price;
        $detail->color_id = $request->color_id;
        $detail->size_id = $request->size_id;
        if (!empty($request->active)) {
            $detail->active = $request->active;
        }

        $detail->save();

        return back()->with('alert_msg', 'Edit variant ( '.$product->name.' ) [ '.$detail->color->name.' | '.$detail->size->name.' ] success')->with('alert_type', 'success');

    }


    public function delete (int $id = null, int $ma = null) {

        // dd("Not make yet");

        $product = null;
        $detail = null;

        if (!empty($id)) {
            $product = Product::find($id);
            if (empty($product)) {
                return redirect()->route('admin.variant.index');
            }else{
                if(!empty($ma)){
                    $detail = Variant::find($ma);
                    if(empty($detail)){
                        return redirect()->route('admin.variant.index');
                    }
                }
            }
        }

        Variant::destroy($ma);

        return back()->with('alert_type', 'success')->with('alert_table', 'Edit variant ( '.$product->name.' ) [ '.$detail->color->name.' | '.$detail->size->name.' ] success)');

    }


}
