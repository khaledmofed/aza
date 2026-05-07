@extends('admin.layouts.app')

@section('title', $item->exists ? 'Edit Portfolio Item' : 'New Portfolio Item')
@section('page-title', $item->exists ? 'Edit Portfolio Item' : 'Add Portfolio Item')

@section('content')
<div class="row g-4">
    <div class="col-lg-8">
        <form action="{{ $item->exists ? route('admin.portfolio.update', $item) : route('admin.portfolio.store') }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if($item->exists) @method('PUT') @endif

            <div class="form-card mb-4">
                <h6 class="fw-bold mb-4">Item Details</h6>

                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label class="form-label fw-semibold">Title *</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title', $item->title) }}" required>
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Slug <small class="text-muted">(auto-generated)</small></label>
                        <input type="text" name="slug" class="form-control"
                               value="{{ old('slug', $item->slug) }}" placeholder="leave blank to auto-generate">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Cover Image {{ $item->exists ? '(leave blank to keep)' : '*' }}</label>
                    @if($item->exists && $item->image)
                        <div class="mb-2">
                            <img src="{{ Storage::disk('public')->url($item->image) }}" class="image-preview" alt=""/>
                        </div>
                    @endif
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                           accept="image/*" {{ !$item->exists ? 'required' : '' }}>
                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Subtitle</label>
                    <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $item->subtitle) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Short Description</label>
                    <textarea name="short_description" class="form-control" rows="2">{{ old('short_description', $item->short_description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Full Description <small class="text-muted">(Col 1 on detail page)</small></label>
                    <textarea name="description" class="form-control" rows="4">{{ old('description', $item->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Project Details <small class="text-muted">(Col 2 on detail page)</small></label>
                    <textarea name="details" class="form-control" rows="4">{{ old('details', $item->details) }}</textarea>
                </div>

                <h6 class="fw-semibold mb-3 mt-2">Project Info <small class="text-muted fw-normal">(Col 3 — sidebar info)</small></h6>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label small">Client</label>
                        <input type="text" name="client" class="form-control" value="{{ old('client', $item->client) }}" placeholder="e.g. Dubai Municipality">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label small">Date</label>
                        <input type="text" name="project_date" class="form-control" value="{{ old('project_date', $item->project_date) }}" placeholder="e.g. March 2024">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label small">Category</label>
                        <input type="text" name="category" class="form-control" value="{{ old('category', $item->category) }}" placeholder="e.g. Electromechanical">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label small">Website URL</label>
                        <input type="url" name="website_url" class="form-control" value="{{ old('website_url', $item->website_url) }}" placeholder="https://">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Link Type</label>
                        <select name="link_type" class="form-select" id="link_type">
                            <option value="lightbox" {{ old('link_type', $item->link_type) === 'lightbox' ? 'selected' : '' }}>Lightbox (fancybox)</option>
                            <option value="page" {{ old('link_type', $item->link_type) === 'page' ? 'selected' : '' }}>Detail Page</option>
                            <option value="external" {{ old('link_type', $item->link_type) === 'external' ? 'selected' : '' }}>External URL</option>
                        </select>
                    </div>
                    <div class="col-md-8 mb-3" id="external_url_wrap">
                        <label class="form-label fw-semibold">External URL</label>
                        <input type="url" name="external_url" class="form-control"
                               value="{{ old('external_url', $item->external_url) }}" placeholder="https://">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" min="0"
                               value="{{ old('sort_order', $item->sort_order ?? 0) }}">
                    </div>
                    <div class="col-md-4 mb-3 d-flex align-items-end">
                        <div class="form-check pb-2">
                            <input type="hidden" name="is_featured" value="0">
                            <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured"
                                   {{ old('is_featured', $item->is_featured) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_featured">Featured (shows full caption)</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 d-flex align-items-end">
                        <div class="form-check pb-2">
                            <input type="hidden" name="is_active" value="0">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active"
                                   {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-1"></i>
                    {{ $item->exists ? 'Update Item' : 'Create Item' }}
                </button>
                <a href="{{ route('admin.portfolio.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <!-- Gallery images (only on edit) -->
    @if($item->exists)
    <div class="col-lg-4">
        <div class="form-card mb-4">
            <h6 class="fw-bold mb-3">Gallery Images ({{ $item->images->count() }})</h6>
            @foreach($item->images as $img)
            <div class="d-flex align-items-center gap-2 mb-2">
                <img src="{{ Storage::disk('public')->url($img->image) }}"
                     style="width:60px;height:45px;object-fit:cover;border-radius:4px;" alt=""/>
                <form action="{{ route('admin.portfolio.images.destroy', $img->id) }}" method="POST"
                      class="ms-auto" onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                </form>
            </div>
            @endforeach
        </div>
        <div class="form-card">
            <h6 class="fw-bold mb-3">Upload Gallery Images</h6>
            <form action="{{ route('admin.portfolio.images.store', $item) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="images[]" class="form-control mb-2" accept="image/*" multiple required>
                <button type="submit" class="btn btn-primary btn-sm w-100">
                    <i class="bi bi-upload me-1"></i> Upload
                </button>
            </form>
        </div>
    </div>
    @endif
</div>

@push('scripts')
<script>
    document.getElementById('link_type').addEventListener('change', function() {
        document.getElementById('external_url_wrap').style.display = this.value === 'external' ? 'block' : 'none';
    });
    document.getElementById('external_url_wrap').style.display =
        document.getElementById('link_type').value === 'external' ? 'block' : 'none';
</script>
@endpush
@endsection
