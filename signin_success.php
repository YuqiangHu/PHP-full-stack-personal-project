<?php
//include the file session.php
include("session.php");
//include the file db_conn.php
include("db_conn.php");

$res=mysqli_query($mysqli, "SELECT * FROM users WHERE username LIKE '$session_user'"); 
if ($res) $rs = mysqli_fetch_array($res);

//if the session for username has not been saved, automatically go back to signin_form.php pretty nice 
if ($session_user==""){
	header('Location: signin_form.php');
}


if(isset($_POST['signout']))
{
unset($_SESSION['session_user']);
unset($_SESSION['session_access']);
header('Location: signin_form.php');
}


if(isset($_POST['edit']))
{
if($session_access==1||$session_id==$_POST['id'])
{
		$session_id1=$_POST['id'];
		$_SESSION['session_id1']=$session_id1;
		header('Location:form.php');
}

else{
echo "<script>
      alert('Sorry, you have no enough right.');
	  location.href='signin_success.php'
	  </script>";}
}


if(isset($_POST['delete']))
{
if($session_access==2||$session_access==3)
{
echo "<script>
      alert('Sorry, you have no enough right.');
	  location.href='signin_success.php'
	  </script>";
}
else
{
			$iddelete=$_POST['id'];
            $list_query="DELETE FROM users
			WHERE ID='$iddelete'";
			//echo $list_query;
	        $result=$mysqli->query($list_query);



}
}

?>

<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>signin </title>
    <link rel="stylesheet" href="css/bootstrap-3.3.5.min.css">
    <link rel="stylesheet" href="css/bootstrap-3.3.5-theme.min.css">
    <link rel="stylesheet" href="css/basic.css">
    <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="js/bootstrap-3.3.5.min.js" type="text/javascript"></script>
</head>


<body>
<div id="top-bar">
    <div class="container">
        <p>MYLO</p>
        <div id="links">
            <ul class="links-ul">
                <li><a href="home.php">Home</a></li>
                <li><a href="learning_meterials.php">Learning meterials</a></li>
                <li ><a href="discussion.php">Discussion</a></li>
                <li class="cur"><a href="signin_form.php">Enrollment</a></li>
                <li><a href="contact.php">Contact Us</a></li>
				
            </ul>
        </div>
    </div>
</div>
<div id="main">
    <div class="container">
<b>You have successfully signed in.</b><br/>
Welcome!! <?php echo $session_user;?><br/>
<form action="" method="post">
<input type="submit" name="signout" value="Sign out" onClick="window.location.href='tute5_main.php'">
</form>
<head>
	<title>User list</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>


	<h1>Users Information</h1>
	
  
<?php
    $user=$session_user;
	if($session_access==3){
	
	
	$list_query = "select * from users where username='$user' ORDER BY ID DESC";
	
	}
	else 
	{$list_query = "select * from users ORDER BY ID DESC";}
	/
	$result= $mysqli->query($list_query);
   
   	
   	//it is the keys of the array are the column name
   	while($row= $result->fetch_array(MYSQLI_ASSOC)){
   	
   	//extract the values
   	$id=$row['ID'];
	$lastname=$row['Lastname'];
	$firstname=$row['Firstname'];
   	$username=$row['username'];
	$password=$row['password'];
   	$email=$row['email'];
   	$gender=$row['Gender'];
   	$comments=$row['comments'];
   	$campus=$row['Campus'];
	$access=$row['access'];
   
 
  	//printing out with table :) 	
?>
<br/>

<table id="list">
   <tr>
      <td class="title">ID</td>
      <td><?php echo $id;?></td>
      <td class="title">Username</td>
      <td><?php echo $username;?></td>
   </tr>
    <tr>
      <td class="title">Lastname</td>
      <td><?php echo $lastname;?></td>
      <td class="title">Firstname</td>
      <td><?php echo $firstname;?></td>
   </tr>
   <tr>
      <td class="title">Password</td>
      <td><?php echo $password;?></td>
      <td class="title">Email</td>
      <td><?php echo $email;?></td>
   </tr>
   <tr>
      <td class="title">Gender</td>
      <td><?php echo $gender;?></td>
	  <td class="title">Access</td>
      <td><?php echo $access;?></td>
   </tr></tr>
   <tr>
      <td class="title">Campus</td>
      <td><?php echo $campus;?></td>
      <td class="title">Comments</td>         
      <td colspan="3"><?php echo nl2br($comments);?></td>
   </tr>
   <tr>
   <!-- the below form is for the editing and deleting comments-->
      <td id="function" colspan="4">
		<form action="" name="form" method="POST">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<input type="submit" name="edit" value="edit">
			<input type="submit" name="delete" value="delete">
		</form>
      </td>
   </tr>
</table>
<?php
  
}
?>
</body>
</html>
