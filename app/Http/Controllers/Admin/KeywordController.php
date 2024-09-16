<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keyword;
use App\Models\Product;
use Illuminate\Http\Request;

class KeywordController extends Controller
{


    public function index(int $id = null)
    {

        $detail = null;

        if (!empty($id)) {
            $detail = Keyword::find($id);
            if (empty($detail)) {
                return redirect()->route('admin.keyword.index');
            }
        }

        $list = Keyword::all();

        return view('admin.module.keyword.index', compact(['list', 'detail']));
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3|unique:keyword,name'
        ], [], [
            'name' => 'Name'
        ]);

        $detail = new Keyword();

        $detail->name = $request->name;
        $detail->slug = createSlug($request->name);
        if (!empty($request->active)) {
            $detail->active = $request->active;
        }

        $detail->save();

        return redirect()->route('admin.keyword.index')->with('alert_msg', 'Add keyword success')->with('alert_type', 'success');
    }


    public function update(int $id, Request $request)
    {

        if (!empty($id)) {
            $detail = Keyword::find($id);
            if (empty($detail)) {
                return redirect()->route('admin.keyword.index');
            }
        }else{
            return redirect()->route('admin.keyword.index');
        }

        $request->validate([
            'name' => 'required|min:3|unique:keyword,name,' . $detail->id
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

        return back()->with('alert_msg', 'Edit keyword success ( '.$detail->name.' )')->with('alert_type', 'success');

    }


    public function delete(int $id = null)
    {

        if (!empty($id)) {
            $detail = Keyword::find($id);
            if (empty($detail)) {
                return redirect()->route('admin.keyword.index');
            }
        }else{
            return redirect()->route('admin.keyword.index');
        }

        if(Product::checkAlreadyUseKeyword($id)) return redirect()->route('admin.keyword.index')->with('alert_type', 'danger')->with('alert_table', 'This keyword still in use ( '.$detail->name.' )');

        Keyword::destroy($id);

        return redirect()->route('admin.keyword.index')->with('alert_type', 'success')->with('alert_table', 'Delete keyword success ( '.$detail->name.' )');

    }


}
