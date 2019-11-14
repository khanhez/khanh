@extends('layouts.index')
@section('content')

<div class="container" >
    <div class="row">
        <div class="col-md-12">
            @foreach($show as $sw)
            <div class="col-md-3">
                <h5>{{$sw->title}}</h5>
                <img width="150px" height="150px" src="{{url('/upload/img/'.$sw->img)}}" >
                <br>
                <span>{{$sw->created_at}}</span>
                <br>
                <a  class="btn btn-primary"  href="{{route('details',$sw->id)}}">Xem chi tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div> 
            @endforeach
        </div>
    </div>
</div>
@endsection