        <!-- start nav  -->
     <nav id="navbar">
            <a class="logo" href="{{url('/')}}"><img src="{{it()->url(setting()->logo)}}" alt="logo"></a>
        <ul>   
			<form class="form-inline" action="/action_page.php">
				<input class="form-control mr-sm-2" type="text" placeholder="Search">
				<button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
			</form>
			<li><a href="{{url('/')}}" class="{{Request::segment(1) == null ? 'active':''}}">Home</a></li>
			<li class="services-category"><a href="#">services</a>

				<ul class="servicses-list">
   
				   <li><a href="#" class="knowledge-category"> knowledge & learning</a>
					   <ul class="knowledge-list">
						   <li><a href="{{url('knowledge')}}">knowledge</a></li>
						   <li><a href="{{url('e-learning')}}">e-learning</a></li>
					   </ul>
				   </li>
   
				   <li><a href="#"class="management-category">management</a>
						<ul class="management-list">
								   <li><a href="{{url('service-forms')}}">estimation & budgeting</a></li>
								   <li><a href="{{url('service-forms')}}">planning packages</a></li>
								   <li><a href="{{url('service-forms')}}">roling wave planning services</a></li>
								   <li><a href="{{url('service-forms')}}">monitor & control</a></li>
								   <li><a href="{{url('service-forms')}}">ready customizable forms for various management aspects</a></li>
								   <li><a href="{{url('service-forms')}}">reporting forms</a></li>
						</ul>
				   </li>
   
				   <li><a href="#"class="mep-category">mep services</a>
   
					   <ul class="mep-list">
							<li><a href="{{url('service-forms')}}"> design drawing & shop drawing (HVAC)\ cad</a></li>
							<li><a href="{{url('service-forms')}}"> design drawing & shop drawing (plumbing)\ cad</a></li>
							<li><a href="{{url('service-forms')}}"> design drawing & shop drawing (fire fighting)\ cad</a></li>
							<li><a href="{{url('service-forms')}}"> design drawing & shop drawing (electrical systems)\ cad</a></li>
							<li><a href="{{url('service-forms')}}"> design drawing & shop drawing (low current systems)\ cad</a></li>
							<li><a href="{{url('service-forms')}}"> quantity take off & preparing BOQ</a></li>
							<li><a href="{{url('service-forms')}}"> develop outline project specifications</a></li>
					   </ul> 
				   </li>
	   
				   <li><a href="#"class="arch-category">architecture services</a>
					   <ul class="architecture-list">
						   <li><a href="{{url('service-forms')}}"> design drawing & shop drawing (interior)\ cad</a></li>
						   <li><a href="{{url('service-forms')}}"> design drawing & shop drawing (urban)\ cad</a></li>
						   <li><a href="{{url('service-forms')}}"> design drawing & shop drawing (exterior)\ cad</a></li>
						   <li><a href="{{url('service-forms')}}"> quantity take off & preparing BOQ</a></li>
						   <li><a href="{{url('service-forms')}}"> develop outline project specifications</a></li>
					   </ul>
				   </li>
   
				   <li><a href="#"class="structure-category">structure services</a>
					   <ul class="structure-list">
						   <li><a href="{{url('service-forms')}}"> design drawing & shop drawing (interior)\ cad</a></li>
						   <li><a href="{{url('service-forms')}}"> quantity take off & preparing BOQ</a></li>
						   <li><a href="{{url('service-forms')}}"> develop outline project specifications</a></li>
					   </ul>
				   </li>
   
			   </ul>
		   </li>
   
			<li><a href="{{url("underconstruction.html")}}"class="main">products</a>
		   </li>
   
		   <li><a href="{{url('about')}}">about</a></li>
		   <li><a href="{{url('servein')}}">we serve in </a>
		   </li>
   
		   <li><a href="{{url('careers')}}">careers</a></li>
	   @auth
	   <li class="profile" style="color:white"><a><i class='far fa-user'></i></a>
			<ul>
				<li><a href="{{url('profile')}}">{{auth()->user()->name}}</a></li>
				<li><a href="{{url('/logout')}}">logout</a></li>
			</ul>
		</li>
	   @else
		<li><a href="#">sign in</a>
			<ul>
				<li><a href="{{url('login')}}">login</a></li>
				<li><a href="{{url('register')}}">Register</a></li>
			</ul>
		</li>
	   @endauth
    </ul>


    <!------------------------------------------- responsive nav  -->
    

    <div class="res-nav">
        <form class="form-inline" action="/action_page.php">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
        </form>
        
        <a href="#" class="menu-btn"><i class="fas fa-bars"></i></a>
    </div>

<!------------------------------------------- responsive nav  -->

</nav>

    <!-- end nav  -->