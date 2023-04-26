<title>signout</title><?php
include("session.php");

session_destroy();
//automatically go back to signin form
header('Location: ./signin_form.php');
?>
