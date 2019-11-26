@extends('admin.layout.index')
@section('content')
<div id="page-wrapper" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tài khoản
                    <small>Sửa</small>
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
                <form action="{{route('updateuser',$user->id)}}" method="POST">
                 @csrf()
                 <div class="form-group">
                    <label>Ten</label>
                    <input class="form-control" name="name" placeholder="Ten " value="{{$user->name}}" />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="email" placeholder="email" value="{{$user->email}}"  />
                </div>
                <div class="form-group">
                    <label>Paasword </label>
                    <input class="form-control" type="password" name="password" placeholder="Nhap password" value="{{$user->password}}" disabled="disabled" />
                </div>
                <div>
                    <select class="form-control " name="roles[]" multiple="multiple">
                        @foreach($roles as $ro)      
                        <option 

                        {{ $list->contains($ro->id) ? 'selected' : '' }}
                        value="{{$ro->id}}">
                        {{$ro->display_name}}
                    </option>
                    @endforeach     
                </select>
            </div>
            <div class="form-group">
                <label>Category Status</label>
                <label class="radio-inline">
                    <input name="rdoStatus" value="1" checked="" type="radio">Visible
                </label>
                <label class="radio-inline">
                    <input name="rdoStatus" value="2" type="radio">Invisible
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Sửa tài khoản</button>
           
            <a href="{{route('indexuser')}}" class="btn btn-success" >Reset</a>
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