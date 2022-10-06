<?php 
	//require_once("CategoriasModel.php");
	class HomeModel extends Mysql
	{
		private $objCategoria;
		public function __construct()
		{
			parent::__construct();
			//$this->objCategoria = new CategoriasModel();
		}

		public function getCategorias(){
			//return $this->objCategoria->selectCategorias();
		}	
		public function lastOrders(){
			$rolid = $_SESSION['userData']['idrol'];
			$idUser = $_SESSION['userData']['idpersona'];
			$where = "";
			if($rolid == RCLIENTES ){
				$where = " WHERE p.personaid = ".$idUser;
			}

			$sql = "SELECT p.idpedido, CONCAT(pr.nombres,' ',pr.apellidos) as nombre, p.monto, p.status 
					FROM pedido p
					INNER JOIN persona pr
					ON p.personaid = pr.idpersona
					$where
					ORDER BY p.idpedido DESC LIMIT 10 ";
			$request = $this->select_all($sql);
			return $request;
		}	
	}
 ?>