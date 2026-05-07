@extends('admin.layouts.app')

@section('title', 'Services')
@section('page-title', 'Services')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Services <span class="badge bg-secondary">{{ $services->count() }}</span></h5>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary btn-sm">
        <i class="bi bi-plus-lg me-1"></i> Add Service
    </a>
</div>

<div class="form-card p-0 overflow-hidden">
    <table class="table table-hover mb-0">
        <thead class="table-light">
            <tr><th>Icon</th><th>Title</th><th>Description</th><th>Order</th><th>Status</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @forelse($services as $service)
            <tr>
                <td>
                    @if($service->icon_image)
                        <img src="{{ Storage::disk('public')->url($service->icon_image) }}"
                             style="width:40px;height:40px;object-fit:contain;" alt=""/>
                    @else
                        <span class="text-muted">—</span>
                    @endif
                </td>
                <td class="fw-semibold">{{ $service->title }}</td>
                <td><span class="text-muted small">{{ Str::limit($service->description, 80) }}</span></td>
                <td>{{ $service->sort_order }}</td>
                <td>
                    @if($service->is_active)
                        <span class="badge badge-status-active">Active</span>
                    @else
                        <span class="badge badge-status-inactive">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-outline-primary me-1">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST"
                          class="d-inline" onsubmit="return confirm('Delete?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center text-muted py-4">No services yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
