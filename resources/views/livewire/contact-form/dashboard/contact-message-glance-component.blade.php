<div class="bg-white border">


  <div class="row" style="margin: auto;">

    <div class="col-md-6 m-0 p-0" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-white',
          'btnRoute' => 'dashboard-contact-form',
          'iconFaClass' => 'fas fa-dice-d6',
          'btnTextPrimary' => 'Contact messages',
          'btnTextSecondary' => $contactMessageCount,
      ])
    </div>

    @if ($newContactMessageCount > 0)
      <div class="col-md-6 m-0" role="button">
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
