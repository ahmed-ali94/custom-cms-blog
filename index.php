<?php
include "includes/autoloader.inc.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Clean Blog - Start Bootstrap Theme</title>
  <?php include("includes/links.inc");?>
</head>

<body>

  <!-- Navigation -->
  <?php include("includes/header.inc");?>
  

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Clean Blog</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <?php
      // Display all blog posts from DB
      $posts = new PostView();
      $posts->displayPosts();
      ?>
        
    </div>
    <!-- Pager -->
    <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
  </div>
  <hr>
  
  <!-- Footer -->
  <?php include("includes/footer.inc");?>
  
</body>

</html>
