<?php

$accion = $_POST['accion'];
$proyecto = $_POST['proyecto'];

$nombre_invitado= $_POST['nombre_invitado'];
$apellido_invitado= $_POST['apellido_invitado'];
$descripcion= $_POST['descripcion'];
$url_imagen= $_POST['url_imagen'];

if($accion === 'crear') {
    // importar la conexion
    include '../funciones/bd_conexion.php';
    
    try {
        // Realizar la consulta a la base de datos
        $stmt = $conn->prepare("INSERT INTO invitados (nombre_invitado) VALUES (?) ");
        $stmt->bind_param('s', $proyecto);
        $stmt->execute();
        if($stmt->affected_rows > 0) {
            $respuesta = array(
                'respuesta' => 'correcto',
                'id_insertado' => $stmt->insert_id,
                'tipo' => $accion,
                'nombre_proyecto' => $proyecto
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