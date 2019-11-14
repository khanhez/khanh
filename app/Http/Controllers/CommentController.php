<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
class CommentController extends Controller
{
    public function index()
    {
    	$data['comment'] = Comment::all();
    	
    	return view('admin.Comment.listCom',$data);
    }
    public function  del($id)
    {
        $com = Comment::find($id);
        $com->delete();
        return redirect()->route('indexcomment');
    }
}
