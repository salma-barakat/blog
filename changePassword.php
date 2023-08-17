<?php
session_start();
if (empty($_SESSION["logged"]) && empty($_SESSION["admin"])) {
    header("location:unauthenticated.php");
}
require_once('navbar.php');
      if (!empty($_GET["msg"]) && $_GET["msg"] == "changed") {
      ?>
        <div class="alert alert-success" role="alert">
          <strong>Password changed successfully</strong>
        </div>
      <?php
      }
      if (!empty($_GET["msg"]) && $_GET["msg"] == "wrongPass") {
      ?>
        <div class="alert alert-danger" role="alert">
          <strong>Wrong Password</strong>
        </div>
      <?php
      }
      ?>
?>
<body>
<main class="form-signin w-100 m-auto">
  <form action="manageChangePass.php" method="post">
    <section class="py-5 text-center container">
        <div class="container">
            <div class="form-floating">
                <div class="row">
                    <div class="col">
                        <input type="password" class="form-control" id="floatingPassword" name="oldPassword" placeholder="Current Password">
                        <input type="password" class="form-control" id="floatingPassword" name="newPassword" placeholder="New Password">
                        <input type="password" class="form-control" id="floatingPassword" name="newPassword" placeholder="Confirm New Password">
                    </div>
                    <button class="btn btn-primary w-10 py-2" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    </main>
</body>