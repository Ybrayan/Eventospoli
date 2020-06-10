<aside class="contenedor-proyectos">
    <div class="panel crear-proyecto">
        <a href="ingresarInvitados.php" class="boton">Nuevo Invitado <i class="fas fa-plus"></i> </a>
    </div>

    <div class="panel lista-proyectos">
        <h2>Invitados</h2>
        <ul id="proyectos">
            <?php
                $Invitados = obtenerInvitados();
                if($Invitados) {
                    foreach($Invitados as $Invitado) { ?>
                        <li>
                            <a href="Admin.php?invitado_id=<?php echo $Invitado['invitado_id'] ?>" id="invitado_id:<?php echo $Invitado['invitado_id'] ?>">
                                <?php
                                echo $Invitado['nombre_invitado'];
                                ?> <?php
                                echo $Invitado['apellido_invitado'];
                                ?>
                            </a>
                        </li>
            <?php   }
                }
            ?>
        </ul>
    </div>
</aside>