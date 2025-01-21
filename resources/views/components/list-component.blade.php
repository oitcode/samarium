{{--
   |
   | Info div
   |
--}}
<div class="d-flex justify-content-between bg-white mt-1 p-2">
  <div class="d-flex flex-column justify-content-center">
    {{ $listInfo }}
  </div>
  @if (false)
  <div>
    <div class="form-group mb-0">
      <input type="text" class="form-row" placeholder="Search">
    </div>
  </div>
  @endif
</div>


{{--
   |
   | The table
   |
--}}
<div class="table-responsive p-2 bg-white border ">
  <table class="table table-hover shadow-sm border mb-0">
    <thead>
      <tr class="{{ config('app.app_menu_bg_color') }} {{ config('app.app_menu_normal_button_text_color') }} p-4 o-heading">
        {{ $listHeadingRow }}
      </tr>
    </thead>

    <tbody class="bg-white text-dark">
      {{ $listBody }}
    </tbody>
  </table>
</div>

{{--
   |
   | Pagination links
   |
--}}
<div class="bg-white border p-2">
  {{ $listPaginationLinks }}
</div>
