<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{

    public function index () {

        $files = $this->getFileInUpload();

        return view('admin.module.page.file', compact(['files']));

    }



    public function upload (Request $request) {

        $files = $request->file('files');

        // dd($files);

        if(empty($files)) return back()->with('alert_msg', 'Please choose file')->with('alert_type', 'danger');

        $validator = Validator::make(
            $request->all(),
            [
                'files.*' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048'
            ],
        );

        if($validator->fails()) return back()->with('alert_msg', 'Upload file error')->with('alert_type', 'danger');

        $this->uploadImageMultiple($files);

        return back()->with('alert_msg', 'Upload file success')->with('alert_type', 'success');

    }

    public function delete (string $path, Request $request) {
        Storage::delete('public/'.$path);
        return back()->with('alert_msg', 'Delete file success')->with('alert_type', 'success');
    }

    private function uploadImage ($file, $old = '') {
        $fileName = rand(10000000, 99999999) . '_' . $file->getClientOriginalName();
        $file->storeAs('public/upload', $fileName);
        if (!empty($old)) {
            if (Storage::exists('public/upload/'.$old)) {
                Storage::delete('public/upload/'.$old);
            }
        }
        return $fileName;
    }


    private function uploadImageMultiple ($files) {
        $arrImageName = [];
        foreach ($files as $file) {
            $originalName = $file->getClientOriginalName();
            $hashName = rand(10000000, 99999999) . '_' . $originalName;
            $arrImageName[] = $hashName;
            Storage::putFileAs('public/upload', $file, $hashName);
        }
        return $arrImageName;
    }


    private function removeImageMultiple ($files) {

        foreach ($files as $file) {
            if (Storage::exists('public/upload/'.$file)) {
                Storage::delete('public/upload/'.$file);
            }
        }

    }

    static public function getFileInUpload () {

        $files = Storage::files('public/upload');

        $files = array_map(function($file) {
            return str_replace('public/', '', $file);
        }, $files);

        return $files;

    }


}
