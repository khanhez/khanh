<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
class PagesController extends Controller
{
	public function home()
	{   
		$data['show'] = Post::all();
		return view('pages.trangchu',$data);
	}
	public function homes()
	{   
		$data['shows'] = Post::orderBy('id','desc')->take(6)->get();
		return view('pages.trangchus',$data);
	}
	public function details($id)
	{
		$data['shows'] = Post::find($id);
		$data['comments'] = Comment::where('id_post',$id)->get();
		return  view('pages.details',$data);
	}
	public function chitiet($id)
	{
		$data['shows'] = Post::find($id);
		$data['comments'] = Comment::where('id_post',$id)->get();
		return view('pages.chitiet',$data);
	}
	public function postcomment(Request $request,$id)
	{
		$comment = new Comment;
		$comment->email= $request->email;
		$comment->name=$request->name;
		$comment->content= $request->content;
		$comment->id_post=$id;

		$comment->save();
		return back();
	}
	public function postcomments(Request $request,$id)
	{
		$comment = new Comment;
		$comment->email= $request->email;
		$comment->name=$request->name;
		$comment->content= $request->content;
		$comment->id_post=$id;

		$comment->save();
		return back();
	}


}
