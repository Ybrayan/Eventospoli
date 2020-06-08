<?php
    include 'includes/funciones/sesiones.php';
    include 'includes/funciones/funciones.php';
    include 'includes/templates/headerAdmin.php';
    include 'includes/templates/barra.php';
    
    // Obtener el ID de la URL
    if(isset($_GET['invitado_id'])) {
        $invitado_id = $_GET['invitado_id'];
    }
?>

<div class="contenedor">
    <?php
        include 'includes/templates/sidebar.php';
    ?>

    <main class="contenido-principal">
        
    <?php 
        $Invitado = obtenerNombreInvitado($invitado_id);
        
        if($Invitado): ?>
        
        <h1>Invitado: 
            <?php foreach($Invitado as $nombre): ?>
                <span><?php echo $nombre['nombre_invitado']; ?></span>
            <?php endforeach;?>
        </h1>

        <form action="#" class="agregar-evento" id="prueba" method="POST">
            <div class="campo">
                <label for="nombre">Nombre Evento:</label>
                <input required type="text" placeholder="Nombre Evento" class="nombre-evento" id="nombre-evento" name="nombre-evento" maxlength="20" pattern="[A-Za-z0-9]{1,20}">
            </div>

            <div class="campo">
                <label for="fecha">Fecha:</label>
                <input required type="date" class="fecha-evento" id="fecha-evento">

                <label for="tipo">Hora:</label>
                <input required type="time" class="hora-evento" id="hora-evento"> 
            </div>

            <div class="campo">
                <label for="categoria">Categoria:</label>
                <select required name="cat" id="cat" class="cat">

                <?php
                    $Categorias = obtenerCategorias();
                    foreach($Categorias as $Categoria): 
                    ?>
                        <option value="<?php echo $Categoria['id_categoria'] ?>">
                        <?php echo $Categoria['cat_evento'] ?></option>                        
                    <?php 
                    endforeach;
                ?>
                </select>
            </div>
            
            <div class="campo enviar">
                <input type="hidden" id="invitado_id" value="<?php echo $invitado_id; ?>">
                <input type="submit" class="boton nuevo-evento" value="Agregar">
            </div>
        </form>
        
        <?php
            else:
                // Si no hay proyectos seleccionados
                echo "<p>Selecciona un Proyecto a la izquierda</p>";
            endif;
        
        ?>


        <h2>Listado de Eventos:</h2>

        <div class="listado-pendientes">
            <ul>
                <?php 
                    // obtiene las eventos del proyecto actual
                    $Eventos = obtenerEventosInvitado($invitado_id);
                    if($Eventos->num_rows > 0) {
                        // si hay eventos
                        foreach($Eventos as $Evento): ?>
                            <li id="evento:<?php echo $Evento['evento_id'] ?>" class="evento">
                            <p><?php
                                echo $Evento['nombre_evento'];
                                ?> - <?php
                                echo $Evento['fecha_evento'];
                            ?></p>
                                <div class="acciones">
                                    <i class="fas fa-trash"></i>
                                </div>
                            </li>  
                            
                    <?php endforeach;
                    }  else {
                        // no hay eventos
                        echo "<p class='lista-vacia'>No hay eventos en este proyecto</p>";
                    }
                ?>

            </ul>
        </div>
    </main>
</div><!--.contenedor-->

<?php
    include 'includes/templates/footerAdmin.php';
?>