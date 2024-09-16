<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function dashboard () {

        return view('admin.module.page.dashboard');

    }


}
