<!-------------- Cabecera inicio --------------->

<?php include("cabecera.php");?>

<!------------------- Cabecera final------------->   



<!------------------Informacion Inicio----------->
  
<?php include("principal.php");?>

<!------------------Informacion Inicio----------->


<!--------------------------- Tarjetas Inicio----------------->

<?php include("servicios.php");?>
 

<!-------------------------------------- Tarjetas final------->

    <section class ="section_tres">
        <div class = "section_container">
            <div class ="section_img">
                <img src="img/website-antivirus.svg" alt="" class="sect_img">
            </div>
            <div class ="section_text">
               
                <h3 class ="section_titulo"> ¿Quienes pueden benefeciarse? </h3>
                <ul class ="uls">
                    
                    <li>
                        <p>Todos los individuos, PyMES y grandes organizaciones que deseen evitar ser víctimas de un ciberataque y sus consecuencias económicas, jurídicas y reputacionales.</p>
                    </li>
                    <li>
                        <p>Especialmente organizaciones de los sectores: financiero y bancario, agua, alimentos, salud, energía (O&G y renovables), TIC, y otras infraestructuras críticas.</p>
                    </li>
                    <li>
                        <p>Organizaciones públicas y poderes de los Estados.</p>
                    </li>
                </ul>
                
            </div>
        </div>
    </section>



<div class="contact">
        <div class="contact-heading">
            <h4>Contactenos</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <form action="userinformation.php" method="post">
            <input type="text" name="usuario" placeholder="Escribe tu nombre completo"/>
            <input type="text" name="correo" placeholder="Tu E-mail"/>
            <textarea type="text" name="mensaje" placeholder="Escribe tu comentario o mensaje aqui.........."></textarea>
            <button class="main-btn contact-btn" name="accion" type="submit" >Continue</button>
        </form>
</div>

<footer>

        <div class="container__footer">
            <div class="box__footer">
                <div class="logo">
                    <img src="img/hackerlogo.svg" alt=""> 
                </div>
                <div class="terms">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas impedit cum cumque velit libero officiis quam doloremque reprehenderit quae corporis! Delectus architecto officia praesentium atque laudantium, nam deleniti sapiente deserunt.</p>
                </div>
            </div>
            <div class="box__footer">
                <h2>Soluciones</h2>
                <a href="https://www.google.com">Cybersecurity</a>
                <a href="#">App Pentesting</a>
                <a href="#">Hacking Etico</a>
                <a href="#">Firewalls</a>
            </div>

            <div class="box__footer">
                <h2>Compañia</h2>
                <a href="#">Acerca de</a>
                <a href="#">Trabajos</a>
                <a href="#">Procesos</a>
                <a href="#">Servicios</a>              
            </div>

            <div class="box__footer">
                <h2>Redes Sociales</h2>
                <a href="#"> <i class="fab fa-facebook-square"></i> Facebook</a>
                <a href="#"><i class="fab fa-twitter-square"></i> Twitter</a>
                <a href="#"><i class="fab fa-linkedin"></i> Linkedin</a>
                <a href="#"><i class="fab fa-instagram-square"></i> Instagram</a>
            </div>

        </div>

        <div class="box__copyright">
            <hr>
            <p>Todos los derechos reservados © 2022 <b>Punk Hazard</b></p>
        </div>
    </footer>

</div>   
</body>
</html>
 