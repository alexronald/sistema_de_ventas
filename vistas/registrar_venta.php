<?php
include_once 'app/config.php';
include_once 'app/conexion.php';
include_once 'app/Ventas.php';
include_once 'app/DetalleVentas.php';
include_once 'app/repositorioCliente.php';
include_once 'app/repositorioVenta.php';
include_once 'app/repositorioDetalleVenta.php';
include_once 'app/repositorioProducto.php';
include_once 'app/Cliente.php';
include_once 'plantilla/doc_declaracion_head.php';
include_once 'plantilla/navbar.php';
session_start();
include_once 'plantilla/menu_lateral.php';


if(!isset($_SESSION["carrito"])){
    $_SESSION["carrito"] = [];
}
$ingresoTotal = 0;

conexion::abrirConexion();
$clientes = repositorioCliente::obtenerTodo(conexion::obtenerConexion());
$productos = repositorioProducto::obtenerTodo(conexion::obtenerConexion());

if (isset($_POST['btnVenGuardar'])) {
    $Nombre = $_POST['nombre_cliente'];
    $dni = $_POST['dni'];
    $fecha_venta = $_POST['fecha_venta'];
    $totalIngreso = $_POST['total'];
    $idCliente;

    foreach ($clientes as $cliente) {
        if ($cliente->getNumeroDocumento() == $dni) {
            $idCliente = $cliente->getId();
        }
    }

    $venta = new Ventas('', $fecha_venta, $totalIngreso, $idCliente, "1"); //falta usuario
    repositorioVenta::insertarVenta(conexion::obtenerConexion(), $venta);
    $idVenta = repositorioVenta::obtenerId(conexion::obtenerConexion());
    foreach ($_SESSION['carrito'] as $producto) {
        $detalleVenta = new DetalleVentas('',$producto->stock,$producto->precio_venta,0,$producto->total,$idVenta,$producto->id_producto);
        repositorioDetalleVenta::insertarDetalleVenta(conexion::obtenerConexion(),$detalleVenta);
        repositorioProducto::ActualizarStock(conexion::obtenerConexion(),$detalleVenta->getCantidad(),$detalleVenta->getIdProducto());
    }
    unset($_SESSION["carrito"]);
    $_SESSION["carrito"] = [];

    $productos = repositorioProducto::obtenerTodo(conexion::obtenerConexion());
}

