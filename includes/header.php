<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <script>
      function change_check(ID,check_id)
      {
        var x = document.getElementsByClassName("check-state"); 
        
        if(x[check_id].checked==false)
          x[check_id].checked = false;
        else x[check_id].checked = true;
        location.href="toggle_state.php?quizID="+ID;
      }

    </script>


  <!-- Custom fonts for this template-->
  <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<script src="https://kit.fontawesome.com/f9bbf9ac4e.js"></script>
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="css/dashboard.css" rel="stylesheet">
     <style>
    /* questionnaire.php */
    
    .updating-msg,.deleting-msg{
      position: absolute;
      left: 50%;
      top: 100px;
      transform: translate(-50%,0%);
      background: #467fcf;
      color: white;
      border-radius: 3px;
      padding: 15px 20px; 
      z-index: 4;
      position: fixed;
      display: none;
      min-width: 250px;
      text-align: center;
    }
    .updating-msg i, .deleting-msg i{
      margin-left: 10px;
    }
    .updated-successfully{
      position: absolute;
      left: 50%;
      top: 100px;
      transform: translate(-50%,0%);
      background: #68a030;
      color: white;
      border-radius: 3px;
      padding: 15px 20px; 
      z-index: 4;
      position: fixed;
      display: none;
      min-width: 250px;
      text-align: center;
    }
    .updated-successfully i{
      margin-left: 10px;
    }
    .deleted-successfully, .error-in-updating{
      position: absolute;
      left: 50%;
      top: 100px;
      transform: translate(-50%,0%);
      background: #cd201f;
      color: white;
      border-radius: 3px;
      padding: 15px 20px; 
      z-index: 4;
      position: fixed;
      display: none;
      text-align: center;
      min-width: 250px;
    }
    .deleted-successfully i{
      margin-left: 10px;
    }
    .error-in-updating i{
      margin-right: 10px;
    }
    #close-error-in-updating{
    border: none;
    border-radius: 3px;
    padding: 5px 15px;
    margin-left: 10px;
  }
    .set-container{
      position: relative;
    }
    .edit-icon{
      position: relative;
      cursor: pointer;
      background: #4077c4;
      position: absolute;
      right: 36px;
      color: white;
      width: 30px;
      top: 5px;
      font-size: 25px;
      z-index: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 30px;
      font-size: 14px;
      border-top-left-radius: 3px;
      border-bottom-left-radius: 3px;
    }
    
    .edit-icon:hover{
      box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.6);
    }
    .edit-icon:hover > .edit-hint{
      display: block;
    }
    .update-question{
      position: relative;
      background: #3498db;
      cursor: pointer;
      display: none;
      position: absolute;
      right: 36px;
      top: 5px;
      font-size: 25px;
      z-index: 1;
      width: 30px;
      height: 30px;
      color: white;
      display: none;
      font-size: 14px;
      justify-content: center;
      align-items: center;
      border-top-left-radius: 3px;
      border-bottom-left-radius: 3px;
    }
    .update-question:hover{
      box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.6);
    }
    .update-question:hover > .update-hint{
      display: block;
    }
    .delete-question{

      background: #cd201f;
      cursor: pointer;
      position: absolute;
      right: 6px;
      top: 5px;
      font-size: 25px;
      z-index: 1;
      width: 30px;
      height: 30px;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 14px;
      border-top-right-radius: 3px;
      border-bottom-right-radius: 3px;
    }
    .delete-question:hover{
      box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.6);
    }
    .delete-question:hover > .delete-hint{
      display: block;
    }
    .edit-hint{
      padding: 0px 5px;
      background: black;
      opacity: 0.8;
      border-radius: 3px;
      color : white;
      display: none;
      position: absolute;
      left : 0px;
      top : 40px;
      font-size: 12px;
    }
    .update-hint{

      padding: 0px 5px;
      background: black;
      opacity: 0.8;
      border-radius: 3px;
      color : white;
      display: none;
      position: absolute;
      left : 0px;
      top : 40px;
      font-size: 12px;
    }
    .delete-hint{

      padding: 0px 5px;
      background: black;
      opacity: 0.8;
      border-radius: 3px;
      color : white;
      display: none;
      position: absolute;
    right: 0px;
      top : 40px;
      font-size: 12px;
    }

    .block-theme-edit-icon{
      background: #3498db;
      cursor: pointer;
      display: flex;
      position: absolute;
      right: 36px;
      top: 5px;
      font-size: 25px;
      z-index: 1;
      width: 30px;
      height: 30px;
      color: white;
      font-size: 14px;
      justify-content: center;
      align-items: center;
      border-top-left-radius: 3px;
      border-bottom-left-radius: 3px;
    }
    .block-theme-delete-icon{

      background: #cd201f;
      cursor: pointer;
      position: absolute;
      right: 6px;
      top: 5px;
      font-size: 25px;
      z-index: 1;
      width: 30px;
      height: 30px;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 14px;
      border-top-right-radius: 3px;
      border-bottom-right-radius: 3px;
    }


    .block-theme-delete-icon:hover, .block-theme-edit-icon:hover{
      box-shadow: 0px 0px 7px 0px rgba(0,0,0,0.6);
      color: white;
      text-decoration: none;
    }
    .block-theme-edit-hint{
      padding: 3px 7px;
      background: black;
      opacity: 0.8;
      border-radius: 3px;
      color : white;
      display: none;
      position: absolute;
    right: 0px;
      top : 40px;
      font-size: 12px;
      text-align: center;
    }
    .block-theme-delete-hint{
      padding: 3px 7px;
      background: black;
      opacity: 0.8;
      border-radius: 3px;
      color : white;
      display: none;
      position: absolute;
    right: 0px;
      top : 40px;
      font-size: 12px;
      text-align: center;
    }
    
    .block-theme-delete-icon:hover > .block-theme-delete-hint{
      display: block;
    }
     .block-theme-edit-icon:hover > .block-theme-edit-hint{
      display: block;
    }
    .question-id{
      display: none;
    }
    /* questionnaire.php */

      .select-exam
    {
      width : 70%;
      margin-left: 0px;
    }
    .form-label{
      margin-left: 0px;
    }
    #check-button
    {
      width : 15%;
      font-family: courier new;
      font-size: large;
      padding: 2px;
    }
    .change-pass
    {
      width : 343px;
    }
    .image-input-container{
      position: relative;
      margin: 15px 0px;

    }
    .image-input-container > input{
      margin-left: 41px;
    }
    .choose-image-wrapper{
     height: 35px;
     display: flex;
    }
    #choose-input-field{
      display: none;
    }
    #choose-img-btn{
      height: 100%;
      display: flex;
      padding: 0px 10px;
      font-size: 13px;
      align-items: center;
      background: #6d6d6d;
      color: white;
     border : 0.5px solid #bdc3c7;
     border-radius: 3px;
     justify-content: center;
     cursor: pointer;
    }
    #choose-img-btn:hover{
    }
    .profile-photo-container{
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 5px;
     border : 0.5px solid #bdc3c7;
     padding: 5px;
     width: 160px;
     height: 160px;
    }
    .profile-photo-container > img{
    max-width: 100%;
    max-height: 100%;
  }
    #no-file-choosen{
      background: white;
      height: 35px;
      width: 53%;
      margin-left: 0px;
    }
    .open-close-sidebar{
      z-index: 3;
    }
    
     </style>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#choose-img-btn').click(function(){
          document.getElementById('choose-input-field').click();
        });
      });
    function confirmation()
    {
    
     y = confirm("Are you sure Exam will be permanentaly deleted (No backup)");

     if(y)
     return true;
     else return false;   
    }
    var toggleSideBar = 1;
    function hideSideBar(){
      if(toggleSideBar == 1){
      document.getElementsByClassName('open-close-sidebar')[0].style.display = 'block';
        document.getElementsByClassName('black-cover')[0].style.display = 'block';
      toggleSideBar = 0;
      }
      else{
      document.getElementsByClassName('open-close-sidebar')[0].style.display = 'none';
        document.getElementsByClassName('black-cover')[0].style.display = 'none';
      toggleSideBar = 1;

      }
    }
     </script>
