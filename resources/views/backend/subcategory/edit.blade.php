<!-- resources/views/backend/subcategory/edit.blade.php -->
@extends('layouts.backend.master')
@section('title', 'Edit Subcategory')

@section('content')
    <div class="container-fluid">
        <h2>Edit Subcategory</h2>
        
        <!-- Display validation errors, if any -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <!-- Edit Subcategory Form -->
        <form action="{{ route('backend.subcategory.update', $subcategory->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Subcategory Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $subcategory->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Select Category:</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Select a Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
