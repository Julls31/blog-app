<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Image;


class PageController extends Controller
{
     public function index()
    {
        $pages = Post::where('post_type','=','page')->paginate(5);

        return view('pages.index',compact('pages'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'user_id' => 'required',
            'post_type' => 'required'
        ]);

        $query = Post::create($request->all());
        $last_id = $query->id; 

         $fileModel = new Image;
        if ($request->file() != null){
        $fileName = time().'_'. $request->file->getClientOriginalName();
        $destinationPath = 'images';
        $request->file->move(public_path($destinationPath), $fileName);
        $fileModel->name = $fileName;
        $fileModel->post_id = $last_id;
        $fileModel->file_path = 'images/' . $fileName;
        $fileModel->save();
        };


        return redirect()->route('pages.index')
                        ->with('success','Page created successfully with ID'.$last_id);
    }

    public function show(Post $page)
    {
        return view('pages.show')->with(compact('page'));
    }

    public function edit(Post $page)
    {
        return view('pages.edit')->with(compact('page'));
    }

    public function update(Request $request, Post $page)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $page->update($request->all());

        return redirect()->route('pages.index')
                        ->with('success','Post updated successfully');
    }

    public function destroy(Post $pages)
    {
        $pages->delete();

        return redirect()->route('pages.index')
                        ->with('success','Post deleted successfully');
    }
}
