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
        method="POST" class="form">
        @csrf
        @method('PUT')

        <div class="input-field">
            <input class="input" placeholder="Enter your mail.."type="email" id="email" name="email"
                value="{{ old('email', $contact->email) }}" hidden>
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="select-container">
        {{-- <label>select Category</label> --}}
            <select class="select" id="category" name="category" value="{{ old('category') }}" hidden>
                <option value="" disabled selected>Select Category</option>
                <option value="Technical Issue"
                    {{ isset($contact) && $contact->category == 'Technical Issue' ? 'selected' : '' }}>Technical Issue
                </option>
                <option value="Feedback" {{ isset($contact) && $contact->category == 'Feedback' ? 'selected' : '' }}>
                    Feedback</option>
                <option value="General Inquiry"
                    {{ isset($contact) && $contact->category == 'General Inquiry' ? 'selected' : '' }}>General Inquiry
                </option>
                <option value="Other" {{ isset($contact) && $contact->category == 'Other' ? 'selected' : '' }}>Other
                </option>
            </select>
            @error('gender')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-field">
            <input class="input" placeholder="Enter your message ..." type="message" id="message" name="message"
                value="{{ $contact->message ?? old('message') }}" hidden>
            @error('message')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="select-container">
            <label for="status">Status</label>
            <select name="status" id="status" class="select" required>
                <option value="pending" {{ $contact->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="reviewed" {{ $contact->status == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                <option value="resolved" {{ $contact->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                <option value="closed" {{ $contact->status == 'closed' ? 'selected' : '' }}>Closed</option>
            </select>
        </div>

        <div class="input-field">
            <label for="response">Response</label>
            <input name="response" id="response" placeholder="response ..."class="input"
                value="{{ old('response', $contact->response) }}">
        </div>
        <div></div>
        <div></div>
        <div class="button-container">
            <button type="submit" class="create-btn">Update</button>
        </div>

    </form>
@endsection