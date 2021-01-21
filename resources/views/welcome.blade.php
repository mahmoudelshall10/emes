@extends('index')
@section('content')
<!-- start slider code  -->

<div class="slider">
            
<div id="demo" class="carousel slide" data-ride="carousel">


    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
      <li data-target="#demo" data-slide-to="3"></li>
      <li data-target="#demo" data-slide-to="4"></li>
      <li data-target="#demo" data-slide-to="5"></li>
      <li data-target="#demo" data-slide-to="6"></li>
      <li data-target="#demo" data-slide-to="7"></li>
    </ul>
    
    <!-- The slideshow -->
    <div class="carousel-inner">
     
      <div class="carousel-item sld1 active">
      <div class="overlay">
  
      <span class="animated bounceInDown">plan</span> 
      <h1 class="animated bounceInRight">for success</h1>
      
      </div>
      </div>
     
      <div class="carousel-item sld2">
      <div class="overlay">
           <span class="animated bounceInDown">knowledge & learning</span> <h1 class="animated bounceIn">are our tools for success</h1>
      </div>
      </div>
     
      <div class="carousel-item sld3">
      <div class="overlay">
            <h1 class="animated bounceInDown"> we support your</h1> <span class="animated bounceInLeft">management</span><h1 class="animated bounceInUp">with our experience</h1>
      </div>
      </div>
  
      <div class="carousel-item sld4">
      <div class="overlay">
          <h1 class="animated rotateInDownRight">we provide you our </h1><span class="animated jackInTheBox">mep services</span> <h1 class="animated rotateInUpLeft">with very high quality </h1>
      </div>
      </div>
  
      <div class="carousel-item sld5">
      <div class="overlay">
          <h1 class="animated bounceInLeft">check out our</h1> <span class="animated bounceIn"> architecture services </span>
      </div>
      </div>
  
      <div class="carousel-item sld6">
      <div class="overlay">
          <h1 class="animated rollIn">check out our</h1> <span class="animated rotateIn"> structure services </span>
      </div>
      </div>
  
      <div class="carousel-item sld7">
      <div class="overlay">
          <span>emes</span><h1>engineering & management</h1> <h1>E-services</h1>
      </div>
      </div>
  
      <div class="carousel-item sld8">
      <div class="overlay">
          <span>emes</span><h1>engineering & management</h1> <h1>E-services</h1>
      </div>
      </div>

</div>
</div>


 </div>      <!-- end slider code  -->

<!-- end header with nav bar  -->


<!-- start questions  -->

<section  class="questions">
<div class="container">
    <h3 class="section-header">Why EMES !?</h3>
        <div class="row">
           @php
               $Cards = \App\Model\Card::orderBy('id','asc')->get();
           @endphp
           @foreach ($Cards as $Card)
           <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="define">
                <div class="content-area">

                    <div class="side-one">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="img-area">
                                    <h4> EMES </h4>
                                </div>
                                 <i class="{{$Card->icon}}"></i>
                            </div>
                        </div>
                    </div>

                    <div class="side-two">
                        <div class="card">
                            <div class="card-body text-center mt-4">
                                <h4>{{$Card->name}}</h4>
                                <p>{{$Card->content}}</p>
                            </div>
                        </div>
                    </div>
       
                </div>
            </div>
        </div>
           @endforeach



        </div>
    </div>
</section>
    
    <!-- end questions section  -->


    <hr>

    <!-- start services and products  -->
<div class="container">
   
    <h2>Services & Products</h2>
     <br>
     <!-- Nav pills -->
     <ul class="nav nav-pills" role="tablist">

        <li class="nav-item">
          <a class="nav-link active" data-toggle="pill" href="#services">Services</a>
        </li>

        {{-- <li class="nav-item">
         <a class="nav-link" data-toggle="pill" href="#products">Products</a>
        </li> --}}

    
    </ul>

<!-- start what services and products ccontains -->

