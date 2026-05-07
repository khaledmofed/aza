@extends('admin.layouts.app')

@section('title', $slider->exists ? 'Edit Slide' : 'New Slide')
@section('page-title', $slider->exists ? 'Edit Slide' : 'Add Slide')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <form action="{{ $slider->exists ? route('admin.sliders.update', $slider) : route('admin.sliders.store') }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if($slider->exists) @method('PUT') @endif

            <div class="form-card">
                <h6 class="fw-bold mb-4">Slide Details</h6>

                <!-- Image -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Slide Image {{ $slider->exists ? '(leave blank to keep current)' : '*' }}</label>
                    @if($slider->exists && $slider->image)
                        <div class="mb-2">
                            <img src="{{ Storage::disk('public')->url($slider->image) }}"
                                 class="image-preview" alt="current"/>
                        </div>
                    @endif
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                           accept="image/*" {{ !$slider->exists ? 'required' : '' }}>
                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <div class="form-text">Recommended: 1920×900px. Stored as optimized WebP.</div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title', $slider->title) }}" placeholder="e.g. The Way Template">
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Title Highlight <small class="text-muted">(coloured word)</small></label>
                        <input type="text" name="title_highlight" class="form-control"
                               value="{{ old('title_highlight', $slider->title_highlight) }}" placeholder="e.g. Template">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Subtitle / Tag Line</label>
                    <input type="text" name="subtitle" class="form-control"
                           value="{{ old('subtitle', $slider->subtitle) }}" placeholder="e.g. Awesome Retina HTML Template">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Transition Effect</label>
                        <select name="transition" class="form-select">
                            @foreach($transitions as $t)
                                <option value="{{ $t }}" {{ old('transition', $slider->transition) === $t ? 'selected' : '' }}>
                                    {{ $t }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-semibold">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" min="0"
                               value="{{ old('sort_order', $slider->sort_order ?? 0) }}">
                    </div>
                    <div class="col-md-3 mb-3 d-flex align-items-end">
                        <div class="form-check pb-2">
                            <input type="hidden" name="is_active" value="0">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active"
                                   {{ old('is_active', $slider->is_active ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="is_active">Active</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-1"></i>
                    {{ $slider->exists ? 'Update Slide' : 'Create Slide' }}
                </button>
                <a href="{{ route('admin.sliders.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
