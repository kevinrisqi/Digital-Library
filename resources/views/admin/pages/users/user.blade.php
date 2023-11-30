@extends('admin.layout.admin')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <h4>User List</h4>
                </div>
                <div class="card-body">
                    <!-- Add User Button -->
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Add User</a>
                    <div class="card">
                        <div class="card-body">
                            <h4>User Information</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        <td>{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection