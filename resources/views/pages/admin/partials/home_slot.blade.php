@php
  $selectedId = $settings?->{'product_id_'.$slot};
  $customImage = $settings?->{'image_'.$slot};
  $selectedProduct = $products->firstWhere('id', $selectedId);
  $currentImage = $customImage ?: $selectedProduct?->image;
@endphp
<div class="col-12 col-sm-12 col-md-12">
  <div class="form-group border rounded p-3">
    <label>{{ $label }}</label>
    <div class="row">
      <div class="col-md-9">
        <small class="text-muted d-block mb-2">Product (the image links to this product)</small>
        <div class="row" id="heading_image{{ $slot }}">
          @foreach($products as $product)
            <div class="col-lg-4">
              <input type="radio" class="ml-2" name="product_id_{{ $slot }}" value="{{ $product->id }}" @checked((string) $selectedId === (string) $product->id)>
              <h6 class="d-inline">{{ $product->name }}</h6>
            </div>
          @endforeach
        </div>

        <small class="text-muted d-block mt-3 mb-1">Custom image (optional, replaces the product image on the homepage)</small>
        <input type="file" class="form-control" name="image_{{ $slot }}" accept="image/jpeg,image/png,image/gif,image/svg+xml,image/webp">
        @if($customImage)
          <div class="form-check mt-2">
            <input type="checkbox" class="form-check-input" id="remove_image_{{ $slot }}" name="remove_image_{{ $slot }}" value="1">
            <label class="form-check-label" for="remove_image_{{ $slot }}">Remove custom image (use the product image)</label>
          </div>
        @endif
      </div>
      <div class="col-md-3 text-center">
        <small class="text-muted d-block mb-1">Current image{{ $customImage ? ' (custom)' : '' }}</small>
        @if($currentImage)
          <img src="{{ $currentImage }}" alt="" style="max-width: 100%; max-height: 120px; object-fit: contain;">
        @else
          <span class="text-muted">None</span>
        @endif
      </div>
    </div>
  </div>
</div>
