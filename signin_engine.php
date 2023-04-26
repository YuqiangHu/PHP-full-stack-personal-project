<title>signin</title><?php

include("session.php");
include("db_conn.php");

//receive the username data from the form (in signin_form.php)
$user=$_POST['username'];
//receive the password data from the form (in signin_form.php)
$password=$_POST['password'];

//query to check whether username is in the table (check whether the user has been signed up)
$query = "SELECT * FROM users WHERE username='$user'";
//execute query to the database and retrieve the result ($result)
$result = $mysqli->query($query);

//convert the result to array (the key of the array will be the column names of the table)
	$row=$result->fetch_array(MYSQLI_ASSOC);


//if the username from table/database is not same as the username data from the form(from signin_form.php)
if($row['username']!=$user || $user=="")
{
	
	//automatically go back to signin_form and pass the error message
	header('Location: ./signin_form.php?error=invalid_username');

	
}//if the username is same as the username data from the form(from signin_form.php) 
else {
	//if the password from table/database is same as the password data from the form(from signin_form.php)
	if($row['password']==$password) {
		//save the username in the session
		$session_user=$row['username'];
		$_SESSION['session_user']=$session_user;
		$session_access=$row['access'];
		$_SESSION['session_access']=$session_access;
		$session_id=$row['ID'];
		$_SESSION['session_id']=$session_id;
		//automatically go to signin_success.php
		header('Location: ./signin_success.php');
	
	}//if the password from table/database does not match with the password data from the signin form
	else{

		//automatically go back to signin_form and pass the error message
		header('Location: ./signin_form.php?error=invalid_password');

	}
}
?>
