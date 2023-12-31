<!doctype html>
<html lang="en" data-bs-theme="auto">
<?php
require_once('headerStyles.php');
?>

<body class="d-flex align-items-center py-4 bg-body-tertiary">

  <main class="form-signin w-100 m-auto">
    <form action="manageLogIn.php" method="post">
      <img class="mb-4" src="imgs\blogging.png" alt="" width="72" height="80">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
      <?php
      if (!empty($_GET["msg"]) && $_GET["msg"] == "emptyField") {
      ?>
        <div class="alert alert-danger" role="alert">
          <strong>Empty Field</strong>
        </div>
      <?php
      }
      if (!empty($_GET["msg"]) && $_GET["msg"] == "NoEmailExist") {
      ?>
        <div class="alert alert-danger" role="alert">
          <strong>This email doesn't exist </strong>
        </div>
      <?php
      }
      if (!empty($_GET["msg"]) && $_GET["msg"] == "wrongPass") {
      ?>
        <div class="alert alert-danger" role="alert">
          <strong>Wrong Password </strong>
        </div>
      <?php
      }
      if (!empty($_GET["msg"]) && $_GET["msg"] == "registered") {
      ?>
        <div class="alert alert-success" role="alert">
          <strong>Registered Successfully </strong>
        </div>
      <?php
      }
      ?>

      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="role" value="user" id="flexRadioDefault1" checked>
        <label class="form-check-label" for="flexRadioDefault1">
          User
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="role" value="admin" id="flexRadioDefault2">
        <label class="form-check-label" for="flexRadioDefault2">
          Admin
        </label>
      </div>
      <p>don't have an account? <a href="signUp.php"> Sign Up</a></p>
      <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    </form>
  </main>
  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>