<?php
session_start();
require 'database.php';
require 'php\Fonctions\inscriptionFunction.php';
include 'php\template\header.php';
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<?php
$id = $_GET['id'];
if (isset($_POST['update'])) {
    if (isset($_POST['titre'], $_POST['categorie'], $_POST['contenu']) && !empty($_POST['titre']) && !empty($_POST['categorie']) && !empty($_POST['contenu'])) {
        $titre = inscription($_POST['titre']);
        $categorie = inscription($_POST['categorie']);
        $contenu = inscription($_POST['contenu']);
        $titreLength = mb_strlen($titre);
        $categorieLength = mb_strlen($categorie);

        if ($titreLength <= 255 && $categorieLength <= 255) {
            if ($contenu < 1000) {

                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "UPDATE articles SET  titre = ?,categorie = ?,contenu = ? WHERE id = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($titre, $categorie, $contenu, $id));
                Database::disconnect();
            }
        } else {
            $err = 'contenu trop grand';
        }
    } else {
        $err = 'Trop des caracteres';
    }
}

?>


<main>

    <?php
<<<<<<< HEAD
  
    $requser = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    // ANCHOR if log and role is admin = dashboard else return index
=======
    // ANCHOR requete pour recupérer donnée utilisateur  
    $requser = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    // ANCHOR Si connecté avec role admin = dashboard sinon renvoyer sur index
>>>>>>> 52afaba3d72b67ba0ffb7952830586b416d9f3f7
    if (isset($_SESSION['id']) && ($user['role'] == 1)) :
    ?>

        <div class="container">
            <div class="row">
                <h3>Modifier articles</h3>
            </div>

            <form method="post">

                <div>
                    <label for="titre">titre :</label>
                    <input type="text" id="titre" name="titre">
                </div>

                <div>
                    <label for="categorie">categorie :</label>
                    <input id="categorie" type="text" name="categorie" min="1" max="1000">
                </div>

                <div>
                    <label for="contenu">contenu :</label>
                    <textarea id="contenu" name="contenu" minlength="2" maxlength="250"></textarea>
                </div>


                <button type="submit" name="update">Update</button>
                <?php
                if (isset($err)) {
                    echo $err;
                }
                ?>
            </form>
        <?php else :
        header('Location: index.php')
        ?>
        <?php
    endif;
        ?>
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