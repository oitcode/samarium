<div class="card shadow-sm h-100">
  <div class="card-body ">
    <h2 class="">
      Expense by category
    </h2>
    <div class="bg-white">
      <canvas id="chartExpenseByCategory"></canvas>
    </div>
  </div>
  <script>
      const ctxExpenseByCategory = document.getElementById('chartExpenseByCategory').getContext('2d');
      const chartExpenseByCategory = new Chart(ctxExpenseByCategory, {
          type: 'bar',
          data: {
              labels: [
                  @foreach ($expenseByCategory as $key => $val)
                    '{{ $key }}',
                  @endforeach
              ],
              datasets: [{
                  label: '# Total Expense',
                  data: [
                      @foreach ($expenseByCategory as $key => $val)
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
