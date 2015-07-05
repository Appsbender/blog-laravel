<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Categories;
use App\Tags;
use Carbon\Carbon;
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
        $posts = Posts::latest()->simplePaginate(5);
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

        $categories = Categories::lists('name', 'id');
        $tags = Tags::lists('name', 'id');

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
        $input['user_id'] = \Auth::user()->id;
        $post = Posts::create($input);
        $categories_ids = [];
        foreach ($input['categories_list'] as $value) {
            $category = Categories::findOrNew($value);
            if ($category->exists) {
                array_push($categories_ids, $value);
            }
            else {
                $category->name = $value;
                $category->save();
                array_push($categories_ids, $category->id);
            }
        }
        $post->categories()->attach($categories_ids);

        $tags_ids = [];
        foreach ($input['tags_list'] as $value) {
            $tag = Tags::findOrNew($value);
            if ($tag->exists) {
                array_push($tags_ids, $value);
            }
            else {
                $tag->name = $value;
                $tag->save();
                array_push($tags_ids, $tag->id);
            }
        }
        $post->tags()->attach($tags_ids);

        \Session::flash('success', 'Post created');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $post = Posts::findOrFail($id);
        $pageTitle = $post->title;
        $pageDescription = $post->short_description;

        return view('posts.show', compact('post', 'pageTitle', 'pageDescription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = Posts::findOrFail($id);
        $pageTitle = 'Posts';
        $pageDescription = 'Edit existing post';

        $categories = Categories::lists('name', 'id');
        $tags = Tags::lists('name', 'id');

        return view('posts.edit', compact('pageTitle', 'pageDescription', 'post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Requests\PostsFormRequest $request)
    {
        $post = Posts::findOrFail($id);
        $input = $request->all();
        $input['alias'] = HelperFunctions::str2url($request->title);
        $post->update($input);
        $categories_ids = [];
        foreach ($input['categories_list'] as $value) {
            $category = Categories::findOrNew($value);
            if ($category->exists) {
                array_push($categories_ids, $value);
            }
            else {
                $category->name = $value;
                $category->save();
                array_push($categories_ids, $category->id);
            }
        }
        $post->categories()->sync($categories_ids);

        $tags_ids = [];
        foreach ($input['tags_list'] as $value) {
            $tag = Tags::findOrNew($value);
            if ($tag->exists) {
                array_push($tags_ids, $value);
            }
            else {
                $tag->name = $value;
                $tag->save();
                array_push($tags_ids, $tag->id);
            }
        }
        $post->tags()->sync($tags_ids);

        \Session::flash('success', 'Post updated');
        return redirect('/');
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
