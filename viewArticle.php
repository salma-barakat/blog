<?php
session_start();
require_once('navbar.php');
require_once('User.php');
$postID = $_GET["id"];
$user = unserialize($_SESSION["logged"]);
$article = $user->showArticle($postID);
?>
<p>
<div class="col-8 offset-2">
    <div class="card shadow-sm">
    <?php
        if($article["image"] != null){
    ?>
        <img src="<?= $article["image"]?>" alt="No Image">
        <?php
        }
        ?>
    <div class="card-body">
        <p class="card-title">
        <b>
            <h4><?= $article["title"]?></h4>
        </b>
        <?php 
        $userPosted = $user->getUserPosted($article["id"]);?>
        <?= "Posted By: ", $userPosted["Fname"], " ", $userPosted["Lname"]?>
        </p>
        <p class="card-text"><?=  $article["content"]?></p>
        <div class="d-flex justify-content-between align-items-center">
            <?php
                if($user->id == $article["user_id"]){
            ?>
            <div class="btn-group">
                <a href="home.php" class="btn btn-outline-success">Back to home</a>
                <a href="editArticle.php?id=<?= $article["id"]?> " class="btn btn-outline-primary">Edit Article</a>
                <a href="manageDeleteArticle.php?id=<?= $article["id"]?> " class="btn btn-outline-danger">Delete Article</a>
            </div>
            <?php
                }
            ?>
            <small class="text-body-secondary"><?= $article["postedAt"]?></small>
        </div>
</div>
    </div>
</div>
</p>
