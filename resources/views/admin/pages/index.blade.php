@extends('admin.layouts.app')

@section('title', 'Pages')
@section('page-title', 'Dynamic Pages')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Pages <span class="badge bg-secondary">{{ $pages->count() }}</span></h5>
    <a href="{{ route('admin.pages.create') }}" class="btn btn-primary btn-sm">
        <i class="bi bi-plus-lg me-1"></i> New Page
    </a>
</div>

<div class="form-card p-0 overflow-hidden">
    <table class="table table-hover mb-0">
        <thead class="table-light">
            <tr><th>Title</th><th>Slug</th><th>Status</th><th>Updated</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @forelse($pages as $page)
            <tr>
                <td class="fw-semibold">{{ $page->title }}</td>
                <td><code class="small">/page/{{ $page->slug }}</code></td>
                <td>
                    @if($page->is_published)
                        <span class="badge badge-status-active">Published</span>
                    @else
                        <span class="badge badge-status-inactive">Draft</span>
                    @endif
                </td>
                <td class="small text-muted">{{ $page->updated_at?->format('d M Y') ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-outline-primary me-1">
                        <i class="bi bi-pencil"></i>
                    </a>
                    @if($page->is_published)
                    <a href="{{ route('page.show', $page->slug) }}" class="btn btn-sm btn-outline-secondary me-1" target="_blank">
                        <i class="bi bi-eye"></i>
                    </a>
                    @endif
                    <form action="{{ route('admin.pages.destroy', $page) }}" method="POST"
                          class="d-inline" onsubmit="return confirm('Delete this page?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center text-muted py-4">No pages yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
