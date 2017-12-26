<?php

namespace App\Http\Controllers;

use App\Category;
use App\Flower;
use App\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class CMSController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $flowers = Flower::orderBy('id')->paginate(2);
        return view('cms.index', compact('flowers'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('cms.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate(
            request(), [
            'name' => 'required|min:5',
            'type' => 'required|min:5',
            'desc' => 'required|min:5',
            'color' => 'required|min:5',
            'price' => 'required|numeric',
            'cate_id' => 'required|numeric',
            'count' => 'required|numeric',
            'image' => 'required|mimes:jpeg,bmp,png',
        ]);

        Flower::create([
            'name' => request('name'),
            'type' => request('type'),
            'desc' => request('desc'),
            'color' => request('color'),
            'price' => request('price'),
            'cate_id' => request('cate_id'),
            'count' => request('count'),
        ]);


        $flower_id = \DB::table('flowers')->max('id');

        if ($request->hasFile('image')) {
            $file = request()->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $fileName);
        }
        Image::create([
            'flower_id' => $flower_id,
            'images' => $fileName,
        ]);

        return redirect('/cms/admin');
    }

    public function show($id)
    {
        $flower = Flower::find($id);
        return view('cms.show', compact('flower'));
    }

    public function edit($id)
    {
        $flower = Flower::find($id);
        $categories = Category::all();
        return view('cms.edit', compact('flower', 'categories'));
    }

    public function update(Request $request, $id)
    {

        $this->validate(
            request(), [
            'name' => 'required|min:5',
            'type' => 'required|min:5',
            'desc' => 'required|min:5',
            'color' => 'required|min:5',
            'price' => 'required|numeric',
            'cate_id' => 'required|numeric',
            'count' => 'required|numeric',
        ]);

        Flower::whereId($id)->update([
            'name' => request('name'),
            'type' => request('type'),
            'desc' => request('desc'),
            'color' => request('color'),
            'cate_id' => request('cate_id'),
            'count' => request('count'),
        ]);

        return redirect('/cms/admin');
    }

    public function destroy($id)
    {
        $results = DB::table('images')
            ->where('flower_id', $id)
            ->get();

        if ($results->first()->images !== null) {
            $images = DB::table('images')->where('flower_id', $id)->pluck('images');
            foreach ($images as $image) {
                $filename = public_path() . '/img/' . $image;
                File::delete($filename);
            }
            DB::table('images')->where('flower_id', $id)->delete();
        }


        DB::table('flowers')->where('id', $id)->delete();
        return redirect('/cms/admin');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->home();
    }
}
