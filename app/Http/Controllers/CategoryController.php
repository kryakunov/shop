<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        //$categories = $this->createTree($categories);

        return view('categories.create', ['categories' => $categories]);
    }

    public function createTree($categories)
    {
        $parentsArr = [];
        foreach($categories as $key => $item){
            if (isset($item['parent_id']))
                $parentsArr[$item['parent_id']][$item['id']] = $item;
            else
                $parentsArr[$item['id']] = $item;
        }

        return $parentsArr;
    }

    /** 
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>'required',
        ]);

        $category = Category::add($request->all());

        return redirect()->route('category.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::find($id)->delete();
        return redirect()->route('category.create');
    }
}
