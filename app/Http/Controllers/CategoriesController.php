<?php

namespace App\Http\Controllers;

use App\Flower;
use Category;
use DB;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $countOfFlowers = DB::table('categories')
            ->select(DB::raw('count(categories.id)as flower_id '))
            ->join('flowers', 'flowers.cate_id', '=', 'categories.id')
            ->where('flowers.cate_id', '=', $id)
            ->get();


        $categories = DB::table('categories')
            ->join('flowers', 'flowers.cate_id', '=', 'categories.id')
            ->join('images', 'images.flower_id', '=', 'flowers.id')
            ->where('flowers.cate_id', '=', $id)
            ->get();
        $result = $countOfFlowers->first()->flower_id;
        if ($result <= 0) {
            return view('flowers.noCategories');
        } else {

            return view('flowers.categories', compact('categories'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function create()
    {
        //
    }

    function noCate()
    {
        return view('flower.noCategories');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }
}
