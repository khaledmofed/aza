@extends('admin.layouts.app')

@section('title', 'View Message')
@section('page-title', 'Message from ' . $message->name)

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="form-card">
            <div class="d-flex justify-content-between align-items-start mb-4">
                <h6 class="fw-bold mb-0">Message Details</h6>
                <form action="{{ route('admin.messages.read', $message) }}" method="POST">
                    @csrf @method('PATCH')
                    <button class="btn btn-sm btn-outline-secondary">
                        {{ $message->is_read ? 'Mark as Unread' : 'Mark as Read' }}
                    </button>
                </form>
            </div>
            <dl class="row">
                <dt class="col-sm-3 text-muted">From</dt>
                <dd class="col-sm-9 fw-semibold">{{ $message->name }}</dd>
                <dt class="col-sm-3 text-muted">Email</dt>
                <dd class="col-sm-9">
                    <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                </dd>
                <dt class="col-sm-3 text-muted">Received</dt>
                <dd class="col-sm-9">{{ $message->created_at->format('d M Y, H:i') }}</dd>
                <dt class="col-sm-3 text-muted">Status</dt>
                <dd class="col-sm-9">
                    @if($message->is_read)
                        <span class="badge badge-status-active">Read</span>
                    @else
                        <span class="badge bg-danger">Unread</span>
                    @endif
                </dd>
            </dl>
            <hr>
            <h6 class="fw-semibold mb-2">Message:</h6>
            <p style="white-space:pre-wrap;">{{ $message->message }}</p>

            <div class="d-flex gap-2 mt-4">
                <a href="mailto:{{ $message->email }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-reply me-1"></i> Reply via Email
                </a>
                <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary btn-sm">
                    &larr; Back to Inbox
                </a>
                <form action="{{ route('admin.messages.destroy', $message) }}" method="POST"
                      class="ms-auto" onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash me-1"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
