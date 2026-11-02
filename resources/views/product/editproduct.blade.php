<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT PRODUCT</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.css">

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, #e8f0ff 0%, transparent 35%),
                radial-gradient(circle at bottom right, #eef2ff 0%, transparent 35%),
                #f5f7fb;

            font-family: "Segoe UI", system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            color: #1e293b;
        }

        /* MAIN CONTAINER */

        .page-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 45px 20px;
        }

        /* CARD */

        .edit-card {
            width: 100%;
            max-width: 760px;

            background: rgba(255, 255, 255, 0.96);

            border: 1px solid #e2e8f0;
            border-radius: 18px;

            box-shadow:
                0 20px 45px rgba(15, 23, 42, 0.08),
                0 4px 12px rgba(15, 23, 42, 0.04);

            overflow: hidden;
        }

        /* HEADER */

        .edit-header {
            padding: 20px 26px;

            background: linear-gradient(
                135deg,
                #2563eb,
                #4f46e5
            );

            color: white;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .header-icon {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 11px;

            background: rgba(255, 255, 255, 0.16);
            border: 1px solid rgba(255, 255, 255, 0.25);

            font-size: 20px;
        }

        .header-title {
            margin: 0;
            font-size: 20px;
            font-weight: 700;
            letter-spacing: -0.3px;
        }

        .header-subtitle {
            margin: 3px 0 0;
            font-size: 12px;
            opacity: 0.78;
        }

        .product-badge {
            padding: 6px 11px;

            border-radius: 20px;

            background: rgba(255, 255, 255, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.22);

            font-size: 12px;
            font-weight: 600;
        }

        /* BODY */

        .edit-body {
            padding: 25px 28px 27px;
        }

        /* ERROR */

        .alert-danger {
            border: 0;
            border-radius: 10px;
            background: #fff1f2;
            color: #be123c;
            font-size: 13px;
            padding: 12px 15px;
            margin-bottom: 20px;
        }

        /* FORM GROUP */

        .form-group {
            margin-bottom: 17px;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 7px;

            margin-bottom: 7px;

            font-size: 13px;
            font-weight: 650;

            color: #334155;
        }

        .form-label i {
            color: #4f46e5;
            font-size: 14px;
        }

        /* INPUTS */

        .form-control,
        .form-select {
            min-height: 45px;

            border: 1px solid #dbe2ea;
            border-radius: 9px;

            background: #ffffff;

            color: #1e293b;

            font-size: 14px;

            padding: 10px 13px;

            box-shadow: none;

            transition: all 0.2s ease;
        }

        .form-control:hover,
        .form-select:hover {
            border-color: #b9c5d5;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #6366f1;

            box-shadow:
                0 0 0 3px rgba(99, 102, 241, 0.10);

            outline: none;
        }

        /* READ ONLY ID */

        .id-input {
            background: #f8fafc !important;
            color: #64748b !important;
            font-weight: 600;

            cursor: not-allowed;
        }

        /* TEXTAREA */

        textarea.form-control {
            min-height: 95px;
            resize: vertical;
            line-height: 1.5;
        }

        /* TWO COLUMN */

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        /* BUTTON AREA */

        .button-area {
            display: flex;
            gap: 11px;

            margin-top: 23px;
            padding-top: 20px;

            border-top: 1px solid #edf1f5;
        }

        .btn-custom {
            flex: 1;

            min-height: 44px;

            border-radius: 9px;

            font-size: 14px;
            font-weight: 600;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;

            transition: all 0.2s ease;

            text-decoration: none;
        }

        /* BACK */

        .btn-back {
            background: #f1f5f9;
            color: #475569;

            border: 1px solid #e2e8f0;
        }

        .btn-back:hover {
            background: #e2e8f0;
            color: #1e293b;
            transform: translateY(-1px);
        }

        /* UPDATE */

        .btn-update {
            border: none;

            background: linear-gradient(
                135deg,
                #2563eb,
                #4f46e5
            );

            color: white;

            box-shadow:
                0 5px 12px rgba(79, 70, 229, 0.20);
        }

        .btn-update:hover {
            color: white;

            transform: translateY(-1px);

            box-shadow:
                0 8px 18px rgba(79, 70, 229, 0.28);
        }

        .btn-update:active,
        .btn-back:active {
            transform: translateY(0);
        }

        /* SMALL FOOTER */

        .form-footer {
            text-align: center;

            margin-top: 14px;

            font-size: 11px;

            color: #94a3b8;
        }

        /* MOBILE */

        @media (max-width: 650px) {

            .page-wrapper {
                padding: 20px 12px;
            }

            .edit-header {
                padding: 18px 19px;
            }

            .header-title {
                font-size: 17px;
            }

            .header-subtitle {
                display: none;
            }

            .product-badge {
                display: none;
            }

            .edit-body {
                padding: 21px 18px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .button-area {
                flex-direction: column-reverse;
            }

            .btn-custom {
                width: 100%;
            }
        }

    </style>
</head>


<body>

    <div class="page-wrapper">

        <div class="edit-card">

            {{-- HEADER --}}

            <div class="edit-header">

                <div class="header-left">

                    <div class="header-icon">
                        <i class="bi bi-pencil-square"></i>
                    </div>

                    <div>

                        <h3 class="header-title">
                            Edit Product
                        </h3>

                        <p class="header-subtitle">
                            Update product information
                        </p>

                    </div>

                </div>

                <div class="product-badge">
                    ID #{{ $product->productid }}
                </div>

            </div>


            <div class="edit-body">

                @if ($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0 ps-3">

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                {{-- UPDATE PRODUCT FORM --}}

                <form action="{{ route('product.update', $product->productid) }}" method="POST">

                    @csrf

                    @method('PUT')


                    {{-- PRODUCT ID --}}

                    <div class="form-group">

                        <label class="form-label">

                            <i class="bi bi-hash"></i>

                            Product ID

                        </label>

                        <input
                            type="text"
                            class="form-control id-input"
                            value="{{ $product->productid }}"
                            readonly
                        >

                    </div>


                    {{-- PRODUCT NAME --}}

                    <div class="form-group">

                        <label class="form-label">

                            <i class="bi bi-box"></i>

                            Product Name

                        </label>

                        <input
                            type="text"
                            name="productname"
                            class="form-control"
                            value="{{ old('productname', $product->productname) }}"
                            placeholder="Enter product name"
                            required
                        >

                    </div>


                    {{-- PRICE + QUANTITY --}}

                    <div class="form-row">


                        {{-- PRICE --}}

                        <div class="form-group">

                            <label class="form-label">

                                <i class="bi bi-currency-dollar"></i>

                                Price

                            </label>

                            <input
                                type="number"
                                name="price"
                                class="form-control"
                                min="0"
                                step="0.01"
                                value="{{ old('price', $product->price) }}"
                                placeholder="0.00"
                                required
                            >

                        </div>


                        {{-- QUANTITY --}}

                        <div class="form-group">

                            <label class="form-label">

                                <i class="bi bi-stack"></i>

                                Quantity

                            </label>

                            <input
                                type="number"
                                name="quantity"
                                class="form-control"
                                min="0"
                                value="{{ old('quantity', $product->quantity) }}"
                                placeholder="0"
                                required
                            >

                        </div>


                    </div>


                    {{-- CATEGORY --}}

                    <div class="form-group">

                        <label class="form-label">

                            <i class="bi bi-grid"></i>

                            Category

                        </label>

                        <select
                            name="catid"
                            class="form-select"
                            required
                        >

                            <option value="">
                                -- Select Category --
                            </option>

                            @foreach ($categories as $category)

                                <option
                                    value="{{ $category->categoryid }}"
                                    {{ old('catid', $product->catid) == $category->categoryid ? 'selected' : '' }}
                                >

                                    {{ $category->categoryname }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- DESCRIPTION --}}

                    <div class="form-group">

                        <label class="form-label">

                            <i class="bi bi-card-text"></i>

                            Description

                        </label>

                        <textarea
                            name="description"
                            class="form-control"
                            rows="4"
                            placeholder="Enter product description..."
                        >{{ old('description', $product->description) }}</textarea>

                    </div>


                    {{-- BUTTONS --}}

                    <div class="button-area">


                        <a
                            href="{{ route('product.list') }}"
                            class="btn-custom btn-back"
                        >

                            <i class="bi bi-arrow-left"></i>

                            Back

                        </a>


                        <button
                            type="submit"
                            class="btn-custom btn-update"
                        >

                            <i class="bi bi-check2-circle"></i>

                            Update Product

                        </button>


                    </div>

                </form>


                <div class="form-footer">

                    Product Management System

                </div>

            </div>

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>