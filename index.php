<?php
session_start();
require 'database.php';
$pdo = Database::connect();
?>
<?php
include 'php\template\header.php';
?>

<main>
    <!-- ANCHOR caroussel active -->
    <div class="container p-0">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>

            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./img/pub-renault-captur-2020.jpg" class=" imgcarou d-block w-100" height="400px" alt="img-1">
                </div>
                <div class="carousel-item">
                    <img src="./img/peugeot-308-2017-1170x450.jpg" class="imgcarou d-block w-100" height="400px" alt="img-2">

                </div>
                <div class="carousel-item">
                    <img src="img/maxresdefault.jpg" class="imgcarou d-block w-100 " height="400px" alt="img-3">
                </div>

                <div class="carousel-item">
                    <img src="img/voiture1.jpg" class="imgcarou d-block w-100 " height="400px" alt="img-4">
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>

            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>

            </button>
        </div>
    </div>

    <!-- ANCHOR main contain -->
    <div class="container p-0">
        <div class="col-lg-12 p-0">
            <section class="bg-blue">
                <div>
                    <div class="slogan">
                        <h2 class="d-flex justify-content-center"><p class="col-2">Cherchez à vivre vos rêves, roulez !</p></h2>
                    </div>

                    <div class="d-flex flex-wrap justify-content-center">
                        <div>
                            <div class="berline d-flex flex-column p-2">
                                <div>
                                    <a href=""><img class="image" src="img/berline.png" alt="berline" width="100%"></a>
                                </div>
                                <div class="model text-center m-3">
                                    <a class="text-decoration-none whitee d-block" href="" width="100%">Louer une berline</a>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="suv d-flex flex-column p-2">
                                <div>
                                    <a href=""><img class="image" src="img/suv.png" alt="suv" width="100%"></a>
                                </div>
                                <div class="model text-center m-3">
                                    <a class="text-decoration-none whitee d-block" href="">Louer un SUV</a>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="luxe d-flex flex-column p-2">
                                <div>
                                    <a href=""><img class="image" src="img/luxe.png" alt="luxe" width="100%"></a>
                                </div>
                                <div class="model text-center m-3">
                                    <a class="text-decoration-none whitee d-block" href="">Louer voiture de luxe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="allmodel d-flex justify-content-center">
                        <a class="all text-decoration-none whitee fw-bold text-center" href=""> > Tout nos modèles < </a>
                    </div>
                </div>
            </section>
        </div>
    </div>


    <!-- ANCHOR form popup -->
    <!-- ANCHOR SIGN UP -->
    <!-- <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <form method="post"> -->
    <!-- ANCHOR Glass effect -->
    <!-- <div class="square"></div>
                       <div class="square">
                           <div class="col-7">
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                               </button>
                               <div class="text-center">
                                   <h4 class="modal-title w-100 font-weight-bold text-white">Se connecter</h4>
                               </div>

                               <div class="mx-3">
                                   <div class="md-form mb-5">
                                       <i class="fas fa-envelope mt-1 prefix white-text"></i>
                                       <input type="email" id="defaultForm-email" class="form-control validate" name="email">
                                       <label class="text-white" data-error="wrong" data-success="right" for="defaultForm-email">E-mail</label>
                                   </div>
                                   <div class="md-form mb-4">
                                       <i class="fas fa-lock prefix white-text"></i>
                                       <input type="password" id="defaultForm-pass" class="form-control validate" name="password">
                                       <label class="text-white" data-error="wrong" data-success="right" for="defaultForm-pass">Mot de passe</label>
                                   </div>
                               </div>

                               <div class="butlogging d-flex justify-content-center">
                                   <button type="submit" class="butlog text-decoration-none text-center" name="connect">Se connecter</button>
                               </div>

                               <div class="mx-5 pt-3 mb-1">
                                   <p class="font-small d-flex justify-content-center mt-4">Pas un membre?<button class="text-decoration-none white-text fw-bold ml-1" class="close" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#modalInscriptionForm">
                                           Inscrivez-vous</button></p>
                               </div>
                           </div>
                       </div>
                       <div class="square"></div>
                       <div class="square"></div>
                       <div class="d-flex">
                           <div class="aside-left col-5 "> -->
    <!-- <img class="imglog" src="img/imgformu.jpg" alt="">
                           </div>
                       </div> -->
    <!-- </form>
               </div>
           </div>
       </div> -->
    <!-- ANCHOR INSCRIPTION -->
    <!-- <div class="modal fade" id="modalInscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <form method="post"> -->
    <!-- ANCHOR Glass effect -->
    <!-- <div class="square"></div>
                       <div class="squareinscription">
                           <div class="col-7">
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                               </button>
                               <div class="text-center">
                                   <h4 class="modal-title mt-4 w-100 font-weight-bold text-white">S'inscrire</h4>
                               </div>
                               <div class="mx-3 mt-4">
                                   <div class="in md-form">
                                       <i class="fas prefix white-text mt-1 fa-user-circle"></i>
                                       <input type="text" id="defaultForm-text" class="form-control validate" name="nom" minlength="2" maxlength="25">
                                       <label class="text-white" data-error="wrong" data-success="right" for="defaultForm-text">Nom</label>
                                   </div>
                                   <div class="in md-form">
                                       <i class="fas prefix white-text mt-1 fa-user-circle"></i>
                                       <input type="text" id="defaultForm-text" class="form-control validate" name="prenom" minlength="2" maxlength="25">
                                       <label class="text-white" data-error="wrong" data-success="right" for="defaultForm-text">Prénom</label>
                                   </div>
                                   <div class="in md-form">
                                       <i class="fas fa-envelope prefix mt-1 white-text"></i>
                                       <input type="email" id="defaultForm-email" class="form-control validate" name="email">
                                       <label class="text-white" data-error="wrong" data-success="right" for="defaultForm-email">E-mail</label>
                                   </div>
                                   <div class="in md-form">
                                       <i class="fas fa-envelope prefix mt-1 white-text"></i>
                                       <input type="email" id="defaultForm-confirmemail" class="form-control validate" name="email2">
                                       <label class="text-white" data-error="wrong" data-success="right" for="defaultForm-confirmemail">Confirmation E-mail</label>
                                   </div>
                                   <div class="in md-form">
                                       <i class="fas fa-lock prefix white-text"></i>
                                       <input type="password" id="defaultForm-pass" class="form-control validate" name="password">
                                       <label class="text-white" data-error="wrong" data-success="right" for="defaultForm-pass">Mot de passe</label>
                                   </div>

                                   <div class="in md-form mb-4">
                                       <i class="fas fa-lock prefix white-text"></i>
                                       <input type="password" id="defaultForm-confirmpass" class="form-control validate" name="password2">
                                       <label class="text-white" data-error="wrong" data-success="right" for="defaultForm-confirmpass">Confirmation mot de passe</label>
                                   </div>
                               </div>
                               <div class="butinscription d-flex justify-content-center">
                                   <button type="submit" class="butlog text-decoration-none text-center" name="inscri">S'inscrire</button>
                               </div>
                           </div>
                       </div>
                       <div class="square"></div>
                       <div class="square"></div>
                       <div class="d-flex">
                           <div class="aside-left col-5 ">
                               <img class="imglog" src="img/imgformu.jpg" alt="">
                           </div>
                       </div> -->

    <!-- </form>
               </div>
           </div>
       </div> -->
</main>

<?php
include 'php\template\footer.php';
?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>

</html>