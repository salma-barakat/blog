<?php
session_start();
if (empty($_SESSION["logged"])) {
    header("location:unauthenticated.php");
}
require_once('navbar.php');
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