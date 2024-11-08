@extends('layouts.backend.master')
@section('title', 'All Roles')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4">All Roles</h2>
                
                <!-- Add Role Button -->
                <a href="{{ route('backend.roles.create') }}">
                    <button type="button" class="btn btn-success mb-3">
                        Add Role
                    </button>
                </a>

                <!-- Add Role Modal -->
                

                <!-- Roles Table -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->description }}</td>
                                <td>
                                    <a href="{{ route('backend.roles.edit', $role->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <button class="btn btn-danger" onclick="confirmDelete({{ $role->id }})">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Delete Role Modal -->
    <div class="modal fade" id="deleteRoleModal" tabindex="-1" aria-labelledby="deleteRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteRoleModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this role?
                </div>
                <div class="modal-footer">
                    <!-- Delete Form -->
                    <form id="deleteRoleForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    

 

    <!-- Populate Delete Modal Form Action -->
    <script>
        
        function confirmDelete(roleId) {
            var form = document.getElementById('deleteRoleForm');
            form.action = '/admin/roles/destroy/' + roleId; 
            var modal = new bootstrap.Modal(document.getElementById('deleteRoleModal'));
            modal.show(); // Show the modal
        }
    </script>
    
@endsection