<style type="text/css">
  .quiz-details-popup{
          position: absolute;
          top : 50%;
          left : 50%;
          transform: translate(-50%,-50%);
          border : 0.5px solid #bdc3c7;
          border-radius: 3px;
          height: 70vh;
          width: 75%;
          background: white;
    box-shadow: 0px 0px 20px 0px rgb(0 0 0 / 60%);
          position: fixed;
          z-index: 4;
          display: none;
          padding: 25px 0px;
      }
      .black-cover-quiz-details{
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
        display: none;
      }

      .black-cover-quiz-delete{
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
        display: none;
      }
      #quiz-details-content{
        overflow-y: scroll;
        height: 100%;
        padding: 0px 15px;
      }
.success-pop-up
{
  text-align: center;   
        padding: 10px 25px;
  color:white ;
  padding-top : 10px;
  border-radius: 5px;
  position: absolute;
  top : 40%;
  transform: translate(-50%,-50%);
  left: 50%;
  display: none;
  font-size: 16px;
  z-index: 5;
} 
</style>
</style>
     <style type="text/css">
      
      @media screen and (max-width: 780px){
        .left-padding{
          display: none;
        }
       #sidebarToggleTop{
        position: absolute;
        top : 7px;
        left : 0px;
        z-index: 2;
        width: 35px;
        height: 35px;
        position: fixed;
       }
       .open-close-sidebar{
        position: absolute;
        position: fixed;
        left: 0px;
        top : 0px;
        width: 200px;
        z-index: 4;
        display: none;
       }
       .col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col,
