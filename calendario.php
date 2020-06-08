<?php
    include_once'includes/templates/header.php';
?>

<section class="seccion contenedor">
    <h2>Calendario de Eventos</h2>

    <?php
        try {
            require_once('includes/funciones/bd_conexion.php');
            $sql = "SELECT a.evento_id, a.nombre_evento, a.fecha_evento, a.hora_evento, 
                b.cat_evento, b.icono, 
                c.nombre_invitado, c.apellido_invitado 
                FROM eventos AS a 
                INNER JOIN categoria AS b ON a.id_cat_evento=b.id_categoria 
                INNER JOIN invitados AS c ON c.invitado_id=a.id_inv 
                ORDER BY a.evento_id";
            $resultado=$conn->query($sql);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    ?>

    <div class="calendario">
        <?php
            $calendario=array();
            while ($eventos=$resultado->fetch_assoc()) {
                $fecha=$eventos['fecha_evento'];
                $evento=array(
                'titulo'=>$eventos['nombre_evento'],
                'fecha'=>$eventos['fecha_evento'],
                'hora'=>$eventos['hora_evento'],
                'categoria'=>$eventos['cat_evento'],
                'icono'=>$eventos['icono'],
                'invitado'=>$eventos['nombre_invitado']. " " . $eventos['apellido_invitado']);
            $calendario[$fecha][]=$evento;
        ?>

        <?php  }//cierre del while  ?>

        <?php
            //Imprime todos los eventos
            foreach($calendario as $dia=>$lista_eventos){
        ?>

        <h3>
            <i class="fa fa-calendar"></i>
            <?php echo strftime("%A, %d de %B del %Y", strtotime($dia)); ?>
        </h3>

        <?php
            foreach($lista_eventos as $evento){
        ?>

        <div class="dia">
            <p class="titulo"><?php  echo $evento['titulo'];  ?></p>
            <p class="hora">
                <i class="far fa-clock" aria-hidden="true"></i>
                <?php  echo $evento['fecha'] . " " . $evento['hora'];  ?>
            </p>
            <p>
                <i class="<?php  echo $evento['icono'];  ?>" aria-hidden="true"></i>
                <?php  echo $evento['categoria'];  ?>
            </p>
            <p class="hora">
                <i class="fa fa-user" aria-hidden="true"></i>
                <?php  echo $evento['invitado'];  ?>
            </p>

        </div>
        <?php  }//foreach evento  ?>
        <?php  } //Foreach dia ?>
    <?php  $conn->close();  ?>
    </div>
</section>

<?php
    include_once'includes/templates/footer.php';
?>