var countDownDate = new Date("Oct 17, 2026 01:00:00").getTime();

var x = setInterval(function() {//updates every 1s
  var now = new Date().getTime();//retrieve dates/time
  var distance = countDownDate - now; //distance between now and the count down date

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  document.getElementById("demo").innerHTML = days + " Days ";

  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }

}, 1000);