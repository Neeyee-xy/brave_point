@php
  $selectedId = $settings?->{'heading_image'.$slot};
  $customImage = $settings?->{'leading_image'.$slot};
  $selectedPost = $blogs->firstWhere('id', $selectedId);
  $currentImage = $customImage ?: $selectedPost?->image;
@endphp
<div class="col-12">
  <div class="form-group border rounded p-3">
    <label class="mb-0">Leading Post {{ $slot }}</label>
    <small class="text-muted d-block mb-3">Choose the post this slot links to. You can also upload an image to show instead of the post's own image.</small>
    <div class="row">
      <div class="col-md-9">
        <div class="row leading-post-options" id="heading_image{{ $slot }}">
          @foreach($blogs as $blog)
            <div class="col-6 col-md-4 col-xl-3 mb-3">
              <label class="leading-post-option d-block h-100 mb-0">
                <input type="radio" name="heading_image{{ $slot }}" value="{{ $blog->id }}" @checked((string) $selectedId === (string) $blog->id)>
                <span class="card h-100 mb-0">
                  @if($blog->image)
                    <img src="{{ $blog->image }}" alt="" class="card-img-top" loading="lazy">
                  @endif
                  <span class="card-body p-2 small font-weight-bold">{{ $blog->title }}</span>
                </span>
              </label>
            </div>
          @endforeach
        </div>

        <small class="text-muted d-block mt-1 mb-1">Custom image (optional)</small>
        <input type="file" class="form-control" name="leading_image{{ $slot }}" accept="image/jpeg,image/png,image/gif,image/svg+xml,image/webp">
        @if($customImage)
          <div class="form-check mt-2">
            <input type="checkbox" class="form-check-input" id="remove_leading_image{{ $slot }}" name="remove_leading_image{{ $slot }}" value="1">
            <label class="form-check-label" for="remove_leading_image{{ $slot }}">Remove custom image (use the post image)</label>
          </div>
        @endif
      </div>
      <div class="col-md-3 text-center">
        <small class="text-muted d-block mb-1">Current image{{ $customImage ? ' (custom)' : '' }}</small>
        @if($currentImage)
          <img src="{{ $currentImage }}" alt="" class="img-fluid rounded" style="max-height: 160px; object-fit: cover;">
        @else
          <span class="text-muted">None</span>
        @endif
      </div>
    </div>
  </div>
</div>
