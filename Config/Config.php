<?php 
	const BASE_URL = "http://localhost/tienda_virtual";


	

	//Datos de conexión a Base de Datos
	const DB_HOST = "localhost";
	const DB_NAME = "tienda";
	const DB_USER = "root";
	const DB_PASSWORD = "";
	const DB_CHARSET = "utf8";

	//Para envío de correo
	const ENVIRONMENT = 1; // Local: 0, Produccón: 1;

	//Deliminadores decimal y millar Ej. 24,1989.00
	const SPD = ".";
	const SPM = ",";

	//Simbolo de moneda
	const SMONEY = "$";
	const CURRENCY = "USD";

	//Api PayPal
	//SANDBOX PAYPAL
	const URLPAYPAL = "https://api-m.sandbox.paypal.com";
	const IDCLIENTE = "ATOB7N-uv8leBeKhThp-UDTWHare8WDpIQUbRtAV03ASuFBIL60AiXeF6l01-kAGlCO7RCqWr2GgCvNv";
	const SECRET = "EMQHEM88lhLqg5pIVR079eWsWu64bLPnb2ZG7iv4f--h3DwBu75IXGBJWne32yCmMBz41-cMjAJvEGJ5";
	//LIVE PAYPAL
	//const URLPAYPAL = "https://api-m.paypal.com";
	//const IDCLIENTE = "AelXXf7zyeQPVVomhDMQkCswAG9Qnn8qgIM8gI4mI5ol9SX52Ck47CnwGQcTtmhxiFZ7zVe2uHQdmnrZ";
	//const SECRET = "EDNT6YBg8Dsx9yTQOEjIOJ3OqSUv8F9GJ4XPFOMqkWwXy99W1MaEnXuDxjhinRSXFZGwxYd60Zxll8JC";

	//Datos envio de correo
	const NOMBRE_REMITENTE = "Tienda Virtual";
	const EMAIL_REMITENTE = "store.charvi2026@gmail.com";
	const NOMBRE_EMPESA = "CharviStore.Ec";
	const WEB_EMPRESA = "Copyright 2022 .todos los derechos reservados ";

	const DESCRIPCION = "La mejor tienda en línea con productos tecnológicos.";
	const SHAREDHASH = "TiendaVirtual";

	//Datos Empresa
	const DIRECCION = "AYACUCHO Y LORENZO DE GARAICOA   GUAYAQUIL - ECUADOR";
	const TELEMPRESA = "+(593)981202007";
	const WHATSAPP = "+593981202007";
	const EMAIL_EMPRESA = "store.charvi2026@gmail.com";
	const EMAIL_PEDIDOS = "store.charvi2026@gmail.com"; 
	const EMAIL_SUSCRIPCION = "store.charvi2026@gmail.com";
	const EMAIL_CONTACTO = "store.charvi2026@gmail.com";

	const CAT_FOOTER = "1,2,3,4,5";

	//Datos para Encriptar / Desencriptar
	const KEY = 'abelosh';
	const METHODENCRIPT = "AES-128-ECB";

	//Envío
	const COSTOENVIO = 0;

	//Módulos
	const MDASHBOARD = 1;
	const MUSUARIOS = 2;
	const MCLIENTES = 3;
	const MPRODUCTOS = 4;
	const MPEDIDOS = 5;
	const MCATEGORIAS = 6;
	const MSUSCRIPTORES = 7;
	const MDCONTACTOS = 8;
	const MDPAGINAS = 9;

	//Páginas
	const PINICIO = 1;
	const PTIENDA = 2;
	const PCARRITO = 3;
	const PNOSOTROS = 4;
	const PCONTACTO = 5;
	const PPREGUNTAS = 6;
	const PTERMINOS = 7;
	const PSUCURSALES = 8;
	const PERROR = 9;

	//Roles
	const RADMINISTRADOR = 1;
	const RSUPERVISOR = 2;
	const RCLIENTES = 3;

	const STATUS = array('Completo','Aprobado','Cancelado','Reembolsado','Pendiente','Entregado');

	//Productos por página
	const CANTPORDHOME = 8;
	const PROPORPAGINA = 4;
	const PROCATEGORIA = 4;
	const PROBUSCAR = 4;

	//REDES SOCIALES
	const FACEBOOK = "https://www.facebook.com/CharViStore.Ec";
	const INSTAGRAM = "https://www.instagram.com/charvi_store.ec/?hl=es";
	

 ?>