<div class="my-3-rm">
  <div class="col-md-9-rm">
  <div class="d-flex flex-column">
    <div class="d-flex justify-content-start mb-2">
      <button class="btn btn-light badge-pill mr-4" wire:click="selectPreviousMonth">
        Previous
      </button>
      <div class="p-2 mr-4 font-weight-bold">
        {{ $displayMonthName }}
      </div>
      <button class="btn btn-light badge-pill" wire:click="selectNextMonth">
        Next
      </button>
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
