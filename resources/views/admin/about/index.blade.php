@extends('admin.layouts.app')

@section('title', 'About Section')
@section('page-title', 'About Section')

@section('content')
<div class="row g-4">

    <!-- Text content form -->
    <div class="col-lg-8">
        <form action="{{ route('admin.about.update') }}" method="POST">
            @csrf @method('PUT')
            <div class="form-card">
                <h6 class="fw-bold mb-4">About Section Content</h6>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Section Heading</label>
                        <input type="text" name="heading" class="form-control" value="{{ old('heading', $about->heading) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Subheading (h5)</label>
                        <input type="text" name="subheading" class="form-control" value="{{ old('subheading', $about->subheading) }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Subtitle Text (bold paragraph)</label>
                    <textarea name="subtext" class="form-control" rows="3" required>{{ old('subtext', $about->subtext) }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Body Text</label>
                    <textarea name="body_text" class="form-control" rows="4" required>{{ old('body_text', $about->body_text) }}</textarea>
                </div>

                <hr>
                <h6 class="fw-bold mb-3">Three Columns</h6>

                @foreach([
                    ['col1_heading', 'col1_text', 'Column 1: What We Do'],
                    ['col2_heading', 'col2_text', 'Column 2: What We Achieve'],
                    ['col3_heading', 'col3_text', 'Column 3: At The End'],
                ] as [$hField, $tField, $label])
                <div class="border rounded p-3 mb-3">
                    <label class="form-label fw-semibold small text-muted">{{ $label }}</label>
                    <input type="text" name="{{ $hField }}" class="form-control mb-2"
                           value="{{ old($hField, $about->{$hField}) }}" placeholder="Heading" required>
                    <textarea name="{{ $tField }}" class="form-control" rows="2"
                              placeholder="Body text" required>{{ old($tField, $about->{$tField}) }}</textarea>
                </div>
                @endforeach

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-1"></i> Save About Content
                </button>
            </div>
        </form>
    </div>

    <!-- Draggable images -->
    <div class="col-lg-4">
        <div class="form-card mb-4">
            <h6 class="fw-bold mb-3">About Stack Images ({{ $images->count() }}/5)</h6>
            @foreach($images as $img)
            <div class="d-flex align-items-center gap-2 mb-2">
                <img src="{{ Storage::disk('public')->url($img->image) }}"
                     style="width:60px;height:45px;object-fit:cover;border-radius:4px;" alt=""/>
                <span class="small text-muted">Order: {{ $img->sort_order }}</span>
                <form action="{{ route('admin.about.images.destroy', $img->id) }}" method="POST" class="ms-auto"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                </form>
            </div>
            @endforeach
        </div>

        @if($images->count() < 5)
        <div class="form-card">
            <h6 class="fw-bold mb-3">Upload New Image</h6>
            <form action="{{ route('admin.about.images.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                </div>
                <div class="mb-2">
                    <input type="number" name="sort_order" class="form-control" placeholder="Sort order" min="0"
                           value="{{ $images->count() }}">
                </div>
                <button type="submit" class="btn btn-primary btn-sm w-100">
                    <i class="bi bi-upload me-1"></i> Upload
                </button>
            </form>
        </div>
        @endif
    </div>
</div>
@endsection
