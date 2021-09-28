
<!--footer start here-->
<div class="footer" style="background-color:#362D30; border-top:1px solid grey;">
    <div class="container">
        <div class="footer-main">
            <div class="col-md-3 ftr-grid wow zoomIn" data-wow-delay="0.3s">
                <div class="ftr-logo">
                <?php echo img('lewat.png','', 'logo_footer'); ?>
                </div>
                <p style=" color:#BD655B; margin-top:-30px;">LUXE & TRADITION</p>
            </div>
            <div class="col-md-3 ftr-grid ftr-mid wow zoomIn" data-wow-delay="0.3s">
                 <h3 class="footer-h3" style="font-size:25px; color:#BD655B">ADRESSES</h3>
                 <span class="ftr-line flm"> </span>
                <p>2699, Boulevard de la République.</p>
                <p>Entre feu rouge et vallée Béssengue.</p>
                <p>Douala-Cameroun</p>
                
            </div>
            <div class="col-md-3 ftr-grid ftr-rit wow zoomIn" data-wow-delay="0.3s">
                 <h3 class="footer-h3" style="font-size:25px; color:#BD655B;">CONTACTEZ-NOUS</h3>
                 <form>
                    <input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
                    <input type="submit" value="Envoyer" />
                 </form>
                  <ul class="ftr-icons">
                    <li><a href="#"><span class="fa fa-facebook" style="color:#BD655B; font-size:20px;"> </span></a></li>
                    <li><a href="https://api.whatsapp.com/send/?phone=237651717926&text&app_absent=0"><span class="fa fa-whatsapp" style="color:#BD655B; font-size:20px;"> </span></a></li>
                    <li><a href="#"><span class="fa fa-linkedin" style="color:#BD655B; font-size:20px;"> </span></a></li>
                 </ul>
            </div>
            <div class="col-md-3 ftr-grid ftr-last-gd ftr-rit wow zoomIn" data-wow-delay="0.3s">
                 <h3 class="footer-h3" style="font-size:25px; color:#BD655B;">NAVIGATION</h3>
                  <ul class="ftr-nav">
                    <li><a href="index.html">ACCEUIL</a></li>
                    <li><a href="about.html">HEBERGEMENT</a></li>
                    <li><a href="services.html">RESTAURATION </a></li>
                    <li><a href="room.html">EVENEMENT</a></li>
                    <li><a href="contact.html">BAR</a></li>
                    <li><a href="contact.html">CAVE</a></li>
                    <li><a href="contact.html">CONTACT</a></li>
                 </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--footer end here-->
<!--copy rights start here-->
<div class="copy-right" style="background-color:#CE9061;">
    <div class="container">
         <div class="copy-rights-main wow zoomIn" data-wow-delay="0.3s">
            <p style="color:#362D30;">© 2021 <a href="Inch Class">Inch CLass </a>powered by <a href="">SIMPLON.CO</a>. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">PARFAIT LIENOU</a> & <a href="http://w3layouts.com/" target="_blank">FRANKLIN TCHENGWE</a> </p>
         </div>
            <button onclick="topFunction()" id="movetop" title="Go to top" style="display: block; position:fixed;"> ⤴ </button>
    </div>
</div>
</body>
</html>

    <?php  
      echo js('js/js/jquery-1.11.0.min');
      echo js('js/js/modernizr');
      echo js('js/js/bootstrap.min');
      echo js('js/js/wow.min');
      echo js('js/js/jquery.chocolat');  
      echo js('js/js/jquery-3.6.0.min');
      echo js('js/js/wow.min');
    ?>
        <script src="js/wow.min.js"></script>
        <script>
         new WOW().init();
        </script>
<!-- animated-css -->
<script src="js/modernizr.js"></script>
<script>
    $(document).ready(function(){
        if (Modernizr.touch) {
            // show the close overlay button
            $(".close-overlay").removeClass("hidden");
            // handle the adding of hover class when clicked
            $(".branch-gd").click(function(e){
                if (!$(this).hasClass("hover")) {
                    $(this).addClass("hover");
                }
            });
            // handle the closing of the overlay
            $(".close-overlay").click(function(e){
                e.preventDefault();
                e.stopPropagation();
                if ($(this).closest(".branch-gd").hasClass("hover")) {
                    $(this).closest(".branch-gd").removeClass("hover");
                }
            });
        } else {
            // handle the mouseenter functionality
            $(".branch-gd").mouseenter(function(){
                $(this).addClass("hover");
            })
            // handle the mouseleave functionality
            .mouseleave(function(){
                $(this).removeClass("hover");
            });
        }
    });
</script>

    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
      &#10548;
    </button>
    <script>
      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = function () {
        scrollFunction()
      };

      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("movetop").style.display = "block";
        } else {
          document.getElementById("movetop").style.display = "none";
        }
      }

      // When the user clicks on the button, scroll to the top of the document
      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>
    <script>
        $(function () {
        $('.carousel').carousel({ interval: 3000 });
        });
    </script>
    <script>    
        var loadFile = function(event) {
            var profil = document.getElementById('im');
            profil.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
            <script type="text/javascript">
                var cpt = 0;
                var Message_erreur = document.getElementsByClassName('al');
                var Etoile_erreur = document.getElementsByTagName('sup');
                var Valid = document.getElementsByClassName('Valid');
                var Send = document.getElementById('Send');
                var Zone = document.getElementsByTagName('input');
                var pays = document.getElementById('Nationalite');
                var formulaire = document.getElementsByTagName('form');
                var Clear = document.getElementById('Clear');


                    // Masquage Message erreur
                    function Masque() { 
                        for (var i = Message_erreur.length - 1; i >= 0; i--) {
                          Message_erreur[i].style.opacity = '0';
                        }

                        for (var i = Etoile_erreur.length - 1; i >= 0; i--) {
                            Etoile_erreur[i].style.opacity = '0';
                        }

                        for (var i = Valid.length - 1; i >= 0; i--) {
                            Valid[i].style.opacity = '0';
                        }

                    }
                    Masque();
            </script>
            <script type="text/javascript">

            // Fonction  désactivation de affichage  « Message  erreur »
                var Error = document.getElementsByClassName('Erreur');
                // var Photo = document.getElementById('Bloc_Photo');
                  var Nom = document.getElementById('Nom');

                function desactive() {
                  for (var i = 0 ; i < Error.length ; i++) {
                      Error[i].style.display = 'none';
                  }
                  // Photo.style.display = 'none';
                }
                desactive();
            </script>