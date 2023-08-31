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
            <i class="fas fa-user text-muted mr-2"></i>
            <span class="text-dark font-weight-bold">
              {{ $appointment->applicant_name }}
            </span>
            <br>
            <i class="fas fa-phone text-muted mr-2"></i>
            <span class="text-muted font-weight-bold">
              {{ $appointment->applicant_phone }}
            </span>
          </div>
          <div class="col-md-3">
            @if (strtolower($appointment->status) == 'requested')
              <i class="fas fa-check-circle text-primary mr-2"></i>
              Requested
            @else
              <i class="fas fa-check-circle text-success mr-2"></i>
              {{ $appointment->status }}
            @endif
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
