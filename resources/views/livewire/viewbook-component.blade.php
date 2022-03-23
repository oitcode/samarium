<div>
  {{-- User select Menu --}}

  <div class="dropdown" wire:key="bookDropdown">
    <button class="btn btn-success dropdown-toggle" type="button" id="bookDropdown" data-toggle="dropdown" aria-expanded="false">
      Book
    </button>
    <div class="dropdown-menu" aria-labelledby="bookDropdown">
      <button class="dropdown-item" wire:click="enterDaybookMode">
        Daybook
      </button>
      <button class="dropdown-item" wire:click="enterWeekbookMode">
        Weekbook
      </button>
      <button class="dropdown-item" wire:click="enterMonthbookMode">
        Monthbook
      </button>
      <button class="dropdown-item" wire:click="enterYearbookMode">
        Yearbook
      </button>
    </div>
  </div>

  {{-- Previous Next Menu --}}
  <div class="my-3">
    <button class="btn btn-success"
        @if ($modes['daybook'])
          wire:click="goToPrevious('day')"
        @elseif ($modes['weekbook'])
          wire:click="goToPrevious('week')"
        @elseif ($modes['monthbook'])
          wire:click="goToPrevious('month')"
        @elseif ($modes['yearbook'])
          wire:click="goToPrevious('year')"
        @else
        @endif
        >
      <i class="fas fa-arrow-left mr-3"></i>
      Previous
    </button>
    <button class="btn btn-success"
        @if ($modes['daybook'])
          wire:click="goToNext('day')"
        @elseif ($modes['weekbook'])
          wire:click="goToNext('week')"
        @elseif ($modes['monthbook'])
          wire:click="goToNext('month')"
        @elseif ($modes['yearbook'])
          wire:click="goToNext('year')"
        @else
        @endif
        >
      <i class="fas fa-arrow-right mr-3"></i>
      Next
    </button>
  </div>

  {{-- Display info --}}
  <div class="my-3">
    @if ($modes['daybook'])
      Date: {{ $startDate->toDateString() }}
      {{ $startDate->format('l') }}
    @elseif ($modes['weekbook'])
      Start: {{ $startDate->toDateString() }} {{ $startDate->format('l') }}
      <br/>
      End: {{ $endDate->toDateString() }} {{ $endDate->format('l') }}
    @elseif ($modes['monthbook'])
      Month: {{ $startDate->format('F') }} {{ $startDate->format('Y') }}
    @elseif ($modes['yearbook'])
      Year: {{ $startDate->format('Y') }}
    @else
    @endif
  </div>

  @if (
      $modes['daybook'] ||
      $modes['weekbook'] ||
      $modes['monthbook'] ||
      $modes['yearbook']
  )
    <div class="table-responsive">
      <table class="table table-bordered" style="font-size:1.3rem;">
        <thead>
          <tr class="bg-success text-white">
            <th>
              {{ $unitName }}
            </th>
            @if ($modes['weekbook'] || $modes['monthbook'])
              <th>
                Day
              </th>
            @endif
            <th>
              Amount
            </th>
          <tr>
        </thead>

        <tbody>
          @foreach ($book as $line)
            <tr>
              <td>
                @if ($modes['daybook'])
                  {{ $line['unit']->toTimeString() }}
                @elseif ($modes['weekbook'] || $modes['monthbook'])
                  {{ $line['unit']->toDateString() }}
                @elseif ($modes['yearbook'])
                  {{ $line['unit'] }}
                @else
                @endif
              </td>
              @if ($modes['weekbook'] || $modes['monthbook'])
                <th>
                  {{ $line['unit']->format('l') }}
                </th>
              @endif
              <td>
                @php echo number_format( $line['totalAmount'] ); @endphp
              </td>
            </tr>
          @endforeach
        </tbody>

        <tfoot>
          <tr>
            <th class="font-weight-bold" @if ($modes['weekbook'] || $modes['monthbook']) colspan="2" @endif>
              TOTAL
            </th>
            <td class="font-weight-bold">
              @php echo number_format($totalAmount); @endphp
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
  @endif

</div>
