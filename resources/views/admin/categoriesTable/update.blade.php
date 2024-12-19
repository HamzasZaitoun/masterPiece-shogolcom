@extends('admin.source.template')

@section('content')

    <div class="form-container d-flex justify-content-center align-items-center min-vh-100">
        <div class="form-content">
            <h1 class="text-center mb-4">Categories Dashboard</h1>
            <h2 class="text-center mb-4">Edit Category</h2>

            <!-- Edit Category Form -->
            <form class="form" id="editCategoryForm" action="{{route('admin.categories.updateCategory', ['id' => $category->category_id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-field mb-3">
                    <!-- Category Picture -->
                    @if($category->category_picture)
                        <div class="current-picture mb-3">
                            <p>Current Picture:</p>
                            <img src="{{ asset('uploads/categories/' . $category->category_picture) }}" alt="Category Image" width="420" height="420" class="">
                        </div>
                    @endif
                    <h6>Upload a different photo...</h6>
                    <input class="input" placeholder=""type="file" class="form-control" id="category_picture" name="category_picture">
                </div>

                <div class="form-field mb-3">
                    <!-- Category Name -->
                    <label for="category_name" class="form-label">Category Name</label>
                    <input class="input" placeholder=""type="text" id="category_name" name="category_name" class="form-control" value="{{ $category->category_name }}" required>
                </div>

                <div class="form-field mb-3">
                    <!-- Category Description -->
                    <label for="category_description" class="form-label">Description</label>
                    <input class="input" placeholder=""type="text" name="category_description" id="category_description" class="form-control" value="{{ $category->category_description }}">
                </div>

                <!-- Submit Button -->
               <div></div>
                <div class="button-container">
                    <button class="edit-save-btn" type="submit">update!</button>
                </div>
            </form>
        </div>
    </div>

@endsection
