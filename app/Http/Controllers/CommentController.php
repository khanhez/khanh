<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Comment\ComEloquentRepository;
class CommentController extends Controller
{
    protected $comRepo;

    public function __construct(ComEloquentRepository $comRepo)
    {
        return $this->comRepo=$comRepo;
    }
   
    public function index()
    {
    	$data['comment'] =$this->comRepo->getAll();
    	
    	return view('admin.Comment.listCom',$data);
    }
 
    public function del($id)
    {
     $com =$this->comRepo->delete($id);
     
     return redirect()->route('indexcomment');
    }
}
