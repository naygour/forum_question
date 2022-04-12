
<?php
    require('actions/users/securityAction.php');
    require('actions/questions/getInfosOfEditedQuestionAction.php');
    require('actions/questions/editQuestionAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php
    require("includes/header.php");
    require("includes/navbar.php");
?>
<body>
    <br><br>
    <div class="container">
        <?php 
            if(isset($errorMsg)){
                echo '<p>'.$errorMsg.'</p>';
            }     
        ?>
        <?php 
            if(isset($questionDate)){
                ?>
                <form method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Titre</label>
                        <input type="text" class="form-control" name="title" value="<?= $questionTitle?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Sujet de la question</label>
                        <textarea type="text" class="form-control" name="subject"><?= $questionSubject; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Contenu</label>
                        <textarea type="text" class="form-control" name="content"><?= $questionContent; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="validate">Modifier cette question</button>
                    
                </form>
                <?php
            }
        ?>

    </div>

    
     
</body>
</html>