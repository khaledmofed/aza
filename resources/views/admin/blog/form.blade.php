@extends('admin.layouts.app')

@section('title', $post->exists ? 'Edit Post' : 'New Post')
@section('page-title', $post->exists ? 'Edit Blog Post' : 'New Blog Post')

@section('content')
<div class="row g-4">
    <div class="col-lg-8">
        <form action="{{ $post->exists ? route('admin.blog.update', $post) : route('admin.blog.store') }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if($post->exists) @method('PUT') @endif

            <div class="form-card mb-4">
                <h6 class="fw-bold mb-4">Post Details</h6>

                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label class="form-label fw-semibold">Title *</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title', $post->title) }}" required>
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Post Type *</label>
                        <select name="type" class="form-select" id="post_type">
                            @foreach($types as $type)
                                <option value="{{ $type }}" {{ old('type', $post->type ?? 'image') === $type ? 'selected' : '' }}>
                                    {{ ucfirst($type) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Slug <small class="text-muted">(auto-generated)</small></label>
                    <input type="text" name="slug" class="form-control"
                           value="{{ old('slug', $post->slug) }}" placeholder="Leave blank to auto-generate">
                </div>

                <!-- Image type fields -->
                <div class="post-field" id="field_image">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Featured Image</label>
                        @if($post->exists && $post->featured_image)
                            <div class="mb-2">
                                <img src="{{ Storage::disk('public')->url($post->featured_image) }}"
                                     class="image-preview" alt=""/>
                            </div>
                        @endif
                        <input type="file" name="featured_image" class="form-control" accept="image/*">
                    </div>
                </div>

                <!-- Video type fields -->
                <div class="post-field" id="field_video" style="display:none;">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">YouTube / Video Embed URL</label>
                        <input type="url" name="video_url" class="form-control"
                               value="{{ old('video_url', $post->video_url) }}"
                               placeholder="https://www.youtube.com/embed/VIDEO_ID">
                        <div class="form-text">Use the embed URL format: youtube.com/embed/...</div>
                    </div>
                </div>

                <!-- Quote type fields -->
                <div class="post-field" id="field_quote" style="display:none;">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Quote Text</label>
                        <textarea name="quote_text" class="form-control" rows="3">{{ old('quote_text', $post->quote_text) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Quote Author</label>
                        <input type="text" name="quote_author" class="form-control"
                               value="{{ old('quote_author', $post->quote_author) }}">
                    </div>
                </div>

                <!-- Carousel type fields -->
                <div class="post-field" id="field_carousel" style="display:none;">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Upload Carousel Images</label>
                        <input type="file" name="carousel_images[]" class="form-control" accept="image/*" multiple>
                        <div class="form-text">Upload multiple images. You can add more after saving.</div>
                    </div>
                </div>

                <!-- Audio type fields -->
                <div class="post-field" id="field_audio" style="display:none;">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Audio File (MP3 / OGG)</label>
                        @if($post->exists && $post->audio_file)
                            <div class="mb-2">
                                <audio controls class="w-100">
                                    <source src="{{ Storage::disk('public')->url($post->audio_file) }}" type="audio/mpeg">
                                </audio>
                            </div>
                        @endif
                        <input type="file" name="audio_file" class="form-control" accept=".mp3,.ogg,.wav">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Icon Code <small class="text-muted">(FontAwesome hex, no leading #)</small></label>
                    <select name="icon_code" class="form-select">
                        @foreach($iconCodes as $code => $label)
                            <option value="{{ $code }}" {{ old('icon_code', $post->icon_code ?? 'f040') === $code ? 'selected' : '' }}>
                                &#x{{ $code }}; — {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Excerpt</label>
                    <textarea name="excerpt" class="form-control" rows="2">{{ old('excerpt', $post->excerpt) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Full Content</label>
                    <textarea name="content" class="form-control" rows="8">{{ old('content', $post->content) }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label class="form-label fw-semibold">Publish Date</label>
                        <input type="datetime-local" name="published_at" class="form-control"
                               value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}">
                    </div>
                    <div class="col-md-7 mb-3 d-flex align-items-end">
                        <div class="form-check pb-2">
                            <input type="hidden" name="is_published" value="0">
                            <input class="form-check-input" type="checkbox" name="is_published" value="1" id="is_published"
                                   {{ old('is_published', $post->is_published ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="is_published">Published</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-1"></i> {{ $post->exists ? 'Update Post' : 'Create Post' }}
                </button>
                <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <!-- Carousel gallery management (edit only) -->
    @if($post->exists && $post->type === 'carousel')
    <div class="col-lg-4">
        <div class="form-card mb-4">
            <h6 class="fw-bold mb-3">Carousel Images ({{ $post->images->count() }})</h6>
            @foreach($post->images as $img)
            <div class="d-flex align-items-center gap-2 mb-2">
                <img src="{{ Storage::disk('public')->url($img->image) }}"
                     style="width:60px;height:45px;object-fit:cover;border-radius:4px;" alt=""/>
                <form action="{{ route('admin.blog.images.destroy', $img->id) }}" method="POST"
                      class="ms-auto" onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                </form>
            </div>
            @endforeach
        </div>
        <div class="form-card">
            <h6 class="fw-bold mb-3">Add More Images</h6>
            <form action="{{ route('admin.blog.images.store', $post) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="images[]" class="form-control mb-2" accept="image/*" multiple required>
                <button type="submit" class="btn btn-primary btn-sm w-100">
                    <i class="bi bi-upload me-1"></i> Upload
                </button>
            </form>
        </div>
    </div>
    @endif
</div>

@push('scripts')
<script>
    function showPostFields(type) {
        document.querySelectorAll('.post-field').forEach(el => el.style.display = 'none');
        const map = {
            'image':    ['field_image'],
            'video':    ['field_video'],
            'quote':    ['field_quote'],
            'carousel': ['field_carousel'],
            'audio':    ['field_audio', 'field_image'],
        };
        (map[type] || ['field_image']).forEach(id => {
            const el = document.getElementById(id);
            if (el) el.style.display = 'block';
        });
    }
    const postType = document.getElementById('post_type');
    postType.addEventListener('change', () => showPostFields(postType.value));
    showPostFields(postType.value);
</script>
@endpush
@endsection
