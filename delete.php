<?php
session_start();
require 'update&article.php';
include 'php\template\header.php';
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<!DOCTYPE html>



<body>


    <?php
    // $id = 0;
    if (!empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
    if (!empty($_POST)) {
        $id = inscription($_POST['id']);
        $sql = "DELETE FROM utilisateurs WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: index.php");
    }


    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT prenom FROM utilisateurs WHERE id = $id";
    $q = $pdo->query($sql);
    $reponse = $q->fetch();
    Database::disconnect();

    ?>
    <div class="container">
        <div class="span10 offset1">
            <div class="row">
                <h3>Delete a user</h3>
            </div>
            <form class="form-horizontal" action="delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />

                Are you sure to delete <?php echo $reponse['prenom'] ?> ?

                <div class="form-actions">
                    <button type="submit" class="btn btn-danger">Yes</button>
                    <a class="btn" href="admin.php">No</a>
                </div>
            </form>
        </div>
    </div>


    


</body>


</html>