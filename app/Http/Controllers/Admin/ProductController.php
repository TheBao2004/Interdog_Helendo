<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Keyword;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function index (int $id = null) {

        $detail = null;

        if (!empty($id)) {
            $detail = Product::find($id);
            if (empty($detail)) {
                return redirect()->route('admin.product.index');
            }
        }

        $category = Category::all();
        $keyword = Keyword::all();
        $files = FileController::getFileInUpload();

        $list = Product::all();

        return view('admin.module.product.index', compact(['category', 'keyword', 'files', 'list', 'detail']));

    }


    public function store (Request $request) {

        // dd($request->all());

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3|unique:product,name',
                'weight' => 'required|integer',
                'dimensions' => 'required',
                'description' => 'required',
                'thumbnail' => 'required',
                'detail' => 'required',
                'image_detail' => 'required',
                'image_feature' => 'required',
            ],
        );

        $errors = $validator->errors()->messages();

        $validate = false;

        $category = $request->category;
        if(empty($category)){
            $errors['category'] = [
                'The category field is required.'
            ];
            $validate = true;
        }

        $keyword = $request->keyword;
        if(empty($keyword)){
            $errors['keyword'] = [
                'The keyword field is required.'
            ];
            $validate = true;
        }

        $album = $request->album;
        if(empty($album)){
            $errors['album'] = [
                'The album field is required.'
            ];
            $validate = true;
        }

        $feature = $request->feature;
        if(empty($feature)){
            $errors['feature'] = [
                'The feature field is required.'
            ];
            $validate = true;
        }

        // dd($validator->fails());
        // dd($validate);

        if($validator->fails() || $validate) return back()->withErrors($errors)->withInput();

        $detail = new Product();

        $detail->name = $request->name;
        $detail->slug = createSlug($request->name);
        if (!empty($request->active)) {
            $detail->active = $request->active;
        }
        $detail->description = $request->description;
        $detail->thumbnail = $request->thumbnail;
        $detail->weight = $request->weight;
        $detail->dimensions = $request->dimensions;
        $detail->detail = $request->detail;
        $detail->image_detail = $request->image_detail;
        $detail->image_feature = $request->image_feature;

        $detail->category = json_encode($request->category);
        $detail->keyword = json_encode($request->keyword);
        $detail->feature = json_encode($request->feature);
        $detail->album = json_encode($request->album);

        $detail->save();

        return redirect()->route('admin.product.index')->with('alert_msg', 'Add product success')->with('alert_type', 'success');

    }


    public function update (int $id = null, Request $request) {

        $detail = null;

        if (!empty($id)) {
            $detail = Product::find($id);
            if (empty($detail)) {
                return redirect()->route('admin.product.index');
            }
        }

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3|unique:product,name,'.$detail->id,
                'weight' => 'required|integer',
                'dimensions' => 'required',
                'description' => 'required',
                'thumbnail' => 'required',
                'detail' => 'required',
                'image_detail' => 'required',
                'image_feature' => 'required',
            ],
        );

        $errors = $validator->errors()->messages();

        $validate = false;

        $category = $request->category;
        if(empty($category)){
            $errors['category'] = [
                'The category field is required.'
            ];
            $validate = true;
        }

        $keyword = $request->keyword;
        if(empty($keyword)){
            $errors['keyword'] = [
                'The keyword field is required.'
            ];
            $validate = true;
        }

        $album = $request->album;
        if(empty($album)){
            $errors['album'] = [
                'The album field is required.'
            ];
            $validate = true;
        }

        $feature = $request->feature;
        if(empty($feature)){
            $errors['feature'] = [
                'The feature field is required.'
            ];
            $validate = true;
        }

        // dd($validator->fails());
        // dd($validate);

        if($validator->fails() || $validate) return back()->withErrors($errors)->withInput();

        $detail->name = $request->name;
        $detail->slug = createSlug($request->name);
        if (!empty($request->active)) {
            $detail->active = $request->active;
        } else {
            $detail->active = 0;
        }
        $detail->description = $request->description;
        $detail->thumbnail = $request->thumbnail;
        $detail->weight = $request->weight;
        $detail->dimensions = $request->dimensions;
        $detail->detail = $request->detail;
        $detail->image_detail = $request->image_detail;
        $detail->image_feature = $request->image_feature;

        $detail->category = json_encode($request->category);
        $detail->keyword = json_encode($request->keyword);
        $detail->feature = json_encode($request->feature);
        $detail->album = json_encode($request->album);

        $detail->save();

        return back()->with('alert_msg', 'Edit product success ( '.$detail->name.' )')->with('alert_type', 'success');

    }


    public function delete(int $id = null)
    {

        if (!empty($id)) {
            $detail = Product::find($id);
            if (empty($detail)) {
                return redirect()->route('admin.product.index');
            }
        }else{
            return redirect()->route('admin.product.index');
        }

        if(Variant::where('product_id', $id)->exists()) return redirect()->route('admin.product.index')->with('alert_type', 'danger')->with('alert_table', 'This product still in use ( '.$detail->name.' )');

        Product::destroy($id);

        return redirect()->route('admin.product.index')->with('alert_type', 'success')->with('alert_table', 'Delete product success ( '.$detail->name.' )');

    }


}
