<?php
class Comments{
    // public $id;
    // public $userPosted_id;
    // public $content;
    // public $userCommented_id;
    // public $commentedAt;
    public $id;
    public $title;
    public $content;
    public $image;
    public $postedAt;
    public $updatedAt;
    public $user_id;
    
    public function __construct($id, $userPosted_id, $content,$userCommented_id, $commentedAt) {
        $this->id = $id;
        $this->userPosted_id = $userPosted_id;
        $this->content = $content;
        $this->userCommented_id = $userCommented_id;
        $this->commentedAt = $commentedAt;
    }

    function addComment($articleId, $userPosted_id, $content,$userCommented_id, $commentedAt){
        require_once('configurations.php');
        $query = "INSERT INTO comments (id, article_id, content, user_commented_id, commented_at) VALUES($id, $userPosted_id, '$content', '$userCommented_id', now())";
        $connection = mysqli_connect(DB_USER_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $res = mysqli_query($connection, $qry);
        mysqli_close($connection);
}
}