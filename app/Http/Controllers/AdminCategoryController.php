<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\AdminCategoryRequest;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
    	$categories = Category::paginate(2);
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCategoryRequest $request)
    {
		$this->validate( $request, $request->messages());
		Category::create($request->all());
		$request->session()->flash('message.level', 'success');
		$request->session()->flash('message.content', 'New category added successfully!');
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
		$category = Category::findOrFail($id);
		return view('category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminCategoryRequest $request, $id)
    {
		$this->validate( $request, $request->messages());
		$input = $request->all();
		$category = Category::findOrFail($id);
		$category->update($input);
		$request->session()->flash('message.level', 'success');
		$request->session()->flash('message.content', 'Category updated successfully!');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
		$category = Category::findOrFail($id);

		$category->delete();
		$request->session()->flash('message.level', 'danger');
		$request->session()->flash('message.content', 'Category deleted successfully!');

		return redirect('/admin/category');
    }
}
