<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreatePost;
use App\Http\Requests\UpdatePost;
use Illuminate\Support\Facades\Storage;

use App\Post;
class PostController extends Controller
{


     public function index()
     {
      //Eager Loading
       $data['post'] = Post::paginate(3);   
       // $posts = collect($data['post'])->where('can_view',1);
       // //n post = n query lấy comment ->
       // foreach ($posts as $key => $post) {
       //    $post->list_comments = $post->comments;
       //   # code...
       // }
       return view('admin.Post.listpost',$data);
     }
     public function create()
     {
       return view('admin.Post.addpost');
     }
     public function store( Request $request)
     {
       $this->validate($request,
        [
         'title' =>'required',
         'content'=>'required',
         'img' =>'required|mimes:jpg,jpeg,png,gif,'
       ],
       [
         'title.required'=>'Ban chua nhap title',
         'content.required'=>'Ban chua nhap title',
         'img.required' => 'anh khong duoc de trong',
         'img.mimes' => 'anh chua dung dinh dang'
       ]);
       $post =$request->all();
       if ($request->hasfile('img')) {
        $post['img']=$request->file('img')->store('avatar','public');
      }
      Post::create($post);
      return redirect()->route('indexpost')->with('thongbao','Them thanh cong');
    }
    public function edit($id)
    {
      $post = Post::find($id);
      return view ('admin.Post.editpost',compact('post'));
    }
    public function update(Request $request,$id)
    {

      $this->validate($request,
        [
          'title' =>'required',
          'content'=>'required',
          'img' => 'required|mimes:jpg,jpeg,png,gif,'
        ],
        [
          'title.required'=>'Ban chua nhap title',
          'content.required'=>'Ban chua nhap title',
          'img.required' => 'Ban chua chon anh',
          'img.mimes' => 'anh chua dung dinh dang'
        ]);
      $post = Post::find($id);
      $post->title = $request->title;
      $post->content=$request->content;
      if ($request->hasfile('img')) {
        $DelImages=$post->img;
        Storage::delete('/public/'.$DelImages);
        $post['img']=$request->file('img')->store('avatar','public');
      }
      $post->save();
      return redirect()->route('indexpost')->with('thongbao','Update thanh cong');

    }
    public function  destroy($id)
    {
      $post = Post::destroy($id);
      return redirect()->route('indexpost');
    }
   


}
