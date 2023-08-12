<?php
session_start();
if(empty($_SESSION["logged"])){
    header("location:unauthenticated.php");
}
require_once('navbar.php');
require_once('User.php');
require_once('navigatingArticlesStyle.php');
$user = unserialize($_SESSION["logged"]);
$articles = $user->showArticlesByUser($user->id);
?>

<div class="container">
    <div class="row">
        <div>
        <?php
            if(!empty($_GET["msg"]) && $_GET["msg"] == "changed"){
            ?>
            <div class="alert alert-success" role="alert">
            <strong>Password changed successfully</strong>
            </div>
            <?php
            }
            ?>
        <div class="btn-group">
            <a href="changePassword.php" class="btn btn-secondary">Change Password</a>
        </div>
    </div>
</div>

<div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row">
        <?php
          foreach ($articles as $article) {
            ?>
            <p>
            <div class="col-8 offset-2">
              <div class="card shadow-sm">
                <?php
                  if($article[3] != null){
                ?>
                  <img src="<?= $article[3]?>" alt="No Image">
                  <?php
                  }
                  ?>
                <div class="card-body">
                  <p class="card-title">
                    <b>
                      <h4><?= $article[1]?></h4>
                    </b>
                    <?php 
                    $userPosted = $user->getUserPosted($article[0]);?>
                    <?= "Posted By: ", $userPosted["Fname"], " ", $userPosted["Lname"]?>
                  </p>
                  <?php
                    $words = explode(" ", $article[2]); // Split the content into an array of words
                    $firstFewWords = implode(" ", array_slice($words, 0, 50));
                    if(sizeof($words) > 50){
                      $firstFewWords = $firstFewWords. "...";
                    ?>
                      <p class="card-text"><?= $firstFewWords?> <a href="viewArticle.php?id=<?= $article[0] ?>">see more</a></p>
                    <?php
                    }
                    else{
                    ?>
                      <p class="card-text"><?= $firstFewWords?></p>
                    <?php
                      }
                    ?>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="viewArticle.php?id=<?= $article[0]?> " class="btn btn-outline-secondary">View Article</a>
                    <?php
                        if($user->id == $article[6]){
                    ?>
                        <a href="editArticle.php?id=<?= $article[0]?> " class="btn btn-outline-primary">Edit Article</a>
                        <a href="manageDeleteArticle.php?id=<?= $article[0]?> " class="btn btn-outline-danger">Delete Article</a>
                        <?php
                        }
                        ?>
                      </div>
                    <small class="text-body-secondary"><?= $article[5]?></small>
                  </div>
                </div>
              </div>
            </div>
            </p>
          <?php
          }
        ?>

      </div>
    </div>
  </div>
  <footer class="text-body-secondary py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
  </div>
</footer>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
