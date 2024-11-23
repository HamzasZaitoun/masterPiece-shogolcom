@extends('admin.source.template')
@section('content')
<h1>Jobs dashboard</h1>
<h2>Add Job</h2>
<form id="addJobForm"onsubmit="return jobForm(this);">
    <div><label>ID</label><input type="text" id="add-id"></div>
    <div><label>User ID</label><input type="text" id="add-userId" required></div>
    <div><label>Title</label><input type="text" id="add-title" required></div>
    <div><label>Description</label><input type="text" id="add-description"></div>
    <div><label>City</label><input type="text" id="add-city"></div>
    <div><label>Payment Method</label><input type="text" id="add-paymentMethod"></div>
    <div><label>Total Amount</label><input type="number" id="add-totalAmount"></div>
    <div><label>Job Duration</label><input type="text" id="add-jobDuration"></div>
    <div><label>Post Life Time</label><input type="text" id="add-postLifeTime"></div>
    <div><label>Is Urgent</label><input type="text" id="add-isUrgent"></div>
    <div><label>Job Image</label><input type="text" id="add-jobImage"></div>
    <div><label>Status</label><input type="text" id="add-status"></div>
    <div><label>Category</label><input type="text" id="add-category"></div>
    <div><label>Number of Workers</label><input type="number" id="add-numberOfWorkers"></div>
    <div><label>Created Date</label><input type="date" id="add-createdDate"></div>
    <div><label>Updated Date</label><input type="date" id="add-updatedDate"></div>
    <div><label>Uploaded Date</label><input type="date" id="add-uploadedDate"></div>
    <div><label>Delete Date</label><input type="date" id="add-deleteDate"></div>
    <div class="button-container">
        <button type="submit" onclick="addJob()">Add Job</button>
    </div>
</form>
@endsection