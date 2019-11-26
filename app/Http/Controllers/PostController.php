<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Post\PostEloquentRepository;
use App\Http\Requests\CreatePost;
use App\Http\Requests\UpdatePost;
use App\Post;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    protected $postRepo;

    public function __construct(PostEloquentRepository $postRepo)

    {

        return $this->postRepo=$postRepo;
        
    } 

    public function index()

    {  
        $data['post'] = $this->postRepo->getAll();

        return view('admin.Post.listpost',$data);

    }

    public function create()

    {
        $user_id = Auth::id(); 
        return view('admin.Post.addpost',compact('user_id'));

    }

    public function store(CreatePost $request)

    {


        $this->postRepo->create($request);

        return redirect()->route('createpost')->with('thongbao','Ban đã thêm thành công');

    }

    public function edit($id)

    {
        $post = $this->postRepo->find($id);

        return view ('admin.Post.editpost',compact('post'));

    }

    public function update(UpdatePost $request,$id)

    {

        $post = $this->postRepo->update($id, $request);

        return redirect()->route('editpost',$id)->with('thongbao','Update thanh cong');

    }

    public function  destroy($id)
    
    {

        $post=$this->postRepo->delete($id);
      
        return redirect()->route('indexpost');         
    }
    
}