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
				WHERE deleted_at is null "; 
		$request = $this->select_all($sql);
		return $request;
	}

}

 ?>