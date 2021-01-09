<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php">Start Bootstrap</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav justify-content-center ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <?php // Check if user is logged in - if logged in add relevant buttons
            if (isset($_SESSION["User_Id"]))
            {
              echo "<div class='btn-group'>\n"
              ."<a href='user.php?User_Id=".$_SESSION["User_Id"]."'class='btn btn-dark'>".$_SESSION["User_Name"]."</a>\n"
              ."<button type='button' class='btn btn-primary  dropdown-toggle dropdown-toggle-split' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>\n"
              ."<span class='sr-only'>Toggle Dropdown</span>\n"
              ."</button>\n"
              ."<div class='dropdown-menu'>\n"
              ."<a href='user.php?User_Id=" . $_SESSION["User_Id"].  "'class='dropdown-item'>My Posts</a>\n"
              ."<div class='dropdown-divider'></div>\n"
              ."<a href='#' class='dropdown-item' data-toggle='modal' data-target='#AddPostModalCenter'>Create Post</a>\n"
              ."<div class='dropdown-divider'></div>\n"
              ."<button type='button' id='logout' class='dropdown-item'>Logout</button>\n"
              ."</div>\n"
              ."</div>";
            }
            else
            {
              echo  "<li class='nav-item mr-2'>\n"
                    ."<a  id='login' class='btn btn-dark nav-link' data-toggle='modal' data-target='#loginModalCenter'>Login</a>\n"
                    ."</li>\n"
                    ."<li class='nav-item'>\n"
                    ."<a class='btn btn-primary nav-link' href='signup.php'>Sign Up!</a>\n"
                    ."</li>";
            }
            ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Login Modal -->
  <div class="modal fade" id="loginModalCenter" tabindex="-1" role="dialog" aria-labelledby="loginModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="login_modal_body" class="modal-body">
        <h5 class="text-center text-secondary my-3">Login</h5>
            <form id="login-form" method="POST" action="login_process.php" novalidate>
                <div class="form-group">
                <label for="loginEmail">Email:</label>
                  <input type="email" class="form-control" id="login_email" name="login_email" placeholder="Email@example.com" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="loginPassword">Password:</label>
                  <input type="password" class="form-control" id="login_password" name="login_password">
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary btn-md btn-block rounded-pill" name="login_submit" id="login_submit">Login</button>  
                </div>
              </form>
              <div id ="login_message" class="text-center"></div>
        </div>
        <div class="modal-footer">
          <span class="mx-auto">Not a member yet? <a class="text-primary text-decoration-none" href="signup.php">Sign Up</a>.</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Create post modal -->
  <div class="modal fade " id="AddPostModalCenter" tabindex="-1" role="dialog" aria-labelledby="AddPosttModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-secondary ">
          <h5 class="modal-title text-white" id="AddPostModalCenterTitle">Create Post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="addlist_body">
          <form method="POST" action="post_process.php" novalidate>
            <div class="form-group">
              <label for="list_title">Post Title</label>
              <input type="text" class="form-control" name="Post_title" id="Post_title" >
            </div>
            <small id="post_title_msg">
            </small>
            <div class="form-group">
              <label for="post_headline" >Post Tagline</label>
              <input type="text" class="form-control" name="Post_headline" id="Post_headline" >
            </div>
            <small id="post_headline_msg">
            </small>
            <textarea name="Post_content" id="Post_content" class="form-control ckeditor"></textarea>
            <small id="post_body_msg">
            </small>
        </div>
        <div id="form-message" class="mx-auto mb-3">
        </div> 
        <div class="modal-footer bg-secondary">
          <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
        </div>
          </form>
      </div>
    </div>
  </div>