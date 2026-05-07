@extends('admin.layouts.app')

@section('title', 'Team Members')
@section('page-title', 'Team Members')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Team Members <span class="badge bg-secondary">{{ $members->count() }}</span></h5>
    <a href="{{ route('admin.team.create') }}" class="btn btn-primary btn-sm">
        <i class="bi bi-plus-lg me-1"></i> Add Member
    </a>
</div>

<div class="row g-4">
    @forelse($members as $member)
    <div class="col-sm-6 col-lg-4 col-xl-3">
        <div class="form-card text-center h-100">
            <img src="{{ Storage::disk('public')->url($member->photo) }}"
                 class="rounded-circle mb-3" style="width:80px;height:80px;object-fit:cover;" alt="{{ $member->name }}"/>
            <h6 class="fw-bold mb-0">{{ $member->name }}</h6>
            <p class="text-muted small mb-2">{{ $member->position }}</p>
            @if($member->is_active)
                <span class="badge badge-status-active mb-3">Active</span>
            @else
                <span class="badge badge-status-inactive mb-3">Inactive</span>
            @endif
            <div class="d-flex gap-2 justify-content-center">
                <a href="{{ route('admin.team.edit', $member) }}" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-pencil"></i>
                </a>
                <form action="{{ route('admin.team.destroy', $member) }}" method="POST"
                      onsubmit="return confirm('Delete this member?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <p class="text-muted">No team members yet. <a href="{{ route('admin.team.create') }}">Add the first one.</a></p>
    </div>
    @endforelse
</div>
@endsection
