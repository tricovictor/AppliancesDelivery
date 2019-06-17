<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{
   public function index()
    {
        $categories = Category::all();
        #return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        #return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(CategoryRequest $request)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
