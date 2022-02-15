<?php
session_start();
require 'update&article.php';
include 'php\template\header.php';
$pdo = Database::connect();
?>

<?php
if (isset($_GET['titre']) and !empty($_GET['titre'])) {
    $get_id = htmlspecialchars($_GET['titre']);
    $article = $pdo->prepare('SELECT * FROM articles WHERE titre = ?');
    $article->execute(array($get_id));
    if ($article->rowCount() == 1) {
        $article = $article->fetch();
        $titre = $article['titre'];
        $contenu = $article['contenu'];
        $categorie = $article['categorie'];
    } else {
        die('Cet article n\'existe pas !');
    }
} else {
    die('Erreur');
}
?>


<main>
    <div class="container mb-5">
            <div class="articles">
                <div class="article col-lg-12 text-white d-flex flex-wrap">
                    <div class="photoarticle d-flex align-items-center col-md-3 col-lg-3">
                        <img src="img/4577370.png" alt="">
                    </div>
                    <div class="d-flex flex-column offset-md-2 col-md-7 col-lg-8 offset-lg-1">
                        <div class="titrearticle mt-1">
                            <h3 class="m-0"><?= $titre ?></h3>
                        </div>
                        <div class="categories">
                            <a class="text-decoration-none" href="#"><?= $categorie ?></a>
                        </div>
                        <div class="paragraphearticle">
                            <p class="m-0"><?= $contenu ?></p>
                        </div>

                    </div>
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