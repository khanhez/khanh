@extends('admin.layout.index')
@section('content')
<div id="page-wrapper" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Nhan vien
                    <small>Them</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('storerole')}}" method="POST">
                 @csrf()
                 <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" placeholder="name"   />
                </div> 
                <div class="form-group">
                    <label>Display name</label>
                    <input class="form-control" name="display_name" placeholder="Display name"   />
                </div>
                @foreach($permissions as $pr)
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="permission[]" value="{{$pr->id}}">
                  <label class="custom-control-label" for="customCheck1">{{$pr->display_name}}</label>
              </div>

              @endforeach
              <button type="submit" class="btn btn-success">Them role</button>
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