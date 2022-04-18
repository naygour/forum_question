<?php

require('actions/database.php');

//Récupère toutes les informatiosn des questions
$getAllQuestions = $bdd->query("SELECT * FROM questions ORDER BY id DESC LIMIT 0,5");

//Vérifie si la recherche est en cours 
if(isset($_GET['search']) && !empty($_GET['search'])){

    $usersSearch = $_GET['search'];

    //Récupèrer toutes les questions qui corrrespondent à la recherche par rapport au titre
    $getAllQuestions = $bdd->query('SELECT * FROM questions WHERE title LIKE "%'.$usersSearch.'%" ORDER BY id DESC');


}else{

    $errorMsg = "Aucun résultat trouvé..";

}