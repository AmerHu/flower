<?php

namespace App\Http\Controllers;

use App\Category;
use App\Flower;
use App\Image;
use DB;
use File;
use Illuminate\Http\Request;
use Session;

class CategoriesController extends Controller
{
    public function index($id)
    {
        $countOfFlowers = DB::table('categories')
            ->select(DB::raw('count(categories.id)as flower_id '))
            ->join('flowers', 'flowers.cate_id', '=', 'categories.id')
            ->where('flowers.cate_id', '=', $id)
            ->get();
        $flowers = Flower::where('cate_id',$id)->orderBy('id')->paginate(2);
        $result = $countOfFlowers->first()->flower_id;
        if ($result <= 0) {
            flash('Sorry! This category has no flower.')->error();
            return view('flowers.categories', compact('result'));
        } else {
            return view('flowers.categories', compact('flowers','result'));
        }
    }

    public function create()
    {
//
    }

    public function setting()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate(
            request(), [
            'cate' => 'required',
        ]);

        Category::create([
            'cate' => request('cate'),
        ]);
        return redirect('/categories');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        Category::whereId($id)->update([
            'cate' => request('cate'),
        ]);
        return redirect('/categories');
    }

//Wrong.....
    public function destroy($id)
    {
//        $flowers= DB::table('categories')
//            ->select('flowers.id as flower_id', 'categories.id as cate_id')
//            ->join('flowers', 'flowers.cate_id', '=','categories.id')
//            ->where('flowers.cate_id',$id)
//            ->get();
//        $countFlower= DB::table('flowers')
//        ->select(DB::raw('count(flowers.cate_id) as countFlower'))
//        ->where('cate_id',$id)
//        ->get();
//        if ($countFlower->first()->countFlower > 0) {
//            $results = DB::table('images')
//                ->select(DB::raw('count(images.id) as img_id'))
//                ->where('flower_id', $flowers->first()->flower_id)
//                ->get();
//            if ($results->first()->img_id > 0) {
//                $image = DB::table('images')->where('flower_id', $flowers->first()->flower_id)->first()->images;
//                $filename = public_path() . '/img/' . $image;
//                \File::delete($filename);
//            }
//            DB::table('flowers')->where('cate_id', $id)->delete();
//            DB::table('images')->where('flower_id', $flowers->first()->flower_id)->delete();
//        }
//        DB::table('categories')->where('id', $id)->delete();
//        return redirect('/Categories');

        /////////////////////////////////

        $flowerCount = Flower::where('cate_id', $id)->select(DB::raw('count(flowers.id) as flower'));
        if ($flowerCount->first()->flower > 0) {
            $flowers = DB::table('categories')
                ->select('flowers.id as flower_id', 'categories.id as cate_id', 'images.images as image' ,'images.id as image_id')
                ->join('flowers', 'flowers.cate_id', '=', 'categories.id')
                ->join('images', 'images.flower_id', '=', 'flowers.id')
                ->where('categories.id', $id)
                ->get();
            if ($flowers->pluck('image') != null) {
                foreach ($flowers as $flower) {
                    $filename = public_path() . '/img/' . $flower->image;
                    File::delete($filename);
                    DB::table('images')->where('id',$flower->image_id)->delete();
                }
            }
            DB::table('flowers')->where('cate_id', $id)->delete();
        }
        DB::table('categories')->where('id', $id)->delete();
        return redirect('/categories');
    }
}
