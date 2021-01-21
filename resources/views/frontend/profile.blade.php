@extends('index')
@section('content')  


    <!-- start profile info   -->

    <div class="profile-info">
        
        <h2>user profile </h2>
       
        <input type="text" placeholder=" first name" class="name">
       
        <input type="text" placeholder="last name"class="name">
        
        <input type="email" placeholder="example@gmail.com"class="info">

        <label>birthday</label>
         <input id="day"class="birthday"type="text" placeholder="day *" min ="0"max="31">
         <input id="month"class="birthday"type="text" placeholder="month *" min="0"max="12">
         <input id="year"class="birthday"type="text" placeholder="year *"min="1950" max="2015">

         <input type="text" placeholder="company"class="linfo">

          <input type="text" placeholder="nationality"class="linfo">

           <input type="text" placeholder="residence"class="linfo">

           <input type="text" placeholder="mobile"class="linfo">

           <hr>

           <h2> your process</h2>

    <h5> in which step the user service has reached</h5>          
    </div>




    <!-- end profile info  -->
@endsection  