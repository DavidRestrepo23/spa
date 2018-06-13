<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{ asset('css/403.css') }}">
</head>
<body>
	 <div id="clouds">
            <div class="cloud x1"></div>
            <div class="cloud x1_5"></div>
            <div class="cloud x2"></div>
            <div class="cloud x3"></div>
            <div class="cloud x4"></div>
            <div class="cloud x5"></div>
        </div>
        <div class='c'>
            <div class='_404'>403</div>
            <hr>
            <div class='_1'>ACCESO DENEGADO</div>
            <br>
            <div class='_2'>NO TIENES PERMISO PARA EJECUTAR ESTA ACCIÓN</div>
            <br>
            <a class='btn' href='{{ route('dashboard') }}'>VOLVER</a>
        </div>
</body>
</html>