@extends('layouts.backend.master')
@section('title', 'Add Product')

@section('content')
    <div class="container-fluid">
        <h2>Add New Product</h2>
        <form action="{{ route('backend.product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
               
                <label for="subcategory_id" class="form-label">Category:</label>
                <select name="category_id" id="category_id" class="form-select" required>
                    <option value="">Select a Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                
                <select name="subcategory_id" id="subcategory_id" class="form-select mt-3" required>
                    <option value="">Select a Subcategory</option>
                </select>
                
            
                <div id="subcategories-data" style="display: none;">
                    @foreach($categories as $category)
                        <div data-category-id="{{ $category->id }}">
                            @foreach($category->subcategories as $subcategory)
                                <span data-subcategory-id="{{ $subcategory->id }}">{{ $subcategory->name }}</span>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                
            </div>   
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="old_price" class="form-label">Old Price:</label>
                <input type="number" name="old_price" id="old_price" class="form-control" step="0.01">
            </div>
            <div class="mb-3">
                <label for="new_price" class="form-label">New Price:</label>
                <input type="number" name="new_price" id="new_price" class="form-control" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
   
@endsection
@push('script')
<script>
    $(document).ready(function() {
        
$('#category_id').on('change', function() {
    var categoryId = $(this).val();

    // Clear the subcategory dropdown first
    $('#subcategory_id').html('<option value="">Select a Subcategory</option>');

    if (categoryId) {
        // Find the related subcategories using the hidden data
        $('#subcategories-data div').each(function() {
            var dataCategoryId = $(this).data('category-id');

            if (categoryId == dataCategoryId) {
                // Loop through the subcategories and append them to the dropdown
                $(this).find('span').each(function() {
                    var subcategoryId = $(this).data('subcategory-id');
                    var subcategoryName = $(this).text();

                    $('#subcategory_id').append('<option value="' + subcategoryId + '">' + subcategoryName + '</option>');
                });
            }
        });
    }
});
});

</script>
@endpush
