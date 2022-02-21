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
                                    <a href="berline.php"><img class="image" src="img/berline.png" alt="berline" width="100%"></a>
                                </div>
                                <div class="model text-center m-3">
                                    <a class="text-decoration-none whitee d-block" href="berline.php" width="100%">Louer une berline</a>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="suv d-flex flex-column p-2">
                                <div>
                                    <a href="suv.php"><img class="image" src="img/suv.png" alt="suv" width="100%"></a>
                                </div>
                                <div class="model text-center m-3">
                                    <a class="text-decoration-none whitee d-block" href="suv.php">Louer un SUV</a>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="luxe d-flex flex-column p-2">
                                <div>
                                    <a href="luxe.php"><img class="image" src="img/luxe.png" alt="luxe" width="100%"></a>
                                </div>
                                <div class="model text-center m-3">
                                    <a class="text-decoration-none whitee d-block" href="luxe.php">Louer voiture de luxe</a>
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