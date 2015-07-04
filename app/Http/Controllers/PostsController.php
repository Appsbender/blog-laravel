<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Categories;
use App\Tags;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Components\HelperFunctions;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Posts::simplePaginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $pageTitle = 'Posts';
        $pageDescription = 'Create new post';

        $allCategories = Categories::all();
        $categories = [];
        foreach ($allCategories as $category) {
            $categories[$category->id] = $category->name;
        }

        $allTags = Tags::all();
        $tags = [];
        foreach ($allTags as $tag) {
            $tags[$tag->id] = $tag->name;
        }
        return view('posts.create', compact('pageTitle', 'pageDescription', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PostsFormRequest $request)
    {
        $input = $request->all();
        $input['alias'] = HelperFunctions::str2url($request->title);
        dd($input);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
