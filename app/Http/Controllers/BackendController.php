<?php

namespace App\Http\Controllers;

use App\Models\PageImage;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function storeHeaderImage(Request $request) {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png|dimensions:width=440,height=620|max:800kb'
        ]);
        $image = PageImage::firstOrCreate([
            'name' => 'header.image'
        ]);
        $image->addMedia($request->file('file'))->toMediaCollection();
        return redirect(route('images'));
    }
}
