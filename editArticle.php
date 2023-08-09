<?php
session_start();
if(empty($_SESSION["logged"])){
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
                    <h4>
                        <div id="editableContent" contenteditable="true">
                            <?= $article["title"] ?>
                        </div>
                        <button class="btn btn-outline-primary" onclick="saveTitle()">Save Article Title</button>
                    </h4>
                </b>
                <script>
                    function saveTitle() {
                        var editedContent = document.getElementById("editableContent").innerHTML;
                        // console.log(editedContent); //Logging the edited content to the browser console
                        // Redirect the user to manageEditArticle.php with the editedContent as a query parameter
                        window.location.href = "manageEditArticle.php?id=<?=$article["id"]?>&title=" + editedContent;
                    }
                </script>
            <?php
            $userPosted = $user->getUserPosted($article["id"]); ?>
            <?= "Posted By: ", $userPosted["Fname"], " ", $userPosted["Lname"] ?>
        </p>

        <p class="card-text">
            <div id="editableContent" contenteditable="true">
                <?= $article["content"] ?>
            </div>
            <button class="btn btn-outline-primary" onclick="saveContent()">Save Article Content</button>
            <script>
                function saveTitle() {
                    var editedContent = document.getElementById("editableContent").innerHTML;
                    // console.log(editedContent); //Logging the edited content to the browser console
                    // Redirect the user to manageEditArticle.php with the editedContent as a query parameter
                    window.location.href = "manageEditArticle.php?id=<?=$article["id"]?>&content=" + editedContent;
                }
            </script>
    </p>
        <div class="d-flex justify-content-between align-items-center">
            <?php
                if ($user->id == $article["user_id"]) {
                    ?>
                    <div class="btn-group">
                        <a href="home.php" class="btn btn-outline-success">Back to home</a>
                        <a href="manageDeleteArticle.php?id=<?= $article["id"] ?> " class="btn btn-outline-danger">Delete Article</a>
                    </div>
                    <?php
                }
                ?>
                <small class="text-body-secondary"><?= $article["postedAt"] ?></small>
            </div>
        </div>
    </div>
    </div>
</div>
</p>