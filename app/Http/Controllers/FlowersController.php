<?php

namespace App\Http\Controllers;

use App\Category;
use App\Flower;
use Illuminate\Http\Request;

class FlowersController extends Controller
{
    public function index()
    {
        $flowers = Flower::orderBy('id')->paginate(2);
        return view('flowers.index', compact('flowers'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $flower = Flower::find($id);
        return view('flowers.show', compact('flower'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
