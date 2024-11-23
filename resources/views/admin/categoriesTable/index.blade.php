@extends('admin.source.template')
@section('content')
<h1>Categories dashboard</h1>
 <div class="recent-orders">
    <div class="header-table">
    <h2 class="header-h2">Categories</h2>
    <button class="add-btn" onclick="location.href = '{{Route('admin.categories.addCategory')}}';">Add Category</button>
    </div>
    <table id="categoryTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Created at</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>IT</td>
            <td>{IMAGE}</td>
            <td>{date}</td>
            <td class="action">
                <a href=""><i class="bi bi-eye"></i></a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Accounting</td>
            <td>{IMAGE}</td>
            <td>{date}</td>
            <td class="action">
                <a href=""><i class="bi bi-eye"></i></a>
            </td>
        </tr>
        </tbody>
    </table>
</main>
@endsection