@extends('admin.source.template')

@section('content')
<h1>Contact Messages</h1>
<div class="recent-orders">
    <div class="header-table">
        <h2 class="header-h2">Messages</h2>
    </div>
    <table id="userTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Category</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->contact_id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category }}</td>
                <td>{{ Str::limit($contact->message, 50) }}</td>
                <td class="action">
                    <a href="{{ route('admin.contactUs.show', $contact->contact_id) }}"><i class="bi bi-eye"></i></a>
                    <a href="{{ route('admin.contactUs.edit', $contact->contact_id) }}"><i class="bi bi-pencil"></i></a>
                    <form action="{{ route('admin.contactUs.destroy', $contact->contact_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
