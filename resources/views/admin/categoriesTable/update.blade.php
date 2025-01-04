@extends('admin.source.template')

@section('content')
    <div class="form-container d-flex justify-content-center align-items-center min-vh-100">
        <div class="form-content">
            <h1 class="text-center mb-4">Categories Dashboard</h1>
            <h2 class="text-center mb-4">Edit Category</h2>

            <!-- Edit Category Form -->
            <form class="form" id="editCategoryForm"
                action="{{ route('admin.categories.updateCategory', ['id' => $category->category_id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-field mb-3">
                    <!-- Category Picture -->
                    @if ($category->category_picture)
                        <div class="current-picture mb-3">
                            <p>Current Picture:</p>
                            <img src="{{ asset('uploads/categories/' . $category->category_picture) }}" alt="Category Image"
                                id="currentImage" width="210" height="210" class="current-img">
                        </div>
                    @endif
                </div>
                <div class="form-field mb-3 new-picture-preview">
                    <p>New Picture Preview:</p>
                    <img id="previewImage" src="#" alt="Preview Image" class="preview-img" style="display: none;">
                    <input placeholder="" type="file" id="category_picture" name="category_picture"accept="image/*">
                </div>
                <div></div>
                <div class="form-field mb-3">
                    <!-- Category Name -->
                    <label for="category_name" class="form-label">Category Name</label>
                    <input class="input" placeholder=""type="text" id="category_name" name="category_name"
                        class="form-control" value="{{ $category->category_name }}" required>
                </div>

                <div class="form-field mb-3">
                    <!-- Category Description -->
                    <label for="category_description" class="form-label">Description</label>
                    <input class="input" placeholder=""type="text" name="category_description" id="category_description"
                        class="form-control" value="{{ $category->category_description }}">
                </div>

                <!-- Submit Button -->
                <div></div>
                <div></div>
                <div class="button-container">
                    <button class="edit-save-btn" type="submit">update!</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('category_picture').addEventListener('change', function(event) {
            const file = event.target.files[0]; // Get the selected file
            const previewImage = document.getElementById('previewImage'); // Get the preview image element

            if (file) {
                const reader = new FileReader(); // Create a FileReader to read the file

                reader.onload = function(e) {
                    previewImage.src = e.target.result; // Set the preview image's src to the file's data URL
                    previewImage.style.display = 'inline'; // Make the preview image visible
                };

                reader.readAsDataURL(file); // Read the file as a data URL
            } else {
                previewImage.src = '#'; // Reset the preview image's src
                previewImage.style.display = 'none'; // Hide the preview image
            }
        });
    </script>
@endsection
{{-- *********************************************************** --}}
{{-- <div class="form-container d-flex justify-content-center align-items-center min-vh-100">
    <div class="form-content">
        <h1 class="text-center mb-4">Categories Dashboard</h1>
        <h2 class="text-center mb-4">Edit Category</h2>

        <form class="form" id="editCategoryForm"
            action="{{ route('admin.categories.updateCategory', ['id' => $category->category_id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @if ($category->category_picture)
                <div class="current-picture mb-3">
                    <p>Current Picture:</p>
                    <img src="{{ asset('uploads/categories/' . $category->category_picture) }}" alt="Category Image"
                        id="currentImage" width="210" height="210" class="current-img">
                </div>
            @endif
            <div class="new-picture-preview mt-3">
                <p>New Picture Preview:</p>
                <img id="previewImage" src="#" alt="Preview Image" class="preview-img" style="display: none;">
                <input placeholder="" type="file" id="category_picture" name="category_picture"accept="image/*">
            </div>
            <div class="form-field mb-3">
                <label for="category_name" class="form-label">Category Name</label>
                <input class="input form-control" placeholder="" type="text" id="category_name" name="category_name"
                    value="{{ $category->category_name }}" required>
            </div>

            <div class="form-field mb-3">
                <label for="category_description" class="form-label">Description</label>
                <input class="input form-control" placeholder="" type="text" name="category_description"
                    id="category_description" value="{{ $category->category_description }}">
            </div>
            <div class="button-container">
                <button class="edit-save-btn" type="submit">Update!</button>
            </div>
            <div></div>
            <div></div>
        </form>
    </div>
</div>

<script>
    document.getElementById('category_picture').addEventListener('change', function(event) {
        const file = event.target.files[0]; // Get the selected file
        const previewImage = document.getElementById('previewImage'); // Get the preview image element

        if (file) {
            const reader = new FileReader(); // Create a FileReader to read the file

            reader.onload = function(e) {
                previewImage.src = e.target.result; // Set the preview image's src to the file's data URL
                previewImage.style.display = 'inline'; // Make the preview image visible
            };

            reader.readAsDataURL(file); // Read the file as a data URL
        } else {
            previewImage.src = '#'; // Reset the preview image's src
            previewImage.style.display = 'none'; // Hide the preview image
        }
    });
</script> --}}