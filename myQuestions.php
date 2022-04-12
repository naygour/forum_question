 <?php 
    require("actions/users/securityAction.php");
    require("actions/questions/myQuestionsAction.php");
?>
 <!DOCTYPE html>
 <html lang="en">
 <?php 
    require("includes/header.php");
    require("includes/navbar.php");
 ?>
 <body>
     <div class="container">

        <?php 
            while($question = $getAllMyQuestions->fetch()){
                ?>
                <br><br>
                <div class="card text-center">
                    <div class="card-header">
                        <?= $question['subject']; ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $question['title']; ?></h5>
                        <p class="card-text"><?= $question['content']; ?></p>
                        <a href="question.php?id=<?= $question['id'];?>" class="btn btn-primary">Accéder à la question</a>
                        <a href="editQuestion.php?id=<?= $question['id']; ?>" class="btn btn-warning">Modifier la question</a>
                        <a href="actions/questions/deleteQuestionAction.php?id=<?= $question['id']; ?>" class="btn btn-danger">Supprimer la question</a>
                    </div>
                    <div class="card-footer text-muted">
                        <?= $question['date_publish']; ?>
                    </div>
                </div>
                <?php
            }
        ?>
        
    </div>

 </body>
 </html>