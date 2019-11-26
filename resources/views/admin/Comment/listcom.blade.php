@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Comment
          <small>Edit</small>
        </h1>
      </div>
      <table class="table">
        <thead>
         <tr align="center">
          <th style="text-align: center;">STT</th>
          <th style="text-align: center;">Name</th>
          <th style="text-align: center;">Content</th>
          <th style="text-align: center;">Delete</th>
        </tr>
      </thead>
      <tbody>
       @foreach($comment as $com)
       <tr class="odd gradeX" align="center">
        <td >1</td>
        <td>{{$com->name}}</td>

        <td>{{ $com->content }}</td>
        
        <td><a href="{{route('dele',$com->id)}}" onclick="return confirm('Bạn có muốn xóa không ?')">Delete</a></td>
        @endforeach
      </tbody>
    </table>

  </div>



</div>
</div>

@endsection