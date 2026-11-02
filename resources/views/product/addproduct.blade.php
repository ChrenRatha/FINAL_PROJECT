<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Product Information</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet">
</head>

<body>

    <div class="d-flex justify-content-center align-items-center vh-100">

        <div class="col-md-5 shadow-lg p-5 bg-white rounded-3">

            <h2 class="text-center text-success mb-4">
                CREATE PRODUCT INFORMATION
            </h2>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('store') }}" method="POST">

                @csrf

                <!-- ProductName -->
                <div class="mb-3">

                    <label class="form-label">
                        ProductName:
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-cart-check text-primary"></i>
                        </span>

                        <input
                            type="text"
                            name="productname"
                            class="form-control"
                            placeholder="Enter your productname"
                            value="{{ old('productname') }}"
                        >

                    </div>

                </div>


                <!-- Price -->
                <div class="mb-3">

                    <label class="form-label">
                        Price:
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-currency-dollar text-success"></i>
                        </span>

                        <input
                            type="number"
                            name="price"
                            class="form-control"
                            placeholder="Enter your price"
                            step="0.01"
                            value="{{ old('price') }}"
                        >

                    </div>

                </div>


                <!-- Quantity -->
                <div class="mb-3">

                    <label class="form-label">
                        Quantity:
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-basket text-danger"></i>
                        </span>

                        <input
                            type="number"
                            name="quantity"
                            class="form-control"
                            placeholder="Enter your quantity"
                            value="{{ old('quantity') }}"
                        >

                    </div>

                </div>


                <!-- Description -->
                <div class="mb-3">

                    <label class="form-label">
                        Description:
                    </label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="3"
                        placeholder="Enter your description"
                    >{{ old('description') }}</textarea>

                </div>


                <!-- CategoryName -->
                <div class="mb-3">

                    <label class="form-label">
                        CategoryName:
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-bag-check text-primary"></i>
                        </span>

                        <select
                            name="catid"
                            class="form-select"
                        >

                            <option value="">
                                --- Select Categoryname ---
                            </option>

                            @foreach ($categories as $category)

                                <option
                                    value="{{ $category->categoryid }}"
                                    {{ old('catid') == $category->categoryid ? 'selected' : '' }}
                                >
                                    {{ $category->categoryname }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>


                <!-- Buttons -->
                <div class="d-flex justify-content-center mt-4">

                    <button
                        type="submit"
                        class="btn btn-success w-50 me-2"
                    >
                        <i class="bi bi-plus-circle"></i>
                        Submit
                    </button>


                    <button
                        type="reset"
                        class="btn btn-danger w-50 me-2"
                    >
                        <i class="bi bi-x-circle"></i>
                        Clear
                    </button>
                    <a
                        type="button" href="{{ route('product.list') }}"
                        class="btn btn-info text-white w-50"
                    >
                        <i class="bi bi-arrow-right-circle"></i>
                        GO
                    </a>

                </div>

            </form>

        </div>

    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>