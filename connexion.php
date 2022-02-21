<?php
session_start();
require 'control-connexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ANCHOR Boostrap -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Locvoit</title>
</head>

<body>
    <header>
        <div class="container p-0">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-dark">
                        <div class="dropdown">

                            <!--ANCHOR Menu burger -->
                            <button class="btn  " type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="navbar-toggler-icon "></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                <li><a class="dropdown-item text-white fw-bold" href="index.php">Accueil</a></li>
                                <li><a class="dropdown-item text-white fw-bold" href="profil.php">Mon compte</a></li>
                                <li><a class="dropdown-item text-white fw-bold" href="#">Nos voiture</a></li>
                                <li><a class="dropdown-item text-white fw-bold" href="#">Mes réservations</a></li>
                                <li><a class="dropdown-item text-white fw-bold" href="#">Contact</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-white fw-bold" href="#">Se déconnecter</a></li>
                            </ul>
                        </div>

                        <!--ANCHOR Logo site + connexion -->
                        <div class="logo p-0">
                            <a href="index.php" class="text-decoration-none whitee">Locvoit</a>
                        </div>
                        <div class="log d-flex flex-column ml-auto">
                            <a class="grow text-decoration-none whitee fw-bold" href="connexion.php">Connexion</a>
                            <a class="grow text-decoration-none whitee fw-bold" href="inscription.php">Inscription</a>                          
                        </div>
                    </nav>

                </div>
            </div>
        </div>
    </header>

    <main>
        <!-- ANCHOR main contain -->
        <div class="container p-0">
            <div class="d-flex justify-content-center">
                <div class="col-lg-9 modal-content">
                    <form method="post">
                        <!-- ANCHOR Glass effect -->
                        <div class="square"></div>
                        <div class="square offset-sm-5 offset-md-5 offset-lg-5 col-sm-6 col-md-6 col-lg-6">
                            <div class="col-7">

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
                            <div class="error d-flex justify-content-center">
                                <?php
                                if (isset($err)) {
                                    echo $err;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="square"></div>
                        <div class="square"></div>
                        <div class="d-flex">
                            <div class="aside-left aside-left col-sm-5 col-md-5  ">
                                <img class="imglog" src="img/imgformu.jpg" alt="imglogging">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

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