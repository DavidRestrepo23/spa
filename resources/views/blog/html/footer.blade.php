{{-- <footer style="background: #212121;color:#F0432F;font-size: 13pt;">
<div class="container">
			<div class="row" style="margin-top: 5%;">
				<div class="col-xs-12 col-sm-12 col-md-3">
					<h2>Somos expertos</h2>
					<p>
						<ul>
							<li style="list-style: none;"><a style="color:#F0432F;font-size: 13pt;" href="http:://laquintaagencia.com/diseno-de-marca.php" target="_blank">Marca</a></li>
							<li style="list-style: none;"><a style="color:#F0432F;font-size: 13pt;" href="http:://laquintaagencia.com/desarrollo-web.php" target="_blank">Web</a></li>
							<li style="list-style: none;"><a style="color:#F0432F;font-size: 13pt;" href="http:://laquintaagencia.com/marketing-digital.php" target="_blank">Marketing Digital</a></li>
						</ul>
					</p>

				</div>
				<div class="col-xs-12 col-sm-12 col-md-3">
					<h2>La agencia</h2>
					<p>
						<ul>
							<li style="list-style: none;"><a style="color:#F0432F;font-size: 13pt;" href="http:://laquintaagencia.com/quienes-somos.php" target="_blank">Quiénes Somos</a></li>
							<li style="list-style: none;"><a style="color:#F0432F;font-size: 13pt;" href="http:://laquintaagencia.com/plan-de-referidos.php" target="_blank">Plan de referidos</a></li>
							<li style="list-style: none;"><a style="color:#F0432F;font-size: 13pt;" href="http:://laquintaagencia.com/habeasdata.php">Política de Datos</a></li>
							<li style="list-style: none;"><a style="color:#F0432F;font-size: 13pt;" href="http:://laquintaagencia.com/terminos-y-condiciones.php" target="_blank">Términos y Condiciones</a></li>
						</ul>
					</p>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-3">
					<h2>Contacto</h2>
					<p>
						<ul>
							<li style="list-style: none;">La Quinta Agencia</li>
							<li style="list-style: none;">Carrera 80 #39-159 Centro Ejecutivo Nutibara Of. 713, Medellín, Antioquia</li>
							<li style="list-style: none;">Tel (+574) 4441891</li>
							<li style="list-style: none;">Cel (+57) 3004875353</li>
							<li style="list-style: none;">proyectos@laquintaagencia.com</li>
						</ul>
					</p>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-3">
					<h2>Síguenos</h2>
					<p>
						<ul>
							<li style="list-style: none;"><a style="color:#F0432F;font-size: 13pt;" href="https://www.behance.net/LaQuinta"><i style="font-size: 15pt;" class="fab fa-behance-square" target="_blank"></i> Behance</a></li>
							<li style="list-style: none;"><a style="color:#F0432F;font-size: 13pt;" href="https://www.instagram.com/quintadesign/"><i style="font-size: 15pt;" class="fab fa-instagram" target="_blank"></i> Instagram</a></li>
						</ul>
					</p>
				</div>
			</div>
			<br><br><br>
		</div>		
</footer> --}}
<section style="background: #9f81f7">
	<div class="container">
		<div class="row" style="padding: 30px;color:white;font-size: 13pt;">
			<div class="col-xs-12 col-sm-12 text-center">
				<a style="color:white" href="">SPA</a>
				<br> Medellín - Colombia <br> {{date('Y')}}
			</div>
		</div>
	</div>
</section>

	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
	<script src="{{ asset('js/paginate_ajax.js') }}"></script>
	<script src="{{ asset('vendors/typeahead/typeahead.bundle.min.js') }}"></script>
	<script>
	    $(document).ready(function(){
	      $('.slider').bxSlider({
	      	'captions':true,
	      	'maxSlides':1,
	      	'slideWidth':500,
	      	'auto':true,
	      	'puase': 4000,
	      	'keyboardEnabled':true
	      });

	      //TypeAhead
	      var posts = new Bloodhound({
		  datumTokenizer: Bloodhound.tokenizers.whitespace,
		  queryTokenizer: Bloodhound.tokenizers.whitespace,
		  
		  prefetch:'{{ url('datajsons/json') }}',
		});

	      $("#search-posts").typeahead({
	      	  hint: true,
			  highlight: true,
			  minLength: 1
	      },{
	      	name: 'posts',
	      	source: posts
	      });


	    });
	 </script>
