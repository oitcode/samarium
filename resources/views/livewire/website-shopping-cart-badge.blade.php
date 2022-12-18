<div class="d-inline-block-rm">
  <a href="{{ route('website-checkout') }}">
    <i class="fas fa-shopping-cart mr-2 text-danger"></i>
    <span class="text-secondary">
    Rs
    @php echo number_format( $total ); @endphp
    </span>
  </a>
</div>
