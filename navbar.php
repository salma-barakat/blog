<!DOCTYPE html>
<?php
require_once('headerStyles.php');
?>
<html lang="en">
<header data-bs-theme="dark">
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <?php
      if (!empty($_SESSION["admin"])) {
      ?>
        <a href="adminHome.php" class="navbar-brand d-flex align-items-center">
        <?php
      } else {
        ?>
          <a href="home.php" class="navbar-brand d-flex align-items-center">
          <?php
        }
          ?>
          <strong>
            <h2>The Blog</h2>
          </strong>
          <a href="profile.php" class="text-white">
            <h3>View Profile</h3>
          </a>
          <?php
          if (!empty($_SESSION["admin"])) {
          ?>
            <a href="addAdmin.php" class="text-white">
              <h3>Add Admin</h3>
            </a>
            <a href="showUsers.php" class="text-white">
              <h3>Users</h3>
            </a>
          <?php
          }
          ?>
          <a href="manageLogOut.php" class="text-white">
            <h4>Log Out</h4>
          </a>
          </a>
    </div>
  </div>
</header>

<body>
  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>