<?php
include "includes/autoloader.inc.php";
session_start();

if (isset($_POST["update_btn"]))
{
    $post_id = $_POST["Post_id"];
    $title = $_POST["Edit_title"];
    $headline = $_POST["Edit_headline"];
    $content = $_POST["Edit_content"];
    date_default_timezone_set("Australia/Melbourne");
    $date = date("Y-m-d H:i:s"); 


    $errorEmpty = false;
    $errorTitle = false;
    $errorContent = false;

    if (empty($title) || empty($headline) || empty($content))
    {
        echo "<span class='text-danger'>Please enter all fields!</span>";
        $errorEmpty = true;

    }
    else
    {
        // add the post to DB

        $post = new Post();
        
        if ($post->updatePost($post_id,$title,$headline,$content,$date))
        {
            echo "<span class='text-success'>Post Updated!</span> <a href='post.php?post_id=". $post_id. "' class='btn btn-dark btn-sm'>View Post</a></span>";

        }
        else
        {
            echo "<span class='text-danger'>Error with post submission!</span>";

        }
    }
}
?>
<script>
    $("#Edit_title, #Edit_headline, #Edit_content").removeClass("is-invalid");
    
    var errorEmpty = "<?php echo $errorEmpty;?>";

    if (errorEmpty == true)
    {
        $("#Edit_title, #Edit_headline, #Edit_content").addClass("is-invalid");
    }
    else
    {
        $("#Edit_title, #Edit_headline, #Edit_content").val("");
        $("#update-btn").remove();
    }
</script>