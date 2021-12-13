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
            $verifMail = $pdo->prepare('SELECT * from utilisateurs where email = ? AND password = ?');
            $verifMail->execute(array($mail, $password));
            $existMail = $verifMail->rowCount();
            // ANCHOR Si il y a déjà un mail
            if ($existMail == 1) {
                $user = $verifMail->fetch();
                // ANCHOR si le password est bien celui du mail
                if (password_verify($password, $user['password'])) {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $_SESSION['id'] = $user['user_id'];
                    $_SESSION['id'] = $user['prenom'];
                    if($user['admin'] == 1){
                        header('Location: admin.php');
                    } else {
                        header('Location: index.php?id=' . $_SESSION['id']);
                    }
                }
            } else {
                $err = 'Mauvais e-mail ou mot de passe';
            }
        } 
    }else {
        $err = 'Remplissez tout les champs';
    }
}