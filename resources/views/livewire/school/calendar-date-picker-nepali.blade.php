<div>


  <div class="col-md-9-rm">

  <div class="d-flex flex-column">
    <div class="d-flex justify-content-start mb-2-rm">

      <button class="btn btn-light badge-pill mr-4" wire:click="selectPreviousMonth">
        Previous
      </button>

      @if (false)
      <div class="p-2 mr-4 font-weight-bold">
        {{ $displayMonthName }}
      </div>
      @endif

      <div class="dropdown py-3-rm">
        <button class="btn dropdown-toggle" type="button" id="monthDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Select Month
        </button>
        <div class="dropdown-menu" aria-labelledby="monthDropdownMenu">
          <button class="dropdown-item" type="button" wire:click="selectMonth('Baisakh')">Baisakh</button>
          <button class="dropdown-item" type="button" wire:click="selectMonth('Jestha')">Jestha</button>
          <button class="dropdown-item" type="button" wire:click="selectMonth('Asadh')">Asadh</button>
          <button class="dropdown-item" type="button" wire:click="selectMonth('Shrawan')">Shrawan</button>
          <button class="dropdown-item" type="button" wire:click="selectMonth('Bhadra')">Bhadra</button>
          <button class="dropdown-item" type="button" wire:click="selectMonth('Ashwin')">Ashwin</button>
          <button class="dropdown-item" type="button" wire:click="selectMonth('Kartik')">Kartik</button>
          <button class="dropdown-item" type="button" wire:click="selectMonth('Mangsir')">Mangsir</button>
          <button class="dropdown-item" type="button" wire:click="selectMonth('Poush')">Poush</button>
          <button class="dropdown-item" type="button" wire:click="selectMonth('Magh')">Magh</button>
          <button class="dropdown-item" type="button" wire:click="selectMonth('Falgun')">Falgun</button>
          <button class="dropdown-item" type="button" wire:click="selectMonth('Chaitra')">Chaitra</button>
        </div>
      </div>

      <button class="btn btn-light badge-pill" wire:click="selectNextMonth">
        Next
      </button>

    </div>

    <div class="d-flex justify-content-center">
      <strong>
        {{ $displayMonthName }}
      </strong>
    </div>

    <div class="d-flex justify-content-start bg-warning-rm p-0">

      <div class="p-0 border m-0">
        <div class="border bg-danger text-white p-2">
          Sun
        </div>
        @foreach ($sunday as $day)
          <div class="border">
            @if ($day)
              <div wire:click="selectDate({{ json_encode($day) }})" role="button">
                @if (false)
                {{ $day->toDateString() }}
                @endif
                {{ $day[1] }}
              </div>
            @else
              &nbsp;
            @endif
          </div>
        @endforeach
      </div>

      <div class="p-0 border m-0">
        <div class="border bg-danger text-white p-2">
          Mon
        </div>
        @foreach ($monday as $day)
          <div class="border">
            @if ($day)
              <div wire:click="selectDate({{ json_encode($day) }})" role="button">
                @if (false)
                {{ $day->toDateString() }}
                @endif
                {{ $day[1] }}
              </div>
            @else
              &nbsp;
            @endif
          </div>
        @endforeach
      </div>

      <div class="p-0 border m-0">
        <div class="border bg-danger text-white p-2">
          Tue
        </div>
        @foreach ($tuesday as $day)
          <div class="border">
            @if ($day)
              <div wire:click="selectDate({{ json_encode($day) }})" role="button">
                @if (false)
                {{ $day->toDateString() }}
                @endif
                {{ $day[1] }}
              </div>
            @else
              &nbsp;
            @endif
          </div>
        @endforeach
      </div>

      <div class="p-0 border m-0">
        <div class="border bg-danger text-white p-2">
          Wed
        </div>
        @foreach ($wednesday as $day)
          <div class="border">
            @if ($day)
              <div wire:click="selectDate({{ json_encode($day) }})" role="button">
                @if (false)
                {{ $day->toDateString() }}
                @endif
                {{ $day[1] }}
              </div>
            @else
              &nbsp;
            @endif
          </div>
        @endforeach
      </div>

      <div class="p-0 border m-0">
        <div class="border bg-danger text-white p-2">
          Thu
        </div>
        @foreach ($thursday as $day)
          <div class="border">
            @if ($day)
              <div wire:click="selectDate({{ json_encode($day) }})" role="button">
                @if (false)
                {{ $day->toDateString() }}
                @endif
                {{ $day[1] }}
              </div>
            @else
              &nbsp;
            @endif
          </div>
        @endforeach
      </div>

      <div class="p-0 border m-0">
        <div class="border bg-danger text-white p-2">
          Fri
        </div>
        @foreach ($friday as $day)
          <div class="border">
            @if ($day)
              <div wire:click="selectDate({{ json_encode($day) }})" role="button">
                @if (false)
                {{ $day->toDateString() }}
                @endif
                {{ $day[1] }}
              </div>
            @else
              &nbsp;
            @endif
          </div>
        @endforeach
      </div>

      <div class="p-0 border m-0">
        <div class="border bg-danger text-white p-2">
          Sat
        </div>
        @foreach ($saturday as $day)
          <div class="border">
            @if ($day)
              <div wire:click="selectDate({{ json_encode($day) }})" role="button">
                @if (false)
                {{ $day->toDateString() }}
                @endif
                {{ $day[1] }}
              </div>
            @else
              &nbsp;
            @endif
          </div>
        @endforeach
      </div>

    </div>
  </div>
  </div>


</div>
