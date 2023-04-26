
<?php
//Check the username is used before or not. in this sign up page all the user will get sission 2 to be a registered menbers. and thier information will insert into the database 'yuqianghu475343' include username, name, dob, email, password and sission.
include('db_conn.php');
 
if( isset($_POST['submit']) )
{

$sql="select username from users where username = '$_POST[username]' "; 
$res=$mysqli->query($sql); 

$cRes=array(); 

  while( $row=$res->fetch_array() )
  {
  $cRes[]=$row;
  }



  if(count($cRes)>0)
  {
  echo "<script>
        alert(' The username has been existed. Try again please.');
	    location.href='signup.php'
	    </script>";
  }
  else
  //later check the passwords
  {
    if($_POST['password']==$_POST['retype'])

    {	
    
$query="INSERT INTO users(username, password, access,name,dob,email) VALUES
    ('$_POST[username]','$_POST[password]','2','$_POST[name]','$_POST[dob]','$_POST[email]')";
    $result=$mysqli->query($query);
    

    echo "<script>
        alert('Successfully registered, please go back to sign in.');
	    location.href='signup.php'
	    </script>";

    }
   else
   {
   echo "<script>
        alert('The second typing is not the same as the first one.');
	    location.href='signup.php'
	    </script>";
   }


}

}

?>
<html>
<head>
<head lang="en">
    <meta charset="UTF-8">
    <title>sign up</title>
    <link rel="stylesheet" href="css/bootstrap-3.3.5.min.css">
    <link rel="stylesheet" href="css/bootstrap-3.3.5-theme.min.css">
    <link rel="stylesheet" href="css/basic.css">
    <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="js/bootstrap-3.3.5.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
</head>

<body>
<div id="top-bar">
    <div class="container">
        <p>ONLINE SURVEY</p>
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
<h1>Sign Up</h1><br/><br/>
<p>You can sign up with your username and sign in using your username, however, you need sign up with your real name and Email and date of birth, in this way you can check your personal information in the "people" page.  Please enter your username and password</p><br>

<form action="" method="post">  

Username:              <input type="text"   name="username"  values=""/><br/><br/>
Password:              <input type="password" name="password" values="" /><br/><br/>
Retype Password:       <input type="password" name="retype" values=""/><br/><br/>
Name:                  <input type="text"   name="name"  values=""/><br/><br/>
date of birth:              <input type="text"   name="dob"  values=""/><br/><br/>
email:              <input type="text"   name="email"  values=""/><br/><br/>
<input type="submit" name="submit" value="Sign Up" /><br/><br/>
<input type="button" value="Go back to Main Page" onClick="window.location.href='signin_form.php'">
</form>
    </div>
</div>



</body>
</html>

