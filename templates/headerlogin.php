<head>
	 <!-- Compiled and minified CSS -->
    
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/materialize.css" rel="stylesheet">

     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

       <script>
            function check_password()
            {
                  var x = document.getElementById("pass").value;
                  var y = document.getElementById("confpass").value;
                  if(x==y)
                        return true
                  else {alert("password not matched"); return false;}
            }
      </script>
    
  <link rel="stylesheet" href="css/custom/header_login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/f9bbf9ac4e.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="grey lighten-4">
	<nav  style="height:70px;box-shadow:0px 0px 18px 0px rgba(0,0,0,0.6);position:fixed;background: linear-gradient(356deg, #171733, #3b72c0);" class="header" style="display:flex;">
		<div class="" style="height:100%;display:flex;justify-content: space-between;align-items: center;">
          <a style="line-height: 0" id="home-link" href="index.php" class="ml-30px"><span><h4 style="font-weight:100" class="mg-0">QuizWit</h4></span></a>
          <a style="line-height: 0" id="logout-link" href="logout.php" class="mr-30px"><i class="fa fa-sign-out"></i> <b>Logout</b></a>
		</div>
	</nav>
  <div style="height:64px;"></div>
	