.col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm,
.col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md,
.col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg,
.col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl,
.col-xl-auto {
  position: relative;
  width: 100%;
  min-height: 1px;
  padding-right: 2px;
  padding-left: 2px;
}
.card-body1{
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  margin: 0;
  padding: 0.5rem 5px;
  position: relative;

}
.wrapper{
  flex-direction: column;
}
  .quiz-details-popup{
          position: absolute;
          top : 50%;
          left : 50%;
          transform: translate(-50%,-50%);
          border : 0.5px solid #bdc3c7;
          border-radius: 3px;
          height: 70vh;
          width: 98%;
          background: white;
          box-shadow: 0px 0px 3px 0px black;
          position: fixed;
          z-index: 4;
          display: none;
          padding: 25px 0px;
      }
      .timing, .passing, .level, .marks, .negative, .status{
        font-size: 12px;
      }
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
        display: none;
      }
      .print-result{
        /* width: 100px; */
        height: 30px;
        border-radius: 3px;
        color : white;
        border : none;
        box-shadow: 0px 0px 1px 0px black;
        background: #2980b9;
        font-size: 12px;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        padding: 0px 10px;
      }
      .print-result i{
        margin-right: 10px;
      }
      .print-result:focus{
        outline : none;
      }
      .reload-leaderboard{
        /* width: 100px; */
        height: 30px;
        border-radius: 3px;
        color : white;
        border : none;
        box-shadow: 0px 0px 1px 0px black;
        background: #90908f;
        font-size: 12px; 
        cursor: pointer;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        margin-right: 5px;
        padding: 0px 10px;

      }
      
      .reload-leaderboard:focus{
        outline: none;
      }
      .reload-leaderboard > i{
        margin-right: 10px;
      }
      .reaload-leaderboard:hover{
        background: #2980b9;
      }
      .leaderboard-heading{
        display: flex;
        margin-top: 5px;
        flex-direction: column;
        padding: 0px 20px;
      }
      .reload-print-container{
        display: flex;
        /* justify-content: space-between; */
        margin-top: 5px;
        width: 415px;
      }
      #delete-all-attempts{    
        /* width: 211px; */
        height: 30px;
        border-radius: 3px;
        color : white;
        border : none;
        box-shadow: 0px 0px 1px 0px black;
        background: #cd201f;
        font-size: 12px; 
        cursor: pointer;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        margin-right: 5px;
        padding: 0px 10px;
      }
      
      #delete-all-attempts  i{
        margin-right: 10px;
      }  
      #delete-all-attempts:hover{
        background: #c0392b;
      }
      #delete-all-attempts:focus{
        outline: none;
      }
     </style>
