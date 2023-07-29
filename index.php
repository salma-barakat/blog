<?php
require_once("cssStyles.php");
?>
<body class="d-flex align-items-center py-4 bg-body-tertiary"> 
<main class="form-signin w-100 m-auto">
  <form action="manageLogIn.php" method="post">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    <div class="form-floating">
      <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    <p>doesn't have an account? <a href="signUp.php"> Sign Up</a></p>
  </form>
</main>
<?php
require_once("jsStyles.php");
