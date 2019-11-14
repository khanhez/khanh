@extends('layouts.home')
@section('kaka')
<main>
  
	<section id="y2">
     <div class="container">
        <div class="row">
           <div class="anh3 col-md-12" >
              
             
             <a href="#"><img style="border-radius: 10px;" src="{{url('/upload/img/'.$shows->img)}}" alt="" width="350px" height="300px"></a>
             <p oncopy="show_message()">{{$shows->title}}</p>
             <span>{{$shows->created_at}}</span>
             <p>{!! $shows->content !!}</p>
             
             
         </div>	
         
     </div>
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
                <textarea required rows="2" id="cm" class="form-control" name="content" ></textarea>
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
</div>
</section>
</main>
<script type="text/javascript">
   function show_message()
   {
    alert('Bạn đã copy thành công');
}
</script>   
@stop