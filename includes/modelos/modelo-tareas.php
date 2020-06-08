<?php

$accion = $_POST['accion'];
$evento_id= (int) $_POST['id'];

$nombre_evento= $_POST['nombre_evento'];
$fecha_evento= $_POST['fecha_evento'];
$hora_evento= $_POST['hora_evento'];
$id_cat_evento= (int) $_POST['id_cat_evento'];
$id_inv= (int) $_POST['id_inv'];
$clave= $_POST['clave'];



if($accion === 'crear') {
    // importar la conexion
    include '../funciones/bd_conexion.php';
    try {
        // Realizar la consulta a la base de datos
        $stmt = $conn->prepare("INSERT INTO eventos(nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv) VALUES (?,?,?,?,?)");
        $stmt->bind_param('sssii', $nombre_evento, $fecha_evento, $hora_evento, $id_cat_evento, $id_inv);
        $stmt->execute();
        if($stmt->affected_rows > 0) {
            $respuesta = array(
                'respuesta' => 'correcto',
                'id_insertado' => $stmt->insert_id,
                'tipo' => $accion,
                'nombre_evento' => $nombre_evento
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch(Exception $e) {
        // En caso de un error, tomar la exepcion
        $respuesta = array(
            'error' => $e->getMessage()
        );
    }
    
    echo json_encode($respuesta);
}


if($accion === 'eliminar') {
    // importar la conexion
    include '../funciones/bd_conexion.php';
    try {
        // Realizar la consulta a la base de datos
        $stmt = $conn->prepare("DELETE from eventos WHERE evento_id = ? ");
        $stmt->bind_param('i', $evento_id);
        $stmt->execute();
        if($stmt->affected_rows > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch(Exception $e) {
        // En caso de un error, tomar la exepcion
        $respuesta = array(
            'error' => $e->getMessage()
        );
    }
    
    echo json_encode($respuesta);
}