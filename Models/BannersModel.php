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

	public function insertBanner(string $identificacion, string $nombre, string $apellido, int $telefono, string $email, string $password, int $tipoid){

		$this->strIdentificacion = $identificacion;
		$this->strNombre = $nombre;
		$this->strApellido = $apellido;
		$this->intTelefono = $telefono;
		$this->strEmail = $email;
		$this->strPassword = $password;
		$this->intTipoId = $tipoid;

		$return = 0;
		$sql = "SELECT * FROM persona WHERE 
				email_user = '{$this->strEmail}' or identificacion = '{$this->strIdentificacion}' ";
		$request = $this->select_all($sql);

		if(empty($request))
		{
			$query_insert  = "INSERT INTO persona(identificacion,nombres,apellidos,telefono,email_user,password,rolid) 
							  VALUES(?,?,?,?,?,?,?)";
        	$arrData = array($this->strIdentificacion,
    						$this->strNombre,
    						$this->strApellido,
    						$this->intTelefono,
    						$this->strEmail,
    						$this->strPassword,
    						$this->intTipoId);
        	$request_insert = $this->insert($query_insert,$arrData);
        	$return = $request_insert;
		}else{
			$return = "exist";
		}
        return $return;
	}

}

 ?>