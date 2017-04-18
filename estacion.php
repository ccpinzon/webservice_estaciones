<?php
/**
 * Created by PhpStorm.
 * User: cristhian
 * Date: 20/03/17
 * Time: 09:55 AM
 */
include_once 'confi.php';

$id_estacion = $_REQUEST['id_estacion'];

$sql = 'SELECT e.id_estacion, e.nombre_estacion, e.direccion_estacion, d.nombre_departamento, m.marca_mayorista, e.tel_fijo_estacion, e.tel_movil_estacion,e.descripcion_estacion
FROM estacion e
INNER JOIN departamento d 
ON e.departamento_id_departamento = d.id_departamento
INNER JOIN mayorista m 
ON e.mayorista_id_mayorista = m.id_mayorista
WHERE id_estacion ='.urlencode($id_estacion);

$res = $conn->query($sql);
$arrayData = array();

while ($row = mysqli_fetch_array($res)){

    $id_estacion = $row['id_estacion'];
    $nombre_estacion = $row['nombre_estacion'];
    $direccion_estacion = $row['direccion_estacion'];
    $nombre_departamento = $row['nombre_departamento'];
    $marca_mayorista = $row['marca_mayorista'];
    $tel_fijo_estacion = $row['tel_fijo_estacion'];
    $tel_movil_estacion = $row['tel_movil_estacion'];
    $descripcion_estacion = $row['descripcion_estacion'];

    $arrayData = array(
    	'id_estacion' => $id_estacion,
    	'nombre_estacion' => $nombre_estacion,
    	'direccion_estacion' => $direccion_estacion,
    	'nombre_departamento' => $nombre_departamento,
    	'marca_mayorista' => $marca_mayorista,
    	'tel_fijo_estacion' => $tel_fijo_estacion,
    	'tel_movil_estacion' => $tel_movil_estacion,
        'descripcion_estacion' => $descripcion_estacion);

}



$json_string = json_encode($arrayData,JSON_UNESCAPED_UNICODE);
echo $json_string;

?>