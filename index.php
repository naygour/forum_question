<?php 
    session_start();
    require("actions/questions/showQuestionAction.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php 
    require("includes/header.php");
    require("includes/navbar.php");
?>
<body>
    <br />
    <div class="container">
         
    <form method="GET">
        <div class="form-group row">
            <div class="col-8">
                <input type="search" name="search" id="" class="form-control" placeholder="Rechercher un sujet de question...">
            </div>
            <div class="col-4">
                <button class="btn btn-success">Rechercher</button>
            </div>
        </div>
    </form>

    <br />

    <?php
        while($question = $getAllQuestions->fetch()){
            ?>
            <div class="card">
                <div class="card-header">
                    <a href="question.php?id=<?= $question['id'];?>"><?= $question['title']?></a>
                </div>
                <div class="card-body">
                    <?= $question['content']?>
                </div>
                <div class="card-footer">
                    Publié par <a href="profile.php?id=<?= $question['id_author']?>"><?= $question['pseudo_author']?></a> le <?= $question['date_publish']?>
                </div>
            </div>
            <br>
            <?php
        }
    ?>

    </div>

</body>
</html>