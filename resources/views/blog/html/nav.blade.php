<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#"><img style="width: 30px;margin-top: -5px;" src="https://www.crearlogogratisonline.com/images/crearlogogratis_1024x1024_01.png" alt=""></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="menu">
	      <ul class="nav navbar-nav">
	        <li><a href="{{ url('/') }}">Inicio</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorias <span class="caret"></span></a>
	          <ul class="dropdown-menu">
				@foreach($categories as $category)
				 <li><a href="{{ url('/categoria/'.$category->slug) }}"> {{$category->name}} </a></li>
				@endforeach
	          </ul>
        	</li>
	        <li><a href="{{ url('/autores/') }}">Autores</a></li>
	        
	      </ul>
	     
	    </div><!-- /.navbar-collapse -->

	  </div><!-- /.container-fluid -->
</nav>
<br><br>