@extends('admin.layout.index')
@section('content')
<div id="page-wrapper" >
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Role
          <small>edit</small>
        </h1>
      </div>
      <!-- /.col-lg-12 -->
      <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{route('updaterole',$role->id)}}" method="POST">
         @csrf()
         <div class="form-group">
          <label>Name</label>
          <input class="form-control" name="name" placeholder="name"  value="{{$role->name}}" />
        </div> 
        <div class="form-group">
          <label>Display name</label>
          <input class="form-control" name="display_name" placeholder="Display name"  value="{{$role->display_name}}" />
        </div>
        @foreach($permissions as $pr)
        <div class="custom-control custom-checkbox">
          <input 

          {{ $allPermision->contains($pr->id) ? 'checked' : '' }}

          type="checkbox" class="custom-control-input" id="permission[]" value="{{$pr->id}}">
          <label class="custom-control-label" for="customCheck1">{{$pr->display_name}}</label>
        </div>

        @endforeach
        <button type="submit" class="btn btn-success">Edit role</button>
        <button type="reset" class="btn btn-default">Reset</button>
        <form>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->

</div>
@stop
