<div class="border bg-white">

    <div class="table-responsive">
      <table class="table">
        <tr>
          <th class="bg-danger text-white">
            Notice
          </th>
        </tr>
        @foreach ($notices as $notice) 
        <tr> <td> {{ $notice->name }} </td> </tr>
        @endforeach
      </table>
    </div>
</div>
