@extends('layouts.backend.master')
@section('title', 'Edit Product')

@section('content')
    <div class="container-fluid">
        <h2>Edit Product</h2>

        <form action="{{ route('backend.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <!-- Product Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Product Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
            </div>

            <div class="mb-3">
               
                <label for="subcategory_id" class="form-label">Category:</label>
                <select name="category_id" id="category_id" class="form-select" required>
                    <option value="">Select a Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                
                <select name="subcategory_id" id="subcategory_id" class="form-select mt-3" required>
                    <option value="">Select a Subcategory</option>
                </select>
                
            
                <div id="subcategories-data" style="display: none;">
                    @foreach($categories as $category)
                        <div data-category-id="{{ $category->id }}">
                            @foreach($category->subcategories as $subcategory)
                                <span data-subcategory-id="{{ $subcategory->id }}" >{{ $subcategory->name }}</span>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                
            </div> 
             <!-- Current Product Image -->
             <div class="mb-3">
                <label for="image" class="form-label">Current Image:</label>
                <div>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 100px; max-height: 100px;" class="img-thumbnail">
                    @else
                        <p>No image available</p>
                    @endif
                </div>
            </div>

            <!-- New Image Upload -->
            <div class="mb-3">
                <label for="image" class="form-label">Upload New Image:</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>

            <!-- Other fields like description, price, etc. -->
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="old_price" class="form-label">Old Price:</label>
                <input type="number" name="old_price" id="old_price" class="form-control" value="{{ $product->old_price }}" step="0.01">
            </div>
            <div class="mb-3">
                <label for="new_price" class="form-label">New Price:</label>
                <input type="number" step="0.01" name="new_price" id="new_price" class="form-control" value="{{ $product->new_price }}" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update Product</button>
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
