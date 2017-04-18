<?php 
	include 'confi.php';

	
/*	"id_estacion": "5000",
	"latitud_estacion": "5.7503972",
	"longitud_estacion": "-73.4339149",
	"nombre_estacion": "EDS VILLA AMPARITO",
	"precio_diesel": "11111",
	"precio_corriente": "8000",
	"precio_gnv": "22222",
	"precio_extra": "11858",
	"marca_mayorista": "TERPEL",
	"pago_estacion": "0",
	"descripcion_estacion": "NULL"*/


	$getData = 'SELECT * FROM listar_estaciones';

	$res = $conn->query($getData);

	while ($r = mysqli_fetch_assoc($res)) {
		

		$aux[] = array(
			'id_estacion' => $r['id_estacion'], 
			'latitud_estacion' => $r['latitud_estacion'], 
			'longitud_estacion' => $r['longitud_estacion'], 
			'nombre_estacion' => $r['nombre_estacion'], 
			'precio_diesel' => $r['nombre_estacion'], 
			'precio_corriente' => $r['precio_corriente'], 
			'precio_gnv' => $r['precio_gnv'], 
			'precio_extra' => $r['precio_extra'],
			'marca_mayorista' => $r['marca_mayorista'],
			'pago_estacion' => $r['pago_estacion']
			);

	}

	$json = $aux;

	//echo var_dump($json);
	echo json_encode($json,JSON_UNESCAPED_UNICODE);

	@mysqli_close($conn);



 ?>