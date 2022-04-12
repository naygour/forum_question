<?php

require('actions/database.php');

//Validation du formulaire
if(isset($_GET['id']) AND !empty($_GET['id'])){

    //Récupère l'identifiant de la question sélectionné
    $idOfQuestion = $_GET['id'];

    //Sélection la question par rapport à l'id de l'URL
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute([
        $idOfQuestion
    ]);

    //Si la requête nous renvoie plusieurs résultat on récupère les données de la question
    if($checkIfQuestionExists->rowCount() > 0){
        
        $questionInfos = $checkIfQuestionExists->fetch();

        if($questionInfos['id_author'] == $_SESSION['id']){
            
            $questionTitle = $questionInfos['title'];
            $questionSubject = $questionInfos['subject'];
            $questionContent = $questionInfos['content'];
            $questionDate = $questionInfos['date_publish'];
            
            //Remplace la balise '<br>' en espace
            $questionSubject = str_replace('<br />', '', $questionSubject);
            $questionContent = str_replace('<br />', '', $questionContent);

        }else{

            $errorMsg = "Vous n'êtes pas l'auteur de cette question !";

        }

    }else{

        $errorMsg = "Aucune question trouvée ..";
        
    }
}else{
    $errorMsg = "Aucune question trouvée ..";
    
}

