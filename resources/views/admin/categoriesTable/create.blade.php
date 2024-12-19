@extends('admin.source.template')
@section('content')
    <h1>Categories dashboard</h1>

    <h2>Add Category</h2>
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
    <form class="form" id="addCategoryForm" action="{{ route('admin.categories.storeCategory') }}"
        method="POST"enctype="multipart/form-data">
        @csrf
        <div>
            {{-- <label for="category_name">Name</label> --}}
            <input class="input" placeholder="Name"type="text" id="category_name" name="category_name" required>
        </div>
        <div>
            {{-- <label for="category_description">Description</label> --}}
            <input class="input" placeholder="Description"type="text" name="category_description" id="category_description">
        </div>
        <div>
            {{-- <label for="category_picture">Category picture</label> --}}
            <input class="input" placeholder="Category picture"type="file" id="category_picture" name="category_picture">
        </div>
        <div></div>

        <div class="button-container">
            <button class="create-btn" type="submit">Add</button>
        </div>
    </form>
@endsection
