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
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-dark  ">
                    <div class="dropdown col-1">

                        <!--ANCHOR Menu burger -->
                        <button class="btn  " type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="navbar-toggler-icon "></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item text-white fw-bold" href="#">Accueil</a></li>
                            <li><a class="dropdown-item text-white fw-bold" href="#">Mon compte</a></li>
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
                    <div class="logo col-2 p-0">
                        <a href="" class="text-decoration-none whitee">Locvoit</a>
                    </div>
                    <div class="log col-1 offset-8">
                        <li class="grow"><button class="text-decoration-none whitee fw-bold" data-toggle="modal" data-target="#modalLoginForm">Connexion</button></li>
                        <li class="grow"><button class="text-decoration-none whitee fw-bold" data-toggle="modal" data-target="#modalInscriptionForm">Inscription</button></li>
                    </div>
                </nav>

                <!-- ANCHOR reservation -->
                <div class="navform d-flex gap-4 p-1 align-items-center">
                    <input class="form-control me-2 " type="search" placeholder="Trouver une agence..." aria-label="Search">
                    <label class="whitee d-flex align-items-center" for="start">Debut: </label>
                    <input class="col-2" type="date" id="start" name="start">
                    <label class="whitee d-flex align-items-center" for="end">Fin: </label>
                    <input class="col-2" type="date" id="end" name="end">
                </div>
            </div>
        </div>
    </header>