@extends('admin.source.template')
@section('content')
<h1>Users Reviews dashboard</h1>
 <div class="recent-orders">
    <div class="header-table">
    <h2 class="header-h2">Reviews</h2>
    </div>
    <table id="userReviewsTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Reviewer ID</th>
                <th>Reviewed ID</th>
                <th>Rating</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>2</td>
            <td>23</td>
            <td><i class="bi bi-star-fill"></i> 4.9</td>
            <td class="action">
                <a href="userReviewsDetails.php"><i class="bi bi-eye"></i></a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>4</td>
            <td>12</td>
            <td><i class="bi bi-star-fill"></i> 4.34</td>
            <td class="action">
                <a href="userReviewsDetails.php"><i class="bi bi-eye"></i></a>
            </td>
        </tr>
        </tbody>
    </table>
 </div>
 </main>
@endsection