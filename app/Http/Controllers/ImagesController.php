<?php

namespace App\Http\Controllers;

use App\Image;
use DB;
use File;
use Illuminate\Http\Request;

class ImagesController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $id)
    {
        $this->validate(
            request(), [
            'image' => 'required|image',
        ]);
        if ($request->hasFile('image')) {
            $file = request()->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $fileName);
        }
        Image::create([
            'flower_id' => $id,
            'images' => $fileName,
        ]);
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $images = Image::find($id);
        return  view('cms.edit_img',compact('images'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            request(), [
            'image' => 'required|image',
        ]);
        $flower_id = DB::table('images')->where('id', $id)->first()->id;
        $image = DB::table('images')->where('id', $id)->first()->images;
        $filename = public_path() . '/img/' . $image;
        File::delete($filename);
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $fileName);
            Image::whereId($id)->update([
                'images' => $fileName
            ]);
        }
        return redirect('/cms/flowers/'.$flower_id);
    }

    public function destroy($id)
    {
        $image = DB::table('images')->where('id', $id)->first()->images;
        $filename = public_path() . '/img/' . $image;
        File::delete($filename);
        DB::table('images')->where('id', $id)->delete();
        return redirect()->back();
    }
}
