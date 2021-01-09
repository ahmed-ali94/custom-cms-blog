<?php
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
            <h1>Sign Up</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Want to create posts and share your thoughts? Fill out the form below and start posting!</p>
        <form id="signup-form" class="needs-validation" method="POST" action="signup_process.php"  >

        <div class="form-group">
            <label for="sign_name">Name</label>
            <input type="text" class="form-control" id="sign_name" name="sign_name" >
            <div id="name_invalid" class="invalid-feedback">
            </div>
            
          </div>
          <div class="form-group">
            <label for="sign_pwd">Password</label>
            <input type="password" name="sign_pwd" class="form-control" id="sign_pwd" aria-describedby="pwdHelp" >
            <div id="pwd_invalid" class="invalid-feedback">
            </div>
            <small id="pwdHelp" class="text-muted">
              Password must be between 6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter.
            </small>
            
          </div>
          <small id="pwd_msg" >
          </small>
          <div class="form-group">
            <label for="confirm_pwd">Confirm Password</label>
            <input type="password" class="form-control" name="c_pwd" id="c_pwd" >
          </div>
          <small id="confirm_pwd_msg" >
          </small>
          <div class="form-group ">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" name="dob" id="dob" placeholder="DOB">
          </div>
          <small id="dob_msg" >
          </small>
        <div class="form-group">
          <label for="sign_email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" aria-describedby="emailHelp">
          <small id="emailHelp" class="text-muted">
            This email address will be used to login.
          </small>
        </div>
        <small id="email_msg" >
        </small>
        <button type="submit" class="btn btn-dark" name="register" id="register">Sign Up</button>
        </form>

        <div id="signup_message" class="text-center mt-2">
        </div>
      </div>
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <?php include("includes/footer.inc");?>

</body>

</html>
