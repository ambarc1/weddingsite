var countDownDate = new Date("Oct 17, 2026 08:00:00").getTime();
var countDownDate2 = new Date("Jul 10, 2026 08:00:00").getTime();

var x = setInterval(function() //updates every 1s
{
  var now = new Date().getTime();//retrieve dates/time
  var distance = countDownDate - now; //distance between now and the count down date
  var distance2 = countDownDate2 - now; //distance between now and the count down date

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var days2 = Math.floor(distance2 / (1000 * 60 * 60 * 24));
 
  document.getElementById("demo").innerHTML = days + " Days ";
  document.getElementById("demo2").innerHTML = days2 + " Days";

  if (distance < 0) 
  {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
  
  if (distance2 < 0) 
  {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);