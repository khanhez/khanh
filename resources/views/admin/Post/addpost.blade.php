@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Post
          <small>add</small>
        </h1>
      </div>
      <!-- /.col-lg-12 -->
      <div class="col-lg-7" style="padding-bottom:120px">

        @if(count($errors) >0)
        @foreach($errors->all() as $err)
        <div class="alert alert-danger">
          {{$err}}
          <br>
        </div>
        @endforeach
        @endif
        @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
        @endif
        <form action="{{route('storepost')}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            <label>Title</label>
            <input class="form-control" name="title" placeholder="Title" />
          </div>
          <div class="form-group">
            <label>Anh</label>
            <input class="form-control" type="file" name="img" placeholder="Body" />
          </div>
           <div class="form-group">
            
            <input type="hidden" class="form-control"  name="user_id" placeholder="Body" />
          </div>
          <div class="form-group">
           <label>Content</label>
           <textarea name="content" class="form-control " id="editor1"></textarea>
         </div>
         
         <button type="submit" class="btn btn-default"> add</button>
         <button type="reset" class="btn btn-default">Reset</button>
         <form>
         </div>
       </div>
       <!-- /.row -->
     </div>
     <!-- /.container-fluid -->
   </div>
   @stop