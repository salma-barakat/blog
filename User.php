<?php
class User{
    public $id;
    public $Fname;
    public $Lname;
    public $email;
    protected $password;
    public $registeredAt;

    public function __construct($id, $Fname, $Lname, $email, $password, $registeredAt){
        $this->id = $id;
        $this->Fname = $Fname;
        $this->Lname = $Lname;
        $this->email = $email;
        $this->password = $password;
        $this->registeredAt = $registeredAt;
    }

    function getPass(){
        return $this->password;
    }

    function changePass($oldPass, $newPass){
        if($oldPass == $this->password){
            $this->password = $newPass;
        }
    }

    static function logIn($email, $password){
        require_once('configurations.php');
        $user = null;
        $qryEmailExists = "SELECT * FROM users WHERE email = '$email'";
        $connection = mysqli_connect(DB_USER_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $resEmailExists = mysqli_query($connection, $qryEmailExists);
        if(mysqli_num_rows($resEmailExists)>0){
            $data = mysqli_fetch_assoc($resEmailExists);
            if($data["password"] == $password){
                $user = new User($data["id"], $data["Fname"], $data["Lname"], $data["email"], $data["password"], $data["registeredAt"]);
                // $_SESSION["logged"] = serialize($user);
                // header("location:home.php");
            }
            else{
                header("location:userLogIn.php?msg=wrongPass");
            }
        }
        else{
            header("location:userLogIn.php?msg=NoEmailExist");
        }
        mysqli_close($connection);
        return $user;
    }
    
    static function signUp($email, $Fname, $Lname, $password){
        require_once('configurations.php');
        $connection = mysqli_connect(DB_USER_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $qryEmailExists = "SELECT * FROM users WHERE email = '$email'";
        $resEmailExists = mysqli_query($connection, $qryEmailExists);
        if(mysqli_num_rows($resEmailExists)>0){
            header("location:signUp.php?msg=emailExists");
        }
        else{
            $query = "INSERT INTO users (Fname, Lname, email, password, registeredTime) VALUES('$Fname', '$Lname', '$email', '$password', now())";
            $result = mysqli_query($connection, $query); 
            header("location:userLogIn.php?msg=registered");
        }
        mysqli_close($connection);
    }

    function addArticle($title, $content, $image, $user_id){
        require_once('configurations.php');
        $connection = mysqli_connect(DB_USER_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $query = "INSERT INTO articles (title, content, image, postedAt, updatedAt, user_id) VALUES('$title', '$content', '$image', now(), now(), $user_id)";
        $result = mysqli_query($connection, $query); 
        header("location:home.php?msg=added");
        mysqli_close($connection);
        return $result;
    }

    function updatePost(){
        
    }

    function deletePost(){

    }

    function showPostsByUser($userId){
        require_once('configurations.php');
        $qryEmailExists = "SELECT * FROM articles WHERE user_id = $userId ORDER BY postedAt DESC LIMIT 9";
        $connection = mysqli_connect(DB_USER_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $res = mysqli_query($connection, $qryEmailExists);
        mysqli_close($connection);
    }

    function showAllPosts(){
        require_once('configurations.php');
        $qry = "SELECT * FROM articles ORDER BY postedAt DESC LIMIT 9";
        $connection = mysqli_connect(DB_USER_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $res = mysqli_query($connection, $qry);
        $data = mysqli_fetch_all($res);
        mysqli_close($connection);
        return $data;
    }

    function getUserPosted($articleId){
        require_once('configurations.php');
        $qry = "SELECT Fname, Lname FROM users JOIN articles 
        WHERE users.id = articles.user_id AND articles.id = $articleId";
        $connection = mysqli_connect(DB_USER_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $res = mysqli_query($connection, $qry);
        $data = mysqli_fetch_assoc($res);
        mysqli_close($connection);
        return $data;
    }
}