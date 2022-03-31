<div class="card shadow-sm">
  <div class="card-body ">
    <h2 class="">
      Sale by category
    </h2>
    <div class="bg-white">
      <canvas id="chartSaleByCategory" width="200" height="200"></canvas>
    </div>
  </div>
  <script>
      const ctxSaleByCategory = document.getElementById('chartSaleByCategory').getContext('2d');
      const chartSaleByCategory = new Chart(ctxSaleByCategory, {
          type: 'pie',
          data: {
              labels: [
                  @foreach ($saleByCategory as $category)
                    '{{ $category["productCategory"]->name }}',
                  @endforeach
              ],
              datasets: [{
                  label: '# Total Sales',
                  data: [
                      @foreach ($saleByCategory as $category)
                        {{ $category["quantity"] }},
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
              {{--
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
              --}}
          }
      });
  </script>
</div>
