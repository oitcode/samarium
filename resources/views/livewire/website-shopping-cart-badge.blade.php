<div class="d-inline-block-rm">
  <a href="{{ route('website-checkout') }}">
    <i class="fas fa-shopping-cart mr-2 text-info"></i>
    <span class="text-dark">
    Rs
    @php echo number_format( $total ); @endphp
    </span>
  </a>
</div>
