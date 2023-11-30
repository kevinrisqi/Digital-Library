<!-- resources/views/admin/users/edit.blade.php -->

@extends('admin.layout.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h4>Edit User</h4>
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">

                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="is_admin">Is Admin</label>
                            <select name="is_admin" id="is_admin" class="form-control">
                                <option value="0" {{ $user->is_admin == 0 ? 'selected' : '' }}>User</option>
                                <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection