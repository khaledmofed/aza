@extends('admin.layouts.app')

@section('title', 'Fun Facts')
@section('page-title', 'Fun Facts / Stats')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Fun Facts <span class="badge bg-secondary">{{ $facts->count() }}</span></h5>
    <a href="{{ route('admin.fun-facts.create') }}" class="btn btn-primary btn-sm">
        <i class="bi bi-plus-lg me-1"></i> Add Stat
    </a>
</div>

<div class="row g-3 mb-4">
    @foreach($facts as $fact)
    <div class="col-6 col-md-3">
        <div class="stat-card text-center">
            <div class="display-6 fw-bold text-primary">{{ number_format($fact->count) }}</div>
            <div class="text-muted">{{ $fact->label }}</div>
            <div class="mt-2 d-flex gap-1 justify-content-center">
                <a href="{{ route('admin.fun-facts.edit', $fact) }}" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-pencil"></i>
                </a>
                <form action="{{ route('admin.fun-facts.destroy', $fact) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
