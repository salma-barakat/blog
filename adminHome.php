<?php
session_start();
require_once('headerStyles.php');
require_once('navBar.php');
require_once('Admin.php');
require_once('navigatingArticlesStyle.php');
if(empty($_SESSION["admin"])){
  header("location:unauthenticated.php");
}
$admin = unserialize($_SESSION["admin"]);
$posts = $admin->showAllArticles();
?>    
<body>   
<main>

  <section class="py-5 text-center container">
    <?php
      if(!empty($_GET["msg"]) && $_GET["msg"] == "deleted"){
    ?>
    <div class="alert alert-success" role="alert">
      <strong>Article deleted successfully</strong>
    </div>
    <?php
      }
    ?>
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Want to add a new article?</h1>
        <form action="manageAddArticle.php" method="POST" enctype="multipart/form-data">
        <?php
          if(!empty($_GET["msg"]) && $_GET["msg"] == "emptyField"){
        ?>
        <div class="alert alert-warning" role="alert">
          <strong>Empty Field</strong>
        </div>
        <?php
          }
          if(!empty($_GET["msg"]) && $_GET["msg"] == "added"){
        ?>
        <div class="alert alert-success" role="alert">
          <strong>Article is posted successfully</strong>
        </div>
        <?php
          }
        ?>
          <div class="mb-3">
            <input type="text" name="title" id="" class="form-control" placeholder="Article Title" aria-describedby="helpId">
          </div>
          <div class="mb-3">
            <textarea class="form-control" name="articleContent" id="" rows="3" placeholder="Content: share your thoughts"></textarea>
          </div>
          <div class="mb-3">
            <label for="">Insert image if you want</label>
            <input type="file" class="form-control" name="image" id="" placeholder="" aria-describedby="fileHelpId">
          </div>
          <button class="btn btn-primary py-2" type="submit">Add Article</button>
        </form>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row">
        <?php
          foreach ($posts as $article) {
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
                    $userPosted = $admin->getUserPosted($article[0]);?>
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
                      <a href="viewArticle.php?id=<?= $article[0]?>" class="btn btn-outline-success">View Article</a>
                      <a href="viewArticle.php?id=<?= $article[0]?>&userID=<?= $admin->id?> " class="btn btn-outline-secondary">Comment</a>
                    <?php
                        if($admin->id == $article[6]){
                    ?>
                        <a href="editArticle.php?id=<?= $article[0]?> " class="btn btn-outline-primary">Edit Article</a>
                        <a href="manageDeleteArticle.php?id=<?= $article[0]?> " class="btn btn-outline-danger">Delete Article</a>
                        <?php
                        }
                        ?>
                      </div>
                    </div>
                    <div class="text-end">
                    <small class="text-body-secondary"> Posted at: <?= $article[4]?></small>
                    <?php
                      if($article[4] != $article[5]){                        
                        ?>
                        <br>
                          <small class="text-body-secondary"> Updated at: <?= $article[5]?></small>
                    <?php
                      }
                    ?>
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

</main>

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