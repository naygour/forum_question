<?php 
session_start();
require('actions/questions/showQuestionContentAction.php');
require('actions/questions/publishAnswersAction.php');
require('actions/questions/showAllAnswersOfQuestionAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php 
    require('includes/header.php');
    require('includes/navbar.php');
?>
<body>
    <br><br>

    <div class="container">
        <?php  
            if(isset($errorMsg)){
                echo '<p>'.$errorMsg.'</p>';
            }
            if(isset($question_date)){
                ?>
                <section class="show-content">
                    <h3><?= $question_title; ?></h3>
                    <hr>
                    <p><?= $question_content; ?></p>
                    <hr>
                    <small><?= '<a href="profile.php?id='.$question_id_author.'">'.$question_pseudo_author.'</a> '.$question_date; ?></small>
                </section>
                <br>
                <section class="show-answers">

                    <form class="form-group" method="POST">
                        <div class="mb-3">
                            <label for="">Votre réponse :</label>
                            <textarea name="answer" class="form-control"></textarea>
                            <br>
                            <button class="btn btn-success" type="submit" name="validate">Répondre</button>
                        </div>
                    </form>

                    <?php
                    while ($AllAnswers = $getAllAnswersOfThisQuestion->fetch()){
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <a href="profile.php?id=<?= $AllAnswers['id_author'];?>"><?= $AllAnswers['pseudo_author']; ?></a>
                            </div>   
                            <div class="card-body">
                                <?= $AllAnswers['content']; ?>
                            </div>                     
                        </div>
                        <br>
                        <?php
                    }
                    ?>

                </section>
                
                <?php
            }
        ?>

    </div>
    
</body>
</html>