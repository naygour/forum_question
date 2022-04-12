<?php 
session_start();
require('actions/database.php');

// Validation du formulaire
if(isset($_POST['validate'])){

    //Vérification des champs remplis
    if(!empty($_POST['pseudo']) && !empty($_POST['password'])){

        //Données de l'utilisteur
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password']);

        $checkIfUserExist = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? ');
        $checkIfUserExist->execute(array($user_pseudo));

        if($checkIfUserExist->rowCount() > 0){
            
            $usersInfos = $checkIfUserExist->fetch();
            //Vérifie si le mot de passe est correct
            if(password_verify($user_password, $usersInfos['password'])){

            //Authentifie l'utilisateur sur le site avec des variables global SESSION
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['lastname'] = $usersInfos['nom'];
            $_SESSION['firstname'] = $usersInfos['prenom'];
            $_SESSION['pseudo'] = $usersInfos['pseudo'];

            header('Location: index.php');

            }else{
                $errorMsg = "Votre mot de passe est incorrect.";
            }
        }else{
            $errorMsg = "Votre pseudo est incorrect.";
        }

    }else{
        $errorMsg = "Veuillez remplir tous les champs !";
    }
}