<?php
require 'database.php';
require 'php\Fonctions\inscriptionFunction.php';
$pdo = Database::connect();


// ANCHOR profil contact
if (isset($_POST['updateContact'])) {
    
    $requser = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();

    if (isset($_POST['newmail'], $_POST['newmail2'], $_POST['ville']) && $_POST['newmail'] != $user['email']) {
        $newmail = inscription($_POST['newmail']);
        $newmail2 = inscription($_POST['newmail2']);
        $ville = inscription($_POST['ville']);
        $villeLength = mb_strlen($ville);

        
        if (empty($_POST['ville'])) {
            $insertville = $pdo->prepare("UPDATE utilisateurs SET ville = ? WHERE id = ?");
            $insertville->execute(array($user['ville'], $_SESSION['id']));

             
            if (filter_var($newmail, FILTER_VALIDATE_EMAIL)) {
                $verifNewMail = $pdo->prepare('SELECT email from utilisateurs where email = ?');
                $verifNewMail->execute(array($newmail));
                $existMail = $verifNewMail->rowCount();

              
                if ($existMail == 0) {

                    
                    if ($newmail === $newmail2) {
                        $insertmail = $pdo->prepare("UPDATE utilisateurs SET email = ? WHERE id = ?");
                        $insertmail->execute(array($newmail, $_SESSION['id']));
                        header('Location: profil.php?id=' . $_SESSION['id']);
                    } else {
                        $err = 'Mail non correspondant';
                    }
                } else {
                    $err = 'Mail déjà utilisé';
                }
            }
        } else if (($villeLength <= 255 && $villeLength > 3)) {
            $insertville = $pdo->prepare("UPDATE utilisateurs SET ville = ? WHERE id = ?");
            $insertville->execute(array($ville, $_SESSION['id']));
        }
    } else {
        $err = 'Remplir nouveau mail';
    }
}



// ANCHOR profil profil

if (isset($_POST['updateProfil'])) {

    if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {
        $tailleMax = 2097152; // 2Mo
        $extensionValides = array('jpg', 'jpeg', 'gif', 'png');

        if ($_FILES['avatar']['size'] <= $tailleMax) {
            $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1)); 

            if (in_array($extensionUpload, $extensionValides)) {
             
                $chemin = "avatars/" . $_SESSION['id'] . "." . $extensionUpload;
                $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);

                if ($resultat) {
                    $updateavatar = $pdo->prepare('UPDATE utilisateurs SET avatar = :avatar WHERE id = :id');
                    $updateavatar->execute(array(
                        'avatar' => $_SESSION['id'] . "." . $extensionUpload, //ANCHOR file take user id then extension
                        'id' => $_SESSION['id']
                    ));
                } else {
                    $err = 'Erreur durant l\'importation de votre photo';
                }
            } else {
                $err = 'Votre photo doit etre au format jpg, jpeg, gif ou png';
            }
        } else {
            $err = 'Taille max photo 2Mo';
        }
    }
}



// ANCHOR profil SECURITY
if (isset($_POST['updateSecurity'])) {
   
    $requser = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
   
    if (isset($_POST['newpassword'], $_POST['newpassword2']) && !empty($_POST['newpassword'])) {
        $newpassword = inscription($_POST['newpassword']);
        $newpassword2 = inscription($_POST['newpassword2']);

        //ANCHOR  password = old password, or stop
        if (password_verify($newpassword, $user['password'])) {
            $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
            $err = "Entrez un nouveau mot de passe";

            //ANCHOR if same
        } else if ($newpassword === $newpassword2) {
            //ANCHOR creat hash
            $hash = password_hash($newpassword, PASSWORD_DEFAULT);
            // ANCHOR if newpass hash
            if (password_verify($newpassword, $hash)) {

                // ANCHOR update into database
                $insertPassword = $pdo->prepare("UPDATE utilisateurs set password = ? WHERE id = ?");
                $insertPassword->execute(array($hash, $_SESSION['id']));
                Database::disconnect();
                header("Location: index.php");
            } else {
                $err = 'Remplir password2';
            }
        } else {
            $err = 'Mot de passe ne correspond pas';
        }
    } else {
        $err = 'Remplir Mot de passe';
    }
}

// ANCHOR Publication article
if (isset($_POST['publish'])) {
   
    $requser = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();

    if (isset($_POST['article_titre'], $_POST['article_categorie'], $_POST['article_contenu']) && !empty($_POST['article_titre']) && !empty($_POST['article_categorie']) && !empty($_POST['article_contenu'])) {

        $articletitre = inscription($_POST['article_titre']);
        $articlecategorie = inscription($_POST['article_categorie']);
        $articlecontenu = inscription($_POST['article_contenu']);
        $articleuserid = ($_SESSION['id']); // article takes user id
        $articletitreLength = mb_strlen($articletitre);
        $articlecontenuLength = mb_strlen($articlecontenu);

        if ($articletitreLength <= 31) {

            if ($articlecontenuLength <= 255) {
                //ANCHOR insert into datase article.  user_id takes $_SESSION['id']
                $insertArt = $pdo->prepare('INSERT INTO articles (titre, categorie, contenu, date_time_publication, user_id) VALUES (?,?,?,NOW(),?)');
                $insertArt->execute(array($articletitre, $articlecategorie, $articlecontenu, $articleuserid));

                Database::disconnect();
            } else {
                $err = "Article trop long";
            }
        } else {
            $err = "Titre trop long";
        }
    } else {
        $err = 'Veuillez remplir tout les champs';
    }
}
