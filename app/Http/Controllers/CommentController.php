<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    
    public function index()
    {
    $posts = DB::table('posts') 
            ->join ( 'comment' , 'posts.id', '=', 'comment.post_id')->latest('posts.created_at')
            ->paginate(10);
    $komen = DB::table('comment')
            ->select ('id')
            ->get();



        return view('posts.comment',compact('posts','komen'));
    }
    
    public function update(Request $request, $id)
    {
        // echo $request->input('approve');
       DB::table('comment')
            ->where('id',$request->input('approve'))
            ->update(['approve' => 1]);
    }

}
