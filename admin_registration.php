<!DOCTYPE html>
<html>
<head>
  <title>Admin Registration</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
      *{
        margin : 0;
        padding : 0;
      }
      a{
        text-decoration: none;
      }
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
      body{
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
      }
      .error-msg{
        color:  red;
      }
      .error-msg > i{
        margin-right: 5px;
      }
    .progress-bar-container {
        width: 100%;
        margin-top: 5px;
        border-radius: 3px;
    }

    #progress-bar {
        background: rgb(90, 129, 52);
        height: 25px;
        width: 0%;
        display: flex;
        color: white;
        justify-content: center;
        align-items: center;
        border-radius: 3px;
}
    </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script type="text/javascript">
       
      $(document).ready(function(){
          $(document).on('submit','#myform',function(){
          console.log('form')
          var fName = document.getElementById('fName').value;
          var lName = document.getElementById('lName').value;
          var gen = document.getElementsByName('gender')
          var gender = ''
          for(i=0; i<gen.length; i++){
            if(gen[i].checked){
              gender = gen[i].value
            }
          }
          var st = document.getElementById('state').value;
          var add = document.getElementById('address').value;
          var em = document.getElementById('email').value;
          var pass = document.getElementById('pass').value;
          var inst = document.getElementById('institution').value;
          var db = document.getElementById('dob').value;
          var con = document.getElementById('contact').value;
          var conpa = document.getElementById('confpass').value;
          url = 'registration.php';
          $('#message-form-submition').load(url,{
            firstname : fName,
            lastname : lName,
            contact : con,
            gender : gender,
            state : st,
            dob : db,
            address : add,
            institution : inst,
            email : em,
            password : pass,
            confirm_password : conpa
          });
          return false;
        });
      });

      function onClickBlackCover(){
        document.getElementsByClassName('black-cover')[0].style.display = 'none';
        document.getElementsByClassName('popup-container')[0].style.display = 'none';
      }
      function showPopupContainer(){
        document.getElementsByClassName('black-cover')[0].style.display = 'block';
        document.getElementsByClassName('popup-container')[0].style.display = 'block';
      }
      </script>
      
      <script>
          let percentage = 0;
          let interval

          function progressBar() {
              let pgBar = document.getElementById('progress-bar')
              percentage++;
              pgBar.style.width = percentage + '%'
              pgBar.innerHTML = percentage + '%'
              if (percentage >= 100) {
                  clearInterval(interval)
                  location.href=  'admin_dashboard.php'
              }
          }

      </script>
      <link rel="stylesheet" href="css/custom/admin-registration.css">
      <script src="https://kit.fontawesome.com/f9bbf9ac4e.js"></script>
</head>
<body>
  <header>
          <a style="line-height: 0" id="home-link" href="index.php" class="ml-25px"><span><label class="mg-0" style="font-weight:100">QuizWit</label></span></a>
  </header>
  <div class="header-padding"></div>
  <div class="wrapper">
      <div class="form-container">
            <form id="myform" style="margin-top: 5px;" class="white" action="registration.php" method="POST" >
            <h3 style="font-family:monospace; width: 100%;margin-bottom: 25px; text-align: center; font-weight: bold; color: #2980b9;font-size:23px;" >Admin Registration</h3>
            <div class="input-container-style">
                  <label class="input-label">First Name</label>
                  <input class="form-input-style" oninput="var x = this.value; this.value=x.toUpperCase();" id="fName" type="text" name="firstname">
            </div>
            <div class="input-container-style">
                  <label>Last Name</label>
                  <input oninput="var x = this.value; this.value=x.toUpperCase();" id="lName" type="text" name="lastname">
            </div>
            <div class="input-container-style"> 
                <div class="select-option-container w-330px ht-50px">
                    <label class="">
                        <input type="radio" name="gender" value="male">
                        <span>
                            Male
                        </span>
                    </label>
                    <label class="">
                        <input type="radio" name="gender" value="female">
                        <span>
                            Female
                        </span>
                    </label>
                    <label class="">
                        <input type="radio" name="gender" value="others">
                        <span>
                            Others
                        </span>
                    </label>
                </div>
                  <!-- <label>Gender</label>
                  <select id="gender" name="gender" class="form-control custom-select select-exam grey-text">
                        <option value disabled>--Select Gender--</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                  </select> -->
            </div>
            <div class="input-container-style">     
              <label>Contact</label>
              <input  class="input-label" id="contact" type="number" name="contact">
            </div>
            <div class="select-container-style">
                  <select id="state" name="state" class="grey-text">
                        <option value="">Select State</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                    </select>
                </div>
                <div class="input-container-style"> 
                    <label class="input-label">Address</label>
                    <input id="address" type="text" name="address">
                </div>
                <div class="input-container-style">    
                    <label class="input-label">E-mail</label>
                    <input id="email" type="email" name="email">
                </div>
                <div class="input-container-style">
                    <label class="input-label">Password</label>
                    <input  type="password" name="password" id="pass">
                </div>
                <div class="input-container-style">    
                    <label class="input-label">Cofirm Passowrd</label>
                    <input type="password" name="confirm_password" id="confpass">
                </div>
                <div class="input-container-style">    
                    <label class="input-label">Institution</label>
                    <input id="institution" type="text" name="institution" >
                </div>
                <div class="input-container-style">
                    <label class="input-label">Date Of Birth</label>
                    <input id="dob" type="date" name="dob">
                </div>    
                <div class="input-container-style">
                    <input id="submit-form-btn" type="submit" value="REGISTER" >
                </div>
                  <div class="popup-container">
                     <div id="message-form-submition" class="center"></div>
                  </div>
            </form>
      </div>

    <div onclick='onClickBlackCover()' class="black-cover">
      
    </div>
      
  <footer>
    © 2020 Provision. All rights reserved
  </footer>
  </div>
</body>

</html>