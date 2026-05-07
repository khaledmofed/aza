@extends('admin.layouts.app')

@section('title', 'Messages')
@section('page-title', 'Contact Messages')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Messages <span class="badge bg-secondary">{{ $messages->total() }}</span></h5>
</div>

<div class="form-card p-0 overflow-hidden">
    <table class="table table-hover mb-0">
        <thead class="table-light">
            <tr><th></th><th>Name</th><th>Email</th><th>Message</th><th>Date</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @forelse($messages as $msg)
            <tr class="{{ !$msg->is_read ? 'fw-semibold' : '' }}">
                <td>
                    @if(!$msg->is_read)
                        <span class="badge bg-danger rounded-pill">New</span>
                    @endif
                </td>
                <td>{{ $msg->name }}</td>
                <td>{{ $msg->email }}</td>
                <td class="text-muted small">{{ Str::limit($msg->message, 60) }}</td>
                <td class="small text-muted">{{ $msg->created_at->format('d M Y H:i') }}</td>
                <td>
                    <a href="{{ route('admin.messages.show', $msg) }}" class="btn btn-sm btn-outline-primary me-1">
                        <i class="bi bi-eye"></i>
                    </a>
                    <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST"
                          class="d-inline" onsubmit="return confirm('Delete this message?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center text-muted py-4">No messages yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-3">{{ $messages->links() }}</div>
@endsection
