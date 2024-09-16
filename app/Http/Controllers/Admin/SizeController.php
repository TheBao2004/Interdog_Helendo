<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use App\Models\Variant;
use Illuminate\Http\Request;

class SizeController extends Controller
{

    public function index(int $id = null)
    {

        $detail = null;

        if (!empty($id)) {
            $detail = Size::find($id);
            if (empty($detail)) {
                return redirect()->route('admin.size.index');
            }
        }

        $list = Size::all();

        return view('admin.module.size.index', compact(['list', 'detail']));
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3|unique:size,name'
        ], [], [
            'name' => 'Name'
        ]);

        $detail = new Size();

        $detail->name = $request->name;
        $detail->slug = createSlug($request->name);
        if (!empty($request->active)) {
            $detail->active = $request->active;
        }

        $detail->save();

        return redirect()->route('admin.size.index')->with('alert_msg', 'Add size success')->with('alert_type', 'success');
    }


    public function update(int $id, Request $request)
    {

        if (!empty($id)) {
            $detail = Size::find($id);
            if (empty($detail)) {
                return redirect()->route('admin.size.index');
            }
        }else{
            return redirect()->route('admin.size.index');
        }

        $request->validate([
            'name' => 'required|min:3|unique:size,name,' . $detail->id
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

        return back()->with('alert_msg', 'Edit size success ( '.$detail->name.' )')->with('alert_type', 'success');

    }


    public function delete(int $id = null)
    {

        if (!empty($id)) {
            $detail = Size::find($id);
            if (empty($detail)) {
                return redirect()->route('admin.size.index');
            }
        }else{
            return redirect()->route('admin.size.index');
        }

        if(Variant::checkAlreadyUseSize($id)) return redirect()->route('admin.size.index')->with('alert_type', 'danger')->with('alert_table', 'This size still in use ( '.$detail->name.' )');

        Size::destroy($id);

        return redirect()->route('admin.size.index')->with('alert_type', 'success')->with('alert_table', 'Delete size success ( '.$detail->name.' )');

    }


}
