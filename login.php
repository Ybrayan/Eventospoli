<?php
    session_start();
    include 'includes/funciones/funciones.php';
    include 'includes/templates/headerAdmin.php';
    if(isset($_GET['cerrar_sesion'])) {
        $_SESSION = array();
    }
?>

    <div class="contenedor-formulario">
        <h1>Administradores</h1>
        <form id="formulario" class="caja-login" method="post">
            <div class="campo">
                <label for="usuario">Usuario: </label>
                <input type="text" name="usuario" id="usuario" placeholder="Usuario" maxlength="20">
            </div>
            <div class="campo">
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" placeholder="Password" maxlength="20">
            </div>
            <div class="campo enviar">
                <input type="hidden" id="tipo" value="login">
                <input type="submit" class="boton" value="Iniciar Sesión">
            </div>

            <div class="campo">
                <a href="crear-cuenta.php">Inicia sesión o crea una cuenta nueva</a>
            </div>
        </form>
    </div>

    <?php
        include 'includes/templates/footerAdmin.php';
    ?>
