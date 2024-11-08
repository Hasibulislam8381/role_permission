@extends('layouts.backend.master')
@section('title', 'Edit Role')
@section('content')
<div class="container mt-4">
    <h2>Edit Role</h2>
    <form action="{{ route('backend.roles.update', $role->id) }}" method="POST" id="editRoleForm">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Role Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $role->name) }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Role Description:</label>
            <textarea name="description" id="description" cols="10" rows="3" class="form-control">{{ old('description', $role->description) }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label class="form-label">Permissions:</label>
            <div>
                @foreach($permissions as $permission)
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="permissions[]" 
                               value="{{ $permission->id }}" id="permission-{{ $permission->id }}"
                               {{ $role->permissions->contains('id', $permission->id) ? 'checked' : '' }}>
                        <label class="form-check-label" for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
