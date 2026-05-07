@extends('admin.layouts.app')

@section('title', $page->exists ? 'Edit Page' : 'New Page')
@section('page-title', $page->exists ? 'Edit Page' : 'Create Page')

@section('content')
<div class="row g-4">
    <div class="col-lg-8">
        <form action="{{ $page->exists ? route('admin.pages.update', $page) : route('admin.pages.store') }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if($page->exists) @method('PUT') @endif
            <div class="form-card mb-4">
                <h6 class="fw-bold mb-4">Page Details</h6>

                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label class="form-label fw-semibold">Page Title *</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title', $page->title) }}" required>
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Slug</label>
                        <input type="text" name="slug" class="form-control"
                               value="{{ old('slug', $page->slug) }}" placeholder="auto-generated">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Hero Image <small class="text-muted">(shown at top)</small></label>
                    @if($page->exists && $page->hero_image)
                        <div class="mb-2">
                            <img src="{{ Storage::disk('public')->url($page->hero_image) }}" class="image-preview" alt=""/>
                        </div>
                    @endif
                    <input type="file" name="hero_image" class="form-control" accept="image/*">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Content <small class="text-muted">(HTML allowed)</small></label>
                    <textarea name="content" class="form-control" rows="15" id="page_content">{{ old('content', $page->content) }}</textarea>
                </div>

                <hr>
                <h6 class="fw-semibold mb-3">SEO</h6>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control"
                           value="{{ old('meta_title', $page->meta_title) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description', $page->meta_description) }}</textarea>
                </div>

                <div class="form-check">
                    <input type="hidden" name="is_published" value="0">
                    <input class="form-check-input" type="checkbox" name="is_published" value="1" id="is_published"
                           {{ old('is_published', $page->is_published ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold" for="is_published">Published</label>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-1"></i> {{ $page->exists ? 'Update Page' : 'Create Page' }}
                </button>
                <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
