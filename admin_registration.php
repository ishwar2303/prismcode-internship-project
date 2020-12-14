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

    </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script type="text/javascript">
       
      $(document).ready(function(){
              $(document).on('submit','#myform',function(){
          var fName = document.getElementById('fName').value;
          var lName = document.getElementById('lName').value;
          var gen = document.getElementById('gender').value;
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
            gender : gen,
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
      <style type="text/css">
        .popup-container{
          position: absolute;
          top : 50%;
          left : 50%;
          transform: translate(-50%,-50%);
          border : 0.5px solid #bdc3c7;
          border-radius: 15px;
          height: 220px;
          width: 300px;
          display: ;
          background: white;
          box-shadow: 0px 0px 3px 0px black;
          position: fixed;
          z-index: 4;
          display: none;
        }
        #message-form-submition{
          display: flex;
          justify-content: space-evenly;
          align-items: center;
          flex-direction: column;
          height: 100%;
        }
        #submit-form-btn{
          color: white;
          background: #2980b9;
          border : none;
          margin-top: 30px;
          width: 310px;
          font-weight: bold;
          display: flex;
          justify-content: center;
          align-items: center;
          border-radius: 5px;
        }
        #submit-form-btn:focus{
          outline: none;
        }

input{
  width: 300px;
  height: 40px;
  margin-top: 10px;
  border-radius : 5px;
  border : 0.5px solid #bdc3c7;
  padding: 0px 5px;
  font-size: 17px;
}
input:focus{
  outline : none;
  box-shadow: 0px 0px 0px 3px rgba(52, 152, 219,0.5); 
  border-color: #3498db;
}
select{
  width: 310px;
  height: 40px;
  margin-top: 10px;
  border-radius : 5px;
  border : 0.5px solid #bdc3c7;
  font-size: 17px;
}
select:focus{
  outline : none;
  box-shadow: 0px 0px 0px 3px rgba(52, 152, 219,0.5);
  border-color: #3498db;
}
header{
  height: 60px;
  width: 100%;
  display: flex;
  align-items: center;
}
footer{
  background: #4b4b4b;
  color: white;
  height: 60px;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
}
.form-container{
  display: flex;
  justify-content: center;
  background: #ecf0f1;
  flex : 1;
width: 100%;
align-items: center;
}
form{
  padding: 20px 10px; 
  width: 800px;
  border-radius: 10px;
  background: white;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-evenly;
}
  .wrapper{
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    align-items: center;
    height: 100vh;
  }
  .input-label-wrap{
    display: flex;
    flex-direction: column;
    justify-content: center;
    margin-top: 10px;
  }
  .input-label-wrap > label{
    color : #9e9e9e;
    font-weight: bold;    
  }
      #home-link{
        border : 0.5px solid #bdc3c7;
        background:#2980b9;
        color: white;
        padding: 5px 10px; 
        border-radius: 5px;
        height: 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 50px;
        margin-left: 25px;
      }

      @media screen and (max-width: 650px){
        form{
          padding: 20px 0px;
          width: 100%;
        }
        input{
          width: 280px;
        }
        select{
          width: 290px;
        }
        #submit-form-btn{
          width: 290px;
        }
        header{
          padding: 10px 0px;
        }
        footer{

          padding: 20px 0px;
        }
      }
      </style>
</head>
<body>
  <div class="wrapper">
  <header>
    
          <a style="line-height: 0" id="home-link" href="index.php"><span><b>Home</b></span></a>
  </header>
      <div class="form-container">
            <form id="myform" style="margin-top: 5px;" class="white" action="registration.php" method="POST" >
            <h3 style="width : 100%;margin-bottom: 15px; text-align: center; font-weight: bold; color: #2980b9" >Admin Registration</h3>
            <div class="input-label-wrap">
                  <label>First Name</label>
                  <input oninput="var x = this.value; this.value=x.toUpperCase();" id="fName" type="text" name="firstname" required>
            </div>
            <div class="input-label-wrap">
                  <label>Last Name</label>
                  <input oninput="var x = this.value; this.value=x.toUpperCase();" id="lName" type="text" name="lastname" placeholder="optional">
            </div>
            <div class="input-label-wrap"> 
                  <label>Gender</label>
                  <select id="gender" name="gender" class="form-control custom-select select-exam grey-text">
                        <option value disabled>--Select Gender--</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                  </select>
            </div>
            <div class="input-label-wrap">     
            <label>Contact</label>
            <input id="contact" type="number" name="contact" required>
            </div>
            <div class="input-label-wrap">
                  <label>State</label>
                  <select id="state" name="state" class="grey-text">
                                    <option value disabled>--Select State--</option>
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
                <div class="input-label-wrap"> 
                    <label>Address</label>
                    <input id="address" type="text" name="address" required>
                </div>
                <div class="input-label-wrap">    
                    <label>E-mail</label>
                    <input id="email" type="email" name="email" required>
                </div>
                <div class="input-label-wrap">
                    <label>Password</label>
                    <input  type="password" name="password" id="pass" required>
                </div>
                <div class="input-label-wrap">    
                    <label>Cofirm Passowrd</label>
                    <input type="password" name="confirm_password" id="confpass" required>
                </div>
                <div class="input-label-wrap">    
                    <label>Institution</label>
                    <input id="institution" type="text" name="institution" placeholder="optional">
                </div>
                <div class="input-label-wrap">
                    <label>Date Of Birth</label>
                    <input id="dob" type="date" name="dob" required>
                </div>    
                <div class="input-label-wrap">
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