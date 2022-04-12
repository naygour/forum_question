<?php

session_start();
if(!isset($_SESSION['auth'])){

    header('Location: ../../login.php');

}

require('../database.php');

//Vérifie si l'ID existe et s'il n'est pas vide
if(isset($_GET['id']) && !empty($_GET['id'])){

    $idOfQuestion = $_GET['id'];

    //Récupère l'id de l'auteur
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute([
        $idOfQuestion
    ]);

    //Vérifie si la requête renvoie des questions
    if($checkIfQuestionExists->rowCount() > 0){

        //Vérifie si l'utilisateur est l'auteur de la question
        $questionsInfos = $checkIfQuestionExists->fetch();
        if($questionsInfos['id_author'] == $_SESSION['id']){

            //Supprimer la question 
            $deleteQuestion = $bdd->prepare("DELETE FROM questions WHERE id = ?");
            $deleteQuestion->execute([
                $idOfQuestion
            ]);

            //Redirige vers la page myQuestions.php
            header("Location: ../../myQuestions.php");

        }else{

            $errorMsg = "Vous n'avez pas le droit de supprimer cette qustion !";

        }

    }else{

        $errorMsg = "Aucune question n'a été trouvé ..";

    }

}else{

    $errorMsg = "Aucune question n'a été trouvé ..";

}