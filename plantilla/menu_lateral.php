<div class="wrapper">
    <div class="sidebar">
        <ul class="nav nav-pills nav-stacked">
        	<li class="text-center"><img class="embed-responsive-item" src="img/logo1.png" width="80%"></li>
            <li><a href="<?PHP echo RUTA_INICIO;?>"><i class="fas fa-home"></i>Inicio</a></li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-capsules"></i>Productos <span class="caret"></span></a>
            	<ul class="dropdown-menu">
            		<li><a href="<?PHP echo RUTA_REGISTRO_PRODUCTO;?>"><i class="fas fa-plus-circle"></i>Añadir Productos</a></li>
            		<li><a href="<?PHP echo RUTA_LISTA_PRODUCTO;?>"><i class="fas fa-clipboard-list"></i>Lista de Productos</a></li>	
            	</ul>
            </li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-shopping-cart"></i>Ventas <span class="caret"></span></a>
            	<ul class="dropdown-menu">
            		<li><a href="<?php echo RUTA_REGISTRO_VENTA?>"><i class="fas fa-plus-circle"></i>Añadir Ventas</a></li>
            		<li><a href="<?PHP echo RUTA_LISTA_VENTA;?>"><i class="fas fa-clipboard-list"></i>Lista de Ventas</a></li>	
            	</ul>
            </li>
            <!--<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-cart-arrow-down"></i>Compras <span class="caret"></span></a>
            	<ul class="dropdown-menu">
            		<li><a href="<?PHP// echo RUTA_REGISTRO_COMPRA;?>"><i class="fas fa-plus-circle"></i>Añadir Compras</a></li>
            		<li><a href="<?PHP// echo RUTA_LISTA_COMPRA;?>"><i class="fas fa-clipboard-list"></i>Lista de Compras</a></li>	
            	</ul>
            </li>-->
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user"></i>Usuario <span class="caret"></span></a>
            	<ul class="dropdown-menu">
            		<li><a href="<?PHP echo RUTA_REGISTRO_USUARIO;?>"><i class="fas fa-plus-circle"></i>Añadir Usuario</a></li>
            		<li><a href="<?PHP echo RUTA_LISTA_USUARIO;?>"><i class="fas fa-clipboard-list"></i>Lista de Usuario</a></li>	
            	</ul>
            </li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-address-book"></i>Cliente <span class="caret"></span></a>
            	<ul class="dropdown-menu">
            		<li><a href="<?PHP echo RUTA_REGISTRO_CLIENTE;?>"><i class="fas fa-plus-circle"></i>Añadir Cliente</a></li>
            		<li><a href="<?PHP echo RUTA_LISTA_CLIENTE;?>"><i class="fas fa-clipboard-list"></i>Lista de Cliente</a></li> 
            	</ul>
            </li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-store"></i>Proveedor <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?PHP echo RUTA_REGISTRO_PROVEEDOR;?>"><i class="fas fa-plus-circle"></i>Añadir Proveedor</a></li>
                </ul>
            </li>
            <li><a href="<?PHP echo RUTA_LISTA_PRODUCTO;?>"><i class="fas fa-question-circle"></i>Ayuda</a></li>
            <li><a href="<?PHP echo RUTA_LISTA_PRODUCTO;?>"><i class="fas fa-info-circle"></i>Acerca De</a></li>
        </ul> 
    </div>
    </div>