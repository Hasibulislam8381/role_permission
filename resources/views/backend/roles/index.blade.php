@extends('layouts.backend.master')
@section('title', 'All roleegories')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4">All Roles</h2>
                
                <!-- Add roleegory Button -->
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addroleModal">
                    Add Roles
                </button>

                <!-- Add roleegory Modal -->
                <div class="modal fade" id="addroleModal" tabindex="-1" aria-labelledby="addroleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="">Add New Role</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('backend.roles.store') }}" method="POST" id="addroleForm">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Role Name:</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                                        @error('name')  <!-- Show validation error for 'name' -->
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Role Description:</label>
                                        <textarea name="description" id="description" cols="10" rows="10" class="form-control">{{ old('description') }}</textarea>
                                        @error('description')  <!-- Show validation error for 'description' -->
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- roleegories Table -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Dercription</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->slug }}</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteroleegoryModal" 
                                    data-roleegory-id="{{ $role->id }}">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteroleegoryModal" tabindex="-1" aria-labelledby="deleteroleegoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteroleegoryModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this roleegory?
                </div>
                <div class="modal-footer">
                    <form id="deleteroleegoryForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                    
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any() || old('name') === null || old('description') === null)
        <script>
            var myModal = new bootstrap.Modal(document.getElementById('addroleModal'));
            myModal.show();
        </script>
    @endif

@endsection
