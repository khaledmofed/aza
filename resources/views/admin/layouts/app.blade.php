<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — {{ setting('site_name', 'The Way') }} Dashboard</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-bg: #1a1d23;
            --sidebar-active: #e40513;
            --topbar-height: 60px;
        }
        body { background: #f4f6f9; font-family: 'Segoe UI', sans-serif; }

        /* Sidebar */
        #sidebar {
            position: fixed; top: 0; left: 0; bottom: 0;
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            overflow-y: auto; z-index: 1040;
            transition: width .25s;
        }
        #sidebar .sidebar-brand {
            padding: 18px 20px;
            border-bottom: 1px solid rgba(255,255,255,.08);
            color: #fff;
            font-size: 1.1rem; font-weight: 700;
            text-decoration: none; display: block;
        }
        #sidebar .nav-label {
            font-size: .68rem; letter-spacing: .1em;
            text-transform: uppercase; color: #6c7a89;
            padding: 14px 20px 4px;
        }
        #sidebar .nav-link {
            color: #b0bec5; padding: 9px 20px;
            font-size: .88rem; display: flex; align-items: center; gap: 10px;
            border-left: 3px solid transparent;
            transition: all .2s;
        }
        #sidebar .nav-link:hover,
        #sidebar .nav-link.active {
            color: #fff;
            background: rgba(255,255,255,.05);
            border-left-color: var(--sidebar-active);
        }
        #sidebar .nav-link .bi { font-size: 1rem; }

        /* Top bar */
        #topbar {
            position: fixed; top: 0; left: var(--sidebar-width); right: 0;
            height: var(--topbar-height);
            background: #fff;
            border-bottom: 1px solid #e9ecef;
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 24px; z-index: 1030;
        }

        /* Main content */
        #main-content {
            margin-left: var(--sidebar-width);
            padding-top: calc(var(--topbar-height) + 24px);
            min-height: 100vh;
            padding-left: 24px; padding-right: 24px; padding-bottom: 40px;
        }

        /* Cards */
        .stat-card {
            border: none; border-radius: 10px; padding: 20px;
            background: #fff; box-shadow: 0 1px 4px rgba(0,0,0,.08);
        }
        .stat-card .stat-icon {
            width: 48px; height: 48px; border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem; color: #fff;
        }

        /* Tables */
        .table th { font-size: .78rem; text-transform: uppercase; letter-spacing: .06em; color: #6c757d; }
        .badge-status-active { background: #d4edda; color: #155724; }
        .badge-status-inactive { background: #f8d7da; color: #721c24; }

        /* Forms */
        .form-card {
            background: #fff; border-radius: 10px;
            box-shadow: 0 1px 4px rgba(0,0,0,.08); padding: 28px;
        }
        .image-preview { max-width: 200px; max-height: 150px; object-fit: cover; border-radius: 6px; }
    </style>

    @stack('styles')
</head>
<body>

<!-- Sidebar -->
<nav id="sidebar">
    <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
        <i class="bi bi-layout-text-sidebar me-2"></i> AZA Admin
    </a>

    <div class="nav-label">Dashboard</div>
    <a href="{{ route('admin.dashboard') }}"
       class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2"></i> Overview
    </a>

    <div class="nav-label">Front Page</div>
    <a href="{{ route('admin.sliders.index') }}"
       class="nav-link {{ request()->routeIs('admin.sliders*') ? 'active' : '' }}">
        <i class="bi bi-images"></i> Sliders
    </a>
    <a href="{{ route('admin.about.index') }}"
       class="nav-link {{ request()->routeIs('admin.about*') ? 'active' : '' }}">
        <i class="bi bi-info-circle"></i> About Section
    </a>
    <a href="{{ route('admin.team.index') }}"
       class="nav-link {{ request()->routeIs('admin.team*') ? 'active' : '' }}">
        <i class="bi bi-people"></i> Team
    </a>
    <a href="{{ route('admin.portfolio.index') }}"
       class="nav-link {{ request()->routeIs('admin.portfolio*') ? 'active' : '' }}">
        <i class="bi bi-grid-3x3-gap"></i> Portfolio
    </a>
    <a href="{{ route('admin.services.index') }}"
       class="nav-link {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
        <i class="bi bi-gear"></i> Services
    </a>
    <a href="{{ route('admin.testimonials.index') }}"
       class="nav-link {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}">
        <i class="bi bi-chat-quote"></i> Testimonials
    </a>
    <a href="{{ route('admin.fun-facts.index') }}"
       class="nav-link {{ request()->routeIs('admin.fun-facts*') ? 'active' : '' }}">
        <i class="bi bi-bar-chart"></i> Fun Facts
    </a>

    <div class="nav-label">Content</div>
    <a href="{{ route('admin.blog.index') }}"
       class="nav-link {{ request()->routeIs('admin.blog*') ? 'active' : '' }}">
        <i class="bi bi-newspaper"></i> Blog Posts
    </a>
    <a href="{{ route('admin.pages.index') }}"
       class="nav-link {{ request()->routeIs('admin.pages*') ? 'active' : '' }}">
        <i class="bi bi-file-text"></i> Pages
    </a>

    <div class="nav-label">Inbox</div>
    <a href="{{ route('admin.messages.index') }}"
       class="nav-link {{ request()->routeIs('admin.messages*') ? 'active' : '' }}">
        <i class="bi bi-envelope"></i> Messages
        @php $unread = \App\Models\ContactMessage::unread()->count(); @endphp
        @if($unread > 0)
            <span class="badge rounded-pill bg-danger ms-auto">{{ $unread }}</span>
        @endif
    </a>

    <div class="nav-label">Config</div>
    <a href="{{ route('admin.settings.index') }}"
       class="nav-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
        <i class="bi bi-sliders"></i> Site Settings
    </a>
    <a href="{{ route('home') }}" class="nav-link" target="_blank">
        <i class="bi bi-box-arrow-up-right"></i> View Site
    </a>
    <form method="POST" action="{{ route('logout') }}" class="px-3 pb-3 mt-2">
        @csrf
        <button type="submit" class="btn btn-sm btn-outline-danger w-100">
            <i class="bi bi-box-arrow-left me-1"></i> Logout
        </button>
    </form>
</nav>

<!-- Top Bar -->
<div id="topbar">
    <div class="d-flex align-items-center gap-2">
        <h6 class="mb-0 text-muted">@yield('page-title', 'Dashboard')</h6>
        @hasSection('breadcrumbs')
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 small">
                    @yield('breadcrumbs')
                </ol>
            </nav>
        @endif
    </div>
    <div class="d-flex align-items-center gap-3">
        <span class="text-muted small">{{ auth()->user()->name }}</span>
    </div>
</div>

<!-- Main Content -->
<main id="main-content">

    {{-- Flash messages --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <strong>Please fix the following errors:</strong>
            <ul class="mb-0 mt-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</main>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')
</body>
</html>
