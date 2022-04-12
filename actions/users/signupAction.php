<?php
session_start();
require('actions/database.php');

// Validation du formulaire
if(isset($_POST['validate'])){

    //Vérification des champs remplis
    if(!empty($_POST['pseudo']) && !empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['password'])){

        //Données de l'utilisteur
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //Check si l'utilisateur existe
        $checkIfUserExist = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIfUserExist->execute(array($user_pseudo));

        if($checkIfUserExist->rowCount() == 0){

            //Insére l'utilisteur dans la base de données
            $insertUser = $bdd->prepare('INSERT INTO users(pseudo, lastname, firstname, password) VALUES(?, ?, ?, ?)');
            $insertUser->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));

            //Récupére les infos de l'utilisateur
            $getInfoOfThisUser = $bdd->prepare('SELECT id, pseudo, lastname, firstname from users WHERE lastname = ? AND firstname = ? AND pseudo = ?');
            $getInfoOfThisUser->execute(array( $user_lastname, $user_firstname, $user_pseudo));

            $userInfos = $getInfoOfThisUser->fetch();

            //Authentifie l'utilisateur sur le site avec des variables global SESSION
            $_SESSION['auth']= true;
            $_SESSION['id'] = $userInfos['id'];
            $_SESSION['lastname'] = $userInfos['lastname'];
            $_SESSION['firstname'] = $userInfos['firstname'];
            $_SESSION['pseudo'] = $userInfos['pseudo'];

            //Redirection sur la page d'acceuil
            header('Location: index.php');

        }else{

            $errorMsg = "L'utilisateur existe déjà...";
    
        }

    }else{
        $errorMsg = "Veuillez remplir tous les champs !";
    }
}