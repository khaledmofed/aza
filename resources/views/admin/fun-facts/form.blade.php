@extends('admin.layouts.app')

@section('title', $fact->exists ? 'Edit Stat' : 'New Stat')
@section('page-title', $fact->exists ? 'Edit Fun Fact' : 'Add Fun Fact')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <form action="{{ $fact->exists ? route('admin.fun-facts.update', $fact) : route('admin.fun-facts.store') }}"
              method="POST">
            @csrf
            @if($fact->exists) @method('PUT') @endif
            <div class="form-card">
                <h6 class="fw-bold mb-4">Stat Details</h6>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Label *</label>
                    <input type="text" name="label" class="form-control @error('label') is-invalid @enderror"
                           value="{{ old('label', $fact->label) }}" placeholder="e.g. Clients" required>
                    @error('label') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Count *</label>
                    <input type="number" name="count" class="form-control @error('count') is-invalid @enderror"
                           value="{{ old('count', $fact->count ?? 0) }}" min="0" required>
                    @error('count') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" min="0"
                           value="{{ old('sort_order', $fact->sort_order ?? 0) }}">
                </div>
            </div>
            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-1"></i> {{ $fact->exists ? 'Update' : 'Create' }} Stat
                </button>
                <a href="{{ route('admin.fun-facts.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
