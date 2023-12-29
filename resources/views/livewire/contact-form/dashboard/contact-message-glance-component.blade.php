<div class="">


  <div class="row" style="margin: auto;">

    <div class="col-md-12 m-0 p-0" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-dark',
          'btnRoute' => 'dashboard-contact-form',
          'iconFaClass' => 'fas fa-comment',
          'btnTextPrimary' => 'Contact messages',
          'btnTextSecondary' => $contactMessageCount,
      ])
    </div>

    @if (false)
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
    @endif

  </div>


</div>
