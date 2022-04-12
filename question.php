<?php 
session_start();
require('actions/questions/showQuestionContentAction.php');
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
                <h3><?= $question_title; ?></h3>
                <hr>
                <p><?= $question_content; ?></p>
                <hr>
                <small><?= $question_pseudo_author.' '.$question_date; ?></small>
                <?php
            }
        ?>
    </div>
    
</body>
</html>