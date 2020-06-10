<?php

$accion = $_POST['accion'];
$nombre_invitado= $_POST['nombre_invitado'];
$apellido_invitado= $_POST['apellido_invitado'];
$descripcion= $_POST['descripcion'];
$url_imagen= $_POST['url_imagen'];

if($accion === 'crear') {
    // importar la conexion
    include '../funciones/bd_conexion.php';
    
    try {
        // Realizar la consulta a la base de datos
        
        $stmt = $conn->prepare("INSERT INTO invitados (nombre_invitado, apellido_invitado, descripcion, url_imagen) VALUES (?,?,?,?)");
        $stmt->bind_param('ssss', $nombre_invitado,$apellido_invitado,$descripcion,$url_imagen);
        $stmt->execute();
        if($stmt->affected_rows > 0) {
            $respuesta = array(
                'respuesta' => 'correcto',
                'tipo' => $accion,
                'nombre_invitado' => $nombre_invitado
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
        /*
        $respuesta = array(
            'error' => $e->getMessage()
        );
        */
    }
    
    echo json_encode($respuesta);
}