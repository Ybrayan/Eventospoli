<?php
    include_once'includes/templates/header.php';
?>
    <section class="seccion contenedor">
        <h2>La mejor conferencia de diseño Web en español</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates delectus odit architecto aspernatur incidunt voluptatum labore porro qui. Animi rem obcaecati aut sequi aliquam praesentium voluptatum. Eius iure commodi iusto!</p>
    </section>


    <section class="programa">
        <div class="contenedor-video">
            <video autoplay loop poster="img/bg-talleres.jpg">
                <source src="video/video.mp4" type="video/mp4">
                <source src="video/video.webm" type="video/webm">
                <source src="video/video.ogv" type="video/ogv">
            </video>
        </div>

        <div class="contenido-programa">
            <div class="contenedor">
                <div class="programa-evento">
                    <h2>Programa del Evento</h2>
                    <nav class="menu-programa">
                        <a href="#talleres"><i class="fas fa-code"></i>Talleres</a>
                        <a href="#conferencias"><i class="fas fa-comments"></i>Conferencias</a>
                        <a href="#seminarios"><i class="fas fa-university"></i>Seminarios</a>
                    </nav>

                    <div id="talleres" class="info-curso ocultar clearfix">
                        <div class="detalle-evento">
                            <h3>HTML5, CSS3 y JavaScript</h3>
                            <p><i class="fas fa-clock"></i>16:00 hrs</p>
                            <p><i class="fas fa-calendar"></i>7 de diciembre</p>
                            <p><i class="fas fa-user"></i>Yhors Brayan</p>
                        </div>
                        <div class="detalle-evento">
                            <h3>Paseo al Raudal</h3>
                            <p><i class="fas fa-clock"></i>20:00 hrs</p>
                            <p><i class="fas fa-calendar"></i>7 de diciembre</p>
                            <p><i class="fas fa-user"></i>Yhors Brayan</p>
                        </div>
                        <a href="#" class="button float-rigth">Ver todos</a>
                    </div>
                    <!--Talleres-->

                    <div id="conferencias" class="info-curso ocultar clearfix">
                        <div class="detalle-evento">
                            <h3>Como ser Freelancer</h3>
                            <p><i class="fas fa-clock"></i>10:00 hrs</p>
                            <p><i class="fas fa-calendar"></i>7 de diciembre</p>
                            <p><i class="fas fa-user"></i>Jimmy</p>
                        </div>
                        <div class="detalle-evento">
                            <h3>Tecnologias del futuro</h3>
                            <p><i class="fas fa-clock"></i>20:00 hrs</p>
                            <p><i class="fas fa-calendar"></i>7 de diciembre</p>
                            <p><i class="fas fa-user"></i>Susana</p>
                        </div>
                        <a href="#" class="button float-rigth">Ver todos</a>
                    </div>
                    <!--conferencias-->

                    <div id="seminarios" class="info-curso ocultar clearfix">
                        <div class="detalle-evento">
                            <h3>Diseño para moviles</h3>
                            <p><i class="fas fa-clock"></i>17:00 hrs</p>
                            <p><i class="fas fa-calendar"></i>11 de diciembre</p>
                            <p><i class="fas fa-user"></i>Harold</p>
                        </div>
                        <div class="detalle-evento">
                            <h3>Aprende a programar</h3>
                            <p><i class="fas fa-clock"></i>20:00 hrs</p>
                            <p><i class="fas fa-calendar"></i>11 de diciembre</p>
                            <p><i class="fas fa-user"></i>Susana</p>
                        </div>
                        <a href="#" class="button float-rigth">Ver todos</a>
                    </div>
                    <!--seminarios-->
                </div>
            </div>
        </div>
    </section>

    <section class="seccion contenedor">
        <h2>Nuestros invitados</h2>

        <?php
            try {
                require_once('includes/funciones/bd_conexion.php');
                $sql = "SELECT * FROM invitados";
                $resultado=$conn->query($sql);
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        ?>
        
        <ul class="lista-invitados clearfix">
            <?php  while ($invitados=$resultado->fetch_assoc()) {  ?>
                <li>
                    <div class="invitado">
                        <img src="img/<?php echo $invitados['url_imagen'];  ?>" alt="imagen invitado">
                        <p><?php echo$invitados['nombre_invitado'] ." " . $invitados['apellido_invitado']; ?></p>
                    </div>
                </li>
            <?php  }//while  ?>
        </ul>

        <?php  $conn->close();  ?>
    </section>

    <div class="contador parallax">
        <div class="contenedor">
            <ul class="resumen-evento clearfix">
                <li>
                    <p class="numero"></p>Invitados</li>
                <li>
                    <p class="numero"></p>Talleres</li>
                <li>
                    <p class="numero"></p>Dias</li>
                <li>
                    <p class="numero"></p>Conferencias</li>
            </ul>
        </div>
    </div>

    <section class="precios seccion">
        <h2>Precios</h2>
        <div class="contenedor">
            <ul class="lista-precios clearfix">
                <li>
                    <div class="tabla-precio">
                        <h3>Pase por dia</h3>
                        <p class="numero">$30</p>
                        <ul>
                            <li>Bocadillos Gratis</li>
                            <li>Todas las conferencias</li>
                            <li>Todos los Talleres</li>
                        </ul>
                        <a href="#" class="button hollow">Comprar</a>
                    </div>
                </li>
                <li>
                    <div class="tabla-precio">
                        <h3>Todos los Dias</h3>
                        <p class="numero">$60</p>
                        <ul>
                            <li>Bocadillos Gratis</li>
                            <li>Todas las conferencias</li>
                            <li>Todos los Talleres</li>
                        </ul>
                        <a href="#" class="button">Comprar</a>
                    </div>
                </li>
                <li>
                    <div class="tabla-precio">
                        <h3>Pase por 2 dias</h3>
                        <p class="numero">$45</p>
                        <ul>
                            <li>Bocadillos Gratis</li>
                            <li>Todas las conferencias</li>
                            <li>Todos los Talleres</li>
                        </ul>
                        <a href="#" class="button hollow">Comprar</a>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <div id="mapa" class="mapa">
    </div>

    <section class="seccion">
        <h2>Testimoniales</h2>
        <div class="testimoniales contenedor clearfix">
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt voluptates optio quia odit! Quidem, accusamus iste nostrum, dolores eum repellat asperiores provident odit numquam magnam consequuntur maiores expedita delectus suscipit!</p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Oswaldo Aponte Escodero <span>Diseñador @Prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus quasi voluptatem quae illum aut itaque dolorem alias commodi, pariatur velit minima, deserunt, consequuntur amet. Culpa autem consectetur distinctio harum nesciunt?</p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Oswaldo Aponte Escodero <span>Diseñador @Prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum, molestias accusamus. Ipsum atque laboriosam et illo, repudiandae quisquam culpa ea velit nihil laborum qui expedita excepturi, eius iure eaque suscipit.</p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Oswaldo Aponte Escodero <span>Diseñador @Prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
        </div>
    </section>

    <div class="newsletter parallax">
        <div class="contenido contenedor">
            <h3>EVENTOS POLI</h3>
            <a href="#" class="button transparente">Registro</a>
        </div>
    </div>

    <section class="seccion">
        <h2>Faltan</h2>
        <div class="cuenta-regresiva contenedor">
            <ul class="clearfix">
                <li>
                    <p id="dias" class="numero"></p>Dias
                </li>
                <li>
                    <p id="horas" class="numero"></p>Horas
                </li>
                <li>
                    <p id="minutos" class="numero"></p>Minutos
                </li>
                <li>
                    <p id="segundos" class="numero"></p>Segundos
                </li>
            </ul>
        </div>
    </section>
<?php
    include_once'includes/templates/footer.php';
?>