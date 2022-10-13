<?php 

class Banners extends Controllers{
	public function __construct()
	{
		parent::__construct();
		session_start();
		//session_regenerate_id(true);
		if(empty($_SESSION['login']))
		{
			header('Location: '.base_url().'/login');
			die();
		}
		getPermisos(MCLIENTES);
	}

	public function banners()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location:".base_url().'/dashboard');
		}
		$data['page_tag'] = "Banner";
		$data['page_title'] = "BANNER <small>Tienda Virtual</small>";
		$data['page_name'] = "banner";
		$data['page_functions_js'] = "functions_banners.js";
		$this->views->getView($this,"banner",$data);
	}



	public function getBanners()
	{
		if($_SESSION['permisosMod']['r']){
			$arrData = $this->model->selectBanners();
			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';
				if($_SESSION['permisosMod']['r']){
					$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['id'].')" title="Ver cliente"><i class="far fa-eye"></i></button>';
				}
				if($_SESSION['permisosMod']['u']){
					$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['id'].')" title="Editar cliente"><i class="fas fa-pencil-alt"></i></button>';
				}
				if($_SESSION['permisosMod']['d']){	
					$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['id'].')" title="Eliminar cliente"><i class="far fa-trash-alt"></i></button>';
				}
				$arrData[$i]['url_image'] = '<img src="'.$arrData[$i]['url_image'].'" width="150" height="50">';
				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
		die();
	}


	public function setBanners(){

		
		if($_FILES){
			
			$fileTempName = $_FILES['file']['tmp_name'];
			

			if($archivo=$_FILES['file']["name"]){
				 if(file_exists('Assets/images/'.$_FILES['file']["name"])){
					unlink('Assets/images/'.$_FILES['file']["name"]); 
				  } 
				$fileNemeNew = $_FILES['file']["name"];
				$fileDestination = 'Assets/images/'.$fileNemeNew;

				move_uploaded_file($fileTempName, $fileDestination);

				$ruta=$_SERVER["HTTP_HOST"].'/tienda_virtual/Assets/images/'.$fileNemeNew;

				$request_image = $this->model->insertBanner($fileNemeNew,$ruta);

				$arrResponse = array('status' => true, 'msg' => $request_image);
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}die();
		
	}



}

?>