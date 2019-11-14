@extends('layouts.home')
@section('kaka')
<main>
	
	<section id="y2">
		<div class="container">
			<div class="row">
				<div class="anh3 col-md-12">
					@foreach($shows as $show)
					<div class="anh1 col-md-4">
						
						<a href="#"><img style="border-radius: 10px;" src="{{url('storage/'.$show->img)}}" alt="" width="350px" height="300px"></a>
						<span>{{$show->created_at}}</span>
						<p>{{ str_limit($show->title,20)}}</p>
						<a class="btn btn-primary" href="{{route('chitiet',$show->id)}}">Xem chi tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
						
					</div>	
					@endforeach       	
				</div>
			</div>
		</div>
	</section>
</main>
@stop