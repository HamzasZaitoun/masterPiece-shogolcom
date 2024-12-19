@extends('admin.source.template')

@section('content')
<h1>{{ isset($contact) ? 'Edit' : 'Create' }} Contact Message</h1>
<form action="{{ isset($contact) ? route('admin.contactUs.update', $contact->contact_id) : route('admin.contactUs.store') }}" method="POST">
    @csrf
    @if(isset($contact))
        @method('PUT')
    @endif
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $contact->name ?? old('name') }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ $contact->email ?? old('email') }}" required>
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select name="category" id="category" required>
            <option value="Technical Issue" {{ (isset($contact) && $contact->category == 'Technical Issue') ? 'selected' : '' }}>Technical Issue</option>
            <option value="Feedback" {{ (isset($contact) && $contact->category == 'Feedback') ? 'selected' : '' }}>Feedback</option>
            <option value="General Inquiry" {{ (isset($contact) && $contact->category == 'General Inquiry') ? 'selected' : '' }}>General Inquiry</option>
            <option value="Other" {{ (isset($contact) && $contact->category == 'Other') ? 'selected' : '' }}>Other</option>
        </select>
    </div>
    <div class="form-group">
        <label for="message">Message</label>
        <textarea name="message" id="message" required>{{ $contact->message ?? old('message') }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection
