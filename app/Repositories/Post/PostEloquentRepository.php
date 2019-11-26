<?php
namespace App\Repositories\Post;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class PostEloquentRepository extends EloquentRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel() //de sau them model tuong ung voi repo mi can xu ly
    {
        return \App\Post::class;
    }
    public function getAll()
    {
    	return \App\Post::with('user')->get();
    }
    public function create($attributes)
    {
        $post =$attributes->all();
        $post['user_id'] = Auth::id(); //là khóa phụ khi 1 user thêm bài post thì có user_id của user đo,thêm trong view và đển type="hidden"
        if ($attributes->hasfile('img')) {
             $post['img']=$attributes->file('img')->store('avatar','public');
         }
        \App\Post::create($post);
        
        return  $post;
    }
    public function find($id)
    {
    	return \App\Post::find($id);
    }
    public function update($id, $attributes)
    {
        $post =$this->find($id);
        $post->title = $attributes->title;
        $post->content=$attributes->content;
        if ($attributes->hasfile('img')){
            $DelImages=$post->img;
            Storage::delete('/public/'.$DelImages);
            $post['img']=$attributes->file('img')->store('avatar','public');
            }
        return $post ->update();
    }
    public function delete($id)
    {
        $post =$this->find($id);
        return $post->delete($id);
    }
}