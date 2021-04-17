var c=0;
function hideAll()
{
	var j;
	var x = document.getElementsByClassName("question-answer-container");
  x[0].style.display='block';
    document.getElementById("prev").style.display="none";
	  document.getElementById("btn-submit").style.display="none";
}
 
function nextQuestion()
{

        var x = document.getElementsByClassName("question-answer-container");
        var l = x.length;
        if(c<l-1)
        {       
        	    x[c].style.display = "none";
             	c=c+1;
        		x[c].style.display = "block";
        		if(c==l-1)
        		{
        			document.getElementById("btn-submit").style.display="block";
             
        	        document.getElementById("next").style.display="none";
        		}
        }
   
        document.getElementById("prev").style.display = "block";
}
function prevQuestion()
{
       var x =  document.getElementsByClassName("question-answer-container");
      
      if (c!=0) 
      {
            x[c].style.display = "none";
            
       	    
       	    if(c==1)
             {
             	document.getElementById("prev").style.display = "none";
             }
             c = c -1;
             x[c].style.display = "block";  
       	    	
            document.getElementById("btn-submit").style.display="none";
            document.getElementById("next").style.display="block";

       }
       
           
}

function switchToQuestion(index){
  let switchCont = document.getElementsByClassName('question-switch-container')[0]
  var targetWidth = 900;
  document.getElementsByClassName('exam-status')[0].style.display = 'flex'
  if ($(window).height() <= 500){
    document.getElementsByClassName('exam-status')[0].style.display = 'none'
    $('#show-question-switch').click()
  }
  if ( $(window).width() <= targetWidth) {
    $('#show-question-switch').click()
  }
  var x =  document.getElementsByClassName("question-answer-container");
  var i=0;
  for(i=0;i<x.length;i++){
    if(index == i){
      x[i].style.display = 'block';
    }
    else{
      x[i].style.display = 'none';
    }
  }
  c = index;
  if(index == 0){
              document.getElementById("prev").style.display = "none";
            document.getElementById("next").style.display="block";
  }
  else{
              document.getElementById("prev").style.display = "block";
            document.getElementById("next").style.display="block";
  }
  if(index == x.length-1){
            document.getElementById("btn-submit").style.display="block";
            document.getElementById("next").style.display="none";

  }
  else{
            document.getElementById("btn-submit").style.display="none";

  }
}

  function confirmation()
    {
    
      var y = confirm("Are you sure");
      if(y)
      return true;
      else {
        return false;
      }  
     
    }



    
