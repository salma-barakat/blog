<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.112.5">
    <title>Sign Up</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">


<link href="bootstrap.min.css" rel="stylesheet">
   
    <!-- Custom styles for this template -->
    <link href="sign-in.css" rel="stylesheet">
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
   
<main class="form-signin w-100 m-auto">
  <form action="manageSignUp.php" method="post">
    <h1 class="h3 mb-3 fw-normal">Sign Up</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="name", name = username>
      <label for="floatingInput">Name</label>
    </div>
    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com", name = email>
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" placeholder="Password", name = pass>
      <label>Password</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" placeholder="Confirm Password", name = cpass>
      <label>Confirm Password</label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Sign Up</button>
  </form>
</main>
<script src="bootstrap.bundle.min.js"></script>

    </body>
</html>