//AGREGAR PRODUCTO
if(isset($_POST['agregar'])){
$idProducto = $_POST["idProducto"];
include_once "app/conexionPDO.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM producto WHERE id_producto = ? LIMIT 1;");
$sentencia->execute([$idProducto]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if (!$producto) {
    //header("Location: ./vender.php?status=5");
    //header("Location:".RUTA_REGISTRO_PRODUCTO,true,301);
}
if ($producto->stock < 1) {
//header("Location: ./vender.php?status=5");
}
# Buscar producto dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
    if ($_SESSION["carrito"][$i]->id_producto == $idProducto) {
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo carrito
if ($indice === false) {
    $producto->stock = 1;
    $producto->total = $producto->precio_venta;
    array_push($_SESSION["carrito"], $producto);
} else {
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya
    $cantidadExistente = $_SESSION["carrito"][$indice]->stock;
    # si al sumarle uno supera lo que existe, no se agrega
    if ($cantidadExistente + 1 > $producto->stock) {
        //header("Location: ./vender.php?status=5");
        exit;
    }
    $_SESSION["carrito"][$indice]->stock++;
    $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->stock * $_SESSION["carrito"][$indice]->precio_venta;
}
}

//QUITARpRODUCTO
if(isset($_POST['Quitar'])){
    $indice = $_POST["indice"];
    array_splice($_SESSION["carrito"], $indice, 1);
}
?>
<section class="panel panel-default container">
    <div class="panel-heading">
        <h4><i class="fas fa-cart-plus"></i> Registrar Venta:</h4>
    </div>
    <div class="panel-body">
<form method="POST" action="<?php echo RUTA_REGISTRO_VENTA; ?>">
        <div class="row">
            <div class="col-md-1"></div>
                <div class="col-md-5">
                    <label>Numero Documento(*):</label><br>
                    <input class="form-control" type="text" name="dni" placeholder="dni" list="dni_cliente"><br>
                    <datalist id="dni_cliente">
                        <?php
                        if (count($clientes)) {
                            foreach ($clientes as $cliente) {
                                echo "<option>" . $cliente->getNumeroDocumento() . "</option>";
                            }
                        }
                        ?>
                    </datalist>

                    <label>Cliente(*):</label><br>
                    <input class="form-control" type="text" name="nombre_cliente" placeholder="Nombre" list="nombre_cliente"><br>
                    <datalist id="nombre_cliente">
                        <?php
                        if (count($clientes)) {
                            foreach ($clientes as $cliente) {
                                echo "<option value=" . $cliente->getNombre() . ">" . $cliente->getNumeroDocumento() . "</option>";
                            }
                        }
                        ?>
                    </datalist>
                </div>
                
                <div class="col-md-5">
                    <label>Fecha De Venta(*):</label><br>
                    <input class="form-control" type="date" name="fecha_venta"><br><br>
                    <button class="btn btn-primary"><a style="color:#fff" href="#avanzada">Agregar Producto</a></button><br>
                </div>
        </div>
 <br>

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>opcion</th>
                    <th>producto</th>
                    <th>Cantidad</th>
                    <th>Preicio</th>
                    <th>Descuento</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($_SESSION["carrito"] as $indice => $producto){ 
                  $ingresoTotal += $producto->total;
                ?>
                <tr>
                    <td>
                    <form method="POST" action="<?php echo RUTA_REGISTRO_VENTA;?>">
                    <input type="hidden" name="indice"  value="<?php echo $indice?>">
                        <button class="btn btn-info" name="Quitar">Quitar</button>
                    </form>
                    </td>
                    <td><label><?php echo $producto->nombre;?></label></td>
                    <td><label><?php echo $producto->stock;?></label></td>
                    <td><label><?php echo $producto->precio_venta;?></label></td>
                    <td><label><?php echo $producto->fecha_vec;?></label></td>
                    <td><label><?php echo $producto->total;?></label></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        </div>
        </div>
        <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5">
        <h2>Total: S/. <?php echo $ingresoTotal?></h2>
        </div>
        <div class="col-md-5 text-right"><br>
        <input type="hidden" name="total"  value="<?php echo $ingresoTotal;?>">
        <button class="btn btn-primary">camcelar</button>
        <button class="btn btn-primary" name="btnVenGuardar">Guardar</button>
        </div>
        </div>
</form>
<br>
<div  id="avanzada">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <form method="POST" action="<?php echo RUTA_REGISTRO_VENTA; ?>">
                <label>Buscar</label>
                <input type="text" name="buscar">


                <table class="table table-striped"><button class="btn btn-primary" name="agregar"><i class="glyphicon glyphicon-search"></i></button><br><br>
                    <thead>
                        <tr>
                            <th>Añadir</th>
                            <th>Nombre</th>
                            <th>Fecha Vencimiento</th>
                            <th>Stock</th>
                            <th>Descripcion</th>
                            <th>precio</th>
                            <th>marca</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                            if (count($productos)) {
                                foreach ($productos as $producto) {
                                    escribirProducto($producto);
                                }
				
                            }

                            function escribirProducto($producto) {
                                ?>
                                <tr>
                                <td>
                                <form method="POST" action="<?php echo RUTA_REGISTRO_VENTA?>">
                                <input name="idProducto"  type="hidden" value="<?php echo $producto->getId();?>">
                                <button class="btn btn-info" name="agregar">agregar</button>
                                </form>
                                </td>
                                <td><?php echo $producto->getNombre();?></td>
                                <td><?php echo $producto->getFechaVec();?></td>
                                <td><?php echo $producto->getStock();?></td>
                                <td><?php echo $producto->getDescripcion();?></td>
                                <td><?php echo $producto->getPrecioVenta();?></td>
                                <td><?php echo $producto->getMarca();?></td>
                                </tr>
                                <?php } ?>
                    </tbody>
                </table>
            </form><br>
        </div>
    </div>
</div>
</div>
</section>
<?php
include_once 'plantilla/doc_declaracion_foot.php';
?>