<?php


include 'confi.php';

$idest = $_REQUEST['idest'];

$sql = "SELECT nombre_servicio,tipo_servicio,descripcion_servicio_has_estacion,id_estacion
         FROM servicios_estacion WHERE id_estacion='$idest' ";
$res = $conn->query($sql);

$arrayData = array();

while ($r = mysqli_fetch_array($res)) {

  $msg[] = array("nombre_servicio" => $r['nombre_servicio'], "tipo_servicio" => $r['tipo_servicio'], "descripcion_servicio" =>  $r['descripcion_servicio_has_estacion'] );

}

$json = $msg;

//header('Content-type : application/json');
echo json_encode($json,JSON_UNESCAPED_UNICODE);

@mysqli_close($conn)

?>