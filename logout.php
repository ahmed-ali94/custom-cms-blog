<?php
session_start();
if(isset($_SESSION["User_Id"]))
{
    session_destroy();
}
else
{
    header("Location: index.php");
}
?>