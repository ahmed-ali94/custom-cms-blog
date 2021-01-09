<?php
include "includes/autoloader.inc.php";
session_start();

// Get post data from Db

if (isset($_GET["post_id"]))
{
  $id = $_GET["post_id"];
  $post = new Post();

  $post = $post->getSinglePost($id);
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
  <header class="masthead" style="background-image: url('img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1><?php echo $post[0]["Post_Title"]; ?></h1>
            <h2 class="subheading lead"><?php echo $post[0]["Post_Subtitle"]; ?></h2>
            <span class="meta">Posted by
              <a href="user.php?User_Id=<?php echo $post[0]["User_ID"]; ?>"><?php echo $post[0]["Post_Author"]; ?></a> on
              <?php // Format the date from SQL table so that it can look like 26/12/2020 08:40 PM
              $date = new DateTime($post[0]["Post_Date"]);
              echo $date->format('d/m/Y h:i A') . " AEST";
              ?></span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <?php echo $post[0]["Post_Body"]; ?>
        </div>
      </div>
    </div>
  </article>

  <hr>

  <!-- Comments -->
  <div class="container">
  <div class="row">
    <div class="col-12">
      <div class="comments">
        <div class="comments-details">
          <span class="total-comments comments-sort" style="color: #0085A1;" >117 Comments</span>
          <span class="dropdown">
              <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">Sort By <span class="caret"></span></button>
              <div class="dropdown-menu">
                <a href="#" class="dropdown-item">Top Comments</a>
              <a href="#" class="dropdown-item">Newest First</a>
              </div>
          </span>     
        </div>
        <div id="spinner" class="spinner-border text-info" style="width: 3rem; height: 3rem;" role="status">
         <span class="sr-only">Loading...</span>
        </div>
        <div class="comment-box add-comment">
          <span class="commenter-pic">
            <img src="/images/user-icon.jpg" class="img-fluid">
          </span>
          <span class="commenter-name">
            <input type="text"  placeholder="Add a public comment" name="Add Comment">
            <button type="submit" class="btn btn-default" id="add_comment">Comment</button>
            <button type="cancel" class="btn btn-default">Cancel</button>
          </span>
        </div>
        <div class="comment-box">
          <span class="commenter-pic">
            <img src="/images/user-icon.jpg" class="img-fluid">
          </span>
          <span class="commenter-name">
            <a href="#" >Happy markuptag</a> <span class="comment-time">2 hours ago</span>
          </span>       
          <p class="comment-txt more">Suspendisse massa enim, condimentum sit amet maximus quis, pulvinar sit amet ante. Fusce eleifend dui mi, blandit vehicula orci iaculis ac.</p>
          <div class="comment-meta">
            <button class="comment-like"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 99</button>
            <button class="comment-dislike"><i class="fa fa-thumbs-down" aria-hidden="true"></i> 149</button> 
            <button class="comment-reply reply-popup"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</button>         
          </div>
          <div class="comment-box add-comment reply-box">
            <span class="commenter-pic">
              <img src="/images/user-icon.jpg" class="img-fluid">
            </span>
            <span class="commenter-name">
              <input type="text" placeholder="Add a public reply" name="Add Comment" style="background-color: #FAFAFA;">
              <button type="submit" class="btn btn-default">Reply</button>
              <button type="cancel" class="btn btn-default reply-popup">Cancel</button>
            </span>
          </div>
        </div>
        <div class="comment-box">
          <span class="commenter-pic">
            <img src="/images/user-icon.jpg" class="img-fluid">
          </span>
          <span class="commenter-name">
            <a href="#">Happy markuptag</a> <span class="comment-time">2 hours ago</span>
          </span>       
          <p class="comment-txt more">Suspendisse massa enim, condimentum sit amet maximus quis, pulvinar sit amet ante. Fusce eleifend dui mi, blandit vehicula orci iaculis ac.</p>
          <div class="comment-meta">
            <button class="comment-like"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 99</button>
            <button class="comment-dislike"><i class="fa fa-thumbs-down" aria-hidden="true"></i> 149</button> 
            <button class="comment-reply"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</button>         
          </div>
          <div class="comment-box replied">
            <span class="commenter-pic">
              <img src="/images/user-icon.jpg" class="img-fluid">
            </span>
            <span class="commenter-name">
              <a href="#">Happy markuptag</a> <span class="comment-time">2 hours ago</span>
            </span>       
            <p class="comment-txt more">Suspendisse massa enim, condimentum sit amet maximus quis, pulvinar sit amet ante. Fusce eleifend dui mi, blandit vehicula orci iaculis ac.</p>
            <div class="comment-meta">
              <button class="comment-like"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 99</button>
              <button class="comment-dislike"><i class="fa fa-thumbs-down" aria-hidden="true"></i> 149</button> 
              <button class="comment-reply"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</button>         
            </div>
            <div class="comment-box replied">
              <span class="commenter-pic">
                <img src="/images/user-icon.jpg" class="img-fluid">
              </span>
              <span class="commenter-name">
                <a href="#">Happy markuptag</a> <span class="comment-time">2 hours ago</span>
              </span>       
              <p class="comment-txt more">Suspendisse massa enim, condimentum sit amet maximus quis, pulvinar sit amet ante. Fusce eleifend dui mi, blandit vehicula orci iaculis ac.</p>
              <div class="comment-meta">
                <button class="comment-like"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 99</button>
                <button class="comment-dislike"><i class="fa fa-thumbs-down" aria-hidden="true"></i> 149</button> 
                <button class="comment-reply"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</button>         
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<hr>

  <!-- Footer -->
  <?php include("includes/footer.inc");?>

</body>

</html>
