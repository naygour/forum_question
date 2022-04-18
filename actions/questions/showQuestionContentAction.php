<?php
require('actions/database.php');

//Vérifie si l'ID de la question est rentrée dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){

    //Vérifie si la question existe
    $idOfQuestion = $_GET['id'];
    $checkIfQuestionExist = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExist->execute([
        $idOfQuestion
    ]);

    if($checkIfQuestionExist->rowCount() > 0){

        //Récupère toutes les infos de la questions
        $questionsInfos = $checkIfQuestionExist->fetch();
        
        //Stocke les infos de la question 
        $question_title = $questionsInfos['title'];
        $question_subject = $questionsInfos['subject'];
        $question_content = $questionsInfos['content'];
        $question_id_author = $questionsInfos['id_author'];
        $question_pseudo_author = $questionsInfos['pseudo_author'];
        $question_date = $questionsInfos['date_publish'];

    }else{

         $errorMsg = "Aucune question n'a été trouvé";

    }
}else{

    $errorMsg = "Aucune question n'a été trouvé";

}