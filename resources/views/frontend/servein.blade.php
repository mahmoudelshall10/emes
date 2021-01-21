@extends('index')
@section('content') 
@push('css')
<link rel="stylesheet" href="{{url('design/dashboard')}}/css/servein.css" type="text/css">
@endpush



<!-- start contries  -->

<div class="contries" id="contries">

  
  <!-- start left box for reaching our branches -->


        <div class="cont-container">
 
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs " role="tablist">
    <li class="nav-item" id="egypt">
      <a class="nav-link active" data-toggle="tab" href="#egypt">egypt</a>
    </li>
    
    <li class="nav-item" id="sa">
      <a class="nav-link" data-toggle="tab" href="#saudia">saudi arabia</a>
    </li>

    <li class="nav-item" id="uae">
      <a class="nav-link" data-toggle="tab" href="#emirates">united arab emirates</a>
    </li>

    
  </ul>
   






<!-- end contries  -->




@push('js')  
  <script src="{{url('design/dashboard')}}/js/serve.js" type="text/javascript"></script>
@endpush
@endsection  

    <!-- start left box for reaching our branches -->
    <h2>contact us</h2>
    
    <div class="contacts">
        <div class="container">
    <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs " role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#egypt">egypt</a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#saudia">saudi arabia</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#emirates">uae</a>
    </li>

    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    
@php
    $serveins = \App\Model\Servein::orderBy('id','asc')->get();
@endphp
  <!-- Tab panes -->
  @foreach ($serveins as $servein)
    <div class="tab-content">
    <div id="{{$servein->country_id}}" class="container tab-pane"><br>
      <ul class="{{$servein->country_id}}-contacts">
         <li><i class="fas fa-map-marker"></i> <span>{{$servein->company_address}}</span></li>
         <li><i class="fas fa-phone-alt"></i> <span>{{$servein->company_phone}}</span></li>
         <li><i class="fas fa-envelope"></i> <span>{{$servein->company_email}}</span></li>
      </ul>
     </div>
    </div>
    @endforeach 
    
  </div>

  
</div>
    </div>

    <div class="comment">
      
        <form method="post" url="{{url('servein')}}" >
            <input type="text" name="name" placeholder="full name">
            <input type="email" placeholder="email"name="email" placeholder="email">
            <textarea name="comment"  cols="40" rows="6" placeholder="your comment is very important to us "></textarea>
            <button type="submit">send</button>
        </form>
    </div>