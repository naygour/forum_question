<?php 
    session_start(); 
    require('actions/users/showUserProfileAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php 
    require('includes/header.php');
    require('includes/navbar.php');
?>
<body>
    <br>
    <div class="container">
    <?php  
    
    if(isset($errorMsg)){echo '<p>'.$errorMsg.'</p>';}
    
    if(isset($getQuestions)){
        ?>
        <div class="card">
            <div class="card-body">
                <h4>
                    <?= $user_pseudo;?>
                </h4>
                <hr>
                <p><?= $user_lastname.' '.$user_firstname;?></p>
            </div>
        </div>
        <br>
        <?php
        while($question = $getQuestions->fetch()){
            ?>
            <div class="card">
                <div class="card-header">
                    <?= $question['title'];?>
                </div>
                <div class="card-body">
                    <?= $question['content'];?>
                </div>
                <div class="card-footer">
                    <?= $question['pseudo_author'].'-'.$question['date_publish'];?>
                </div>
            </div>
            <br>

            <?php
        }
    }
    
    ?>
    </div>
    

</body>
</html>