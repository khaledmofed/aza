<div class="col-sm-6 col-lg-4 col-xl-3">
    <div class="form-card text-center h-100 position-relative">
        @if($member->is_featured)
            <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2">
                <i class="bi bi-star-fill me-1"></i>Featured
            </span>
        @endif
        <img src="{{ Storage::disk('public')->url($member->photo) }}"
             class="rounded-circle mb-3" style="width:80px;height:80px;object-fit:cover;" alt="{{ $member->name }}"/>
        <h6 class="fw-bold mb-0">{{ $member->name }}</h6>
        <p class="text-muted small mb-2">{{ $member->position }}</p>
        @if($member->is_active)
            <span class="badge badge-status-active mb-3">Active</span>
        @else
            <span class="badge badge-status-inactive mb-3">Inactive</span>
        @endif
        <div class="d-flex gap-2 justify-content-center">
            <a href="{{ route('admin.team.edit', $member) }}" class="btn btn-sm btn-outline-primary">
                <i class="bi bi-pencil"></i>
            </a>
            <form action="{{ route('admin.team.destroy', $member) }}" method="POST"
                  onsubmit="return confirm('Delete this member?')">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
            </form>
        </div>
    </div>
</div>
