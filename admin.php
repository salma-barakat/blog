<?php
require_once('User.php');
class Admin extends User{
    public function __construct($id, $Fname, $Lname, $email, $password){
        $this->id = $id;
        $this->Fname = $Fname;
        $this->Lname = $Lname;
        $this->email = $email;
        $this->password = $password;
        $this->role = 'admin';
    }

    static function logIn($email, $password){
        require_once('configurations.php');
        $user = null;
        $qryEmailExists = "SELECT * FROM users WHERE email = '$email' AND role='admin'";
        $connection = mysqli_connect(DB_USER_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $resEmailExists = mysqli_query($connection, $qryEmailExists);
        if(mysqli_num_rows($resEmailExists)>0){
            $data = mysqli_fetch_assoc($resEmailExists);
            if($data["password"] == $password){
                $user = new Admin($data["id"], $data["Fname"], $data["Lname"], $data["email"], $data["password"], $data["registeredAt"]);
            }
            else{
                header("location:adminLogIn.php?msg=wrongPass");
            }
        }
        else{
            header("location:adminLogIn.php?msg=NoEmailExist");
        }
        mysqli_close($connection);
        return $user;
    }

    function addArticle($title, $content, $image, $user_id)
    {
        return parent::addArticle($title, $content, $image, $user_id);
    }

    function updateTitle($postID, $updatedTitle)
    {
        return parent::updateTitle($postID, $updatedTitle);
    }

    function updateContent($postID, $updatedContent)
    {
        return parent::updateContent($postID, $updatedContent);
    }

    function showArticle($postID)
    {
        return parent::showArticle($postID);
    }

    function showAllArticles()
    {
        return parent::showAllArticles();
    }

    function showArticlesByUser($userId)
    {
        return parent::showArticlesByUser($userId);
    }

    function getUserPosted($articleId)
    {
        return parent::getUserPosted($articleId);
    }

    function addComment($articleId, $content, $userCommented_id)
    {
        return parent::addComment($articleId, $content, $userCommented_id);
    }

    function viewComments($postID)
    {
        return parent::viewComments($postID);

    }

    function getUserCommented($user_id)
    {
        return parent::getUserCommented($user_id);
    }

    function deleteArticle($postID)
    {
        return parent::deleteArticle($postID);
    }

    function deleteComment($commentID, $postID)
    {
        return parent::deleteComment($commentID, $postID);
    }

    function showAllUsers(){
        require_once('configurations.php');
        $qry = "SELECT * FROM users WHERE role='user' ORDER BY registeredTime DESC";
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