<?php
session_start();
require_once('headerStyles.php');
require_once('User.php');
if(empty($_SESSION["logged"])){
  header("location:unauthenticated.php");
}
$user = unserialize($_SESSION["logged"]);
$posts = $user->showAllPosts();
// var_dump($posts);
?>
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }
      .bd-mode-toggle {
        z-index: 1500;
      }
    </style>

    
  </head>
  <body>   
<header data-bs-theme="dark">
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <strong><h2>The Blog</h2></strong>
        <a href="profile.php" class="text-white"><h3>View Profile</h3></a>
        <a href="manageLogOut.php" class="text-white"><h4>Log Out</h4></a>
      </a>
    </div>
  </div>
</header>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Want to add a new article?</h1>
        <form action="manageAddArticle.php" method="POST">
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
          <!-- <button class="btn btn-primary py-2" type="submit">Add Article</button> -->
          <input type="submit" class="btn btn-primary" value="submit">
        </form>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row">
        <?php
          foreach ($posts as $article) {
            // var_dump($article);
          ?>
            <div class="col-8 offset-2">
              <div class="card shadow-sm">
                <img src="<?= $article[3]?>" alt="no">
                <div class="card-body">
                  <p class="card-text"><?= $article[2]?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-body-secondary">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
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
