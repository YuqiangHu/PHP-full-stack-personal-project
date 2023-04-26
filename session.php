<?php
//starting  all the session of the  public is 3 and who sign up is 2, only the admin has 1
session_start();

//if the session for username has not been set, initialise it
if(!isset($_SESSION['session_user'])){
	$_SESSION['session_user']="";
}
if(!isset($_SESSION['session_access'])){
	$_SESSION['session_access']="";
}
//save username in the session 
if(!isset($_SESSION['session_id'])){
	$_SESSION['session_id']="";
}
if(!isset($_SESSION['session_id1'])){
	$_SESSION['session_id1']="";
}
$session_user=$_SESSION['session_user'];
$session_access=$_SESSION['session_access'];
$session_id=$_SESSION['session_id'];
$session_id1=$_SESSION['session_id1'];
?>

