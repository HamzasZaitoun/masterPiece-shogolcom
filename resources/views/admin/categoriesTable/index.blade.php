@extends('admin.source.template')
@section('content')
    <h1>Categories dashboard</h1>
    <div class="recent-orders">
        <div class="header-table">
            <h2 class="header-h2">Categories</h2>
            <button class="add-btn" onclick="location.href = '{{ Route('admin.categories.addCategory') }}';">Add
                Category</button>
        </div>
        <table id="categoryTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>


                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category['category_id'] }}</td>
                        <td>{{ $category['category_name'] }}</td>
                        <td>{{ $category['category_description'] }}</td>


                        <td class="action">
                            <a href="{{ route('admin.categories.showCategory', ['id' => $category->category_id]) }}"><i
                                    class="bi bi-eye"></i>
                            </a>
                            <form id="deleteCategoryForm"   action="{{ route('admin.categories.deleteCategory', ['id' => $category->category_id]) }}" method="POST" class="d-inline">
                                @csrf
                                @Method('DELETE')
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip"
                                    title="Delete User" onclick="confirmDelete(this)">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </main>
    @endsection
