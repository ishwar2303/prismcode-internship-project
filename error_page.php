
<!DOCTYPE html>
<html>
<head>
	<title>Error Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
		}
		body{
			background: #4b4b4b;
		}
		#triangle{
			font-size: 150px;
			color :  #FA990A;
		}
		.error-page-img{
		width : 350px; 
		height: 350px;
		}
		.wrapper{
			height: 100vh;
			font-family: verdana;
			display: flex;			
		}
		.wrapper > div{
			display: flex;
			flex : 1;
			justify-content: center;
			align-items: center;
		}
		.wrapper > div:nth-child(1){
			display: flex;
		}
		.wrapper > div:nth-child(2){
			display: flex;
			flex-direction: column;
			justify-content: space-evenly;

		}
		.wrapper > div:nth-child(2) > label{
			color: white;
			font-size: 20px;
		}
		#try-again-btn{
			width: 250px;
			height: 40px;
			border-radius: 10px;
			font-size: 17px;
			border : none;
			color: white;
			background: linear-gradient(45deg,#2980b9,#3498db);
		}
		#try-again-btn:hover{
			cursor : pointer;
			background: linear-gradient(45deg,#3498db,#2980b9);
		}
		#try-again-btn:focus{
			outline: none;
		}
		@media screen and (max-width: 600px){
			
		#triangle{
			font-size: 50px;
			color :  #FA990A;
		}
		.error-page-img{
		width : 150px; 
		height: 150px;
		}
		.wrapper{
			font-family: verdana;
			display: flex;
			flex-direction: column;
			height: 460px;			
		}
		.wrapper > div{
			display: flex;
			width: 100%;
			justify-content: center;
			align-items: center;
		}
		.wrapper > div:nth-child(1){
			display: flex;
		}
		.wrapper > div:nth-child(2){
			display: flex;
			flex-direction: column;
			height: 300px;
			justify-content: space-evenly;

		}
		.wrapper > div:nth-child(2) > label{
			color: white;
			font-size: 12px;
		}
		#try-again-btn{

		}
		}
	</style>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="wrapper">
		<div class="img-container">
                <img class="error-page-img" src="images/robot_sticker.png">
		</div>
		<div class="content-container">
			<i id="triangle" class="fas fa-exclamation-triangle"></i>
			<label>ERROR 502</label>
			<label class="bad-gateway-msg">Bad Gateway Problem in connecting with database!</label>
			<label class="bad-gateway-msg">Try again Later</label>
			<button id="try-again-btn" onclick="location.href='index.php';">Try Again</button>
		</div>
	</div>
</body>
</html>