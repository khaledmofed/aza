@extends('admin.layouts.app')

@section('title', 'Testimonials')
@section('page-title', 'Testimonials')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Testimonials <span class="badge bg-secondary">{{ $testimonials->count() }}</span></h5>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary btn-sm">
        <i class="bi bi-plus-lg me-1"></i> Add Testimonial
    </a>
</div>

<div class="row g-3">
    @forelse($testimonials as $t)
    <div class="col-md-6">
        <div class="form-card h-100">
            <i class="bi bi-quote fs-4 text-muted mb-2 d-block"></i>
            <p class="mb-2">{{ Str::limit($t->content, 180) }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <strong class="small">{{ $t->author }}</strong>
                    @if($t->company)<span class="text-muted small">, {{ $t->company }}</span>@endif
                    <br>
                    @if($t->is_active)
                        <span class="badge badge-status-active mt-1">Active</span>
                    @else
                        <span class="badge badge-status-inactive mt-1">Inactive</span>
                    @endif
                </div>
                <div>
                    <a href="{{ route('admin.testimonials.edit', $t) }}"
                       class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                    <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST"
                          class="d-inline" onsubmit="return confirm('Delete?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12"><p class="text-muted">No testimonials yet.</p></div>
    @endforelse
</div>
@endsection
