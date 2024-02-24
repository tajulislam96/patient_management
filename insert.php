<?php
session_start();
if(!empty($_SESSION['name']) && !empty($_SESSION['email']))
{
?>

    
<?php
}
else
{
    header("location:Patient_login.php");
}

?>
<h3><a href="Patient_logout.php">Logout</a></h3>