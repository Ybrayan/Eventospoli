<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>EventosPoli</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans&display=swap" rel="stylesheet">

    <?php
        $archivo=basename($_SERVER['PHP_SELF']);
        $pagina=str_replace(".php","",$archivo);
    ?>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
    <link rel="stylesheet" href="css/main.css">

    <meta name="theme-color" content="#fafafa">
</head>

<body class="<?php  echo $pagina;?>">


    <header class="site-header">
        <div class="hero">
            <div class="contenido-header">
                <nav class="redes-sociales">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </nav>

                <div class="informacion-evento">
                    <div class="clearfix">
                        <p class="fecha"><i class="fas fa-calendar-alt"></i>
                            <?php
                            $hoy = getdate();
                            $d = $hoy['mday'];
                            $m = $hoy['month'];
                            $y = $hoy['year'];
                            echo "$d-$m-$y";
                            ?>
                        </p>
                        <p class="ciudad"><i class="fas fa-map-marker-alt"></i> Medellin, COL</p>
                    </div>

                    <h1 class="nombre-sitio">Eventos POLI</h1>
                </div>
            </div>
        </div>
    </header>


    <div class="barra">
        <div class="contenedor clearfix">
            <div class="logo">
                <a href="index.php">
                    <img src="img/logo_POLI.svg" alt="logo gdlwebcamp">
                </a>
            </div>

            <div class="menu-movil">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <nav class="navegacion-principal clearfix">
                <a href="conferencia.php">Conferencia</a>
                <a href="calendario.php">Calendario</a>
                <a href="invitados.php">Invitados</a>
                <a href="registro.php">Reservaciones</a>
            </nav>
        </div>
    </div>