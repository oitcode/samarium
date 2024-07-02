<div>


  @if (false)
  <div class="bg-white-rm border-rm pt-3 pl-3 h5-rm font-weight-bold-rm bg-primary text-white mb-0" style="font-family: mono;">
    {{ \Carbon\Carbon::now()->format('l') }}
  </div>

  <div class="bg-white-rm border-rm pt-3 pl-3 h5-rm font-weight-bold-rm bg-primary text-white mb-0" style="font-family: mono;">
    {{ \Carbon\Carbon::now()->toFormattedDateString() }}
  </div>
  @endif

  <div class="pt-1" style="font-family: mono; font-size: 0.9rem;">
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
