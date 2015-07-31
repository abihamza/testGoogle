<?php


 
        $host = "pma.olympe.in";//host
        $username = "7kfs9xit";//usernameBD
        $pass = "test";//
        $bd = "7kfs9xit";//
		
		$serveur = mysql_connect($host, $username, $pass);
		
	
	 	mysql_set_charset("utf8", $serveur);
		$conexion = mysql_select_db($bd, $serveur);
			
			
			$consulta = "SELECT * FROM lista";
			$sql = mysql_query($consulta);
	 
			if ( ! $sql ) {
				echo "La conexion echoue".mysql_error();
				die;
			}	
			
			
			$data= array();
			
						
			while ($obj = mysql_fetch_object($sql)) {
				$data[] = array('ID' => $obj->ID,
							   'Banda' => utf8_encode($obj->Banda),
							   'Cancion' => $obj->Cancion,
					);
			}
			
			echo '' . json_encode($data) . '';
			
			mysql_close($serveur);
			
			//Se declara que esta es una aplicacion que genera un JSON
			header('Content-type: application/json');
			//Se abre el acceso a las conexiones que requieran de esta aplicacion
			header("Access-Control-Allow-Origin: *");


?>