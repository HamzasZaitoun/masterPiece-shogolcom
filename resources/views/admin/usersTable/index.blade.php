@extends('admin.source.template')
@section('content')
    <h1>Users dashboard</h1>
    <div class="recent-orders">
        <div class="header-table">
            <h2 class="header-h2">Users</h2>
            <button class="add-btn" onclick="location.href = '{{ Route('admin.users.addUser') }}';">Add user</button>
        </div>
        <table id="userTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Account status</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $user)
                    <tr>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['last_name'] }}</td>
                        <td>{{ $user['account_status'] }}</td>
                        <td class="action">
                            <a href="{{ route('admin.users.userDetails', ['id' => $user->id]) }}"><i
                                    class="bi bi-eye"></i></a>
                            <form action="{{ route('admin.users.destroy', ['id' => $user->id]) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn"><i class="bi bi-trash"></i></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </main>
    {{-- @php
    $user = ob_get_clean(); 
 @endphp --}}
@endsection
