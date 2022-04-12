<?php 
require("actions/database.php");

$getAllMyQuestions = $bdd->prepare("SELECT * FROM questions WHERE id_author = ? ORDER BY id DESC");
$getAllMyQuestions->execute([
    $_SESSION['id']
]);

