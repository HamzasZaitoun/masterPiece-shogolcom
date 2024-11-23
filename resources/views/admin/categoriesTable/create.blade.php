@extends('admin.source.template')
@section('content')
<h1>Categories dashboard</h1>

<h2>Add Category</h2>
<form id="addJobForm"onsubmit="return categoryForm(this);">
    <div><label>ID</label><input type="text" id="id" required></div>
    <div><label>Name</label><input type="text" id="name" required></div>
    <div><label>Description</label><input type="text" id="description"></div>
    <div><label>Image</label><input type="text" id="image"></div>
    <div><label>Created at</label><input type="date" id="createdAt" required></div>
    <div><label>Updated at</label><input type="date" id="updatedAt" required></div>
    <div><label>Deleted at</label><input type="date" id="deletedAt" required></div>
    <div></div>
    <div></div> 
    <div></div>   
    <div class="button-container">
        <button type="submit">Add Category</button>
    </div>
</form>
@endsection