<div>


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

  </div>


</div>
