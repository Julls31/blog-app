<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Post;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
       $posts = DB::table('posts') 
            ->join ( 'users' , 'users.id', '=', 'posts.user_id')->latest('posts.created_at')
            ->paginate(2);
        return view('blog.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $id;

        $posts = DB::table('posts')
                ->where('id', '=', $id)
                ->get();
        // echo var_dump($users);
        return view('blog.post.post',compact('posts'));
    }


     public function comment (Request $request)
        {
            $request->validate([

                'name' => 'required',
                'email' => 'required|unique:users',

            ]);

            DB::table('comment')-> insert([
                'name' => $request->name,
                'email' => $request->email,
                'comment' => $request->comment,
                'post_id' => $request->post_id,
            ]);

            return redirect()->route('blog/'. $request->post_id)->with('success', 'Registrasi Berhasil. Silahkan Login!');

        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    protected function edit($id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    protected function update(Request $request, $id)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    protected function destroy($id)
    {
        return abort(404);
    }
}
