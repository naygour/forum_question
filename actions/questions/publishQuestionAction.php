<?php

require("actions/database.php");

if(isset($_POST['validate'])){

    if(!empty($_POST['title']) && !empty($_POST['subject']) && !empty($_POST['content'])){

        $question_title = htmlspecialchars($_POST['title']);
        $question_subject = nl2br(htmlspecialchars($_POST['subject']));
        $question_content = nl2br(htmlspecialchars($_POST['content']));
        $question_date = date('Y-m-d');
        $question_id_author = $_SESSION['id'];
        $question_pseudo_author = $_SESSION['pseudo'];

        $insertQuestionOnWebsite = $bdd->prepare('INSERT INTO questions(title, subject, content, id_author, pseudo_author, date_publish) VALUES (?, ?, ?, ?, ?, ?)');
        $insertQuestionOnWebsite->execute(array(
            $question_title,
            $question_subject,
            $question_content,
            $question_id_author,
            $question_pseudo_author,
            $question_date
        ));

        $successMsg = "Votre question a bien été publié sur le forum.";
    
    }else{
 
        $errorMsg = 'Veuillez complèter tous les champs.';

    }
}