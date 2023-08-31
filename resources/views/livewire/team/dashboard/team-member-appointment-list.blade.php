<div>

  <div class="bg-white border">
    <h2 class="h4 p-3 mb-0 border">
      Appointment list
    </h2>
    @if (true)
    @if ($teamMemberAppointments != null && count($teamMemberAppointments))
      @foreach ($teamMemberAppointments as $appointment)
        <div class="row p-2 border" style="margin: auto;">
          <div class="col-md-3">
            <span class="font-weight-bold">
              {{ \Carbon\Carbon::create($appointment->appointment_date_time)->toDateString() }}
            </span>
          </div>
          <div class="col-md-3">
            <span class="font-weight-bold">
              {{ \Carbon\Carbon::create($appointment->appointment_date_time)->toTimeString() }}
            </span>
          </div>
          <div class="col-md-3">
            <i class="fas fa-clock text-success mr-2"></i>
            {{ $appointment->applicant_name }}
            -
            {{ $appointment->applicant_phone }}
          </div>
          <div class="col-md-3">
            <i class="fas fa-check-circle text-success mr-2"></i>
            New
          </div>
        </div>
      @endforeach
    @else
      <div class="text-muted p-3">
        No appointments
      </div>
    @endif
    @endif

  </div>

</div>
