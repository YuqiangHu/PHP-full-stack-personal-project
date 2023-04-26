<?php
$res = null;
if(!empty($_POST['sub'])){
    $fName = $_POST['first_name'];
	//ther just content a example the 'option'. not using the 'in which' in the part tow can using it to outomaticlly  get the options 
    $lName = $_POST['last_name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $campus = $_POST['campus'];

    if(!empty($fName) && !empty($lName) && !empty($gender) && !empty($email) && !empty($campus)){
        include_once 'db_conn.php';
        $sql = "INSERT INTO student
                (Lastname, Firstname, email, Gender, Campus)
                VALUES
                ('{$lName}', '{$fName}', '{$email}', '{$gender}', '{$campus}')
                ";
        $result = $mysqli->query($sql);
        if($result){
            $res = 'Submit success!';
        }
        else{
            $res = 'Submit fail!';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>onlineservey</title>
    <link rel="stylesheet" href="css/bootstrap-3.3.5.min.css">
    <link rel="stylesheet" href="css/bootstrap-3.3.5-theme.min.css">
    <link rel="stylesheet" href="css/basic.css">
    <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="js/bootstrap-3.3.5.min.js" type="text/javascript"></script>
</head>
<body>
<div id="top-bar">
    <div class="container">
        <p>ONLINE SURVEY</p>
        <div id="links">
            <ul class="links-ul">
               <li><a href="home.php">Home</a></li>
                <li><a href="people.php">People</a></li>
				<li class="cur"><a href="online_survey.php">Online Survey</a></li>
                <li><a href="signin_form.php">Enrollment</a></li>
                <li><a href="contact.php">Contact Us</a></li>
				<li><a href="Admin.php">admin</a></li>
			    <li><a href="Mypage.php">my page</a></li>
            </ul>
        </div>
    </div>
</div>
<div id="main">
    <div class="container">
        <h3></h3>
        <hr/>
		 <p>Thank you to join in this Online Survey.</p>
            <table>
                <tr>
                    <td>
                        <label>Gender:&emsp;</label>&emsp;&nbsp;&nbsp;
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="gander_male" checked value="male"> male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="gander_female" value="female"> female
                        </label>
                    </td>
                </tr>
			    <tr>
                    <td>
                        <div class="form-inline">
                          <div class="form-group">
                                <label for="email">Country:&emsp;</label>
                               <select class="form-control" id="country" name="country">
                                    <option value="" selected></option>
                                    <option value="China">China</option>
                                    <option value="Australia">Australia</option>
                                    <option value="korea">korea</option>                                  
                            </select>
                          </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-inline">
                          <div class="form-group">
                                <label for="email">State:&emsp;</label>
                            <select class="form-control" id="state" name="state">
                                    <option value="" selected></option>
                                    <option value="Yongzhou">Yongzhou</option>
                                    <option value="Changsha">Changsha</option>
                                    <option value="Zhuzhou">Zhuzhou</option>                           
                            </select>
                          </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-inline">
                          <div class="form-group">
                                <label>City:&emsp;</label>
                            <select class="form-control" id="state" name="state">
                                    <option value="" selected></option>
                                    <option value="Lingling">Lingling</option>
                                    <option value="Lengshuitan">Lenshuitan</option>
                                    <option value="Lanshan">Lanshan</option>  
									                              
                            </select>
                          </div>
                        </div>
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Satisfaction:&emsp;</label>&emsp;&nbsp;&nbsp;
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="gander_male" checked value="yes"> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="gander_female" value="no"> No
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br/><br/><hr/>
                        <input class="btn btn-primary" type="submit" style="width: 120px;" name="sub" value="Submit">&emsp;
                        <input class="btn btn-default" type="reset" name="sub" value="Reset">
                    </td>
                </tr>
            </table>
            <span class="form-group">
            <input type="email" class="form-control" style="width: 533px;" name="email" id="email" placeholder="">
            </span>
        </form>
        <br/><br/>
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
<script type="text/javascript" language="javascript">
    <?php if(!empty($res)): ?>
    $('#error_tip').html('<?php echo $res; ?>');
    $('#error').modal('show');
    $('#btn').unbind();
    $('#btn').click(function(){
        hideModal('');
    });
    <?php endif; ?>
    $("#last_name").focus();
    function checkForm(){
        var lastName = $("#last_name").val().trim();
        var firstName = $("#first_name").val().trim();
        var gender = $("input:radio[name='gender']:checked").val();
        var email = $("#email").val().trim();
        var campus = $("#state").val();

        var flag = false;

        if(lastName == ''){
            $('#error_tip').html('Please enter your Last Name');
            $('#error').modal('show');
            $('#btn').unbind();
            $('#btn').click(function(){
                hideModal('last_name');
            });
        }
        else if(firstName == ''){
            $('#error_tip').html('Please enter your First Name');
            $('#error').modal('show');
            $('#btn').unbind();
            $('#btn').click(function(){
                hideModal('first_name');
            });
        }
        else if(email == ''){
            $('#error_tip').html('Please enter your Email');
            $('#error').modal('show');
            $('#btn').unbind();
            $('#btn').click(function(){
                hideModal('email');
            });
        }
        else if(campus == ''){
            $('#error_tip').html('Please choose State');
            $('#error').modal('show');
            $('#btn').unbind();
            $('#btn').click(function(){
                hideModal('state');
            });
        }
        else{
            flag = true;
        }

        return flag;
    }

    function hideModal(ele){
        $('#error').modal('hide');
        if(ele != ''){
            $('#'+ele).focus();
        }
        else{
            $("#last_name").focus();
        }
    }

</script>
</body>
</html>