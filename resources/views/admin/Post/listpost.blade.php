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
      <div id="iid_post">
        <table class="table">
          <thead>
           <tr align="center">
            <th style="text-align: center;">STT</th>
            <th style="text-align: center;">Title</th>
            <th style="text-align: center;">Content</th>
            <th style="text-align: center;">Images</th>
            <th style="text-align: center;">Edit</th>
            <th style="text-align: center;">Delete</th>
            

          </tr>
        </thead>
        <tbody>
         @foreach($post as $po)
         <tr class="odd gradeX" align="center">
          <td >{{$loop->iteration}}</td>
          <td>{!! str_limit($po->title,10) !!}</td>
    
          <td style="width: 50px">
            <div style="width: 500px; height: 200px; overflow-y:  scroll;">
              {!! $po->content !!}
            </div>
          </td>

          <td><img width="100px" height="100px" src="{{url('storage/'.$po->img)}}" ></td>
          <td class="center"><a href="{{route('editpost',$po->id)}}"> Edit</a></td>
          <td>
            <a href="{{route('deletepost',$po->id)}}" onclick="return confirm('Bạn có chắc chắn xóa không ?')">Delete </a>
            
          </td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


</div>
</div>

@endsection
