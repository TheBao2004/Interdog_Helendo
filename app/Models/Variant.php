<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    public $table = 'variant';

    public function color () {
        return $this->belongsTo(
            Color::class,
            'color_id',
            'id'
        );
    }

    public function size () {
        return $this->belongsTo(
            Size::class,
            'size_id',
            'id'
        );
    }

    static public function checkAlreadyUseColor ($id) {

        $static = new static;

        $variants = $static->get();

        // dd($variants);

        if(empty($variants)) return false;

        $arr = [];

        foreach ($variants as $item) {
            // echo $item->keyword;
            $arr[] = $item->color_id;
        }

        $arr = array_unique($arr);

        return in_array($id, $arr);

    }

    static public function checkAlreadyUseSize ($id) {

        $static = new static;

        $variants = $static->get();

        // dd($variants);

        if(empty($variants)) return false;

        $arr = [];

        foreach ($variants as $item) {
            // echo $item->keyword;
            $arr[] = $item->size_id;
        }

        $arr = array_unique($arr);

        return in_array($id, $arr);

    }


}
