<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pageDescription = 'Categories';

        $categories = Categories::simplePaginate(10);
        return view('categories.index', compact('categories', 'pageDescription'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $pageTitle = 'Categories';
        $pageDescription = 'Create new category';

        return view('categories.create', compact('pageTitle', 'pageDescription'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        Categories::create($request->all());
        \Session::flash('success', 'Category created');
        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $category = Categories::findOrFail($id);
        $posts = $category->posts()->simplePaginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $pageTitle = 'Categories';
        $pageDescription = 'Edit existing category';

        $category = Categories::findOrFail($id);
        return view('categories.edit', compact('category', 'pageTitle', 'pageDescription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $category = Categories::findOrFail($id);
        $category->update($request->all());
        \Session::flash('success', 'Category updated');
        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Categories::destroy($id);
        \Session::flash('success', 'Category deleted');
        return redirect('/categories');
    }
}
