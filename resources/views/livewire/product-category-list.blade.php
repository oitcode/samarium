<x-box-list title="Product category list">
  @if ($productCategories != null && count($productCategories) > 0)
    <div class="table-responsive">
      <table class="table table-sm table-hover">
        <thead>
          <tr class="text-secondary">
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($productCategories as $productCategory)
            <tr>
              <td>
                {{ $productCategory->product_category_id }}
              </td>
              <td>
                <a href="" wire:click.prevent="">
                {{ $productCategory->name }}
                </a>
              </td>
              <td>
                <span class="btn btn-tool btn-sm" wire:click="">
                  <i class="fas fa-pencil-alt text-info"></i>
                </span>

                <span class="btn btn-tool btn-sm" wire:click="">
                  <i class="fas fa-trash text-danger"></i>
                </span>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    <div class="text-secondary py-3 px-3">
      No product categories.
    </div>
  @endif
</x-box-list>
