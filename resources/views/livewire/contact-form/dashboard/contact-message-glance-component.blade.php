<div class="bg-white border">


  {{-- First row --}}
  <div class="row pb-2-rm" style="margin: auto;">

    <div class="col-md-6 p-2-rm m-0 p-0 bg-info-rm" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-white',
          'btnRoute' => 'dashboard-contact-form',
          'iconFaClass' => 'fas fa-dice-d6',
          'btnTextPrimary' => 'Contact messages',
          'btnTextSecondary' => $contactMessageCount,
      ])
    </div>

    @if ($newContactMessageCount > 0)
      <div class="col-md-6 p-2-rm m-0" role="button">
        @include ('partials.misc.glance-card', [
            'bsBgClass' => 'bg-white',
            'btnRoute' => 'dashboard-contact-form',
            'iconFaClass' => 'fas fa-dice-d6',
            'btnTextPrimary' => 'New',
            'btnTextSecondary' => $newContactMessageCount,
        ])
      </div>
    @endif

  </div>


</div>
