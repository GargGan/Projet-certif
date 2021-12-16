<?php
require 'database.php';
require 'php\Fonctions\inscriptionFunction.php';
$pdo = Database::connect();


// ANCHOR profil contact
if (isset($_POST['updateContact'])) {
    // ANCHOR récupération données
    $requser = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();

    if (isset($_POST['newmail'], $_POST['newmail2'], $_POST['ville']) && $_POST['newmail'] != $user['email']) {
        $newmail = inscription($_POST['newmail']);
        $newmail2 = inscription($_POST['newmail2']);
        $ville = inscription($_POST['ville']);
        $villeLength = mb_strlen($ville);

        // ANCHOR si ville vide, garder donnée utilisateur ($user['ville'])
        if (empty($_POST['ville'])) {
            $insertville = $pdo->prepare("UPDATE utilisateurs SET ville = ? WHERE id = ?");
            $insertville->execute(array($user['ville'], $_SESSION['id']));

            // ANCHOR Verification si email est déjà existant en base de donnée 
            if (filter_var($newmail, FILTER_VALIDATE_EMAIL)) {
                $verifNewMail = $pdo->prepare('SELECT email from utilisateurs where email = ?');
                $verifNewMail->execute(array($newmail));
                $existMail = $verifNewMail->rowCount();

                // ANCHOR Si il n'y a pas d'email
                if ($existMail == 0) {

                    //ANCHOR si les2 mails sont identique
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
        $extensionValides = array('jpg','jpeg','gif','png');
        
        if ($_FILES['avatar']['size'] <= $tailleMax) {
            $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1 )); //ANCHOR On met tout en minuscule
            
            if (in_array($extensionUpload, $extensionValides)) {
                //ANCHOR chemin de l'upload avatar
                $chemin = "avatars/".$_SESSION['id'].".".$extensionUpload;
                $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                
                if($resultat) {
                    $updateavatar = $pdo->prepare('UPDATE utilisateurs SET avatar = :avatar WHERE id = :id');
                    $updateavatar->execute(array(
                        'avatar' => $_SESSION['id'].".".$extensionUpload, //ANCHOR le fichier prend comme nom l'id user puis l'extension
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
