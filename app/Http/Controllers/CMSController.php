<?php

namespace App\Http\Controllers;

use App\Category;
use App\Flower;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class CMSController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flowers = Flower::all();
        return view('CMS.index', compact('flowers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('CMS.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            request(), [
            'name' => 'required',
            'type' => 'required',
            'desc' => 'required',
            'color' => 'required',
            'price' => 'required',
            'cate_id' => 'required',
            'count' => 'required',
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
        return redirect('/cms/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $flower = Flower::find($id);
        return view('CMS.show', compact('flower'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flower = Flower::find($id);
        return view('CMS.edit', compact('flower'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Flower::whereId($id)->update([
            'name' => request('name'),
            'type' => request('type'),
            'desc' => request('desc'),
            'color' => request('color'),
            'cate' => request('cate'),
            'price' => request('price'),
            'count' => request('count'),
        ]);

        return redirect('/cms/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $results = DB::table('images')
            ->select(DB::raw('count(images.id) as flower_id'))
            ->where('flower_id', $id)
            ->get();

        if ($results->first()->flower_id > 0) {

            $image = DB::table('images')->where('flower_id', $id)->first()->images;
            $filename = public_path() . '/img/' . $image;
            File::delete($filename);
        }

        DB::table('images')->where('flower_id', $id)->delete();
        DB::table('flowers')->where('id', $id)->delete();
        return redirect('/cms/admin');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->home();
    }
}
