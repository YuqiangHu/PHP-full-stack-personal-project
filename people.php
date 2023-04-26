<!DOCTYPE html>  
<html>
<head lang="en">  
    <meta charset="UTF-8">
    <title>people</title>
    <link rel="stylesheet" href="css/bootstrap-3.3.5.min.css">
    <link rel="stylesheet" href="css/bootstrap-3.3.5-theme.min.css">
    <link rel="stylesheet" href="css/basic.css">
 
</head>
<body>
<div id="top-bar">
    <div class="container">
        <p>ONLINE SURVEY</p>
        <div id="links">
            <ul class="links-ul">
               <li><a href="home.php">Home</a></li>
                <li class="cur"><a href="people.php">People</a></li>
				<li><a href="online_survey.php">Online Survey</a></li>
                <li><a href="signin_form.php">Enrollment</a></li>
                <li><a href="contact.php">Contact Us</a></li>
				<li><a href="admin.php">Admin</a></li>
			    <li><a href="mypage.php">My Page</a></li>
				
            </ul>
        </div>
    </div>
</div>
<div id="main">
    <div class="container">
        <h2 class="intro_title">People information</h2>
        <hr/>
<?php
include('db_conn.php'); //the db connection can show in the db php 
	
	$query="SELECT * FROM `users`";
	//execute the query
	$result=$mysqli->query($query);// this page is the information of users to get from the database 'yuqianghu475343'
	
	
	echo "<table border=1>";
	
	echo "<tr><th>Name</th><th>Date of birth</th><th>Email</th><th>Access</th></tr>";
	
	
	while($row=$result->fetch_array(MYSQLI_ASSOC))
{
	$name=$row['Name'];
	$date=$row['DOB'];
	$email=$row['Email'];
	$access=$row['Access'];
	
	//starting new row in the table
	echo "<tr>";
	
	echo "<td>$name</td>";
	echo "<td>$date</td>";
	echo "<td>$email</td>";
	echo "<td>$access</td>";
	//finishing the row in the table
	echo "</tr>";
}
	//usig the $post method to put the data out from the "yuqianghu475343" database
	echo "</table>";
		

$mysqli->close();
?>

    </div>
</div>
<?php include_once "common/footer.common.html"; ?>
</body>
</html>