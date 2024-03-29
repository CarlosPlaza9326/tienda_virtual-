<style>
	.login-form {
	width: 25%;
    position: absolute;
    top: 100%;
    z-index: 1200;
    display: block !important;
    padding: 22px 30px 25px;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
    -webkit-box-shadow: 5px 10px 16px rgb(51 51 51 / 5%), -5px 10px 16px rgb(51 51 51 / 5%);
    -moz-box-shadow: 5px 10px 16px rgba(51,51,51,0.05),-5px 10px 16px rgba(51,51,51,0.05);
    box-shadow: 5px 10px 16px rgb(51 51 51 / 5%), -5px 10px 16px rgb(51 51 51 / 5%);
    background-color: #fff;
    margin: 0;
    border: none;
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    -o-transform: translateX(-50%);
    transform: translateX(-50%);
}

.login-form2 {
	width: 80%;
    position: absolute;
    z-index: 1200;
    display: block !important;
    padding: 22px 30px 25px;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
    -webkit-box-shadow: 5px 10px 16px rgb(51 51 51 / 5%), -5px 10px 16px rgb(51 51 51 / 5%);
    -moz-box-shadow: 5px 10px 16px rgba(51,51,51,0.05),-5px 10px 16px rgba(51,51,51,0.05);
    box-shadow: 5px 10px 16px rgb(51 51 51 / 5%), -5px 10px 16px rgb(51 51 51 / 5%);
    background-color: #fff;
    margin: 0;
    border: none;
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    -o-transform: translateX(-50%);
    transform: translateX(-50%);
	left:50%;
}


