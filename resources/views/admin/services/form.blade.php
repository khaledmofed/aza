@extends('admin.layouts.app')

@section('title', $service->exists ? 'Edit Service' : 'New Service')
@section('page-title', $service->exists ? 'Edit Service' : 'Add Service')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <form action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if($service->exists) @method('PUT') @endif
            <div class="form-card">
                <h6 class="fw-bold mb-4">Service Details</h6>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Icon Image <small class="text-muted">(e.g. PNG icon ~200×200px)</small></label>
                    @if($service->exists && $service->icon_image)
                        <div class="mb-2">
                            <img src="{{ Storage::disk('public')->url($service->icon_image) }}"
                                 style="width:60px;height:60px;object-fit:contain;" alt=""/>
                        </div>
                    @endif
                    <input type="file" name="icon_image" class="form-control" accept="image/*">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Title *</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title', $service->title) }}" required>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Description *</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                              rows="4" required>{{ old('description', $service->description) }}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" min="0"
                               value="{{ old('sort_order', $service->sort_order ?? 0) }}">
                    </div>
                    <div class="col-md-6 mb-3 d-flex align-items-end">
                        <div class="form-check pb-2">
                            <input type="hidden" name="is_active" value="0">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active"
                                   {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="is_active">Active</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-1"></i> {{ $service->exists ? 'Update' : 'Create' }} Service
                </button>
                <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
