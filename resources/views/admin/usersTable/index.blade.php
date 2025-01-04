@extends('admin.source.template')
@section('content')
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
    <h1>Users dashboard</h1>
    <div class="recent-orders">
        <div class="header-table">
            <h2 class="header-h2">Users</h2>
            <button class="add-btn" onclick="location.href = '{{ Route('admin.users.addUser') }}';">Add admin</button>
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
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user['first_name'] }}</td>
                        <td>{{ $user['last_name'] }}</td>
                        <td>
                            <!-- Form to Update Account Status -->
                            <form action="{{ route('admin.users.updateStatus', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="account_status" onchange="this.form.submit()">
                                    <option value="active" {{ $user['account_status'] == 'active' ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="banned" {{ $user['account_status'] == 'banned' ? 'selected' : '' }}>
                                        banned</option>
                                    <option value="suspended"
                                        {{ $user['account_status'] == 'suspended' ? 'selected' : '' }}>Suspended</option>
                                </select>
                            </form>
                        </td>
                        <td class="action">
                            <div class="flex">
                                <a href="{{ route('admin.users.userDetails', ['id' => $user->id]) }}" class="view-button"
                                    title="View Details">
                                    <!-- Your SVG and other code here -->
                                    <svg class="view-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        aria-hidden="true" focusable="false">
                                        <path
                                            d="M12 4.5C7.05 4.5 3.03 8.09 1.5 12c1.53 3.91 5.55 7.5 10.5 7.5s8.97-3.59 10.5-7.5C20.97 8.09 16.95 4.5 12 4.5zm0 11.25a3.75 3.75 0 1 1 0-7.5 3.75 3.75 0 0 1 0 7.5zm0-6a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5z"
                                            fill="white" />
                                    </svg>
                                    <span class="view-text">View</span>
                                </a>

                                <form action="{{ route('admin.users.destroy', ['id' => $user->id]) }}" method="POST" id="deleteUserForm">
                                    @csrf
                                    @method('DELETE')
                                    <button class="delete-button" id="deleteUser" type="button" onclick="confirmDelete()">
                                        <!-- Your SVG and other code here -->
                                        <svg class="delete-svgIcon" viewBox="0 0 448 512">
                                            <path
                                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
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