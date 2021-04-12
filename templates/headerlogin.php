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
    
  
    <style type="text/css">
    body{
      /* font-family: monospace; */
    }
      .incorrect-key{
          position: absolute;
          top : 50%;
          left : 50%;
          transform: translate(-50%,-50%);
          border : 0.5px solid #bdc3c7;
          border-radius: 5px;
          height: 100px;
          width: 200px;
          background: white;
    box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 60%);
          position: fixed;
          z-index: 4;
          display: none;
      }
      .already-given-exam-popup{
          position: absolute;
          top : 50%;
          left : 50%;
          transform: translate(-50%,-50%);
          border : 0.5px solid #bdc3c7;
          border-radius: 5px;
          height: 100px;
          width: 200px;
          background: white;
    box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 60%);
          position: fixed;
          z-index: 4;
          display: none;
      }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">

      .black-cover{
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        left : 0;
        top : 0;
        position: fixed;
        width: 100%;
        height: 100vh;
        background: rgba(75, 75, 75,0.5);
        z-index: 3;
        display:none;
      }
        .start-exam-popup{
          position: absolute;
          top : 50%;
          left : 50%;
          transform: translate(-50%,-50%);
          border : 0.5px solid #bdc3c7;
          border-radius: 15px;
          height: 500px;
          width: 500px;
          background: white;
    box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 40%);
          position: fixed;
          z-index: 4;
          display: none;
          padding: 25px 0px;
        }
        .popup-btn-container{
          display: flex;
          justify-content: space-between;
          align-items: center;
          height: 40px;
          padding: 0px 20px;
          align-self: flex-end;
        }
        #start-exam-btn{

          width: 100px;
          height: 35px;
          color: white;
          background: #4caf50;
          border-radius: 3px;
          border : none;
        }
        #start-exam-btn:hover, #cancel-btn:hover{
          box-shadow: 0px 0px 20px 0px rgb(0 0 0 / 60%);
        }
        #cancel-btn{

          width: 100px;
          height: 35px;
          color: white;
          background: #979797;
          border-radius: 3px;
          border : none;
        }
        #start-exam-btn, #cancel-btn{
          outline: none;
        }
        #attemp-output ul{

          font-size: 17px;
        }
        #attempt-output ul li{
          padding: 3px;
        }
      @media screen and (max-width: 600px){
      .list-icon{
        position: absolute;
        left: -10px;
        top : 7px;
      }
      .sub-list-icon{

        position: absolute;
        left: -15px;
        font-size: 12px;
        top : 7px;
      }

          .start-exam-popup{
            width: 343px;
            height: 461px;
          }
          .start-exam-popup ul{
            font-size: 13px;
          }
      }
      #submit-btn{
        background: #2980b9;
        color: white;
        height: 35px;
        border-radius: 5px;
        border : none;
        width: 150px;
      }
      #submit-btn:focus{
        outline: none;
      }
      .instruction-container{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
      }
      .instruction-container > label{
        font-size: 20px;
        font-weight: bold;
      }
      .inst-list-container{
        padding-left: 20px;
        padding-right: 5px;
      }
      .inst-list-container ul li{
        position: relative;
      }
      .list-icon{
        position: absolute;
        left: -10px;
        top : 7px;
      }
      .sub-list-icon{
        position: absolute;
        left: -15px;
        font-size: 12px;
        top : 7px;
      }
      .close-smallpopup{
        height: 30px;
        width: 80px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 5px;
        background: #ecf0f1;
        cursor: pointer;
        font-weight: 500;
      }
      .small-popup{
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: center;
        height: 100%;
      }

      #home-link{
        border : 0.5px solid #bdc3c7;
        background:#2980b9;
        color: white;
        padding: 5px 15px; 
        border-radius: 3px;
        height: 35px;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      #logout-link{
        border : 0.5px solid #bdc3c7;
        background:#445560;
        color: white;
        padding: 8px 15px; 
        border-radius: 3px;
        height: 35px;
      }
      #logout-link > i{
        display: inline;
      }
    </style>
<script src="https://kit.fontawesome.com/f9bbf9ac4e.js"></script>
    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="grey lighten-4">
	<nav  style="box-shadow:0px 0px 18px 0px rgba(0,0,0,0.6);" class="white">
		<div class="container" style="height:100%;display:flex;justify-content: space-between;align-items: center;">
          <a style="line-height: 0" id="home-link" href="index.php"><span><b>Home</b></span></a>
          <a style="line-height: 0" id="logout-link" href="logout.php"><i class="fa fa-sign-out"></i> <b>Logout</b></a>
		</div>
	</nav>
	
