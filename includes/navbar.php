<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Forum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
        <a class="nav-link" href="publishQuestion.php">Publier une question</a>
        <a class="nav-link" href="myQuestions.php">Mes questions</a>

        <?php if(isset($_SESSION['auth'])){
          ?>
          <a class="nav-link" href="actions/users/logoutAction.php">Se Déconnecter</a>
          <?php
        }
        ?>
        </div>
    </div>
  </div>
</nav>