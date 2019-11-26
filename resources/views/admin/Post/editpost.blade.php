@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Post
          <small>Edit</small>
        </h1>
      </div>
      <!-- /.col-lg-12 -->
      <div class="col-lg-7" style="padding-bottom:120px">
        @if(count($errors) >0)
         @foreach($errors->all() as $er)

         <div class="alert alert-danger">
            {{$er}}
         <br>
         </div>
        
         @endforeach
        @endif
       @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
        @endif
        <!--  -->
        <form action="{{route('updatepost',$post->id)}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            <label>Title</label>
            <input class="form-control" name="title" placeholder="Title" value="{{$post->title}}" />
          </div>
          <div class="form-group">
            <label>Anh</label>
            <input class="form-control" type="file" name="img" placeholder="Body" value="{{$post->img}}" />
          </div>
            <div class="form-group">
              <img src="{{url('storage/'.$post->img)}}" width="150px" height="150px" alt="">
            </div>
          <div class="form-group">
           <label>Content</label>
           <textarea name="content" class="form-control " id="editor1">{{$post->content}}
           </textarea>
         </div>
         
         <button type="submit" class="btn btn-default"> edit</button>
         <button type="reset" class="btn btn-default" value="{{route('indexpost')}}">Reset</button>
         <form>
         </div>
       </div>
       <!-- /.row -->
     </div>
     <!-- /.container-fluid -->
   </div>
   @stop