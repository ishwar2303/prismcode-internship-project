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
      <style type="text/css">
      .select-container-style{
        margin-bottom: 15px;
      }
      .success-msg{
        color: green;
        display: flex;
        flex-direction: column;
      }
        .popup-container{
          min-width: 300px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    border: 0.5px solid #bdc3c7;
    border-radius: 5px;
    /* height: 220px; */
    /* width: 300px; */
    display: ;
    background: white;
    box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 60%);
    position: fixed;
    z-index: 4;
    padding: 20px 30px;
    display: none;
        }
        #message-form-submition{
          display: flex;
          justify-content: space-evenly;
          /* align-items: center; */
          flex-direction: column;
          height: 100%;
        }
        #submit-form-btn{
          color: white;
          background: #2980b9;
          border : none;
          width: 330px;
          display: flex;
          font-size: 15px;
          justify-content: center;
          align-items: center;
          border-radius: 5px;
        }
        #submit-form-btn:hover{
          box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
        }
        #submit-form-btn:focus{
          outline: none;
        }


select{
  width: 330px;
  height: 50px;
  /* margin-top: 10px; */
  border-radius : 3px;
  border : 0.5px solid #bdc3c7;
  font-size: 14px;
  padding: 0px 10px;
}
select:focus{
  outline : none;
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

#home-link{
  /* border : 0.5px solid #bdc3c7; */
  /* background:#296389; */
  color: #296389;
  padding: 5px 15px; 
  border-radius: 3px;
  /* height: 35px; */
  display: flex;
  justify-content: space-between;
  align-items: center;
}

      @media screen and (max-width: 650px){
        form{
          padding: 20px 0px;
          width: 100%;
        }
        input{
          width: 280px;
        }
        /* select{
          width: 290px;
        } */
        #submit-form-btn{
          width: 290px;
        }
        header{
          /* padding: 10px 0px; */
        }
        footer{

          padding: 20px 0px;
        }
      }
      
.input-container-style{
    position: relative;
    margin-bottom: 15px;
}
.input-container-style > input{
    border : 0.5px solid rgba(0,0,0,0.5);
    border-radius: 3px;
    height: 50px;
    padding : 0px 15px;
    width: 300px;
    font-size : 15px;
}

.input-container-style > input:focus{
    outline : none;
    border-color: rgba(0,0,255,0.5);
    box-shadow: 0px 0px 0px 3px rgba(0,0,255,0.2);
    transition: 400ms;
}

.input-container-style > label{
    position: absolute;
    left : 8px;
    top : -10px;
    background: white;
    padding : 0px 3px;
    color : blue;
    transition: 400ms;
    font-size: 14px;
}

/* select-option-button*/
.w-330px{
  width: 330px;
}
.w-150px {
    width: 150px;
}

.w-300px {
    width: 300px;
}

.select-option-container {
    display: flex;
    font-family: -webkit-pictograph;
}

.select-option-container>label {
    cursor: pointer;
    border-collapse: collapse;
    display: flex;
    flex: 1;
}

.select-option-container>label:last-child>span {
    border-bottom-right-radius: 3px;
    border-top-right-radius: 3px;
    border-right: 4px solid #3c9cda;
}

.select-option-container>label:first-child>span {
    border-bottom-left-radius: 3px;
    border-top-left-radius: 3px;
    border-left: 4px solid #3c9cda;
}

.select-option-container>label>input {
    display: none;
}

.select-option-container>label>input:checked~span {
    background: #3c9cda;
    color: white;
}

.select-option-container>label>span {
    display: flex;
    justify-content: center;
    align-items: center;
    flex: 1;
    padding: 7px 15px;
    background: white;
    border-radius: inherit;
    border: 4px solid #3c9cda;
    border-right: none;
    border-left: 4px solid #3c9cda;
}

.select-option-container>label>:hover {}

.select-option-container>label>span:hover {
    background: rgba(32, 32, 32, 0.1);
}
      #home-link{
        /* border : 0.5px solid #bdc3c7; */
        /* background:#296389; */
        color: #296389;
        padding: 5px 15px; 
        border-radius: 3px;
        /* height: 35px; */
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      header{
    height: 70px;
    display: flex;
    align-items: center;
    font-size: 26px;
    font-weight: 100;
    position: fixed;
    width: 100%;
    background: white;
    z-index: 50;
    box-shadow:0px 0px 18px 0px rgba(0,0,0,0.6);
}
header a span label{
    font-weight: 400;
    font-size: 35px;
  cursor: pointer;}
  .header-padding{
    height: 60px;
  }
  .ml-25px{
    margin-left: 25px;
  }
  /* @media screen and (max-width: 600px){
    .header-padding{
      height: 75px;
    }
  } */
      </style>

      <script src="https://kit.fontawesome.com/f9bbf9ac4e.js"></script>
</head>
<body>
  <header>
          <a style="line-height: 0" id="home-link" href="index.php" class="ml-25px"><span><label class="mg-0">QuizWit</label></span></a>
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
                <div class="select-option-container w-330px">
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