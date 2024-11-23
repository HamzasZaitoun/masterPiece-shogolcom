@extends('admin.source.template')
@section('content')
<h1>{NAME} profile</h1>
<div class="profile-container">
    <div class="row">
    <img src="assets/images/profile-2.jpg" alt="Profile Image" class="profile-image">
    <button class="edit-profle-btn">Edit Profile</button>
    </div>
    <div class="user-info">
        <p class="user-name">John Doe</p>
        <p></p>
        <p class="user-headline">Software Engineer at TechCorp</p>
        <p class="user-role">Role: admin</p>
        <p class="user-phone">Phone: +962 456 7890</p>
    </div>

</div>
@endsection