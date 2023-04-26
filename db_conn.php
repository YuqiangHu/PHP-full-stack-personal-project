<title>db</title><?php
//connect to mysql
$mysqli=new mysqli('localhost','root','','yuqainghu475343');

if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
?>