</style>
<?php 
	$cantCarrito = 0;
	if(isset($_SESSION['arrCarrito']) and count($_SESSION['arrCarrito']) > 0){ 
		foreach($_SESSION['arrCarrito'] as $product) {
			$cantCarrito += $product['cantidad'];
		}
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?= $data['page_tag']; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<?php 
		$nombreSitio = NOMBRE_EMPESA;
		$descripcion = DESCRIPCION;
		$nombreProducto = NOMBRE_EMPESA;
		$urlWeb = base_url();
		$urlImg = media()."/images/portada.jpg";
		if(!empty($data['producto'])){
			//$descripcion = $data['producto']['descripcion'];
			$descripcion = DESCRIPCION;
			$nombreProducto = $data['producto']['nombre'];
			$urlWeb = base_url()."/tienda/producto/".$data['producto']['idproducto']."/".$data['producto']['ruta'];
			$urlImg = $data['producto']['images'][0]['url_image'];
		}
	?>
	<meta property="og:locale" 		content='es_ES'/>
	<meta property="og:type"        content="website" />
	<meta property="og:site_name"	content="<?= $nombreSitio; ?>"/>
	<meta property="og:description" content="<?= $descripcion; ?>" />
	<meta property="og:title"       content="<?= $nombreProducto; ?>" />
	<meta property="og:url"         content="<?= $urlWeb; ?>" />
	<meta property="og:image"       content="<?= $urlImg; ?>" />

<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= media() ?>/tienda/images/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">
	<script src="<?= media() ?>/tienda/vendor/jquery/jquery-3.2.1.min.js"></script>
	
<!--===============================================================================================-->
</head>
<body class="animsition">
	<!-- Modal -->
	<div class="modal fade" id="modalAyuda" tabindex="-1" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">HISTORIAL</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      		<div class="page-content">
				  <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Cliente</th>
                  <th>Estado</th>
                  <th class="text-right">Monto</th>
                  <th>..</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    if(count($data['lastOrders']) > 0 ){
                      foreach ($data['lastOrders'] as $pedido) {
                 ?>
                <tr>
                  <td><?= $pedido['idpedido'] ?></td>
                  <td><?= $pedido['nombre'] ?></td>
                  <td><?= $pedido['status'] ?></td>
                  <td class="text-right"><?= SMONEY." ".formatMoney($pedido['monto']) ?></td>
                  <td><a href="<?= base_url() ?>/historial/orden/<?= $pedido['idpedido'] ?>" target="_blank"><i class="fa fa-eye"></i></a></td>
                </tr>
                <?php } 
                  } ?>

              </tbody>
            </table>
	      		</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	      </div>
	    </div>
	  </div>
	</div>
	<div id="divLoading" >
      <div>
        <img src="<?= media(); ?>/images/loading.svg" alt="Loading">
      </div>
    </div>
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						<?php if(isset($_SESSION['login'])){ ?>
						Bienvenido: <?= $_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'] ?>
						<?php } ?>
					</div>

					<div class="right-top-bar flex-w h-full">
						<?php 
							if(isset($_SESSION['login'])){
						?>	
						<a href="<?= base_url() ?>/historial" class="flex-c-m trans-04 p-lr-25" data-toggle="modal" data-target="#modalAyuda" >
							Historial
						</a>
						<?php 
							}
							if(isset($_SESSION['login'])){
						?>
						<a href="<?= base_url() ?>/logout" class="flex-c-m trans-04 p-lr-25">
							Salir
						</a>
						<?php }else{ ?>
							<a href="#" class="flex-c-m trans-04 p-lr-25" onclick="openModalregister();">
								Registrate
							</a>
							<div class="login-box" id="mydiv">
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Iniciar Sesión
						</a>
							
								<form class="login-form" name="formLogin" id="formLogin" action="" style="visibility: hidden; opacity: 0;">
									
									<div class="form-group">
										<label class="control-label">USUARIO</label>
										<input id="txtEmail" name="txtEmail" class="form-control" type="email" placeholder="Email" autofocus>
									</div>
									<div class="form-group">
										<label class="control-label">CONTRASEÑA</label>
										<input id="txtPassword" name="txtPassword" class="form-control" type="password" placeholder="Contraseña">
									</div>
									<div class="form-group">
										<div class="utility">
										<p class="semibold-text mb-2"><a href="#" data-toggle="flip">¿Olvidaste tu contraseña?</a></p>
										</div>
									</div>
									<div id="alertLogin" class="text-center"></div>
									<div class="form-group btn-container">
										<button type="submit" class="btn btn-primary" style="background-color:#717fe0"><i class="fas fa-sign-in-alt"></i> INICIAR SESIÓN</button>
									</div>
								</form>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="<?= base_url(); ?>" class="logo">
						<img src="<?= media() ?>/tienda/images/charvi.png" alt="Tienda Virtual">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="<?= base_url(); ?>">Inicio</a>
							</li>

							<li>
								<a href="<?= base_url(); ?>/tienda">Productos</a>
							</li>

							<li>
								<a href="<?= base_url(); ?>/carrito">Carrito</a>
							</li>
							
							<li>
								<a href="<?= base_url(); ?>/nosotros">Nosotros</a>
							</li>

							<li>
								<a href="<?= base_url(); ?>/sucursales">Como Comprar</a>
							</li>

							<li>
								<a href="<?= base_url(); ?>/contacto">Contacto</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>
						<?php if($data['page_name'] != "carrito" and $data['page_name'] != "procesarpago"){ ?>
						<div class="cantCarrito icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?= $cantCarrito; ?> ">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
						<?php } ?>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="<?= base_url(); ?>"><img src="<?= media() ?>/tienda/images/logo.png" alt="Tienda Virtual"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>
				<?php if($data['page_name'] != "carrito" and $data['page_name'] != "procesarpago"){ ?>
				<div class="cantCarrito icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?= $cantCarrito; ?>">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
				<?php } ?>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						<?php if(isset($_SESSION['login'])){ ?>
						Bienvenido: <?= $_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'] ?>
						<?php } ?>
					</div>
				</li>

				<li>

					<div class="right-top-bar flex-w">
					<?php 
							if(isset($_SESSION['login'])){
						?>	
						<a href="<?= base_url() ?>/historial" class="flex-c-m trans-04 p-lr-25" data-toggle="modal" data-target="#modalAyuda" >
							Historial
						</a>
						<?php 
							}
							if(isset($_SESSION['login'])){
						?>
						<a href="<?= base_url() ?>/logout" class="flex-c-m trans-04 p-lr-25">
							Salir
						</a>
						<?php }else{ ?>
							<a href="#" class="flex-c-m trans-04 p-lr-25">
								Registrate
							</a>
							<div class="login-box" id="mydiv2" >
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Iniciar Sesión
						</a>
							
								<form class="login-form2" name="formLogin" id="formLogin2" action="" style="visibility: hidden; opacity: 0;">
									
									<div class="form-group">
										<label class="control-label">USUARIO</label>
										<input id="txtEmail2" name="txtEmail" class="form-control" type="email" placeholder="Email" autofocus>
									</div>
									<div class="form-group">
										<label class="control-label">CONTRASEÑA</label>
										<input id="txtPassword2" name="txtPassword" class="form-control" type="password" placeholder="Contraseña">
									</div>
									<div class="form-group">
										<div class="utility">
										<p class="semibold-text mb-2"><a href="#" data-toggle="flip">¿Olvidaste tu contraseña?</a></p>
										</div>
									</div>
									<div id="alertLogin" class="text-center"></div>
									<div class="form-group btn-container">
										<button type="submit" class="btn btn-primary" style="background-color:#717fe0"><i class="fas fa-sign-in-alt"></i> INICIAR SESIÓN</button>
									</div>
								</form>
							<div>
						<?php } ?>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="<?= base_url(); ?>">Inicio</a>
				</li>

				<li>
					<a href="<?= base_url(); ?>/tienda">Tienda</a>
				</li>

				<li>
					<a href="<?= base_url(); ?>/carrito">Carrito</a>
				</li>

				<li>
					<a href="<?= base_url(); ?>/nosotros">Nosotros</a>
				</li>

				<li>
					<a href="<?= base_url(); ?>/sucursales">Sucursales</a>
				</li>

				<li>
					<a href="<?= base_url(); ?>/contacto">Contacto</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="<?= media() ?>/tienda/images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15" method="get" action="<?= base_url() ?>/tienda/search" >
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input type="hidden" name="p" value="1">
					<input class="plh3" type="text" name="s" placeholder="Buscar...">
				</form>
			</div>
		</div>
	</header>
	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>
		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Tu carrito
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			<div id="productosCarrito" class="header-cart-content flex-w js-pscroll">
				<?php getModal('modalCarrito',$data); ?>
			</div>
		</div>
	</div>


	<div class="modal fade" id="modalFormRegister" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" >
			<div class="modal-content">
			<div class="modal-header headerRegister">
				<h5 class="modal-title" id="titleModal">Nuevo Registro</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<form id="formRegister2" name="formRegister2" class="form-horizontal">
					
					<div class="row">
											<div class="col col-md-6 form-group">
												<label for="txtNombre">Nombres</label>
												<input type="text" class="form-control valid validText" id="txtNombreregister" name="txtNombre" required="">
											</div>
											<div class="col col-md-6 form-group">
												<label for="txtApellido">Apellidos</label>
												<input type="text" class="form-control valid validText" id="txtApellidoregister" name="txtApellido" required="">
											</div>
										</div>
										<div class="row">
											<div class="col col-md-6 form-group">
												<label for="txtCedula">Identificación</label>
												<input type="text" class="form-control valid validNumber" id="txtCedularegister" name="txtCedula" required="" onkeypress="return controlTag(event);">
											</div>
											
											<div class="col col-md-6 form-group">
												<label for="txtTelefono">Teléfono</label>
												<input type="text" class="form-control valid validNumber" id="txtTelefonoregister" name="txtTelefono" required="" onkeypress="return controlTag(event);">
											</div>

										</div>
										<div class="row">
											<div class="col col-md-6 form-group">
												<label for="txtEmailCliente">Email</label>
												<input type="email" class="form-control valid validEmail" id="txtEmailClienteregister" name="txtEmailCliente" required>
											</div>
											
											<div class="col col-md-6 form-group">
											<label for="txtEmailCliente">Password</label>
												<input type="password" class="form-control valid validPassword" id="txtpswClienteregister" name="txtpswCliente" placeholder="Password" autocomplete="off" required>									
												<span class="fa fa-eye-slash icon"  onclick="mostrarPassword();" style="position: absolute;bottom: 3px;right: 20px; width: 24px;height: 24px;"></span>						
											</div>

										</div>
					


					<div class="tile-footer">
						<button  class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
						<button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
					</div>
					</form>
			</div>
			</div>
		</div>
	</div>
	<script>
var bandera= false;
			$('#txtEmail, #txtPassword').focusin(function() {
				bandera=true;
			});

			$('#txtEmail, #txtPassword').focusout(function() {
				bandera=false;
			});
			
			$('#txtEmail, #txtPassword').change(function() {
				bandera=false;
			})

			$("#mydiv").mouseenter(function() {
				$('#mydiv .login-form').css({"visibility":"visible", "opacity":"1"})
			});

			$("#mydiv").mouseleave(function() {
				if(!bandera){
					$('#mydiv .login-form').css({"visibility":"hidden", "opacity":"0"});
				}
			});
			
////////////////////////////////////////////////////////////////////////////
			$('#txtEmail2, #txtPassword2').focusin(function() {
				bandera=true;
			});

			$('#txtEmail2, #txtPassword2').focusout(function() {
				bandera=false;
			});
			
			$('#txtEmail2, #txtPassword2').change(function() {
				bandera=false;
			})

			$("#mydiv2").mouseenter(function() {
				$('#mydiv2 .login-form2').css({"visibility":"visible", "opacity":"1"})
			});

			$("#mydiv2").mouseleave(function() {
				if(!bandera){
					$('#mydiv2 .login-form2').css({"visibility":"hidden", "opacity":"0"});
				}
			});
//////////////////////////////////////////////////////////////////////////////////




	</script>
