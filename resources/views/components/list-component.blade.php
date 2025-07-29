<div>
  @if (false)
  <div class="mb-3 bg-white-rm text-white o-heading px-4 py-3 o-border-radius" style="background-image: linear-gradient(to right, #45a, #1e293b);">
    Total products: 16
    &nbsp;&nbsp;&nbsp;&nbsp;
    |
    &nbsp;&nbsp;&nbsp;&nbsp;
    Active: 9
    &nbsp;&nbsp;&nbsp;&nbsp;
    |
    &nbsp;&nbsp;&nbsp;&nbsp;
    Inactive: 7
  </div>
  @endif
  {{--
     |
     | Info div
     |
  --}}
  <div class="o-heading px-3 py-3 o-linear-gradient o-border-radius mb-4">
    {{ $listInfo }}
  </div>

  <div class="bg-white o-border-radius pt-4">
    
    {{--
       |
       | The table
       |
    --}}
    <div class="table-responsive px-3 mt-0">
      <table class="table table-bordered table-hover border mb-0 text-nowrap">
        <thead>
          <tr class="text-dark p-4 o-heading">
            {{ $listHeadingRow }}
          </tr>
        </thead>
    
        <tbody class="text-dark">
          {{ $listBody }}
        </tbody>
      </table>
    </div>
    
    {{--
       |
       | Pagination links
       |
    --}}
    <div class="p-3">
      {{ $listPaginationLinks }}
    </div>
  </div>
</div>
