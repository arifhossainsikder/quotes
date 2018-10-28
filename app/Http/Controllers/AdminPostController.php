<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\Http\Requests\AdminPostRequest;
use App\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$posts = Post::orderBy('id','desc')->paginate(10);
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$authors = Author::orderBy('name','asc')->pluck('name','id')->all();
		$categories = Category::orderBy('title','asc')->pluck('title','id')->all();
        return view('post.create',compact('authors','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminPostRequest $request)
    {
		$this->validate($request, $request->messages());

		$post = new Post;

		$post->author_id = $request->author_id;

		$post->quote = $request->quote;

		$post->save();

		$post->categories()->attach($request->categories);


		$request->session()->flash('message.level', 'success');
		$request->session()->flash('message.content', 'New quote added successfully!');
		return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$post = Post::findOrFail($id);
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$post = Post::findOrFail($id);
		$authors = Author::orderBy('name','asc')->pluck('name','id')->all();
		$categories = Category::orderBy('title','asc')->pluck('title','id')->all();
        return view('post.edit',compact('post','authors','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminPostRequest $request, $id)
    {
		$this->validate($request, $request->messages());

		$post = Post::findOrFail($id);

		$input = $request->all();

		Post::whereId($id)->first()->update($input);

		$post->categories()->sync($request->categories);

		$request->session()->flash('message.level', 'success');
		$request->session()->flash('message.content', 'Updated successfully!');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
		$post = Post::findOrFail($id);

		$post->categories()->detach();

		$post->delete();

		$request->session()->flash('message.level', 'danger');
		$request->session()->flash('message.content','Deleted successfully!');

		return redirect('/admin/post');

    }
}
