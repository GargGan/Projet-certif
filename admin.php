<?php
session_start();
require 'update&article.php';
include 'php\template\header.php';
$pdo = Database::connect();
?>




<main>

    <?php
    
    $requser = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
  
    if (isset($_SESSION['id']) && ($user['role'] == 1)) :
    ?>
        <div class="container">
            <div class="row">
                <h2 class="text-center mt-4">DASHBOARD ADMIN</h2>
            </div>

            <table class="table table-hover table-bordered">

                <thead>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>ID</th>

                </thead>

                <tbody>
                    <?php
                    $sql = $pdo->query('SELECT * FROM utilisateurs');
                    foreach ($sql as $row) { ?>
                        <tr>
                            <td><?= $row['prenom']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['id']; ?></td>


                            <td><a class="btn btn-success" href="update.php?id=<?= $row['id']; ?>">Update</a></td>
                            <td><a class="btn btn-danger" href="delete.php?id=<?= $row['id']; ?>">Delete</a></td>
                        </tr>
                    <?php }
                    Database::disconnect();
                    ?>
                </tbody>
            </table>
        </div>




        <div class="container">
            <div class="row">
                <h2 class="text-center mt-4">DASHBOARD ADMIN</h2>
            </div>

            <table class="table table-hover table-bordered">

                <thead>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Contenu</th>

                </thead>

                <tbody>
                    <?php
                    $sql = $pdo->query('SELECT * FROM articles');
                    foreach ($sql as $row) { ?>
                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['titre']; ?></td>
                            <td><?= $row['contenu']; ?></td>


                            <td><a class="btn btn-success" href="updateadmin.php?id=<?= $row['id']; ?>">Update</a></td>
                            <td><a class="btn btn-danger" href="deleteart.php?id=<?= $row['id']; ?>">Delete</a></td>
                        </tr>
                    <?php }
                    Database::disconnect();
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Button trigger modal -->
        <div class="butinscription d-flex justify-content-center pr-4">
            <button type="button" class="butpost text-decoration-none text-center" data-toggle="modal" data-target="#newpost">Nouveau post</button>
        </div>
    <?php else :
        header('Location: index.php')
    ?>
    <?php
    endif;
    ?>

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