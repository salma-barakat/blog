<?php
session_start();
if (empty($_SESSION["logged"])) {
    header("location:unauthenticated.php");
}
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
        if ($article["image"] != null) {
        ?>
            <img src="<?= $article["image"] ?>" alt="No Image">
        <?php
        }
        ?>
        <div class="card-body">
            <p class="card-title">
                <b>
                    <h4><?= $article["title"] ?></h4>
                </b>
                <?php
                $userPosted = $user->getUserPosted($article["id"]); ?>
                <?= "Posted By: ", $userPosted["Fname"], " ", $userPosted["Lname"] ?>
            </p>
            <p class="card-text"><?= $article["content"] ?></p>
            <div class="d-flex justify-content-between align-items-center">
                <?php
                if ($user->id == $article["user_id"]) {
                ?>
                    <div class="btn-group">
                        <a href="home.php" class="btn btn-outline-success">Back to home</a>
                        <a href="editArticle.php?id=<?= $article["id"] ?> " class="btn btn-outline-primary">Edit Article</a>
                        <a href="manageDeleteArticle.php?id=<?= $article["id"] ?> " class="btn btn-outline-danger">Delete Article</a>
                    </div>
                <?php
                } else {
                ?>
                    <div class="btn-group">
                        <a href="home.php" class="btn btn-outline-success">Back to home</a>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="text-end">
                <small class="text-body-secondary"> Posted at: <?= $article["postedAt"] ?></small>
                <?php
                if ($article["postedAt"] != $article["updatedAt"]) {
                ?>
                    <br>
                    <small class="text-body-secondary"> Updated at: <?= $article["updatedAt"] ?></small>
                <?php
                }
                ?>
            </div>
            <hr>
            <hr>
            <div>
                <p class="card-title">
                    <b>Comments:</b>
                </p>

                <?php
                $comments = $user->viewComments($article["id"]);
                foreach ($comments as $comment) {
                    $userCommented = $user->getUserCommented($comment[3]);
                ?>
                    <p class="card-text">
                        <?= $userPosted["Fname"], " ", $userPosted["Lname"], ": " ?>
                        <?= $comment[2] ?>
                        <?php
                        if ($comment[3] == $user->id) {
                        ?>
                            <a href="manageDeleteComment.php?id=<?= $comment[0] ?>&post=<?= $comment[1] ?>" class="btn btn-outline-danger btn-sm">Delete Comment</a>
                    </p>
                <?php
                        }
                ?>
                <div class="text-end">
                    <small class="text-body-secondary"> Commented at: <?= $comment[4] ?></small>
                </div>
                <hr>
            <?php

                }
            ?>

            <!-- adding comments: -->
            <p class="card-text">
            <form action="manageAddComment.php?article=<?= $article["id"] ?>" method="post">
                <div class="mb-3">
                    <input type="text" name="commentContent" id="" class="form-control" placeholder="Add a comment" aria-describedby="helpId">
                </div>
                <button type="submit" class="btn btn-primary">Send Comment</button>
            </form>
            </p>
            </div>
        </div>
    </div>
</div>
</p>