<?php

require('actions/database.php');

if(isset($_GET['id']) && !empty($_GET['id'])){

    //Récupèrer l'identifiants de l'utilisateur
    $idOfUser = $_GET['id'];

    //Vérifie si l'utilisateur existe
    $checkIfUserExist = $bdd->prepare('SELECT * FROM users WHERE id = ? ');
    $checkIfUserExist->execute([
        $idOfUser
    ]);


    if($checkIfUserExist->rowCount() > 0){

        //Récupère toutes les données de l'utilisateur'
        $userInfo = $checkIfUserExist->fetch();
        $user_pseudo = $userInfo['pseudo'];
        $user_firstname = $userInfo['firstname'];
        $user_lastname = $userInfo['lastname'];

        //Récupère les questions de l'utilisateur
        $getQuestions = $bdd->prepare('SELECT * FROM questions WHERE id_author = ? ORDER BY id DESC');
        $getQuestions->execute([
            $idOfUser
        ]);


    }else{
     
        $errorMsg = "Aucun utilisateur trouvé..";

    }
}else{

    $errorMsg = "Aucun utilisateur trouvé..";

}