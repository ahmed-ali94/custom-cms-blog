<?php
include "includes/autoloader.inc.php"; 
if (isset($_POST["login_submit"]))
{
    $email = $_POST["login_email"];
    $pwd = $_POST["login_password"];

    $errorEmpty = false;
    $errorEmail = false;
    $errorWrongCred = false;

    if (empty($email) || empty($pwd))
    {
        echo "<span class='text-danger'>Please enter all fields!</span>";
        $errorEmpty = true;
    }
    elseif (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email))
    {
        echo "<span class='text-danger'>Please enter a valid email address!</span>";
        $errorEmail = true;
    }
    else
    {
        $user = new User();

        if ($user->getUserCount($email,$pwd))
        {
            $result = $user->getUserData($email,$pwd);

            session_start(); // Create a session
            $_SESSION["User_Id"] = $result[0]["ID"];
            $_SESSION["User_Name"] = $result[0]["Name"];
        }
        else
        {
            echo "<span class='text-danger'>Wrong email or password!</span>";
            $errorWrongCred = true;
        }
    }
}
else
{
    header("Location: index.php");
}
?>
<script>
    $("#login_email, #login_password").removeClass("is-invalid");
    
    var errorEmpty = "<?php echo $errorEmpty;?>";
    var errorEmail = "<?php echo $errorEmail;?>";
    var errorWrongCred = "<?php echo $errorWrongCred;?>";

    if (errorEmpty == true)
    {
        $("#login_email, #login_password").addClass("is-invalid");
    }
    else if (errorEmail == true)
    {
        $("#login_email").addClass("is-invalid");
    }
    else if (errorWrongCred == true)
    {
        $("#login_email, #login_password").val("");
        $("#login_email, #login_password").addClass("is-invalid");
    }
    else
    {
        $("#login_email, #login_password, #login_message").val(""); 
        $('#loginModalCenter').modal('hide');
        location.reload();
    }
</script>