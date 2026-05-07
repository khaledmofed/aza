@extends('admin.layouts.app')

@section('title', 'Portfolio')
@section('page-title', 'Portfolio')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Portfolio Items <span class="badge bg-secondary">{{ $items->count() }}</span></h5>
    <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary btn-sm">
        <i class="bi bi-plus-lg me-1"></i> Add Item
    </a>
</div>

<div class="form-card p-0 overflow-hidden">
    <table class="table table-hover mb-0">
        <thead class="table-light">
            <tr>
                <th>Preview</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Link Type</th>
                <th>Featured</th>
                <th>Status</th>
                <th>Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
            <tr>
                <td>
                    <img src="{{ Storage::disk('public')->url($item->image) }}"
                         style="width:70px;height:45px;object-fit:cover;border-radius:4px;" alt=""/>
                </td>
                <td>{{ $item->title }}</td>
                <td><code class="small">{{ $item->slug }}</code></td>
                <td><span class="badge bg-secondary">{{ $item->link_type }}</span></td>
                <td>
                    @if($item->is_featured)
                        <i class="bi bi-star-fill text-warning"></i>
                    @else
                        <i class="bi bi-star text-muted"></i>
                    @endif
                </td>
                <td>
                    @if($item->is_active)
                        <span class="badge badge-status-active">Active</span>
                    @else
                        <span class="badge badge-status-inactive">Inactive</span>
                    @endif
                </td>
                <td>{{ $item->sort_order }}</td>
                <td>
                    <a href="{{ route('admin.portfolio.edit', $item) }}"
                       class="btn btn-sm btn-outline-primary me-1">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('admin.portfolio.destroy', $item) }}" method="POST"
                          class="d-inline" onsubmit="return confirm('Delete this item and all its images?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="8" class="text-center text-muted py-4">No portfolio items yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
