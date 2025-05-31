<div class="bg-white" style="border-radius: 5px;">
  {{--
     |
     | Info div
     |
  --}}
  <div class="o-heading px-3 py-3">
    {{ $listInfo }}
  </div>
  
  {{--
     |
     | The table
     |
  --}}
  <div class="table-responsive px-3 mt-0">
    <table class="table table-bordered table-hover border mb-0">
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