var T = 0;
    var first_time_check = 0;
    function Timer() 
    {
      if(first_time_check == 0)
      {
      var x = document.getElementsByClassName("timer-test");
      
      x[0].style.color = "black";
      var s = x[0].innerHTML;
      
      
      var t = new Array();
      var k = 0;
      var p = 0
      var time = "";
      for(k=0;k<s.length;k++)
      {
        t[p] = s[k];
        
        time = time + t[p];
        p=p+1;
      }
      
      T = parseInt(time);
      first_time_check = 1;
      
      }
     
      var hour = parseInt(T/3600);
      var temp  = T - hour*3600;   //seconds left
      var min = parseInt(temp/60);
      temp =  temp - 60*min;
      sec = temp%60;
      var x = document.getElementsByClassName("timer-test");
      x[0].style.display = 'block'
      if(min<10)
        min = "0"+min;
      if(sec<10)
        sec = "0"+sec;
      x[0].innerHTML = '0'+hour+':'+min+':'+sec;

      T--;
      if(T<=299)
      {
          x[0].style.color = "red";
      }
      else x[0].style.color ="white";

      if(T<=0)
      {
        
        var frm =  document.getElementsByTagName("form");
        frm[0].submit();

      }
      
    }
  
    function reviewQuestion(queNumber){
      var x = document.getElementsByClassName('review-checkbox');
      x[queNumber-1].checked = true;
      var x = document.getElementsByClassName('question-switch-container')[0].getElementsByTagName('label');
      x[queNumber-1].style.background = '#9b59b6';
      x[queNumber-1].style.color = 'white';

      var z = document.getElementsByClassName('mark-as-review');
      z[queNumber-1].style.display = 'none';
      var z = document.getElementsByClassName('remove-from-review');
      z[queNumber-1].style.display = 'block';
      count();
    }
    function removeReviewQuestion(queNumber){

      var x = document.getElementsByClassName('review-checkbox');
      x[queNumber-1].checked = false;
      var x = document.getElementsByClassName('question-switch-container')[0].getElementsByTagName('label');
      x[queNumber-1].style.background = '';
      x[queNumber-1].style.color = '';
      count();
    }
    function updateStatus(queNumber){
      var x = document.getElementsByClassName('review-checkbox');
      if(x[queNumber-1].checked == false){
      var x = document.getElementsByClassName('question-switch-container')[0].getElementsByTagName('label');
      x[queNumber-1].style.background = '#5eba00';
      x[queNumber-1].style.color = 'white';
      }
      var z = document.getElementsByClassName('uncheck-option');
      z[queNumber-1].style.display = 'block';
      
      var z = document.getElementsByClassName('mark-as-review');
      z[queNumber-1].style.display = 'block';
      count();
    }

		function count()       //rebuild
    {
    // console.log('counting')
    var x = document.getElementsByClassName('question-switch-container')[0].getElementsByTagName('label');
    var y =  document.getElementsByClassName("selectgroup-input");
    var u = document.getElementsByClassName('uncheck-option');
    var qsp = document.getElementsByClassName('question-sno-padding')

    var num = y.length;
    let p = 0;
    var i = 0;
    for(k=0;k<num;k++)
    {
     
      if(y[k].checked==true)
      {
        p++;
          var m=0;
          for(i=4;i<num+4;i+=4){
              if(k<i){
                x[m].style.background = '#5eba00';
                x[m].style.color = 'white';
                u[m].style.display='block';
                // console.log(m)
                // qsp[m].style.height = '70px'
                break;
              }
              m++;
          }
      }
    }
 
      var reviewCount = 0;
      var checkbox = document.getElementsByClassName('review-checkbox');
      for(k=0;k<checkbox.length;k++){
        if(checkbox[k].checked){
            x[k].style.background = '#9b59b6';
            x[k].style.color = 'white';
            reviewCount++;
            document.getElementsByClassName('mark-as-review')[k].style.display='none';
        }
      }
    var z = document.getElementsByClassName("attempted");
    z[0].innerHTML = p;
    var r = (num/4)-p;
    var z = document.getElementsByClassName("remaining");
    z[0].innerHTML = r;

    var z = document.getElementsByClassName("review");
    z[0].innerHTML = reviewCount;

    var z = document.getElementsByClassName("progress-bar");
    var percentage = 400*(p/num);
    z[0].style.width = percentage+"%";
   
    }
    

function disableNewTabClick() {  
  var listCtrl = document.getElementsByTagName('a');  
  for (var i = 0; i < listCtrl.length; i++) {  
      listCtrl[i].onmousedown = function(event) {  
          if (!event) event = window.event;  
          if (event.ctrlKey) {  
              alert("Functionality for Opening links in a new tab/window is disabled !");  
              return false;  
          }  
          if (event.shiftKey) {  
              alert("Functionality for Opening links in a new tab/window is disabled !");  
              return false;  
          }  
          if (event.shiftKey && event.ctrlKey) {  
              alert("Functionality for Opening links in a new tab/window is disabled !");  
              return false;  
          }  
      }  
  }  
} 