<script type="text/javascript">
  
      function onClickBlackCover(){        
          document.getElementsByClassName('black-cover')[0].style.display = 'none';  
          document.getElementsByClassName('open-close-sidebar')[0].style.display = 'none'; 
      toggleSideBar = 1;   
        }
      function showQuizDetailsPopup(){
        document.getElementsByClassName('black-cover-quiz-details')[0].style.display = 'block';
        document.getElementsByClassName('quiz-details-popup')[0].style.display = 'block';
      }
      var interval;
      var top_value = 40;
      function timer_on()
      {
        interval=setInterval(Timer,85);
      }
      function Timer()
      {     
        document.getElementsByClassName("success-pop-up")[0].style.transition="background 5000ms linear";
        document.getElementsByClassName("success-pop-up")[0].style.background="transparent";
              
        top_value = top_value+1;
        var temp = top_value+"%";
        document.getElementsByClassName("success-pop-up")[0].style.top=temp;

        if(top_value == 70)
        {
        clearTimeout(interval);
        document.getElementsByClassName("success-pop-up")[0].style.display="none";
        }

        
      } 
      function show_success(color)
      {
        var x = document.getElementsByClassName("success-pop-up");
        x[0].style.display="block";
        x[0].style.background = color;
}
      function onClickBlackCoverOfQuizUpdate(){
        document.getElementsByClassName('black-cover-quiz-details')[0].style.display = 'none';
        document.getElementsByClassName('quiz-details-popup')[0].style.display = 'none';
      }
      function printLeaderboard(){

          var i;
          var quizName = document.getElementById('leaderboard-quiz-name').innerHTML;
          var result = document.getElementById('quiz-leaderboard-info').getElementsByTagName('tr')
          var heading = document.getElementById('table-heading-leaderboard').getElementsByTagName('tr')[0].getElementsByTagName('th');
          var p = window.open('','','height=500','width=500');
          p.document.write('<html>');
          p.document.write('<head>');
          p.document.write("<style>td{text-align: center; border:0.5px solid #bdc3c7;}table{margin-top:15px;}</style>");
          p.document.write('</head>');
          p.document.write('<body style="font-family:monospace">');
          p.document.write("<div style='display:flex;width:100%;justify-content-space-between;font-weight:bold;font-size:25px;'>");
          p.document.write("<div>");
          p.document.write(quizName);
          p.document.write("</div>")
          p.document.write("<div style='display:flex;flex:1;justify-content:flex-end;'>");
          p.document.write("QuizWit");
          p.document.write("</div>")
          p.document.write("</div>");
          p.document.write("<table style='border: 1px solid #ddd;border-radius:5px;width: 97%;border-collapse: collapse;font-family: 'Roboto',sans-serif;'>");
          p.document.write('<thead>');
          p.document.write("<tr'>");
          for(i=0;i<heading.length-2;i++){

              if(i==0 || i==4 || i==5 || i==6){
                p.document.write("<th style='border:0.5px solid #bdc3c7;padding:3px;text-align:center;padding-left:5px;'>");
              }
              else p.document.write("<th style='border:0.5px solid #bdc3c7;padding:3px;text-align:left;padding-left:5px;'>");

            p.document.write(heading[i].innerHTML);
            

            p.document.write("</th>");
          }
          p.document.write('</tr>');
          p.document.write('</thead>');
          p.document.write('<tbody>');
          var j,temp;
          for(i=0;i<result.length;i++){
            p.document.write("<tr>");
            temp = result[i].getElementsByTagName('td');
            for(j=0;j<temp.length-2;j++){
              if(j==0 || j==4 || j==5 || j==6){
                p.document.write("<td style='border:0.5px solid #bdc3c7;font-weight:500;padding:3px;padding-left:5px;text-align:center;'>");
              }
              else p.document.write("<td style='border:0.5px solid #bdc3c7;padding:3px;padding-left:5px;text-align:left;'>");
              p.document.write(temp[j].innerHTML);
              p.document.write("</td>")
            }
            p.document.write('</tr>');

          }
          p.document.write('</tbody>');
          p.document.write('</table>');
          p.document.write('</body>');
          p.document.write('</html>');
          p.document.close();
          p.print();
      }
      var rotateInterval;
      var angle=0;
      function timerSetToRotateIcon(){
        rotateInterval=setInterval(rotateReloadIcon,5);
        //setTimeout(clearTimeout(rotateInterval),2000);
      }
      function rotateReloadIcon(){
        document.getElementsByClassName('reload-leaderboard')[0].disabled = true;
        var rotateIcon = document.getElementById('reload-leaderboard-icon');
        angle = angle+1;
        rotateIcon.style.transform = "rotate("+angle+"deg)";
        if(angle >= 360){
        clearTimeout(rotateInterval);

        document.getElementsByClassName('reload-leaderboard')[0].disabled = false;
        angle = 0;

        }
      }
      function hideMessage(){
        document.getElementsByClassName('updated-successfully')[0].style.display='none';
        document.getElementsByClassName('deleted-successfully')[0].style.display='none';
      }
