<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function index(int $id = null)
    {

        $detail = null;

        if (!empty($id)) {
            $detail = Category::find($id);
            if (empty($detail)) {
                return redirect()->route('admin.category.index');
            }
        }

        $list = Category::all();

        return view('admin.module.category.index', compact(['list', 'detail']));
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3|unique:category,name'
        ], [], [
            'name' => 'Name'
        ]);

        $detail = new Category();

        $detail->name = $request->name;
        $detail->slug = createSlug($request->name);
        if (!empty($request->active)) {
            $detail->active = $request->active;
        }

        $detail->save();

        return redirect()->route('admin.category.index')->with('alert_msg', 'Add category success')->with('alert_type', 'success');
    }


    public function update(int $id, Request $request)
    {

        if (!empty($id)) {
            $detail = Category::find($id);
            if (empty($detail)) {
                return redirect()->route('admin.category.index');
            }
        }else{
            return redirect()->route('admin.category.index');
        }

        $request->validate([
            'name' => 'required|min:3|unique:category,name,' . $detail->id
        ], [
        ], [
            'name' => 'Name'
        ]);

        $detail->name = $request->name;
        $detail->slug = createSlug($request->name);
        if (!empty($request->active)) {
            $detail->active = $request->active;
        } else {
            $detail->active = 0;
        }

        $detail->save();

        return back()->with('alert_msg', 'Edit category success ( '.$detail->name.' )')->with('alert_type', 'success');

    }


    public function delete(int $id = null)
    {

        if (!empty($id)) {
            $detail = Category::find($id);
            if (empty($detail)) {
                return redirect()->route('admin.category.index');
            }
        }else{
            return redirect()->route('admin.category.index');
        }

        if(Product::checkAlreadyUseCategory($id)) return redirect()->route('admin.category.index')->with('alert_type', 'danger')->with('alert_table', 'This category still in use ( '.$detail->name.' )');

        Category::destroy($id);

        return redirect()->route('admin.category.index')->with('alert_type', 'success')->with('alert_table', 'Delete category success ( '.$detail->name.' )');

    }

}