const registerOpenTab = () => {
  let tabsOpen = 1;
  while (localStorage.getItem('openTab' + tabsOpen) !== null) {
    tabsOpen++;
  }
  localStorage.setItem('openTab' + tabsOpen, 'open');
  if (localStorage.getItem('openTab2') !== null) {
      alert('Warning ' + (tabsOpen - 1) + ', Your are being proctored.')
  }
}
// unregisterOpenTab FUNCTION
const unregisterOpenTab = () => {
  let tabsOpen = 1;
  while (localStorage.getItem('openTab' + tabsOpen) !== null) {
    tabsOpen++;
  }
  localStorage.removeItem('openTab' + (tabsOpen - 1));
  if(tabsOpen >= 3){
    var frm =  document.getElementsByTagName("form");
    frm[0].submit();
  }
}

// EVENT LISTENERS
// window.addEventListener('load', registerOpenTab);
// window.addEventListener('beforeunload', unregisterOpenTab);
  
// Wrap in an IIFE accepting jQuery as a parameter.

function resizeWindowElements(){
  document.getElementsByClassName('exam-status')[0].style.display = 'flex'
  if ($(window).height() <= 600){
    document.getElementsByClassName('exam-status')[0].style.display = 'none'
  }
  setQuestionHeaderWidth(toggleSwitch)
  setQuestionContainerHeight()
  // $('#show-question-switch').click()
}

$(window).resize(function() {
  resizeWindowElements()
  });


function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkCookie() {
  let proctoredPopup = document.getElementById('proctored-popup')
  let imgBlock = document.getElementById('proctored-msg-img')
  let msgBlock = document.getElementById('proctored-msg')
  var user = getCookie("userproctored");
  if (user != "") {
    user = parseInt(user)
    if(user == 1){
      msgBlock.innerHTML = 'You are being proctored!'
      msgBlock.innerHTML += '<br/>'
      msgBlock.innerHTML += 'Kindly do not switch from exam window.'
      msgBlock.innerHTML += '<br/>'
      msgBlock.innerHTML += 'Strike : ' + user
    }
    if(user == 2){
      //imgBlock.innerHTML = '<img src="images/proctored-1.gif">'
      msgBlock.innerHTML = 'Your exam will get cancel!'
      msgBlock.innerHTML += '<br/>'
      msgBlock.innerHTML += 'Strike : ' + user
    }
    if(user == 3){
      msgBlock.innerHTML = 'Final warning <br/> Exam will get cancel!'
      msgBlock.innerHTML += '<br/>'
      msgBlock.innerHTML += 'Strike : ' + user
    }
    if(user > 3){
      var frm =  document.getElementsByTagName("form");
      frm[0].submit();
    }
    proctoredPopup.style.display = 'block'
    document.getElementById('black-cover-for-proctored').style.display = 'block'
    setCookie("userproctored", ++user, 365);
  } else {
    user = 1;
    if (user != "" && user != null) {
      setCookie("userproctored", user, 365);
    }
  }
}

function removeCookie(){
  document.cookie = "userproctored=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}


function examStarted(){
  let examStarted = getCookie('examstarted')
  if(examStarted == ''){
    document.cookie = "examstarted=true; path=/;";
    checkCookie()
  }
}

let questionID
function showReportQuestionPopup(queID){
  document.getElementById('question-problem').value = ''
  questionID = queID
  let x = document.getElementById('question-report-popup')
  let y = document.getElementById('black-cover-for-report')
  x.style.display = 'block'
  y.style.display = 'block'
}

function closeReportQuestion(){
  let x = document.getElementById('question-report-popup')
  let y = document.getElementById('black-cover-for-report')
  x.style.display = 'none'
  y.style.display = 'none'
}

function reportQuestion(){
  let response = document.getElementsByClassName('question-report-response')[0]
  response.innerHTML = ''
  let problem = document.getElementById('question-problem').value
  let url = 'report-question.php'
  if(problem != ''){
    $('.question-report-response').load(url,{
      questionID,
      problem
    })
  }
  else{
    response.innerHTML = '<div class="error-msg"><i class="fas fa-exclamation-circle"></i> Mention your issue</div>'
  }
  response.style.display = 'block'
  setTimeout(() => {response.style.display = 'none'}, 3000)
}