      {{-- Show in bigger screens --}}
      <div class="d-none d-md-block">

        <div class="text-center border-rm">
          <a href="{{ route('dashboard') }}" class="btn btn-warning-rm w-100 h-100 p-3 pl-4 font-weight-bold text-left" style="font-size: 1rem;">
            <div class="d-flex justify-content-center">
              <i class="far fa-check-circle fa-2x-rm text-primary mr-1" style="font-size: 1.3rem;"></i>
            </div>
            <span class="" style="font-size: 1.3rem;">
            </span>
          </a>
        </div>

        @can ('is-admin')
        <div class="text-center border">
          <a href="{{ route('dashboard') }}"
              class="btn
              @if(Route::current()->getName() == 'dashboard')
                {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
              @else
                {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
              @endif
              w-100 h-100 py-3 font-weight-bold text-left"
              style="font-size: calc(0.6rem + 0.15vw);
                @if(Route::current()->getName() == 'dashboard')
                  background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
                @endif
              "
              >

            <div class="d-flex flex-column">
              <div class="d-flex justify-content-center">
                <i class="fas fa-tv {{ env('OC_ASCENT_HL_COLOR', 'text-primary') }}"></i>
              </div>
              <div class="d-flex justify-content-center {{ env('OC_ASCENT_HL_TXT_COLOR', 'text-primary') }}">
                @if (true)
                  Dashboard
                @endif
              </div>
            </div>

          </a>
        </div>
        @endcan

        @if (env('SITE_TYPE') == 'erp')
        @can ('is-admin')
        <div class="text-center border">
          <a href="{{ route('sale') }}"
            class="btn 
              @if(Route::current()->getName() == 'sale')
                {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
              @else
                {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
              @endif
            w-100 h-100 p-4-rm py-3 font-weight-bold text-left"
            style="font-size: calc(0.6rem + 0.15vw);
              @if(Route::current()->getName() == 'sale')
                  background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
              @endif
            ">

            <div class="d-flex flex-column">
              <div class="d-flex justify-content-center">
                @if (env('CMP_TYPE') == 'cafe')
                  <i class="fas fa-skating {{ env('OC_ASCENT_HL_COLOR') }}"></i>
                @else
                  <i class="fas fa-dice-d6 {{ env('OC_ASCENT_HL_COLOR') }}"></i>
                @endif
              </div>
              <div class="d-flex justify-content-center {{ env('OC_ASCENT_HL_TXT_COLOR') }}">
                @if (env('CMP_TYPE') == 'cafe')
                  Takeaway
                @else
                  Sales
                @endif
              </div>
            </div>

          </a>
        </div>
        @endcan

        @if (env('CMP_TYPE') == 'cafe')
          <div class="text-center border">
            <a href="{{ route('cafesale') }}"
              class="btn
                @if(Route::current()->getName() == 'cafesale')
                  {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @else
                  {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @endif
              w-100 h-100 p-4-rm py-3 font-weight-bold text-left"

              style="font-size: calc(0.6rem + 0.15vw);
                @if(Route::current()->getName() == 'cafesale')
                  background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
                @endif
              ">

                <div class="d-flex flex-column">
                  <div class="d-flex justify-content-center">
                    <i class="fas fa-table {{ env('OC_ASCENT_HL_COLOR') }}"></i>
                  </div>
                  <div class="d-flex justify-content-center {{ env('OC_ASCENT_HL_TXT_COLOR') }}">
                      Tables
                  </div>
                </div>

            </a>
          </div>
        @endif
        @endif

        @can ('is-admin')
        <div class="text-center border">
          <a href="{{ route('menu') }}"
            class="btn
              @if(Route::current()->getName() == 'menu')
                {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
              @else
                {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
              @endif
            w-100 h-100 p-4-rm py-3 font-weight-bold text-left"
            style="font-size: calc(0.6rem + 0.15vw);
              @if(Route::current()->getName() == 'menu')
                background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
              @endif
            ">

            <div class="d-flex flex-column">
              <div class="d-flex justify-content-center">
                <i class="fas fa-list {{ env('OC_ASCENT_HL_COLOR') }}"></i>
              </div>
              <div class="d-flex justify-content-center {{ env('OC_ASCENT_HL_TXT_COLOR') }}">
                @if (env('CMP_TYPE') == 'cafe')
                  Menu
                @else
                  Products
                @endif
              </div>
            </div>

          </a>
        </div>
        @endcan

        @can ('is-admin')
          <div class="text-center border">
            <a href="{{ route('daybook') }}"
              class="btn
                @if(Route::current()->getName() == 'daybook')
                  {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @else
                  {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @endif
              w-100 h-100 p-4-rm py-3 font-weight-bold text-left"
              style="font-size: calc(0.6rem + 0.15vw);
                @if(Route::current()->getName() == 'daybook')
                  background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
                @endif
              ">

            <div class="d-flex flex-column">
              <div class="d-flex justify-content-center">
                <i class="fas fa-book {{ env('OC_ASCENT_HL_COLOR') }}"></i>
              </div>
              <div class="d-flex justify-content-center {{ env('OC_ASCENT_HL_TXT_COLOR') }}">
                @if (true)
                  Daybook
                @endif
              </div>
            </div>

            </a>
          </div>

          <div class="text-center border">
            <a href="{{ route('weekbook') }}"
              class="btn
                @if(Route::current()->getName() == 'weekbook')
                  {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @else
                  {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @endif
              w-100 h-100 p-4-rm py-3 font-weight-bold text-left"

              style="font-size: calc(0.6rem + 0.15vw);
                @if(Route::current()->getName() == 'weekbook')
                  background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
                @endif
              ">

            <div class="d-flex flex-column">
              <div class="d-flex justify-content-center">
                <i class="fas fa-book {{ env('OC_ASCENT_HL_COLOR') }}"></i>
              </div>
              <div class="d-flex justify-content-center {{ env('OC_ASCENT_HL_TXT_COLOR') }}">
                Weekbook
              </div>
            </div>

            </a>
          </div>

          @if (env('SITE_TYPE') == 'erp')
            <div class="text-center border">
            <a href="{{ route('customer') }}"
              class="btn
                @if(Route::current()->getName() == 'customer')
                  {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @else
                    {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @endif
              w-100 h-100 p-4-rm py-3 font-weight-bold text-left"

              style="font-size: calc(0.6rem + 0.15vw);
                @if(Route::current()->getName() == 'customer')
                  background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
                @endif
              ">
                <div class="d-flex flex-column">
                  <div class="d-flex justify-content-center">
                    <i class="fas fa-users {{ env('OC_ASCENT_HL_COLOR') }}"></i>
                  </div>
                  <div class="d-flex justify-content-center {{ env('OC_ASCENT_HL_TXT_COLOR') }}">
                    Customer
                  </div>
                </div>
              </a>
            </div>
          @elseif (env('SITE_TYPE') == 'ecs')
            <div class="text-center border">
            <a href="{{ route('customer') }}"
              class="btn
                @if(Route::current()->getName() == 'customer')
                  {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @else
                    {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @endif
              w-100 h-100 p-4-rm py-3 font-weight-bold text-left"

              style="font-size: calc(0.6rem + 0.15vw);
                @if(Route::current()->getName() == 'customer')
                  background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
                @endif
              ">
                <i class="fas fa-users mr-3 {{ env('OC_ASCENT_HL_COLOR') }}"></i>
                <div class="d-flex flex-column">
                  <div class="d-flex justify-content-center">
                    <i class="fas fa-users text-primary"></i>
                  </div>
                  <div class="d-flex justify-content-center text-secondary">
                    Students
                  </div>
                </div>
              </a>
            </div>
          @endif
        @endcan

        @if (env('SITE_TYPE') == 'erp')
          @can ('is-admin')
          <div class="text-center border">
            <a href="{{ route('online-order') }}"
              class="btn
                @if(Route::current()->getName() == 'online-order')
                  {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @else
                    {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @endif
              w-100 h-100 p-4-rm py-3 font-weight-bold text-left"

              style="font-size: calc(0.6rem + 0.15vw);
                @if(Route::current()->getName() == 'online-order')
                  background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
                @endif
              ">

              <div class="d-flex flex-column">
                <div class="d-flex justify-content-center">
                  <i class="fas fa-cloud-download-alt {{ env('OC_ASCENT_HL_COLOR') }}"></i>
                </div>
                <div class="d-flex justify-content-center {{ env('OC_ASCENT_HL_TXT_COLOR') }}">
                  Webborder
                </div>
              </div>

            </a>
          </div>
          @endcan
        @elseif (env('SITE_TYPE') == 'ecs')
          <div class="text-center border">
            <a href="{{ route('online-order') }}"
              class="btn
                @if(Route::current()->getName() == 'online-order')
                  {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @else
                    {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @endif
              w-100 h-100 p-4-rm py-3 font-weight-bold text-left"

              style="font-size: calc(0.6rem + 0.15vw);
                @if(Route::current()->getName() == 'online-order')
                  background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
                @endif
              ">

              <i class="fas fa-comment mr-3 {{ env('OC_ASCENT_HL_COLOR') }}"></i>
            </a>
          </div>
        @endif

      </div>
