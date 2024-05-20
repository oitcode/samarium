<div class="border bg-white">

    <div class="table-responsive">
      <table class="table">
        <tr>
          <th class="bg-light text-dark font-weight-bold"
              style="
                    {{--
                    background-color:
                        @if (\App\CmsTheme::first())
                          {{ \App\CmsTheme::first()->footer_bg_color }}
                        @else
                          orange
                        @endif
                        ;
                    color:
                        @if (\App\CmsTheme::first())
                          {{ \App\CmsTheme::first()->footer_text_color }}
                        @else
                          white
                        @endif
                        ;
                        --}}
              ">
            Latest posts
          </th>
        </tr>
        @foreach ($webpages as $webpage) 
        <tr>
          <td class="text-primary font-weight-bold">
            <a href="{{ route('website-webpage-' . $webpage->permalink) }}">
              {{ $webpage->name }}
            </a>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
</div>
