<div>
  <canvas id="myChart" width="200" height="200"></canvas>
  <script>
  const ctx = document.getElementById('myChart').getContext('2d');
  const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: [
              @foreach ($weekSales as $key => $val)
                '{{ $key }}',
              @endforeach
              {{--
              'Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'Foo',
              --}}
          ],
          datasets: [{
              label: '# Total Sales',
              data: [
                  @foreach ($weekSales as $key => $val)
                    {{ $val }},
                  @endforeach
                  {{--
                  12123, 19543, 3234, 5234, 2987, 3879, 12234
                  --}}
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
