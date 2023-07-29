<?php
// var_dump($_GET);
// var_dump($_POST);
// var_dump($_REQUEST);
if(!empty($_POST["email"]) && !empty($_POST["password"])){
    echo "welcome";
}
else{
    header("location:index.php?msg=empty_field");
}

?>