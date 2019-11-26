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
      <table class="table">
        <thead>
         <tr align="center">
          <th style="text-align: center;">STT</th>
          <th style="text-align: center;">Name</th>
          <th style="text-align: center;">Email</th>

          <th style="text-align: center;">Edit</th>
          <th style="text-align: center;">Delete</th>
        </tr>
      </thead>
      <tbody>
       @foreach($user as $us)
       <tr class="odd gradeX" align="center">
        <td>{{$loop->iteration}}</td>
        <td>{{$us->name}}</td>
        <td>{{ $us->email }}</td>
        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('edituser',$us->id)}}"> Edit</a></td>
        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('deleteuser',$us->id)}}">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>



</div>
</div>

@stop