<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $table = 'product';

    static public function checkAlreadyUseCategory ($id) {

        $static = new static;

        $products = $static->get();

        // dd($products);

        if(empty($products)) return false;

        $arr = [];

        foreach ($products as $item) {
            // echo $item->category;
            $arr = array_merge($arr, json_decode($item->category, true));
        }

        $arr = array_unique($arr);

        return in_array($id, $arr);

    }


    static public function checkAlreadyUseKeyword ($id) {

        $static = new static;

        $products = $static->get();

        // dd($products);

        if(empty($products)) return false;

        $arr = [];

        foreach ($products as $item) {
            // echo $item->keyword;
            $arr = array_merge($arr, json_decode($item->keyword, true));
        }

        $arr = array_unique($arr);

        return in_array($id, $arr);

    }

}
