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

@php
    $featured = $members->where('is_featured', true);
    $grid     = $members->where('is_featured', false);
@endphp

{{-- Featured Section --}}
<div class="mb-2">
    <span class="fw-bold text-muted small text-uppercase letter-spacing-1">
        <i class="bi bi-star-fill text-warning me-1"></i> Featured Section (top of page)
    </span>
</div>
<div class="row g-4 mb-5">
    @forelse($featured as $member)
    @include('admin.team._card', ['member' => $member])
    @empty
    <div class="col-12">
        <p class="text-muted small">No featured member. Edit a member and check <strong>Featured</strong>.</p>
    </div>
    @endforelse
</div>

{{-- Our Team Grid --}}
<div class="mb-2">
    <span class="fw-bold text-muted small text-uppercase">
        <i class="bi bi-people me-1"></i> Our Team Grid (below featured)
    </span>
</div>
<div class="row g-4">
    @forelse($grid as $member)
    @include('admin.team._card', ['member' => $member])
    @empty
    <div class="col-12">
        <p class="text-muted small">No members in the grid yet.</p>
    </div>
    @endforelse
</div>
@endsection
