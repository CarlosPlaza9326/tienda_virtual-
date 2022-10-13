<?php 
	require_once("Models/TCategoria.php");
	require_once("Models/TProducto.php");
	class Home extends Controllers{
		use TCategoria, TProducto;
		public function __construct()
		{
			parent::__construct();
			session_start();
			
			if(empty($_SESSION['userData'])){
				
			}elseif($_SESSION['userData']['idrol']!= RCLIENTES || $_SESSION['userData']['idrol']!= RADMINISTRADOR){

			}
			
			
		}

		public function home()
		{
			$pageContent = getPageRout('inicio');
			$data['page_tag'] = NOMBRE_EMPESA;
			$data['page_title'] = NOMBRE_EMPESA;
			$data['page_name'] = "tienda_virtual";
			$data['page'] = $pageContent;
			$data['slider'] = $this->getCategoriasT();
			$data['banner'] = $this->getCategoriasT();
			$data['productos'] = $this->getProductosT();

			if(!empty($_SESSION['userData'])){
				$data['lastOrders'] = $this->model->lastOrders();
			}
				
			
			$this->views->getView($this,"home",$data); 
		}

	}
 ?>
