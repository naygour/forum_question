<?php

require('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //Vérifie si les champs sont vides
    if(!empty($_POST['title']) && !empty($_POST['subject']) && !empty($_POST['content'])){

    //Récupère les champs à modifier
    $new_question_title = htmlspecialchars($_POST['title']);
    $new_question_subject = nl2br(htmlspecialchars($_POST['subject']));
    $new_question_content = nl2br(htmlspecialchars($_POST['content']));
    $new_question_date = date('Y-m-d');

    //Mise à jour de la base de données
    $editQuestion = $bdd->prepare('UPDATE questions SET title = ?, subject = ?, content = ?, date_publish = ? WHERE id = ?');
    $editQuestion->execute([
        $new_question_title,
        $new_question_subject,
        $new_question_content,
        $new_question_date,
        $_GET['id']
    ]);

    //Redirection vers la page myQuestion.php
    header('Location: myQuestions.php');

    }else{

        $errorMsg = 'Veuillez complèter tout les champs !';

    }
}
