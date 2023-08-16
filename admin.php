<?php
require_once('User.php');
class Admin extends User{
    public function __construct($id, $Fname, $Lname, $email, $password){
        $this->id = $id;
        $this->Fname = $Fname;
        $this->Lname = $Lname;
        $this->email = $email;
        $this->password = $password;
    }

    static function logIn($email, $password){
        require_once('configurations.php');
        $admin = null;
        $qryEmailExists = "SELECT * FROM admins WHERE email = '$email'";
        $connection = mysqli_connect(DB_USER_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $resEmailExists = mysqli_query($connection, $qryEmailExists);
        if(mysqli_num_rows($resEmailExists)>0){
            $data = mysqli_fetch_assoc($resEmailExists);
            if($data["password"] == $password){
                $admin = new Admin($data["id"], $data["Fname"], $data["Lname"], $data["email"], $data["password"]);
            }
            else{
                header("location:adminLogIn.php?msg=wrongPass");
            }
        }
        else{
            header("location:adminLogIn.php?msg=NoEmailExist");
        }
        mysqli_close($connection);
        return $admin;
    }

    function showAllArticles()
    {
        return parent::showAllArticles();
    }

    function showAllUsers(){
        require_once('configurations.php');
        $qry = "SELECT * FROM users ORDER BY registeredTime DESC";
        $connection = mysqli_connect(DB_USER_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $res = mysqli_query($connection, $qry);
        $data = mysqli_fetch_all($res);
        mysqli_close($connection);
        return $data;
    }

    function nArticles($userID){
        require_once('configurations.php');
        $qry = "SELECT COUNT(user_id) FROM articles WHERE user_id=$userID"; 
        $connection = mysqli_connect(DB_USER_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $res = mysqli_query($connection, $qry);
        $data = mysqli_fetch_assoc($res);
        mysqli_close($connection);
        return $data;
    }

    function deleteUser($userID){
        require_once('configurations.php');
        $qry = "DELETE FROM users WHERE id = $userID";
        $connection = mysqli_connect(DB_USER_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $res = mysqli_query($connection, $qry);
        mysqli_close($connection);
        header("location:showUsers.php?msgUser=deleted");
    }
}