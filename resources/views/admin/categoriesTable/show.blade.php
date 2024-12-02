@extends('admin.source.template')

<style>
    .category-details-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .category-details-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .category-details-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .category-details-table th,
    .category-details-table td {
        padding: 12px 20px;
        text-align: left;
    }

    .category-details-table th {
        background-color: #219B9D;
        color: white;
        font-weight: bold;
    }

    .category-details-table td {
        background-color: #fff;
        border: 1px solid #ddd;
    }

    .category-image {
        max-width: 200px;
        max-height: 200px;
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    .button-container {
        text-align: center;
        margin-top: 30px;
    }

    .button-container button {
        margin: 10px;
        padding: 12px 20px;
        font-size: 16px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 50px;
        transition: background-color 0.3s ease;
    }

    .button-container button:hover {
        background-color: #218838;
    }

    .button-container .edit-btn {
        background-color: #219B9D;
    }

    .button-container .edit-btn:hover {
        background-color: #219B9D;
    }
</style>

@section('content')

<div class="category-details-container">
    <h2 class="category-details-header text-secondary">{{$category->category_name}} Details</h2>
    
    <!-- Category Data Table -->
    <table class="category-details-table">
        <thead>
            <tr>
                <th>Field</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{$category->category_id}}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{$category->category_name}}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{$category->category_description}}</td>
            </tr>
            <tr>
                <th>Image</th>
                <td><img src="{{ asset('uploads/categories/' . $category->category_picture) }}" alt="Category Image" class="category-image"></td>
            </tr>
            <tr>
                <th>Created at</th>
                <td>{{$category->created_at}}</td>
            </tr>
            <tr>
                <th>Updated at</th>
                <td>{{$category->updated_at}}</td>
            </tr>
        </tbody>
    </table>

    <!-- Action Buttons -->
    <div class="button-container">
        <button onclick="location.href='{{ route('admin.categories.editCategory', ['id' => $category->category_id]) }}'" class="edit-btn">
            <i class="bi bi-pencil-square"></i> Edit Category
        </button>
      
    </div>
   
</div>

@endsection
