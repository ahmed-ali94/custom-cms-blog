<?php
include "includes/autoloader.inc.php";

if (isset($_POST["register"]))
{
    $name = $_POST["sign_name"];
    $password = $_POST["sign_pwd"];
    $c_pwd = $_POST["c_pwd"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $hash = md5( rand(0,1000) );
    date_default_timezone_set("Australia/Melbourne");
    $created = date("Y-m-d H:i:s");

    $errorEmpty = false;
    $errorName = false;
    $errorPwd = false;
    $errorCpwd = false;
    $errorEmail = false;

    if (empty($name) || empty($password) || empty($c_pwd) || empty($dob) || empty($email))
    {
        echo "<span class='text-danger'>Please enter all fields!</span>";
        $errorEmpty = true;
    }
    elseif (!preg_match("/^[a-zA-Z\s]+$/",$name))
    {
        echo "<span class='text-danger'>Name must only contain letters!</span>";
        $errorName = true;   
    }
    elseif (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/", $password))
    {
        echo "<span class='text-danger'>Password must be between 6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter.</span>";
        $errorPwd = true;   
    }
    elseif (strcasecmp($password,$c_pwd) != 0)
    {
        echo "<span class='text-danger'>Passwords dont match.</span>";
        $errorCpwd = true;
    }
    elseif (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email))
    {
        echo "<span class='text-danger'>Invalid email address!</span>";
        $errorEmail = true;
    }
    else
    {

        $user = new User();

        if ($user->checkEmail($email) == false) // if the given email is unique
        {
            $user->createUser($name,$password,$email,$dob,$hash,$created);

            $to = "somebody@example.com";
            $subject = "Website Account Activation";
            $txt = "
            <html>
            <body>
            Dear $name, Thanks for creating an account with us. The final step of the account creation process is to activate your account. <br />
            <h4>Account details</h4>
            ------------------- <br />
            <strong>Username:</strong> $name <br />
            <strong>Password:</strong> $password <br />
            ------------------- <br />
            
            Please use the link below to activate your account. <br />
            <a href='activate.php?email=$email&hash=$hash'>Activate</a> <br />
            </body>
            </html>";
            $headers = "MIME-Version: 1.0" . "\r\n"; // ensureing that the message can be formatted using html tags 
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .=  "From: webmaster@example.com" . "\r\n";
            mail($to, $subject, $txt, $headers,"-r me@example.com");

            echo "<span class='text-success'>Account created! Email has been sent for account activation!</span>";
        }
        else
        {
        echo "<span class='text-warning'>Email already exists!</span>";
        }
          
    }
}
else
{
    header("Location: signup.php");
}
?>
<script>
    $("#sign_name, #sign_pwd, #c_pwd, #dob, #email").removeClass("is-invalid");
    
    var errorEmpty = "<?php echo $errorEmpty;?>";
    var errorName = "<?php echo $errorName;?>";
    var errorPwd = "<?php echo $errorPwd;?>";
    var errorCpwd = "<?php echo $errorCpwd;?>";
    var errorEmail = "<?php echo $errorEmail;?>";

    if (errorEmpty == true)
    {
        $("#sign_name, #sign_pwd, #c_pwd, #dob, #email").addClass("is-invalid");
    }
    else if (errorName == true)
    {
        $("#sign_name").addClass("is-invalid");
    }
    else if (errorPwd == true)
    {
        $("#sign_pwd").addClass("is-invalid");
    }
    else if (errorCpwd == true)
    {
        $("#c_pwd").addClass("is-invalid");
    }
    else if (errorEmail == true)
    {
        $("#email").addClass("is-invalid");
    }
    else
    {
        $("#sign_name, #sign_pwd, #c_pwd, #dob, #email").val("");
    }
  
</script>
