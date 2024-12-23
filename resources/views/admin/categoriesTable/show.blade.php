@extends('admin.source.template')
@section('content')
    {{-- <div class="details-container">
        <h2 class="details-header text-secondary">{{ $category->category_name }} Details</h2>

        <!-- Category Data Table -->
        <table class="details-table">
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $category->category_id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $category->category_name }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $category->category_description }}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td><img src="{{ asset('uploads/categories/' . $category->category_picture) }}" alt="Category Image"
                            class="category-image"></td>
                </tr>
                <tr>
                    <th>Created at</th>
                    <td>{{ $category->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated at</th>
                    <td>{{ $category->updated_at }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Action Buttons -->
        <div class="button-container">
            <button onclick="location.href='{{ route('admin.categories.editCategory', ['id' => $category->category_id]) }}'"
                class="edit-btn">
                <i class="bi bi-pencil-square"></i> Edit Category
            </button>

        </div>

    </div> --}}
    {{-- ------------------------------------------------------- --}}
    <div class="category-container">
        <div class="category">
            <div class="img"><img src="{{ asset('uploads/categories/' . $category->category_picture) }}"
                    alt="Category Image" class="category-image"></div>
            <span>{{ $category->category_name }} ({{ $category->category_id }})</span>
            <p class="info">
                {{ $category->category_description }}
            </p>
            <P class="info">Created at : {{ $category->created_at }}</P>
            <P class="info">Updated at :{{ $category->updated_at }}</P>
            <div class="button-container">
                <button
                    onclick="location.href='{{ route('admin.categories.editCategory', ['id' => $category->category_id]) }}'"
                    class="edit-btn btn btn-primary btn-lg shadow-sm rounded-pill px-4 py-2 my-3">
                    <i class="bi bi-pencil-square"></i> Edit Category
                </button>
            </div>
        </div>
    </div>
@endsection
