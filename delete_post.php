<?php
include "includes/autoloader.inc.php";
session_start();

if (isset($_POST["post_id"]) && isset($_POST["user_id"]))
{
    if ($_SESSION["User_Id"] == $_POST["user_id"]) // making sure that the correct logged in user has access to this page 
    {
        $postid = $_POST["post_id"];
        $post = new Post();

       

        if ($post->deletePost($postid))
        {
            echo "1";
            
        }
        else
        {
            echo "0";
        }
    }
    else
    {
        echo "0";
    }
}
else
{
    echo "0";
}
?>
