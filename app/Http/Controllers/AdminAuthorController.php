<?php

namespace App\Http\Controllers;

use App\Author;
use App\Photo;
use App\Post;
use App\Http\Requests\AdminAuthorRequest;
use Illuminate\Http\Request;

class AdminAuthorController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$authors = Author::all();
		return view('author.index', compact('authors'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('author.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(AdminAuthorRequest $request)
	{
		$this->validate($request, $request->messages());
		$input = $request->all();
		if ($file = $request->file('photo_id')) {
			$name = time() . $file->getClientOriginalName();

			$file->move('images', $name);

			$photo = Photo::create(['file' => $name]);

			$input['photo_id'] = $photo->id;
		}

		Author::create($input);
		$request->session()->flash('message.level', 'success');
		$request->session()->flash('message.content', 'New author added successfully!');
		return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$author = Author::findOrFail($id);
		return view('author.show', compact('author'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$author = Author::findOrFail($id);
		return view('author.edit', compact('author'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(AdminAuthorRequest $request, $id)
	{
		$input = $request->all();

		if ($file = $request->file('photo_id')) {
			$name = time() . $file->getClientOriginalName();

			$file->move('images', $name);

			$photo = Photo::create(['file' => $name]);

			$input['photo_id'] = $photo->id;
		}

		Author::whereId($id)->first()->update($input);
		$request->session()->flash('message.level', 'success');
		$request->session()->flash('message.content', 'Updated successfully!');
		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request,$id)
	{
		$author = Author::findOrFail($id);
		if ($author->photo) {
			unlink(public_path() . $author->photo->file);
		}
		Post::where('author_id', $id)->update(array('author_id'=>null));
		$author->delete();
		$request->session()->flash('message.level', 'danger');
		$request->session()->flash('message.content', $author->name. ' deleted successfully!');

		return redirect('/admin/author');
	}
}
