@extends('admin.source.template')
@section('content')
<h1>Reviews dashboard</h1>
 <div class="recent-orders">
    <div class="header-table">
    <h2 class="header-h2">Reviews</h2>
    </div>
    <table id="userTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>User id {name}</th>
                <th>Rating</th>
                <th>Rate date</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>sdad</td>
            <td><i class="bi bi-star-fill"></i> 5</td>
            <td>15-10-2024</td>
            <td class="action">
                <a href="{{Route('admin.websiteReviews.websiteReviewDetails')}}"><i class="bi bi-eye"></i></a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>hamza</td>
            <td><i class="bi bi-star-fill"></i> 3.85</td>
            <td>8-8-2024</td>
            <td class="action">
                <a href="{{Route('admin.websiteReviews.websiteReviewDetails')}}"><i class="bi bi-eye"></i></a>
            </td>
        </tr>
        </tbody>
    </table>
 </div>
 </main>
@endsection