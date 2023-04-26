<?php
//this page is the enrollment that people can sign in and sign up. link to the signup php and insert users infromation into the database'yuqainghu475343'
include("session.php");
//include the file db_conn.php
include("db_conn.php");
if($session_user!="" ) {
	header('location: ./signin_success.php');
}

//if there is any received error message 
if(isset($_GET['error']))
{
	$errormessage=$_GET['error'];
	echo "<script>alert('$errormessage');</script>";
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>signin</title>
    <link rel="stylesheet" href="css/bootstrap-3.3.5.min.css">
    <link rel="stylesheet" href="css/bootstrap-3.3.5-theme.min.css">
    <link rel="stylesheet" href="css/basic.css">
    <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="js/bootstrap-3.3.5.min.js" type="text/javascript"></script>
</head>
<body>
<div id="top-bar">
    <div class="container">
        <p>ONLINE SURVEY<p>
        <div id="links">
            <ul class="links-ul">
               <li><a href="home.php">Home</a></li>
                <li><a href="people.php">People</a></li>
				<li><a href="online_survey.php">Online Survey</a></li>
                <li class="cur"><a href="signin_form.php">Enrollment</a></li>
                <li><a href="contact.php">Contact Us</a></li>
				<li><a href="admin.php">Admin</a></li>
			    <li><a href="mypage.php">My Page</a></li>
				
            </ul>
        </div>
    </div>
</div>
<div id="main">
    <div class="container">
        <h1>Sign in</h1><br/>
    <p>Please enter your username and password</p><br>
   
	<table>
	<!--when the submit button is clicked, the submitted data(username, password) will be sent to signin_engine.php -->
    <form action="./signin_engine.php" method="post">
    	<tr>
    		<td><font color="#FF0000">*</font>	Username:</td>
    		<td><input name="username" type="text" id="username" size="20" style="border:1px #333333 solid;width:100px;height:20px;"></td>
 		</tr>
 		<tr>
 	    	<td><font color="#FF0000">*</font>	Password:</td>
 	    	<td><input name="password" type="password" id="password" size="20" style="border:1px #333333 solid;width:100px;height:20px;"></td>
      	</tr>
      	<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Sign in">
			<input type="reset" name="reset" value="Reset"></td></tr>
			
	</form>
	</table>
<p>if you don't have the username, Please sign up your username and password</p>	
<form action="./signup.php" method="post">

		<input type="button" value="Sign up" onClick="window.location.href='signup.php'">
		</form>
    </div>
</div>		

<div class="modal fade bs-example-modal-sm" id="error" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <h4 style="text-align: center" id="error_tip"></h4>
            </div>
            <div class="modal-footer" style="text-align: center">
                <button type="button" id="btn" class="btn btn-default">ok</button>
            </div>
        </div>
    </div>
</div>

<?php include_once "common/footer.common.html"; ?>

</body>
</html>