@extends('layouts.backend.master')
@section('title', 'All Products')

@section('content')
    <div class="container-fluid">
        <h2>All Products</h2>
        <a href="{{ route('backend.product.create') }}" class="btn btn-success mb-3">Add Product</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Subcategory</th>
                    <th>Description</th>
                    <th>Old Price</th>
                    <th>New Price</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->subcategory->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->old_price }}</td>
                        <td>{{ $product->new_price }}</td>
                        <td>{{ $product->slug }}</td>
                        <td>
                            <a href="{{ route('backend.product.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" 
                            onclick="setDeleteFormAction('{{ route('backend.product.delete', $product->id) }}')">Delete</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this product?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" action="" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE') <!-- Make sure this is present -->
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<script>
    function setDeleteFormAction(action) {
        const form = document.getElementById('deleteForm');
        form.action = action;
    }
</script>

</script>
@endsection
