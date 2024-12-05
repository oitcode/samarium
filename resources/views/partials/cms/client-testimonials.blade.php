<div>
  <div class="row">

    @for ($i=0; $i<3; $i++)
      <div class="col-md-4">
        <div class="card shadow">
          <div class="card-body">
            <div class="mb-3 text-center">
              <i class="fas fa-users fa-2x text-primary" style="{{--color: #F50;--}}"></i>
            </div>
            <div class="py-3 text-secondary">
              Example.com was the right choice for me. Loved the services provided
              by all the staffs.
            </div>
            <div class="bg-primary-rm text-primary p-2">
              Example Person
              <br />
              MBA <span class="text-secondary-rm ml-2">June 2020</span>
              <br />
              University of Example
            </div>
          </div>
        </div>
      </div>
    @endfor

  </div>
</div>
