<?php
include_once 'app/config.php';
?>
<?php
$componetesUrl = parse_url($_SERVER["REQUEST_URI"]);
$ruta =$componetesUrl['path'];
$parteRuta = explode('/', $ruta);
$parteRuta = array_filter($parteRuta);
$parteRuta = array_slice($parteRuta,0);
$rutaelegida = 'vistas/404.php';
if($parteRuta[0]='sistema_de_ventas'){
  if(count($parteRuta) == 1){
        $rutaelegida ='vistas/login.php';
    }else if (count($parteRuta) == 2){
        switch ($parteRuta[1]){
            case 'login':
                $rutaelegida ='scripts/login.php'; 
                break;
            case 'inicio':
                $rutaelegida ='vistas/inicio.php'; 
                break;
            case 'registrar_producto':
                $rutaelegida = 'vistas/registrar_producto.php';
                break;
            case 'lista_producto':
            	$rutaelegida = 'vistas/lista_producto.php';
            	break;
            case 'registrar_venta':
                $rutaelegida = 'vistas/registrar_venta.php';
                break;
            case 'lista_venta':
                $rutaelegida = 'vistas/lista_venta.php';
                break;
            case 'registrar_compra':
                $rutaelegida = 'vistas/registrar_compra.php';
                break;
            case 'lista_compra':
                $rutaelegida = 'vistas/lista_compra.php';
                break;
                
            case 'registrar_usuario':
                $rutaelegida = 'vistas/registrar_usuario.php';
                break;
            case 'lista_usuario':
                $rutaelegida = 'vistas/lista_usuario.php';
                break;
            case 'registrar_cliente':
                $rutaelegida = 'vistas/registrar_cliente.php';
                break;
            case 'lista_cliente':
                $rutaelegida = 'vistas/lista_cliente.php';
                break;
            case 'registrar_proveedor':
                $rutaelegida = 'vistas/registrar_proveedor.php';
                break;
            case 'reporte_producto':
                $rutaelegida = 'reportes/reporte.php';
                break;
            case 'reporte_cliente':
                $rutaelegida = 'reportes/reporteC.php';
                break;
            case 'reporte_usuario':
                $rutaelegida = 'reportes/reporteU.php';
                break;
            case 'reporte_venta':
                $rutaelegida = 'reportes/reporteV.php';
                break;
            case 'reporte_proveedor':
                $rutaelegida = 'reportes/reportePr.php';
                break;
                
    	}
    }
}
include_once $rutaelegida;