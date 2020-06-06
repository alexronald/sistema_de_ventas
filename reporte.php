<?php
include_once 'app/conexion.php';
include_once 'app/repositorioProducto.php';
include_once 'app/Redireccion.php';
require('fpdf/fpdf.php');

class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('img/logo.png', 30, 10, 20 );
			$this->Image('img/logo1.png', 170, 10, 20 );
	        $this->SetFont('Arial','B',12);
	        $this->Cell(70);
	        $this->Cell(50,10, 'SISTEMA DE VENTAS',0,1,'C');
			$this->Cell(70);
			$this->SetFont('Arial','',8);
			$this->Cell(50,1, 'INSTITUTO DE EDUCACION SUPERIOR TECNOLOGICO PUBLICO',0,1,'C');
			$this->Cell(70);
			$this->SetFont('Arial','B',10);
			$this->Cell(50,7, '"MACUSANI"',0,1,'C');
			$this->SetFont('Arial','',8);
			$this->Cell(46);
			$this->Cell(3,8, 'PORTAL WEB:',0,0,'C');
			$this->SetFont('Arial','U',8);
			$this->Cell(48,8, 'www.tecnomacusani.edu.pe',0,0,'R');
			$this->SetFont('Arial','',8);
			$this->Cell(10,8, '  Tel:',0,0,'');
			$this->SetFont('Arial','U',8);
			$this->Cell(10,8, 'Email: iestmacusani@hotmail.com',0,1,'');
			$this->setDrawColor(53,73,224);
			$this->setFillColor(53,73,224);
			$this->Cell(25);
			$this->Rect(20,38,170,1,'FD');
			//$this->Cell(150,1,'',1,1,'C');
	        $this->Ln(10);
			$this->setDrawColor(0,0,0);
			//$this->Image('img/img1.jpg', 30, 10, 20 );
			$this->SetFont('Arial','B',10);
			$this->Cell(60);
			$this->Cell(70,15, 'Reporte De Producto',1,0,'C');
			$this->Ln(20);
            $this->Cell(2);
			 $this->cell(10,10,'ID',1,0,'C');
             $this->cell(25,10,'Nombre',1,0,'C',0);
             $this->cell(40,10,'Fecha Vencimiento',1,0,'C',0);
             $this->cell(25,10,'Stock',1,0,'C',0);
             $this->cell(35,10,'Descripcion',1,0,'C');
             $this->cell(25,10,'precio',1,0,'C',0);
             $this->cell(25,10,'marca',1,1,'C',0);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
conexion::abrirConexion();
$productos = repositorioProducto::obtenerTodo(conexion::obtenerConexion());
$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',10);
if (count($productos)) {
foreach ($productos as $producto){
$pdf->Cell(2);
$pdf->cell(10,6,$producto->getId(),1,0,'C',0);
$pdf->cell(25,6,$producto->getNombre(),1,0,'C',0);
$pdf->cell(40,6,$producto->getFechaVec(),1,0,'C',0);
$pdf->cell(25,6,$producto->getStock(),1,0,'C',0);
$pdf->cell(35,6,$producto->getDescripcion(),1,0,'C',0);
$pdf->cell(25,6,$producto->getPrecioVenta(),1,0,'C',0);
$pdf->cell(25,6,$producto->getMarca(),1,1,'C',0);
}
}
$pdf->Output();
?>