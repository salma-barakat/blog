<?php
session_start();
require_once('admin.php');
require_once('headerStyles.php');
require_once('navBar.php');
?>
<link rel="stylesheet" href="navigatingArticlesStyle.css">
<?php
if(empty($_SESSION["admin"])){
  header("location:unauthenticated.php");
}
$admin = unserialize($_SESSION["admin"]);
$users = $admin->showAllUsers();
?>
<body>   
<main>
  <section class="py-5 text-center container">
    <?php
      if(!empty($_GET["msgUser"]) && $_GET["msgUser"] == "deleted"){
    ?>
    <div class="alert alert-success" role="alert">
      <strong>User is deleted successfully</strong>
    </div>
    <?php
      }
    ?>
  </section>

  <h2 style="text-align: center;"> <b>Users:</b> </h2>
  <div class="album py-5 bg-body-tertiary">
  <table class="table table-bordered border-secondary">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Registered At</th>
      <th scope="col">Number Of Articles Posted</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach ($users as $user) {

    ?>
    <tr>
      <th scope="row"><?=$user[0]?></th>
      <td ><?=$user[1]?></td>
      <td><?=$user[2]?></td>
      <td><?=$user[3]?></td>
      <td><?=$user[5]?></td>
      <td><?=($admin->nArticles($user[0]))["COUNT(user_id)"]?></td>
      <td>
        <a href="deleteUser.php?id=<?= $user[0]?>" class="btn btn-outline-danger">Delete User</a>
      </td>
    </tr>
    <?php
        }
    ?>
  </tbody>
</table>
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
