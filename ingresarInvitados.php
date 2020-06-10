<?php
    include 'includes/funciones/sesiones.php';
    include 'includes/funciones/funciones.php';
    include 'includes/templates/headerAdmin.php';
    include 'includes/templates/barra.php';
?>


<div class="contenedor">
    <main class="contenido-principal">

    <h1>Registro del nuevo Invitado</h1>

    <form action="" class="agregar-invitado" method="post">
        <div class="campo">
            <label for="nombre">Nombre:</label>
            <input type="text" required placeholder="Nombre del Invitado" name="nombre-invitado" id="nombre-invitado" class="nombre-invitado" maxlength="20"
                pattern="[A-Za-z]{1,20}" />
        </div>

        <div class="campo">
            <label for="apellido">Invitado:</label>
            <input type="text" required placeholder="Apellido del Invitado" name="apellido-invitado" id="apellido-invitado" class="apellido-invitado"
                maxlength="20" pattern="[A-Za-z]{1,20}" />
        </div>

        <div class="campo enviar">
            <input type="submit" class="boton nuevo-invitado" value="Agregar" />
        </div>
    </form>


    <h2>Invitados Registrados</h2>
    <div class="listado-invitados">
        <ul>
            <?php
                $invitados=obtenerInvitados();
                if ($invitados->num_rows> 0) {
                    foreach ($invitados as $invitado):?>
                    <li id="invitado:<?php echo $invitado['invitado_id'] ?>" class="invitado">
                        <p><?php
                            echo $invitado['nombre_invitado'];
                            ?> <?php
                            echo $invitado['apellido_invitado'];
                        ?></p>
                        <div class="acciones">
                            <i class="fas fa-trash"></i>
                        </div>
                    </li>
                    <?php endforeach;
                } else {
                    // no hay eventos
                    echo "<p class='lista-vacia'>No hay Invitados registrados</p>";
                }  
            ?>
        </ul>
    </div>
</div>

<?php
    include 'includes/templates/footerAdmin.php';
?>