<?php
include "includes/autoloader.inc.php";
session_start();

// Get post data from Db

if (isset($_GET["post_id"]) && isset($_GET["user_id"]))
{
    if ($_SESSION["User_Id"] == $_GET["user_id"]) // making sure that the correct logged in user has access to this page 
    {
        $id = $_GET["post_id"];
        $post = new Post();
        $post = $post->getSinglePost($id);

        $title = $post[0]["Post_Title"];
        $tagline = $post[0]["Post_Subtitle"];
        $content = $post[0]["Post_Body"];
        $title = $post[0]["Post_Title"];
        date_default_timezone_set("Australia/Melbourne");
        $date = date("Y-m-d H:i:s"); 

    }
    else
    {
        header("location: index.php");
    }
}
else
{
  header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Clean Blog - Start Bootstrap Theme</title>
  <!--  CSS Links-->
  <?php include("includes/links.inc");?>
</head>

<body>

  <!-- Navigation -->
  <?php include("includes/header.inc");?>
  

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/signup.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Edit Post</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <form id="edit-post" method="POST" action="edit_post_process.php" novalidate>
            <div class="form-group">
              <label for="list_title">Post Title</label>
              <input type="text" class="form-control" name="Edit_title" id="Edit_title" value="<?php echo $title?>">
            </div>
            <small id="post_title_msg">
            </small>
            <div class="form-group">
              <label for="post_headline" >Post Tagline</label>
              <input type="text" class="form-control" name="Edit_headline" id="Edit_headline" value="<?php echo $tagline?>">
            </div>
            <small id="post_headline_msg">
            </small>
            <textarea name="Edit_content" id="Edit_content" class="form-control ckeditor"><?php echo $content?></textarea>
            <small id="post_body_msg">
            </small>
            <button type="submit" class="btn btn-primary mt-4" name="update-btn" id="update-btn">Update</button>
            <div class="form-group">
            <div id="edit-post-message" class="mx-auto mt-4"></div> 
            </div>
        </div>
          </form>
      </div>
      
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <?php include("includes/footer.inc");?>

  <script>
  
  CKEDITOR.replace('Edit_content', {
                height: 500,
                filebrowserUploadUrl: "img_process.php",
                filebrowserUploadMethod: "form"

              });


    $("#edit-post").submit(function(event)
        {
            event.preventDefault();
            var Post_id = "<?php echo $id?>";
            var title = $("#Edit_title").val();
            var headline = $("#Edit_headline").val(); 
            var content = CKEDITOR.instances.Edit_content.getData(); 
            var update_btn = $("#update-btn").val();

            $("#edit-post-message").load("edit_post_process.php", {
                Post_id: Post_id,              
                Edit_title: title,
                Edit_headline: headline,
                Edit_content: content,
                update_btn: update_btn
            });


        });
        
  </script>

</body>

</html>
