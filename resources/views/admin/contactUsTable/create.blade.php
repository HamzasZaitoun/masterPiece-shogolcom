@extends('admin.source.template')

@section('content')
    <h1>{{ isset($contact) ? 'Edit' : 'Create' }} Contact Message</h1>
    <form
        action="{{ isset($contact) ? route('admin.contactUs.update', $contact->contact_id) : route('admin.contactUs.store') }}"
        method="POST" class="form">
        @csrf
        @if (isset($contact))
            @method('PUT')
        @endif
        <div class="input-field">
            <input class="input" placeholder="Enter your name.."type="text" id="name" name="name" required>
            @error('name')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-field">
            <input class="input" placeholder="Enter your mail.."type="email" id="email" name="email" required>
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="select-container">
            <select class="select" id="category" name="category" value="{{ old('category') }}" required>
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
                value="{{ $contact->message ?? old('message') }}">
            @error('message')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div></div>
        <div></div>
        <div></div>
        <div class="button-container">
            <button class="create-btn" type="submit">Submit</button>
        </div>
    </form>
@endsection
