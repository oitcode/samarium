<div class="card shadow-sm">
  <div class="card-body p-0">

    <div class="p-2">
      <h2 class="h3">
        Top selling
      </h2>
    </div>

    @if (count($todayItems) > 0)
      <div class="table-responsive">
        <table class="table table-bordered table-hover m-0">
          <thead>
            <tr class="bg-success text-white">
              <th>
                Item
              </th>
              <th>
                Quantity
              </th>
            </tr>
          </thead>

          <tbody class="bg-white">
              @foreach ($todayItems as $item)
                <tr>
                  <td>
                    {{ $item['product']->name }}
                  </td>
                  <td>
                    {{ $item['quantity'] }}
                  </td>
                <tr>
              @endforeach
          </tbody>
        </table>
      </div>
    @endif

  </div>
</div>
