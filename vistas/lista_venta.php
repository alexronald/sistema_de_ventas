<?php
include_once 'plantilla/doc_declaracion_head.php';
include_once 'plantilla/navbar.php';
include_once 'plantilla/menu_lateral.php';
?>
<section class="panel panel-default container">
<div class="row"><br>
	<div class="col-md-10 text-right">
		<form>
			<label>Buscar(*)</label>
			<input type="text" name="nombre">
			<button type="submit" class="btn btn-primary" name="buscar">buscar</button>
		</form>
		<br>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><i class="fas fa-clipboard-list"></i> Lista de Ventas</h3>
	</div>
	<div class="panel-body">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Cliente</th>
					<th>Usuario</th>
					<th>Producto</th>
					<th>Fecha Venta</th>
					<th>Ingreso</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Nombre</td>
					<td>Nombre</td>
					<th>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Código</th>
									<th>Descripción</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo 1 ?></td>
									<td><?php echo "as" ?></td>
									<td><?php echo "2" ?></td>
								</tr>
							</tbody>
						</table>
					</th>
					<td>Fecha Vencimiento</td>
					<td>2</td>
				</tr>
			</tbody>
		</table>
		<a class="btn btn-primary" name="buscar" href="<?php echo RUTA_REPORTE_VENTA;?>">Generar Reporte PDF</a>
	</div>
</div>
</section>
<?php
include_once 'plantilla/doc_declaracion_foot.php';
?>