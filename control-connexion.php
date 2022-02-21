<?php
require 'database.php';
require 'php\Fonctions\inscriptionFunction.php';
$pdo = Database::connect();

session_unset();



if (isset($_POST['connect'])) {
    if (isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $mail = inscription($_POST['email']);
        $password = inscription($_POST['password']);

        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $verifMail = $pdo->prepare('SELECT * from utilisateurs where email = ?');
            $verifMail->execute(array($mail));
            $userExist = $verifMail->rowCount();

            // ANCHOR if already email
            if ($userExist == 1) {
                
                $user = $verifMail->fetch();

                
                if (password_verify($password, $user['password'])){ 
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['prenom'] = $user['prenom'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['role'] = $user['email'];
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