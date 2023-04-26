<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>home</title>
    <link rel="stylesheet" href="css/bootstrap-3.3.5.min.css">
    <link rel="stylesheet" href="css/bootstrap-3.3.5-theme.min.css">
    <link rel="stylesheet" href="css/basic.css">
    <link rel="stylesheet" href="css/home.css">
	<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="js/bootstrap-3.3.5.min.js" type="text/javascript"></script>
</head>
<body>
<div id="header">
    <div class="container">
        <div class="header-title">
            <h1>Thank you</h1>
            <p class="big-name">ONLINE SURVEY</p>
        </div>

        <div id="links">
           <ul class="links-ul">
               <li class="cur"><a href="home.php">Home</a></li>
                <li><a href="people.php">People</a></li>
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
        <span id="time"></span>
        <h2 class="intro_title">introduction of this online survey website</h2>
        <hr/>
        <p class="intro_content">
           this is a simple online website developed by yuqianghu to take a online survey.
		   there have 5 pages which are "home" the homepage, "people" page that show the information of users, the "online survey" page           which is to have a online survey. people can sign in and sign up in the "Enrollment" page. users can still click the "contact           us" to get more conmunication information. 
		  
        </p>
    </div>
</div>


<div id="main">
    <div class="container">
        <h2 class="intro_title">Survey Items</h2> 
		<p>There are some questions on the picture of online survey.</p>
        <hr/>
        <img onClick="showDetail(this)" src="images\yuqianghu_home1.png" alt="how long for an advertise is ok" data-information="how long for an advertise is ok" width="400" class="img-thumbnail pull-left book_pic">
        <img onClick="showDetail(this)" src="images\yuqianghu_home2.png" alt="how long you will cost in the advertise" data-information="how long you will cost in the advertise" width="400" class="img-thumbnail pull-left book_pic">
        <img onClick="showDetail(this)" src="images\yuqianghu_home3.png" alt="have you really notised the advertise" data-information="have you really notised the advertise" width="400" class="img-thumbnail pull-left book_pic">  
  
    </div>
</div>
<div class="clearfix"></div>
<div class="modal fade" id="detail" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p>
                    <span id="book_title"></span>
                    <span id="book_information" class="pull-right"></span>
                </p>
                <img id="book_pic" src="" alt="book Style6" width="570">
            </div>
            <div class="modal-footer">
                <button type="button" id="btn" class="btn btn-default" data-dismiss="modal">close</button>
            </div>
        </div>
    </div>
</div>


<?php include_once "common/footer.common.html"; ?>
</body>
<script>
    function showDetail(tag){
        var src = tag.getAttribute('src');
        var alt = tag.getAttribute('alt');
        var information = tag.getAttribute('data-information');
        $('#book_title').html(alt);
        $('#book_information').html(information);
        $('#book_pic').attr('src', src);
        $('#detail').modal('show');
    }
</script>
// show the time 
<script>
    function showtime()
    {
        var today,hour,second,minute,year,month,date;
        var strDate;
        today=new Date();
        var n_day = today.getDay();
        switch (n_day)
        {
            case 0:{
                strDate = "Sun"
            }break;
            case 1:{
                strDate = "Mon"
            }break;
            case 2:{
                strDate ="Tue"
            }break;
            case 3:{
                strDate = "Wen"
            }break;
            case 4:{
                strDate = "Thu"
            }break;
            case 5:{
                strDate = "Fri"
            }break;
            case 6:{
                strDate = "Sat"
            }break;
            case 7:{
                strDate = "Sun"
            }break;
        }
        year = today.getFullYear();
        month = today.getMonth()+1;
        date = today.getDate();
        hour = today.getHours();
        if(hour < 10){
            hour = '0'+hour;
        }
        minute =today.getMinutes();
        if(minute < 10){
            minute = '0'+minute;
        }
        second = today.getSeconds();
        if(second < 10){
            second = '0'+second;
        }
        document.getElementById('time').innerHTML = year + "-" + month + "-" + date + " " + strDate +" " + hour + ":" + minute + ":" + second; //显示当时时间copy from 百度 啊哈哈哈
        setTimeout("showtime();", 1000); 
    }
    showtime();
</script>
</html>