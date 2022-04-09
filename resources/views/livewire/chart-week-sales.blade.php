<div class="card shadow-sm h-100">
  <div class="card-body ">
    <h2 class="">
      @if (env('SITE_TYPE') == 'erp')
        Week Sales
      @elseif (env('SITE_TYPE') == 'ecs')
        Week Revenue
      @endif
    </h2>
    <div class="bg-white">
      <canvas id="myChart" width="200" height="200"></canvas>
    </div>
  </div>
  <script>
      const ctx = document.getElementById('myChart').getContext('2d');
      const myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: [
                  @foreach ($weekSales as $key => $val)
                    '{{ $key }}',
                  @endforeach
              ],
              datasets: [{
                  label: '# Total Sales',
                  data: [
                      @foreach ($weekSales as $key => $val)
                        {{ $val }},
                      @endforeach
                  ],
                  backgroundColor: [
                      '#288745',
                      '#288745',
                      '#288745',
                      '#288745',
                      '#288745',
                      '#288745',
                      '#288745',
                  ],
                  borderColor: [
                      '#288745',
                      '#288745',
                      '#288745',
                      '#288745',
                      '#288745',
                      '#288745',
                      '#288745',
                  ],
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
  </script>
</div>
