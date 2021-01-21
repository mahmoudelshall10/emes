@extends('index')
@section('content')  
@push('css')
    <link rel="stylesheet" href="{{url('design/dashboard')}}/css/style.css" type="text/css">
    <link rel="stylesheet" href="{{url('design/dashboard')}}/css/knowledge-style.css" type="text/css">
@endpush
       

         {{-- <title> EMES-E-learning </title> --}}
 



    <!-- start title pic-->
    <div class="title-image-e-learning">
       
        <div class="overlay">
             <h1 class="animated bounceInRight">e-learning</h1>
        </div>
    
    </div>
    <!-- end title pic  -->



    <!-- start defining area  -->

        <div class="define">
            <h3>e-learning data</h3>
            <div class="define-container-e-learn">
                about this service...
            </div>

            <!-- available courses  -->
            <div class="courses">
                <h3>available courses</h3>

                <div class="course one">
                    <div class="overflow">
                        <a href="#"><i class="fas fa-school"></i></a>
                        <h4> face to face course</h4>
                        <a href="courses.html" class="add"><i class="fas fa-plus-circle"></i>
                        <!-- <span class="tooltiptext">add to shoping cart</span> -->
                        </a>
                    </div>
                </div>
                
                <div class="course two"> 
                     <div class="overflow">
                           <a href="#"><i class="fas fa-chalkboard"></i></i></a>
                        <h4> online course</h4>
                         <a href="courses.html" class="add"><i class="fas fa-plus-circle"></i>
                        <!-- <span class="tooltiptext">add to shoping cart</span> -->
                        </a>
                    </div>
                </div>
             
            </div>
            <!-- end of available courses -->

        </div>
    <!-- end defining  -->

<hr>
@endsection  