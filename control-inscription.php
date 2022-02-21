<?php
require 'database.php';
require 'php\Fonctions\inscriptionFunction.php';
$pdo = Database::connect();
if (isset($_POST['inscri'])) {
    if (isset($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['email2'], $_POST['password'], $_POST['password2']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['email2']) && !empty($_POST['password']) && !empty($_POST['password2'])) {
       
        $prenom = inscription($_POST['prenom']);
        $nom = inscription($_POST['nom']);
        $email = inscription($_POST['email']);
        $email2 = inscription($_POST['email2']);
        $pass = inscription($_POST['password']);
        $pass2 = inscription($_POST['password2']);
        $prenomLength = mb_strlen($prenom);
        $nomLength = mb_strlen($nom);
        if ($prenomLength <= 255 && $nomLength <= 255) {

            if ($email === $email2) {

                
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $verifMail = $pdo->prepare('SELECT email from utilisateurs where email = ?');
                    $verifMail->execute(array($email));
                    $existMail = $verifMail->rowCount();
                    
                    
                    if ($existMail == 0) {

                        // ANCHOR Hash password 
                        if ($pass === $pass2) {
                            $hash = password_hash($pass, PASSWORD_DEFAULT);
                            if (password_verify($pass, $hash)) {
                                $insertUser = $pdo->prepare('INSERT INTO utilisateurs (nom, prenom, email, password) VALUES (?,?,?,?)');
                                $insertUser->execute(array($nom, $prenom, $email, $hash));
                                Database::disconnect();
                                header("Location: index.php");
                            }
                        } else {
                            $err = " Mot de passe incorrect";
                        }
                    } else {
                        $err = 'Mail déjà existant';
                    }
                } else {
                    $err = 'Mail incorrect';
                }
            } else {
                $err = ' Mail non correspondant';
            }
        } else {
            $err = 'Trop des caracteres';
        }
    } else {
        $err = 'Remplissez tout les champs';
    }
}
