@extends('layouts.index')
@section('content')

<div class="container">
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-9">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>{{$shows->title}}</h1>

            <!-- Author -->
            
            <img width="150px" height="150px" src="{{url('/upload/img/'.$shows->img)}}" >
            <!-- Preview Image -->
            

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> {{$shows->create_at}}</p>
            <hr>

            <!-- Post Content -->
            <p class="lead">{!! $shows->content !!}</p>

            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div id="comment">
                
             
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form" method="post">
                    	{{csrf_field()}}
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input required type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="name">Tên:</label>
                            <input required type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="cm">Bình luận:</label>
                            <textarea required rows="10" id="cm" class="form-control" name="content" ></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Binh luan</button>
                        
                    </form>
                </div>
            </div>
            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->
            <div class="media">
             @foreach($comments as $com)
             <div class="media-body">
                <h4 class="media-heading">
                    {{$com->name}}
                </br>
                <span>{{date('d/m/Y H:i',strtotime($com->created_at))}}</span>    
            </h4>
            {{$com->content}}
        </div>
        @endforeach
        
    </div>
    <hr>

    <!-- Comment -->
    

</div>

<!-- Blog Sidebar Widgets Column -->

</div>
<!-- /.row -->
</div>



@endsection