</script>
<style type="text/css">
  .black-cover-for-confirmation{
      position: absolute;
      width: 100%;
      height: 100vh;
      display: none;
      position: fixed;
      background: black;
      opacity: 0.3;
      z-index: 5;
    }
    .custom-confirmation{
      position: absolute;
      left: 50%;
      top :50%;
      transform: translate(-50%,-50%);
      z-index: 6;
      box-shadow: 0px 0px 2px 0px white;
      width: 200px; 
      height: 150px;
      border: 0.5px solid #bdc3c7;
      background: white;
      border-radius: 5px;
      display: none;
      position: fixed;
      box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 60%);
    }
    #cancel:hover, #confirm:hover{
      box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 30%);
    }
    .custom-confirmation > div{
      display: flex;
      flex-direction: column;
      justify-content: space-evenly;
      align-items: center;
      height: 100%;
    }
    #cancel, #confirm{
      border-radius: 3px; 
      width: 60px;
      height: 35px; 
      border: 0.5px solid #bdc3c7;
      cursor: pointer;
    }
    #cancel:focus, #confirm:focus{
      outline: none;
    }

    #confirm{
      background: #6c9f38;
      color: white;
    }
    #cancel{
      background: #b0a5a5;
      color: white;
    }
    .custom-btn-container{
      width: 100%;
      display: flex;
      justify-content: space-evenly;

    }
</style>
<script type="text/javascript">
  
    function showCustomConfirmation(){
      document.getElementsByClassName('custom-confirmation')[0].style.display='block';
      document.getElementsByClassName('black-cover-for-confirmation')[0].style.display='block';
    }
    function hideCustomConfirmation(){
      document.getElementsByClassName('custom-confirmation')[0].style.display='none';
      document.getElementsByClassName('black-cover-for-confirmation')[0].style.display='none';
    }
</script>
<style type="text/css">
  #confirm-quiz-delete-popup{
    /* height: 300px; */
    width: 250px;
    padding: 20px;
    border-radius: 5px;
    position: absolute;
    left: 50%;
    top : 50%;
    transform: translate(-50%, -50%);
    background: white;
    z-index: 10;
    border : 0.5px solid #95a5a6;
    display: none;
    position: fixed;
  }
  #confirm-quiz-delete-popup-content-container{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
  }
  @media screen and (max-width:600px){
    #confirm-quiz-delete-popup{
    /* height: 300px; */
    width: 250px;
    padding: 20px;
    border-radius: 5px;
    position: absolute;
    left: 50%;
    top: 50px;
    transform: translate(-50%, 0%);
    background: white;
    z-index: 10;
    border: 0.5px solid #95a5a6;
    display: none;
    position: fixed;}
  }
  #delete-me{
    /* margin-top: 20px; */
    /* margin-bottom: 15px; */
    height: 45px;
    width: 100%;
    border-radius: 3px;
    border: 0.5px solid #95a5a6;
    padding: 0px 15px;
    color: green;
  }
  #delete-me:focus{
    outline:  none;
    box-shadow: 0px 0px 0px 4px blue;
    border-color: #2980b9;
    transition: 300ms; */
    border: 0.5px solid #3a6cff;
    box-shadow: 0px 0px 0px 4px rgb(123 123 241 / 20%);
  }
  .delete-yes-no-btn-container{
    display: flex;
    justify-content: space-between;
    width: 100%;
    /* padding: 0px 15px; */
    margin-top: 15px;
  }
  #delete-no{

    border-radius: 3px;
    background: #95a5a6;
    border : none;
    /* background: #c0392b; */
    color: white;
    padding: 5px 13px;
  }
  #delete-yes{
    border-radius: 3px;
    background: #cd201f;
    color: white;
    border: none;
    padding: 3px 13px;
    display: none;
  }
  #delete-yes:focus{
    outline: none;

  }
  #delete-yes:hover{
    box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.6);
  }
  #delete-no:focus{
    outline: none;

  }
  #delete-no:hover{
    /* background: #cd201f; */
    box-shadow: 0px 0px 0px 0px rgba(0,0,0,0.6);
  }
