<?php
    function producto_json(&$boletos,&$camisas=0,&$etiquetas=0){
        $dias=array(0=>'pase_dia',1=>'pase_completo',2=>'pase_2dias');
        $total_boletos=array_combine($dias,$boletos);
        $json=array();

        foreach($total_boletos as $key=> $boletos):
            if ((int) $boletos >0) {
                $json[$key]=(int) $boletos;
            }
        endforeach;

        $camisas=(int) $camisas;
        if ($camisas>0) {
            $json['camisas']=$camisas;
        }

        $etiquetas=(int) $etiquetas;
        if ($etiquetas>0) {
            $json['etiquetas']=$etiquetas;
        }

        return json_encode($json);
    }

    function eventos_json(&$eventos){
        $eventos_json =array();
        foreach($eventos as $eventos):
            $eventos_json['eventos'][]=$eventos;
        endforeach;
        return json_encode($eventos_json);
    }

   
    /* Admin */

    function obtenerPaginaActual() {
        $archivo = basename($_SERVER['PHP_SELF']);
        $pagina = str_replace(".php", "", $archivo);
        return $pagina;
    }
    
    /* Consultas **/
    
    /* Obtener todos los Invitados */
    function obtenerInvitados() {
        include 'bd_conexion.php';
        try {
            return $conn->query('SELECT invitado_id, nombre_invitado, apellido_invitado FROM invitados');
        } catch(Exception $e) {
            //Se desactiva, puede causar inyeccion de codigo y mostrar fallos
            //echo "Error! : " . $e->getMessage();
            return false;
        }
    }
    
    // Obtener el nombre del Invitado
    function obtenerNombreInvitado($id = null) {
        include 'bd_conexion.php';
        try {
            return $conn->query("SELECT  nombre_invitado, apellido_invitado FROM invitados WHERE invitado_id = {$id}");
        } catch(Exception $e) {
            //Se desactiva, puede causar inyeccion de codigo y mostrar fallos
            //echo "Error! : " . $e->getMessage();
            return false;
        }
    }
    
    // Obtener las eventos por invitado 
    function obtenerEventosInvitado($id = null) {
        include 'bd_conexion.php';
        try {
            return $conn->query("SELECT evento_id, nombre_evento, fecha_evento, hora_evento FROM eventos WHERE id_inv = {$id}");
        } catch(Exception $e) {
            //Se desactiva, puede causar inyeccion de codigo y mostrar fallos
            //echo "Error! : " . $e->getMessage();
            return false;
        }
    }

    // Obtener las categorias
    function obtenerCategorias() {
        include 'bd_conexion.php';
        try {
            return $conn->query('SELECT id_categoria, cat_evento FROM categoria');
        } catch(Exception $e) {
            //Se desactiva, puede causar inyeccion de codigo y mostrar fallos
            //echo "Error! : " . $e->getMessage();
            return false;
        }
    }
?>