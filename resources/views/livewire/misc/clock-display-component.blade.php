<div>

  <div class="pt-1" style="font-family: mono;">
    <i class="fas fa-clock mr-1"></i>
    <span id="clock"></span>
  </div>

  <script>
      setInterval(showTime, 1000);
      function showTime() {
          let time = new Date();
          let hour = time.getHours();
          let min = time.getMinutes();
          let sec = time.getSeconds();
          am_pm = "AM";
  
          if (hour > 12) {
              hour -= 12;
              am_pm = "PM";
          }
          if (hour == 0) {
              hr = 12;
              am_pm = "AM";
          }
          if (hour == 12) {
              hr = 12;
              am_pm = "PM";
          }
  
          hour = hour < 10 ? "0" + hour : hour;
          min = min < 10 ? "0" + min : min;
          sec = sec < 10 ? "0" + sec : sec;
  
          let currentTime = hour + ":"
              + min + {{-- ":" + sec + --}} " " + am_pm;
  
          document.getElementById("clock")
              .innerHTML = currentTime;
      }
  
      showTime();
  </script>

</div>
