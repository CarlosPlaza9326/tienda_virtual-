<?php 
	class Sucursales extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			getPermisos(MDPAGINAS);
		}

		public function sucursales()
		{
			$pageContent = getPageRout('sucursales');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = NOMBRE_EMPESA;
				$data['page_title'] = NOMBRE_EMPESA." - ".$pageContent['titulo'];
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				if(!empty($_SESSION['userData'])){
					$data['lastOrders'] = $this->model->lastOrders();
				}
				$this->views->getView($this,"sucursales",$data);  
			}
		}

	}
 ?>
