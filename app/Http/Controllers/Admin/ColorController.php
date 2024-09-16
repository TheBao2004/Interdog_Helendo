<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Variant;
use Illuminate\Http\Request;

class ColorController extends Controller
{


    public function index(int $id = null)
    {

        $detail = null;

        if (!empty($id)) {
            $detail = Color::find($id);
            if (empty($detail)) {
                return redirect()->route('admin.color.index');
            }
        }

        $list = Color::all();

        return view('admin.module.color.index', compact(['list', 'detail']));
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3|unique:color,name'
        ], [], [
            'name' => 'Name'
        ]);

        $detail = new Color();

        $detail->name = $request->name;
        $detail->slug = createSlug($request->name);
        if (!empty($request->active)) {
            $detail->active = $request->active;
        }

        $detail->save();

        return redirect()->route('admin.color.index')->with('alert_msg', 'Add color success')->with('alert_type', 'success');
    }


    public function update(int $id, Request $request)
    {

        if (!empty($id)) {
            $detail = Color::find($id);
            if (empty($detail)) {
                return redirect()->route('admin.color.index');
            }
        }else{
            return redirect()->route('admin.color.index');
        }

        $request->validate([
            'name' => 'required|min:3|unique:color,name,' . $detail->id
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

        return back()->with('alert_msg', 'Edit color success ( '.$detail->name.' )')->with('alert_type', 'success');

    }


    public function delete(int $id = null)
    {

        if (!empty($id)) {
            $detail = Color::find($id);
            if (empty($detail)) {
                return redirect()->route('admin.color.index');
            }
        }else{
            return redirect()->route('admin.color.index');
        }

        // dd(Variant::checkAlreadyUseColor($id));

        if(Variant::checkAlreadyUseColor($id)) return redirect()->route('admin.color.index')->with('alert_type', 'danger')->with('alert_table', 'This color still in use ( '.$detail->name.' )');

        Color::destroy($id);

        return redirect()->route('admin.color.index')->with('alert_type', 'success')->with('alert_table', 'Delete color success ( '.$detail->name.' )');

    }


}
