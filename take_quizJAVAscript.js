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
      else x[0].style.color ="black";

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
      x[queNumber-1].style.background = '#5eba00';
      x[queNumber-1].style.color = 'white';
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

    var x = document.getElementsByClassName('question-switch-container')[0].getElementsByTagName('label');
    var y =  document.getElementsByClassName("selectgroup-input");
    var u = document.getElementsByClassName('uncheck-option');
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
    




