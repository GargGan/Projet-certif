<?php
session_start();
require 'update&article.php';
include 'php\template\header.php';
$pdo = Database::connect();
?>

<?php
if (isset($_SESSION['id'])) :
?>
    <main>
        <div class="container p-0">
            <div class="banniere col-lg-12 d-flex flex-column align-items-center">
                <!-- Banner with tab menu -->
                <div class="d-flex justify-content-center">
                    <img src="img/avatar.png" alt="">
                </div>
                <!--ANCHOR Menu tab -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <a class="nav-link text-white" href="mes-annonces.php">Mes annonces</a>
                </ul>
            </div>

            <div class="container">
                <div class="art col-lg-12 d-flex p-0 gap-5">
                    <!-- ANCHOR search -->
                    <div class="aside-left col-md-3 col-lg-3 p-0">
                        <input class="form-control me-2 " type="search" placeholder="Recherche..." aria-label="Search">
                    </div>
                    <div class="aside-right col-lg-8 p-0">
                        <!-- Button trigger modal -->
                        <div class="butinscription d-flex justify-content-end pr-4">
                            <button type="button" class="butpost text-decoration-none text-center" data-toggle="modal" data-target="#newpost">Nouveau post</button>
                        </div>
                        <!-- Modal -->
                        <form method="post">
                            <div class="modal fade" id="newpost" tabindex="-1" role="dialog" aria-labelledby="post" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-headeeer">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <div class="in md-form m-5">
                                                <input type="text" id="defaultForm-text" class="form-control validate" name="article_titre" minlength="2" maxlength="30">
                                                <label class="text-white fw-bold" data-error="wrong" data-success="right" for="defaultForm-text">Titre</label>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <select name="article_categorie" id="categorie-select">
                                                <option value="">--Choississez une catégorie--</option>
                                                <option value="suv">SUV</option>
                                                <option value="berline">Berline</option>
                                                <option value="luxe">Luxe</option>
                                            </select>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <p class="text-white">Contenu de votre article :</p>
                                                <textarea id="defaultForm-description" name="article_contenu" rows="5" cols="33" class="form-control validate"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="button" class="butclose text-decoration-none text-center" data-dismiss="modal">Close</button>
                                            <button type="submit" class="butlog text-decoration-none text-center" name="publish">Publier</button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if (isset($err)) {
                                    echo $err;
                                }
                                ?>
                            </div>
                        </form>
                        <!-- ANCHOR articles -->

                        <?php
                        $berline = "berline";
                        $pdo = Database::connect();
                        $articles = $pdo->prepare('SELECT * FROM articles WHERE categorie = ? ORDER BY date_time_publication');
                        $articles->execute(array($berline));
                        while ($a = $articles->fetch()) {
                        ?>
                            <div class="articles">
                                <div class="article col-lg-12 text-white d-flex flex-wrap">
                                    <div class="photoarticle d-flex align-items-center col-md-3 col-lg-3">
                                        <img src="img/4577370.png" alt="">
                                    </div>
                                    <div class="d-flex flex-column offset-md-2 col-md-7 col-lg-8 offset-lg-1">
                                        <div class="titrearticle mt-1">
                                            <h3 class="m-0"><?= $a['titre'] ?></h3>
                                        </div>
                                        <div class="categories">
                                            <a class="text-decoration-none" href="#"><?= $a['categorie'] ?></a>
                                        </div>
                                        <div class="paragraphearticle">
                                            <p class="m-0"><?= $a['contenu'] ?></p>
                                        </div>
                                        <div class="butinscription d-flex justify-content-end pr-4 m-2">
                                            <a class="butpost text-decoration-none text-center" href="article.php?titre=<?= $a['titre'] ?>">Voir plus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }

                        ?>
                    </div>
                </div>
            </div>

        </div>







    </main>
<?php
else :
    header("Location: connexion.php");
endif;
?>

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