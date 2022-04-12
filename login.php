<?php require('actions/users/loginAction.php');?>
<!DOCTYPE html>
<html lang="en">
<?php require('includes/header.php');
      require('includes/navbar.php');
?>  
<body>
    <br><br>
    <form class="container" method="post">

        <?php 
            if(isset($errorMsg)){
                echo '<p>'.$errorMsg.'</p>';
            }        
        ?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pseudo</label>
            <input type="text" class="form-control" name="pseudo">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="validate">Se connecter</button>
        <br><br> 
        <a href="signup.php">Je n'ai pas de compte, je m'inscrit</a>
    </form>
    
</body>
</html>