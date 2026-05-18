@extends('admin.layouts.app')

@section('title', $member->exists ? 'Edit Team Member' : 'New Team Member')
@section('page-title', $member->exists ? 'Edit Team Member' : 'Add Team Member')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <form action="{{ $member->exists ? route('admin.team.update', $member) : route('admin.team.store') }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if($member->exists) @method('PUT') @endif

            <div class="form-card">
                <h6 class="fw-bold mb-4">Member Details</h6>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Photo {{ $member->exists ? '(leave blank to keep current)' : '*' }}</label>
                    @if($member->exists && $member->photo)
                        <div class="mb-2">
                            <img src="{{ Storage::disk('public')->url($member->photo) }}"
                                 class="rounded-circle" style="width:80px;height:80px;object-fit:cover;" alt=""/>
                        </div>
                    @endif
                    <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror"
                           accept="image/*" {{ !$member->exists ? 'required' : '' }}>
                    @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Full Name *</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $member->name) }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Position / Role *</label>
                        <input type="text" name="position" class="form-control @error('position') is-invalid @enderror"
                               value="{{ old('position', $member->position) }}" required>
                        @error('position') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Bio / Biography</label>
                    <textarea name="bio" class="form-control" rows="6"
                              placeholder="Write a detailed biography...">{{ old('bio', $member->bio) }}</textarea>
                </div>

                <h6 class="fw-semibold mb-2 mt-2">Social Links</h6>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label small"><i class="bi bi-twitter me-1"></i>Twitter URL</label>
                        <input type="url" name="twitter" class="form-control" value="{{ old('twitter', $member->twitter) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label small"><i class="bi bi-facebook me-1"></i>Facebook URL</label>
                        <input type="url" name="facebook" class="form-control" value="{{ old('facebook', $member->facebook) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label small"><i class="bi bi-github me-1"></i>GitHub URL</label>
                        <input type="url" name="github" class="form-control" value="{{ old('github', $member->github) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label small"><i class="bi bi-envelope me-1"></i>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $member->email) }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" min="0"
                               value="{{ old('sort_order', $member->sort_order ?? 0) }}">
                    </div>
                    <div class="col-md-3 mb-3 d-flex align-items-end">
                        <div class="form-check pb-2">
                            <input type="hidden" name="is_active" value="0">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active"
                                   {{ old('is_active', $member->is_active ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="is_active">Active</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 d-flex align-items-end">
                        <div class="form-check pb-2">
                            <input type="hidden" name="is_featured" value="0">
                            <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured"
                                   {{ old('is_featured', $member->is_featured ?? false) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="is_featured">
                                Featured <small class="text-muted fw-normal">(top section)</small>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-1"></i>
                    {{ $member->exists ? 'Update Member' : 'Add Member' }}
                </button>
                <a href="{{ route('admin.team.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
