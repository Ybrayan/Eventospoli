<aside class="contenedor-proyectos">
    <div class="panel crear-proyecto">
        <a href="#" class="boton">Nuevo Proyecto <i class="fas fa-plus"></i> </a>
    </div>

    <div class="panel lista-proyectos">
        <h2>Proyectos</h2>
        <ul id="proyectos">
            <?php
                $Invitados = obtenerInvitados();
                if($Invitados) {
                    foreach($Invitados as $Invitado) { ?>
                        <li>
                            <a href="Admin.php?invitado_id=<?php echo $Invitado['invitado_id'] ?>" id="invitado_id:<?php echo $Invitado['invitado_id'] ?>">
                                <?php 
                                    echo $Invitado['nombre_invitado'] 
                                ?>
                            </a>
                        </li>
            <?php   }
                }
            ?>
        </ul>
    </div>
</aside>