﻿<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">  

<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">

<head>
	<title>註冊過程</title>

	<style type="text/css">

		body {		
			background-image: url(songla.png);
			background-color:transparent; 
			background-repeat:  no-repeat;
			background-attachment: auto;			
			background-position: center top;
			background-size: auto; 
            width: 50%;
			padding:50px;
			padding-left: 10%;

			/*color: ; 文字白色*/
 			/*div.st加背景圖片並定義與圖片同尺寸*/
 			opacity:;
 			}

 		h1{
			font-size: 50px;                  /*設定字體大小*/
			font-family: Microsoft JhengHei;  /*微軟正黑體*/
			font-weight: 50px;                /*設定粗細*/
			color: black;
			vertical-align: auto;             /*定義內文垂直對齊方式*/
			text-align: center;
		}

 		.button{
 			border: none;
 			color: white;
 			padding: 14px 28px;
 			font-size: 16px;
 			cursor: pointer;
 		}

	</style>

</head>
<body class="templatemo-bg-gray">
	<div class="container">
		<div class="col-md-13">
			<!--<h1 class="text-center margin-bottom-13"></h1>	<br>-->	
				<form class="form-horizontal templatemo-contact-form-2 templatemo-container"  role="form" >
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">				          		          	
				           		<div class="col-sm-12">

<?php

session_start();

$id=$_POST["id"];
$pwd=$_POST["pwd"];
$pwd1=$_POST["pwd1"];
$gender=$_POST["sex"];

$link=@mysqli_connect('localhost'
					 ,'root'
					 ,'q1633218932'
					 ,'final_database' );
$sql_INSERT="INSERT into userdata(username,password,gender) VALUES ('$id','$pwd','$gender')"; 
$sql="SELECT * FROM userdata WHERE username = '$id'";
$result = mysqli_query($link,$sql);
$row = @mysqli_fetch_row($result);



if($pwd==$pwd1 && $row[0]!=$id){
	if(mysqli_query($link,$sql_INSERT)){
		echo "<center>註冊成功，三秒後跳轉至登入頁面</center>";
		header('Refresh:3;url=Index.php');
	}
}elseif($pwd==$pwd1 && $row[0]==$id){
	echo "<center>註冊失敗，帳號重複，3秒後自動跳回上頁</center>";
	header("Refresh:3;url=Register.php");
}else{
	echo "<center>註冊失敗，密碼有誤，3秒後自動跳回上頁</center>";
	header("Refresh:3;url=Register.php");
}

?>


				           		</div>
				           	</div>
				        </div>
				   	</div>
				</form>
		</div>
	</div>
</body>
</html>
