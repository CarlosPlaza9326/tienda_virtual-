<?php 
class BannersModel extends Mysql
{


	public function __construct()
	{
		parent::__construct();
	}	


	public function selectBanners()
	{
		$sql = "SELECT id, url_image
				FROM banner 
				WHERE deleted_at is null ORDER BY id DESC "; 
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectBannersun($codigo)
	{
		$sql = "SELECT id, url_image
				FROM banner 
				WHERE  id = ".$codigo." AND deleted_at is null ORDER BY id DESC "; 
		$request = $this->select_all($sql);
		return $request;
	}

	public function insertBanner(string $nombre, string $ruta){

		$this->strNombre = $nombre;
		$this->strRuta = $ruta;


		$return = 0;
		$sql = "SELECT * FROM banner WHERE 
				nombre = '{$this->strNombre}' or url_image = '{$this->strRuta}' ";
		$request = $this->select_all($sql);

		if(empty($request))
		{
			$query_insert  = "INSERT INTO banner(nombre,url_image) 
							  VALUES(?,?)";
        	$arrData = array($this->strNombre,
    						$this->strRuta);
        	$request_insert = $this->insert($query_insert,$arrData);
        	$return = "Se guardo correctamente";

			
		}else{

			$return = "exist";
		}
        return $return;
	}

	public function deleteBanner($codigo)
	{
		$this->intIdBanner = $codigo;
		$sql = "UPDATE banner SET deleted_at = CURDATE() WHERE id = ".$this->intIdBanner."";
		$arrData = array(0);
		$request = $this->update($sql,$arrData);
		return $request;
	}

}

 ?>