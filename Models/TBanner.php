<?php 
require_once("Libraries/Core/Mysql.php");
trait TBanner{
	private $con;

	public function getSlider(){
		$this->con = new Mysql();
		$sql = "SELECT id, nombre, url_image
				 FROM banner WHERE deleted_at is null ";
		$request = $this->con->select_all($sql);
		if(count($request) > 0){
			for ($c=0; $c < count($request) ; $c++) { 
				$request[$c]['url_image'] = BASE_URL.'/'.$request[$c]['url_image'];		
			}
		}
		return $request;
	}

}

 ?>