<div class="tab-content important">
     
     <div id="services" class="container tab-pane active"><br>
       
       <ul class="main-links">
            <li><a href="#"class="know-learn">knowledge & learning</a></li>
            <li><a href="#"class="management">management</a></li>
            <li><a href="#"class="mep">mep services</a></li>
            <li><a href="#"class="arch">architecture services</a></li>
            <li><a href="#"class="struc">structure services</a></li>
       </ul>
         
         <!-- left box for links  -->
                    <div class="sub-links">
                        <h5>Related Links...</h5>
                        <ul class="knowledge-learning-links">
                            <li><a href="{{url('knowledge')}}" id="know">knowledge</a></li>
                            <li><a href="{{url('e-learning')}}" id="elear">e-learning</a></li>
                        </ul>   
                        <ul class="management-links">
                            <li><a href="{{url('service-forms')}}" id="estimation">estimation & budgeting</a></li>
                            <li><a href="{{url('service-forms')}}" id="planning">planning packages</a></li>
                            <li><a href="{{url('service-forms')}}" id="man-rol">roling wave planning services</a></li>
                            <li><a href="{{url('service-forms')}}" id="man-monitor">monitor & control</a></li>
                            <li><a href="{{url('service-forms')}}" id="man-custom">ready customizable forms for various management aspects</a></li>
                            <li><a href="{{url('service-forms')}}" id="man-rep">reporting forms</a></li>
                        </ul>
                        <ul class="mep-links">
                            <li><a href="{{url('service-forms')}}" id="mep-hvac"> design drawing & shop drawing (HVAC \ cad)</a></li>
                            <li><a href="{{url('service-forms')}}" id="mep-plumb"> design drawing & shop drawing (plumbing \ cad)</a></li>
                            <li><a href="{{url('service-forms')}}" id="mep-fire"> design drawing & shop drawing (fire fighting \ cad)</a></li>
                            <li><a href="{{url('service-forms')}}" id="mep-elect"> design drawing & shop drawing (electrical systems \ cad)</a></li>
                            <li><a href="{{url('service-forms')}}" id="mep-low-current"> design drawing & shop drawing (low current systems \ cad)</a></li>
                            <li><a href="{{url('service-forms')}}" id="mep-boq"> quantity take off & preparing BOQ</a></li>
                            <li><a href="{{url('service-forms')}}" id="mep-outline"> develop outline project specifications</a></li>
                        </ul>
                        <ul class="architecture-links">
                            <li><a href="{{url('service-forms')}}" id="arch-interior"> design drawing & shop drawing (interior\ cad)</a></li>
                            <li><a href="{{url('service-forms')}}" id="arch-urban"> design drawing & shop drawing (urban\ cad)</a></li>
                            <li><a href="{{url('service-forms')}}" id="arch-exterior"> design drawing & shop drawing (exterior\ cad)</a></li>
                            <li><a href="{{url('service-forms')}}" id="arch-boq"> quantity take off & preparing BOQ</a></li>
                            <li><a href="{{url('service-forms')}}" id="arch-outline"> develop outline project specifications</a></li>
                        </ul>
                        <ul class="structure-links">
                            <li><a href="{{url('service-forms')}}" id="struc-interior"> design drawing & shop drawing (interior\ cad)</a></li>
                            <li><a href="{{url('service-forms')}}" id="struc-boq"> quantity take off & preparing BOQ</a></li>
                            <li><a href="{{url('service-forms')}}" id="struc-outline"> develop outline project specifications</a></li>
                        </ul>
                    </div>

        <!-- right box for written text  -->
        <div class="texted-area-js">
            <h5>About This Category...</h5>
         <ul class="changed-type">

            <li class="knowledge-description">knowledge-description</li>
            <li class="elearning-description">e-learning-description</li>

            <li class="manage-est-budg-description">estimation & budgeting</li>
            <li class="manage-plan-pack-description">planning packages</li>
            <li class="manage-rol-wave-description">roling wave planning services</li>
            <li class="manage-monitor-control-description">monitor & control</li>
            <li class="manage-ready-forms-description">ready customizable forms for various management aspects</li>
            <li class="manage-report-forms-description">reporting forms</li>
            
            <li class="mep-hvac-description"> design drawing & shop drawing (HVAC \ cad)</li>
            <li class="mep-plumbing-description">design drawing & shop drawing (plumbing \ cad)</li>
            <li class="mep-fire-description">design drawing & shop drawing (fire fighting \ cad)</li>
            <li class="mep-electrical-description">design drawing & shop drawing (electrical systems \ cad)</li>
            <li class="mep-low-current-description">design drawing & shop drawing (low current systems \ cad)</li>
            <li class="mep-boq-description">quantity take off & preparing BOQ</li>
            <li class="mep-outline-description">develop outline project specifications</li>
            
            <li class="arch-interior-description">design drawing & shop drawing (interior\ cad)</li>
            <li class="arch-urban-description">design drawing & shop drawing (urban\ cad)</li>
            <li class="arch-exterior-description">design drawing & shop drawing (exterior\ cad)</li>
            <li class="arch-boq-description">quantity take off & preparing BOQ</li>
            <li class="arch--outline-description"> develop outline project specifications</li>
            
            <li class="struc-interion-description">design drawing & shop drawing (interior\ cad)</li>
            <li class="struc-boq-description">quantity take off & preparing BOQ</li>
            <li class="struc-outline-description">develop outline project specifications</li>
            
         </ul>
         
        </div>


    </div>
     
      {{-- <div id="products" class="container tab-pane fade main-links-products"><br>
        <ul class="main-links">
            <li><a href="html/underconstruction.html">category one</a></li>
            <li><a href="html/underconstruction.html">category two</a></li>
            <li><a href="html/underconstruction.html">category three </a></li>
            <li><a href="html/underconstruction.html">category four</a></li>
            <li><a href="html/underconstruction.html">category five</a></li>
       </ul>
     </div> --}}

</div>

</div>    

    <!-- end services and products  -->

<hr>

@endsection
