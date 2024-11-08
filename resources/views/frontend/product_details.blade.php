<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Details</title>
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <style>
        /* Custom styles for related product images */
        .card-img-top {
            height: 150px; /* Set a fixed height */
            object-fit: cover; /* Cover the area while maintaining aspect ratio */
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="mb-5 text-center">
            <a href="{{ url('/') }}">
                <button class="btn btn-secondary dropdown-toggle">
                    All Products
                </button>
            </a>
        </div>
        <div class="row">
            <!-- Product Image -->
            <div class="col-md-6">
                <div class="product-image-single">
                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                </div>
            </div>
            
            <!-- Product Details -->
            <div class="col-md-6">
                <h1>{{ $product->name }}</h1>
                <p class="text-muted">Category: {{ $product->subcategory->name }}</p>
                
                <div class="pricing">
                    @if($product->old_price)
                    <span class="text-danger fw-bold me-2">${{ $product->new_price }}</span>
                    <span class="text-muted text-decoration-line-through">${{ $product->old_price }}</span>
                    @else
                    <span class="text-danger fw-bold">${{ $product->new_price }}</span>
                    @endif
                </div>
                
                <p class="mt-4">
                    {{ $product->description }}
                </p>
    
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" class="form-control w-25" value="1" min="1">
                    </div>
    
                    <button type="submit" class="btn btn-primary mt-3">
                        <i class="fa fa-shopping-cart"></i> Add to Cart
                    </button>
                </form>
            </div>
        </div>
    
        <!-- Related Products -->
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="mb-4">Related Products</h2>
            </div>
    
            @foreach($relatedProducts as $related)
            <div class="col-md-3">
                <div class="card mb-4">
                    <img src="{{ asset('storage/' . $related->image) }}" class="card-img-top" alt="{{ $related->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $related->name }}</h5>
                        <p class="card-text text-danger">${{ $related->new_price }}</p>
                        <a href="{{ route('product_details', $related->slug) }}" class="btn btn-outline-primary btn-sm">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>  
</body>
</html>
