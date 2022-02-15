<?php
require 'database.php';
require 'php\Fonctions\inscriptionFunction.php';
$pdo = Database::connect();
// Vide $_SESSION si existe 
session_unset();


// ANCHOR Si défini et rempli
if (isset($_POST['connect'])) {
    if (isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $mail = inscription($_POST['email']);
        $password = inscription($_POST['password']);

        // ANCHOR preparation vérif
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $verifMail = $pdo->prepare('SELECT * from utilisateurs where email = ?');
            $verifMail->execute(array($mail));
            $userExist = $verifMail->rowCount();

            // ANCHOR Si il y a déjà un mail
            if ($userExist == 1) {
                //ANCHOR retour du mail
                $user = $verifMail->fetch();

                // ANCHOR si le password est bien celui du mail de l'user
                if (password_verify($password, $user['password'])){
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    // ANCHOR Session prend les valeurs du tableau
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['prenom'] = $user['prenom'];
                    $_SESSION['email'] = $user['email'];
                    if($user['role'] == 1){
                        header('Location: admin.php');
                    } else {
                        header('Location: index.php?id=' . $_SESSION['id']);
                    }
                    
                } else {
                    $err = 'Mot de passe incorrect';
                }
            } else {
                $err = 'E-mail ou mot de passe incorrect';
            }
        } 
    }else {
        $err = 'Remplissez tout les champs';
    }
}