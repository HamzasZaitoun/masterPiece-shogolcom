@extends('admin.source.template')

@section('content')
    <h1>Edit Contact Message</h1>

    @if ($errors->all())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ isset($contact) ? route('admin.contactUs.update', $contact->contact_id) : route('admin.contactUs.store') }}"
        method="POST">
        @csrf
        @method('PUT')


        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $contact->email) }}" class="form-control"
                required>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control" required>
                <option value="Technical Issue" {{ $contact->category == 'Technical Issue' ? 'selected' : '' }}>Technical
                    Issue</option>
                <option value="Feedback" {{ $contact->category == 'Feedback' ? 'selected' : '' }}>Feedback</option>
                <option value="General Inquiry" {{ $contact->category == 'General Inquiry' ? 'selected' : '' }}>General
                    Inquiry</option>
                <option value="Other" {{ $contact->category == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" class="form-control" required>{{ old('message', $contact->message) }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" {{ $contact->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="reviewed" {{ $contact->status == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                <option value="resolved" {{ $contact->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                <option value="closed" {{ $contact->status == 'closed' ? 'selected' : '' }}>Closed</option>
            </select>
        </div>

        <div class="form-group">
            <label for="response">Response</label>
            <textarea name="response" id="response" class="form-control">{{ old('response', $contact->response) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
