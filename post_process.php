<?php
include "includes/autoloader.inc.php";
session_start();

if (isset($_POST["submit"]))
{
    $title = $_POST["Post_title"];
    $headline = $_POST["Post_headline"];
    $content = $_POST["Post_content"];
    $author = $_SESSION["User_Name"];
    $user_id = $_SESSION["User_Id"];

    date_default_timezone_set("Australia/Melbourne");
    $date = date("Y-m-d H:i:s"); 


    $errorEmpty = false;
    $errorTitle = false;
    $errorContent = false;
    $errorAuthor = false;

    if (empty($title) || empty($headline) || empty($content) || empty($author))
    {
        echo "<span class='text-danger'>Please enter all fields!</span>";
        $errorEmpty = true;

    }
    else
    {
        // add the post to DB

        $post = new Post();
        
        if ($post->setPost($user_id,$title,$headline,$content,$author,$date))
        {
            echo "<span class='text-success'>Post submitted!</span>";

        }
        else
        {
            echo "<span class='text-danger'>Error with post submission!</span>";

        }
    }
}
?>
<script>
    $("#Post_title, #Post_headline, #Post_content, #Post_author").removeClass("is-invalid");
    
    var errorEmpty = "<?php echo $errorEmpty;?>";

    if (errorEmpty == true)
    {
        $("#Post_title, #Post_headline, #Post_content").addClass("is-invalid");
    }
    else
    {
        $("#Post_title, #Post_headline, #Post_content").val("");
        $('#AddPostModalCenter').modal('hide');
    }
</script>