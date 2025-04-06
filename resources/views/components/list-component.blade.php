{{--
   |
   | Info div
   |
--}}
<div class="d-flex justify-content-between bg-white mt-1-rm p-2 py-3">
  <div class="d-flex flex-column justify-content-center o-heading pl-2">
    {{ $listInfo }}
  </div>
</div>

{{--
   |
   | The table
   |
--}}
<div class="table-responsive p-2 bg-white border ">
  <table class="table table-hover shadow-sm border mb-0">
    <thead>
      <tr class="{{ config('app.app_menu_bg_color') }}-rm {{ config('app.app_menu_normal_button_text_color') }}-rm bg-light text-dark p-4 o-heading">
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
