<?php

require('actions/database.php');


if(isset($_POST['validate'])){

    if(!empty($_POST['answer'])){

        $user_answer = nl2br(htmlspecialchars($_POST['answer']));

        $insertAnswer = $bdd->prepare('INSERT INTO answers(id_author, pseudo_author, id_question, content) VALUES(?,?,?,?)');
        $insertAnswer->execute([
            $_SESSION['id'],
            $_SESSION['pseudo'],
            $idOfQuestion,
            $user_answer
        ]);
        

    }
}