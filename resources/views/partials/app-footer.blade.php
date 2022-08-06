<div class="container-fluid border bg-light-rm text-dark-rm pt-1"
    style="color: #0047AB; background-color: #A7C7E7;">
  <div class="d-flex justify-content-between font-weight-bold-rm">
    <div class="mr-3 border-right pr-3">
      <i class="fas fa-tv mr-1"></i>
      {{ \App\Company::first()->name }}
    </div>
    <div class="mr-3 border-right pr-3">
      Terminal: Counter
    </div>
    <div class="mr-3 border-right pr-3">
      <i class="fas fa-user mr-1"></i>
      {{ Auth::user()->name }}
    </div>
    <div class="mr-3 border-right pr-3">
      <i class="fas fa-calendar mr-1"></i>
      {{ date('Y-m-d') }}
    </div>
    <div class="mr-3 border-right pr-3">
      <i class="fas fa-clock mr-1"></i>
      <span id="clock"></span>
    </div>
    <div class="mr-3 border-right pr-3" role="button">
      <i class="fas fa-comment mr-1"></i>
      Support
    </div>
    <div class="mr-3">
      &copy; 2022 | OIT
    </div>
  </div>
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
