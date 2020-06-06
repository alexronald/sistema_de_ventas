<?php
include_once 'app/config.php';
include_once 'plantilla/doc_declaracion_head.php';

?>
<body id="fondo-login">
<section class="row container">
<div class="col-md-2"></div>
<div class="col-md-6 login">
<div class="row">
	<div class="col-md-12 text-center">
		<h1 style="color:#fff">SISTEME DE VENTAS</h1>
	</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>login</h2>
		</div>
		<div class="panel-body">
		<div class="row">
			<div class="col-md-4 text-center">
				<img src="img/login.png" width="auto">
			</div>
			<div class="col-md-8">
				<form action="<?PHP echo RUTA_LOGIN;?>" method="POST">
				<label>Usuario:</label>
				<input type="text" name="usuario" class="form-control"><br>
				<label>Contraseña:</label>
				<input type="text" name="password" class="form-control"><br>
				<div class="text-right">
					<input type="checkbox" name="ver_password"><label>Mostrar Contraseña</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<button class="btn btn-info" name="iniciar" type="submit">Iniciar Sesion</button>
				</div><br>
			</form>
			</div>
		</div>
		</div>
	</div>
</div>
</section>
</body>
<?php
include_once 'plantilla/doc_declaracion_foot.php';
?>