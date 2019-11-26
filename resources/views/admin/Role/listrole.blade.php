@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <small>List</small> 
                    
                </h1>
                
            </div >
            <div id="tbl_nhansu">
                
                <table class="table table-bordered table-striped ">
                    <thead>
                        <tr align="center">
                            <th style="text-align: center;">ID</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Display name</th>
                            
                            <th style="text-align: center;">Delete</th>
                            <th style="text-align: center;">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($role as $r)
                        <tr class="odd gradeX" align="center">
                            <td >{{$loop->iteration}}</td>
                            <td >{{$r->name}}</td>
                            <td >{{$r->display_name}}</td>
                            
                            <td class="center">
                                <i class="fa fa-trash-o  fa-fw"></i><a href="{{route('editrole',$r->id)}}">Edit</a>
                                
                            </td>
                            <td class="center">
                                <i class="fa fa-trash-o  fa-fw"></i><a href="{{route('deleterole',$r->id)}}"> Xoa</a>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            
            
        </div>
        <!-- /.row -->
    </div>
   
</div>
@stop