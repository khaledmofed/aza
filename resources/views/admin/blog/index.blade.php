@extends('admin.layouts.app')

@section('title', 'Blog Posts')
@section('page-title', 'Blog Posts')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Blog Posts <span class="badge bg-secondary">{{ $posts->total() }}</span></h5>
    <a href="{{ route('admin.blog.create') }}" class="btn btn-primary btn-sm">
        <i class="bi bi-plus-lg me-1"></i> New Post
    </a>
</div>

<div class="form-card p-0 overflow-hidden">
    <table class="table table-hover mb-0">
        <thead class="table-light">
            <tr><th>Thumb</th><th>Title</th><th>Type</th><th>Published</th><th>Status</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
            <tr>
                <td>
                    @if($post->featured_image)
                        <img src="{{ Storage::disk('public')->url($post->featured_image) }}"
                             style="width:60px;height:40px;object-fit:cover;border-radius:4px;" alt=""/>
                    @else
                        <span class="badge bg-light text-dark">{{ $post->type }}</span>
                    @endif
                </td>
                <td><strong>{{ $post->title }}</strong></td>
                <td>
                    @php
                        $typeColors = ['image'=>'info','video'=>'warning','quote'=>'secondary','carousel'=>'primary','audio'=>'success'];
                    @endphp
                    <span class="badge bg-{{ $typeColors[$post->type] ?? 'secondary' }}">{{ $post->type }}</span>
                </td>
                <td class="small text-muted">
                    {{ $post->published_at ? $post->published_at->format('d M Y') : '—' }}
                </td>
                <td>
                    @if($post->is_published)
                        <span class="badge badge-status-active">Published</span>
                    @else
                        <span class="badge badge-status-inactive">Draft</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.blog.edit', $post) }}" class="btn btn-sm btn-outline-primary me-1">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-sm btn-outline-secondary me-1" target="_blank">
                        <i class="bi bi-eye"></i>
                    </a>
                    <form action="{{ route('admin.blog.destroy', $post) }}" method="POST"
                          class="d-inline" onsubmit="return confirm('Delete this post?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center text-muted py-4">No blog posts yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-3">{{ $posts->links() }}</div>
@endsection
