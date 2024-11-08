<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <style>
        /* Add custom styles for the dropdown */
        .subcategory-dropdown {
            display: none;
            position: absolute;
            background-color: white;
            border: 1px solid #ccc;
            z-index: 1;
        }
        
        .category-item:hover .subcategory-dropdown {
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Product List</h1>

        <div class="mb-4">
            <h4>Categories</h4>
            <div class="d-inline-block position-relative">
                <button class="btn btn-secondary dropdown-toggle" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Select Category
                </button>
                <a href="{{ url('/') }}">
                <button class="btn btn-secondary dropdown-toggle">
                    All Product
                </button>
               </a>
                <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                    @foreach($categories as $category)
                        <li class="category-item">
                            <a class="dropdown-item" href="#">{{ $category->name }}</a>
                            <div class="subcategory-dropdown">
                                <ul class="list-unstyled">
                                    @foreach($category->subcategories as $subcategory)
                                        <li>
                                            <a class="dropdown-item subcategory-link" href="{{ route('products.filter', $subcategory->slug) }}">{{ $subcategory->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row">
            @foreach($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top product-image" alt="{{ $product->name }}">
                        @else
                            <img src="https://via.placeholder.com/150" class="card-img-top product-image" alt="Default Image">
                        @endif
                        
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">
                                @if($product->old_price)
                                    <del>${{ $product->old_price }}</del>
                                @endif
                                <strong>${{ $product->new_price }}</strong>
                            </p>
                            <p class="card-text">{{ $product->description ?? 'No description available' }}</p>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
