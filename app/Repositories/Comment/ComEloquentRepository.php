<?php
namespace App\Repositories\Comment;

use App\Repositories\EloquentRepository;

class ComEloquentRepository extends EloquentRepository
{
	public function getModel()
	{
		return \App\Comment::class;
	}
	public function getAll()
	{
		return \App\Comment::get();
	}
	public function find($id)
	{
		return \App\Comment::find($id);
	}
	public function delete($id)
	{
		$com=$this->find($id);
		return $com->delete($id);
	}
}
?>