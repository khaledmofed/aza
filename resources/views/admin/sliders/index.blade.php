@extends('admin.layouts.app')

@section('title', 'Sliders')
@section('page-title', 'Sliders')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Hero Sliders <span class="badge bg-secondary">{{ $sliders->count() }}</span></h5>
    <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary btn-sm">
        <i class="bi bi-plus-lg me-1"></i> Add Slide
    </a>
</div>

<div class="form-card p-0 overflow-hidden">
    <table class="table table-hover mb-0">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Preview</th>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Transition</th>
                <th>Order</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sliders as $slide)
            <tr>
                <td>{{ $slide->id }}</td>
                <td>
                    <img src="{{ Storage::disk('public')->url($slide->image) }}"
                         style="width:80px;height:50px;object-fit:cover;border-radius:4px;" alt=""/>
                </td>
                <td>{{ $slide->title }}</td>
                <td><small class="text-muted">{{ $slide->subtitle }}</small></td>
                <td><code>{{ $slide->transition }}</code></td>
                <td>{{ $slide->sort_order }}</td>
                <td>
                    @if($slide->is_active)
                        <span class="badge badge-status-active">Active</span>
                    @else
                        <span class="badge badge-status-inactive">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.sliders.edit', $slide) }}"
                       class="btn btn-sm btn-outline-primary me-1">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('admin.sliders.destroy', $slide) }}" method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Delete this slide?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="8" class="text-center text-muted py-4">No sliders yet. <a href="{{ route('admin.sliders.create') }}">Add the first one.</a></td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
