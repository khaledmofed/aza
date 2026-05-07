@extends('admin.layouts.app')

@section('title', $testimonial->exists ? 'Edit Testimonial' : 'New Testimonial')
@section('page-title', $testimonial->exists ? 'Edit Testimonial' : 'Add Testimonial')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <form action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}"
              method="POST">
            @csrf
            @if($testimonial->exists) @method('PUT') @endif
            <div class="form-card">
                <h6 class="fw-bold mb-4">Testimonial Details</h6>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Quote / Content *</label>
                    <textarea name="content" class="form-control @error('content') is-invalid @enderror"
                              rows="4" required>{{ old('content', $testimonial->content) }}</textarea>
                    @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Author Name *</label>
                        <input type="text" name="author" class="form-control @error('author') is-invalid @enderror"
                               value="{{ old('author', $testimonial->author) }}" required>
                        @error('author') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Company / Source</label>
                        <input type="text" name="company" class="form-control"
                               value="{{ old('company', $testimonial->company) }}" placeholder="e.g. ThemeForest">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" min="0"
                               value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}">
                    </div>
                    <div class="col-md-6 mb-3 d-flex align-items-end">
                        <div class="form-check pb-2">
                            <input type="hidden" name="is_active" value="0">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active"
                                   {{ old('is_active', $testimonial->is_active ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="is_active">Active</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-1"></i> {{ $testimonial->exists ? 'Update' : 'Create' }}
                </button>
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
