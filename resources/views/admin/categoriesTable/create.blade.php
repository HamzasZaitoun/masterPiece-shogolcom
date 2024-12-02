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
<form id="addCategoryForm" action="{{route('admin.categories.storeCategory')}}" method="POST"enctype="multipart/form-data" >
    @csrf
    <div>
        <label for="category_name">Name</label>
        <input type="text" id="category_name" name="category_name" required>
    </div>
    <div>
        <label for="category_description">Description</label>
        <input type="text" name="category_description" id="category_description">
    </div>
    <div>
    <label for="category_picture">Category picture</label>
    <input type="file" id="category_picture" name="category_picture">
    </div>
  
      
    <div class="button-container">
        <button type="submit">Add Category</button>
    </div>
</form>
@endsection