</style>
<script type="text/javascript">
  var DeleteQUIZID;
  function checkUserConfirmation(){
    var x = document.getElementById('delete-me').value;
    if(x == 'DELETE ME'){
      document.getElementById('delete-yes').style.display = 'block';
    }
    else{
      document.getElementById('delete-yes').style.display = 'none';
    }

  }
  function deleteThisQuiz(){
    var URL = 'delete_exam_query.php?exam_id='+DeleteQUIZID;
    location.href= URL;
  }
  function confirmQuizDeletion(QID){
    DeleteQUIZID = QID;

    document.getElementById('delete-yes').style.display = 'none';
    var x = document.getElementById('delete-me');
    x.value = '';
    document.getElementById('confirm-quiz-delete-popup').style.display='block';
    document.getElementsByClassName('black-cover-quiz-delete')[0].style.display = 'block';
  }
  function hideConfirmationPOPUP(){
    document.getElementById('confirm-quiz-delete-popup').style.display='none';
    document.getElementsByClassName('black-cover-quiz-delete')[0].style.display = 'none';
  }
</script>
</head>

<body id="page-top" >
<div class="black-cover-for-confirmation"></div>
<div class="black-cover-quiz-delete"></div>
<div id="confirm-quiz-delete-popup">
  <div id="confirm-quiz-delete-popup-content-container">
    <i style="color : #cd201f;font-size: 50px;margin-bottom: 25px;" class="fas fa-trash-alt"></i>
    <div style="display: flex; flex-direction: column;">
    <h5>To confirm deletion</h5>
    <label>
    Write '<span style="color: green; font-weight: bold;">DELETE ME</span>'
    </label>
  </div>
  <input oninput="checkUserConfirmation()" id="delete-me" type="text" name="checkDeleteConfirmation" required>
  <div class="delete-yes-no-btn-container">
        <button onclick="hideConfirmationPOPUP()" id="delete-no">Cancel</button>
        <button onclick="deleteThisQuiz()" id="delete-yes">Delete</button>
  </div>
  <h5 style="color: blue;margin-top: 15px;">Note : No Backup</h5>
  </div>
</div>
  <div class="custom-confirmation">
    <div>
      <div style="color: #cd201f;font-weight: bold;">Are You Sure!</div>
      <div class="custom-btn-container">
        <button id="cancel">No</button>
        <button id="confirm">Yes</button>
      </div>
    </div>
  </div>
    <div class="updated-successfully">Updated Successfully <i class="fas fa-check"></i></div>
    <div class="deleted-successfully">Deleted Successfully <i class="fas fa-check"></i></div>
    <div class="updating-msg">Updating <i class="fas fa-sync-alt fa-spin"></i></div>
    <div class="deleting-msg">Deleting <i class="fas fa-sync-alt fa-spin"></i></div>
    <div onclick='onClickBlackCover()' class="black-cover">
    </div>
          <button onclick="hideSideBar()" style="z-index: 3;" id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i style="font-size:25px;" id="btnBar" class="fa fa-bars"></i>
          </button>
  <!-- Page Wrapper -->
  <div id="wrapper">
<!--   <div style="height: 30px;"></div> -->
<div class="success-pop-up">
  <?php 
  if(isset($_SESSION['message']))
    {
            echo $_SESSION['message'];
        }
  ?>
</div>
<?php 
if(isset($_SESSION['message']) && isset($_SESSION['color']))
    {
      echo "<script>show_success('$_SESSION[color]');timer_on();</script>";
      unset($_SESSION['message']);
      unset($_SESSION['color']);
    }
?>

<script>
document.getElementById('textbox').addEventListener('keydown', function(e) {
  if (e.key == 'Tab') {
    e.preventDefault();
    var start = this.selectionStart;
    var end = this.selectionEnd;

    // set textarea value to: text before caret + tab + text after caret
    this.value = this.value.substring(0, start) +
      "\t" + this.value.substring(end);

    // put caret at right position again
    this.selectionStart =
      this.selectionEnd = start + 1;
  }
});
</script>
<script>
  var ajaxLoading = false;
$(document).ready(function() {
    $('#ajaxRequestor').click(function(e) {
        e.preventDefault();
        if(!ajaxLoading) {
            ajaxLoading = true;
            $('#ajaxContentPlaceholder').load('/path/to/content.html', 
                function() { 
                    ajaxLoading = false;
                }
            );
        }
    });
});
</script>

<!-- <script type="text/javascript" src="js/stop-copy-paste.js"></script> -->