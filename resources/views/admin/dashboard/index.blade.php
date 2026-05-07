@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')

<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="text-muted small mb-1">Sliders</div>
                    <h3 class="mb-0 fw-bold">{{ $stats['sliders'] }}</h3>
                </div>
                <div class="stat-icon" style="background:#0d6efd20;color:#0d6efd;">
                    <i class="bi bi-images"></i>
                </div>
            </div>
            <a href="{{ route('admin.sliders.index') }}" class="small text-primary text-decoration-none mt-2 d-block">
                Manage &rarr;
            </a>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="text-muted small mb-1">Portfolio Items</div>
                    <h3 class="mb-0 fw-bold">{{ $stats['portfolio'] }}</h3>
                </div>
                <div class="stat-icon" style="background:#19875420;color:#198754;">
                    <i class="bi bi-grid-3x3-gap"></i>
                </div>
            </div>
            <a href="{{ route('admin.portfolio.index') }}" class="small text-primary text-decoration-none mt-2 d-block">
                Manage &rarr;
            </a>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="text-muted small mb-1">Blog Posts</div>
                    <h3 class="mb-0 fw-bold">{{ $stats['blog'] }}</h3>
                </div>
                <div class="stat-icon" style="background:#fd7e1420;color:#fd7e14;">
                    <i class="bi bi-newspaper"></i>
                </div>
            </div>
            <a href="{{ route('admin.blog.index') }}" class="small text-primary text-decoration-none mt-2 d-block">
                Manage &rarr;
            </a>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="text-muted small mb-1">Messages</div>
                    <h3 class="mb-0 fw-bold">
                        {{ $stats['messages'] }}
                        @if($stats['unread_messages'] > 0)
                            <span class="fs-6 badge bg-danger">{{ $stats['unread_messages'] }} new</span>
                        @endif
                    </h3>
                </div>
                <div class="stat-icon" style="background:#dc354520;color:#dc3545;">
                    <i class="bi bi-envelope"></i>
                </div>
            </div>
            <a href="{{ route('admin.messages.index') }}" class="small text-primary text-decoration-none mt-2 d-block">
                View Inbox &rarr;
            </a>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Quick Links -->
    <div class="col-md-4">
        <div class="form-card h-100">
            <h6 class="fw-bold mb-3"><i class="bi bi-lightning me-2 text-warning"></i>Quick Actions</h6>
            <div class="d-grid gap-2">
                <a href="{{ route('admin.sliders.create') }}" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-plus-lg me-1"></i> New Slide
                </a>
                <a href="{{ route('admin.blog.create') }}" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-plus-lg me-1"></i> New Blog Post
                </a>
                <a href="{{ route('admin.portfolio.create') }}" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-plus-lg me-1"></i> New Portfolio Item
                </a>
                <a href="{{ route('admin.team.create') }}" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-plus-lg me-1"></i> Add Team Member
                </a>
                <a href="{{ route('admin.settings.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-sliders me-1"></i> Site Settings
                </a>
            </div>
        </div>
    </div>

    <!-- Latest Messages -->
    <div class="col-md-8">
        <div class="form-card h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold mb-0"><i class="bi bi-envelope me-2 text-primary"></i>Latest Messages</h6>
                <a href="{{ route('admin.messages.index') }}" class="small text-primary text-decoration-none">View all</a>
            </div>
            @forelse($latestMessages as $msg)
            <div class="d-flex align-items-start gap-3 py-2 border-bottom">
                <div class="rounded-circle bg-primary bg-opacity-10 text-primary fw-bold d-flex align-items-center justify-content-center"
                     style="width:36px;height:36px;flex-shrink:0;">
                    {{ strtoupper(substr($msg->name, 0, 1)) }}
                </div>
                <div class="flex-grow-1 overflow-hidden">
                    <div class="d-flex justify-content-between">
                        <strong class="small">{{ $msg->name }}</strong>
                        <span class="small text-muted">{{ $msg->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="text-muted small text-truncate">{{ $msg->message }}</div>
                </div>
                @if(!$msg->is_read)
                    <span class="badge bg-danger rounded-pill">New</span>
                @endif
            </div>
            @empty
                <p class="text-muted small">No messages yet.</p>
            @endforelse
        </div>
    </div>
</div>

@endsection
