<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    >

    <title>LIST PRODUCT INFORMATION</title>


    <style>

        * {
            box-sizing: border-box;
        }


        body {

            margin: 0;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background:
                radial-gradient(
                    circle at top left,
                    rgba(25, 135, 84, 0.08),
                    transparent 30%
                ),

                linear-gradient(
                    135deg,
                    #f4f7f8,
                    #eef2f5
                );

            color: #1f2937;
        }


        /* ================= CONTAINER ================= */

        .container {

            width: 92%;

            max-width: 1180px;

            margin: 45px auto;
        }


        /* ================= HEADER ================= */

        .header {

            background:
                rgba(255, 255, 255, 0.95);

            border: 1px solid #e8edf0;

            border-radius: 22px;

            padding: 28px 32px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            box-shadow:
                0 10px 35px
                rgba(15, 23, 42, 0.07);

            animation:
                slideDown 0.6s ease;
        }


        .header-left {

            display: flex;

            align-items: center;

            gap: 18px;
        }


        .header-icon {

            width: 56px;

            height: 56px;

            border-radius: 16px;

            display: flex;

            justify-content: center;

            align-items: center;

            background:
                linear-gradient(
                    135deg,
                    #198754,
                    #20a464
                );

            color: white;

            font-size: 25px;

            font-weight: bold;

            box-shadow:
                0 8px 20px
                rgba(25, 135, 84, 0.22);
        }


        .header h2 {

            margin: 0;

            font-size: 27px;

            font-weight: 800;

            letter-spacing: -0.5px;

            color: #18212b;
        }


        .header p {

            margin: 7px 0 0;

            color: #89929c;

            font-size: 14px;
        }


        /* ================= CREATE BUTTON ================= */

        .create-btn {

            text-decoration: none;

            border: none;

            background:
                linear-gradient(
                    135deg,
                    #198754,
                    #20a464
                );

            color: white;

            padding: 13px 21px;

            border-radius: 12px;

            font-size: 13px;

            font-weight: 800;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            box-shadow:
                0 7px 18px
                rgba(25, 135, 84, 0.20);

            transition: all 0.25s ease;
        }


        .create-btn:hover {

            color: white;

            transform: translateY(-3px);

            box-shadow:
                0 12px 25px
                rgba(25, 135, 84, 0.28);
        }


        .create-btn:active {

            transform: scale(0.97);
        }


        /* ================= SUCCESS ================= */

        .success-message {

            margin-top: 20px;

            padding: 15px 18px;

            background: #ecfdf5;

            border: 1px solid #bbf7d0;

            color: #15803d;

            border-radius: 13px;

            font-size: 14px;

            font-weight: 600;

            animation:
                fadeUp 0.5s ease;
        }


        /* ================= PRODUCT LIST ================= */

        .product-list {

            margin-top: 26px;
        }


        /* ================= PRODUCT CARD ================= */

        .product-card {

            position: relative;

            background: #ffffff;

            border: 1px solid #e8edf0;

            border-radius: 22px;

            padding: 28px;

            margin-bottom: 24px;

            box-shadow:
                0 8px 30px
                rgba(15, 23, 42, 0.06);

            overflow: hidden;

            animation:
                fadeUp 0.6s ease both;

            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease,
                border-color 0.3s ease;
        }


        .product-card::before {

            content: "";

            position: absolute;

            top: 0;

            left: 0;

            width: 100%;

            height: 4px;

            background:
                linear-gradient(
                    90deg,
                    #198754,
                    #36b37e
                );
        }


        .product-card:hover {

            transform:
                translateY(-5px);

            border-color:
                rgba(25, 135, 84, 0.18);

            box-shadow:
                0 18px 45px
                rgba(15, 23, 42, 0.10);
        }


        /* ================= PRODUCT HEADER ================= */

        .product-header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            padding-bottom: 20px;

            margin-bottom: 24px;

            border-bottom:
                1px solid #edf0f2;
        }


        .product-title {

            display: flex;

            align-items: center;

            gap: 13px;
        }


        .product-number {

            width: 40px;

            height: 40px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 12px;

            background: #eef9f3;

            color: #198754;

            font-weight: 800;

            font-size: 14px;
        }


        .product-header h3 {

            margin: 0;

            font-size: 20px;

            font-weight: 800;

            color: #20262e;
        }


        .product-id {

            background: #f0fdf4;

            color: #198754;

            padding: 8px 13px;

            border-radius: 30px;

            font-size: 12px;

            font-weight: 800;

            border: 1px solid #d8f3e3;
        }


        /* ================= PRODUCT INFORMATION ================= */

        .form-grid {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 18px;
        }


        .form-group {

            display: flex;

            flex-direction: column;
        }


        /* ================= LABEL ================= */

        .form-group label {

            margin-bottom: 8px;

            font-size: 11px;

            font-weight: 800;

            color: #8a929b;

            letter-spacing: 0.8px;

            text-transform: uppercase;
        }


        /* ================= FORM BOX ================= */

        .form-control {

            width: 100%;

            min-height: 50px;

            padding: 13px 15px;

            border:
                1px solid #e4e9ed;

            border-radius: 12px;

            background: #f9fafb;

            color: #252b32;

            font-size: 14px;

            font-weight: 600;

            outline: none;

            transition: all 0.25s ease;
        }


        .form-control:hover {

            background: #ffffff;

            border-color: #d1d9df;
        }


        /* ================= PRODUCT NAME ================= */

        .product-name {

            color: #252b32;

            font-weight: 700;
        }


        /* ================= PRICE ================= */

        .price {

            color: #198754;

            font-weight: 800;
        }


        /* ================= QUANTITY ================= */

        .quantity {

            color: #374151;

            font-weight: 700;
        }


        /* ================= CATEGORY ================= */

        .category {

            color: #2864b7;

            background: #f4f8ff;

            border-color: #dce9fb;

            font-weight: 700;
        }


        /* ================= TOTAL PRICE ================= */

        .total-price {

            color: #198754;

            background:
                linear-gradient(
                    135deg,
                    #ecfdf5,
                    #f7fffb
                );

            border-color: #bce8cf;

            font-size: 16px;

            font-weight: 800;

            box-shadow:
                0 4px 14px
                rgba(25, 135, 84, 0.06);
        }


        /* ================= DESCRIPTION ================= */

        .description {

            min-height: 50px;

            color: #5f6872;

            background: #fafbfc;

            line-height: 1.5;

            font-weight: 500;
        }


        /* ================= ACTION ================= */

        .product-actions {

            margin-top: 22px;

            display: flex;

            justify-content: flex-end;

            align-items: center;

            gap: 10px;
        }


        /* ================= EDIT BUTTON ================= */

        .edit-btn {

            text-decoration: none;

            background: #ffffff;

            color: #198754;

            border:
                1px solid #198754;

            padding: 11px 19px;

            border-radius: 11px;

            font-size: 13px;

            font-weight: 800;

            transition: all 0.25s ease;
        }


        .edit-btn:hover {

            color: white;

            background: #198754;

            transform:
                translateY(-2px);

            box-shadow:
                0 8px 18px
                rgba(25, 135, 84, 0.20);
        }


        /* ================= DELETE BUTTON ================= */

        .delete-btn {

            text-decoration: none;

            background: #ffffff;

            color: #dc3545;

            border:
                1px solid #dc3545;

            padding: 11px 19px;

            border-radius: 11px;

            font-size: 13px;

            font-weight: 800;

            transition: all 0.25s ease;
        }


        .delete-btn:hover {

            color: white;

            background: #dc3545;

            transform:
                translateY(-2px);

            box-shadow:
                0 8px 18px
                rgba(220, 53, 69, 0.20);
        }


        /* ================= GRAND TOTAL ================= */

        .grand-total {

            position: relative;

            background:
                linear-gradient(
                    135deg,
                    #126b42,
                    #198754,
                    #20a464
                );

            color: white;

            padding: 25px 28px;

            border-radius: 20px;

            margin-top: 8px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            box-shadow:
                0 12px 30px
                rgba(25, 135, 84, 0.24);

            overflow: hidden;

            animation:
                fadeUp 0.8s ease;
        }


        .grand-total::after {

            content: "";

            position: absolute;

            width: 160px;

            height: 160px;

            right: -50px;

            top: -70px;

            border-radius: 50%;

            background:
                rgba(255, 255, 255, 0.08);
        }


        .grand-total-info {

            position: relative;

            z-index: 1;
        }


        .grand-total span:first-child {

            display: block;

            font-size: 12px;

            font-weight: 700;

            opacity: 0.78;

            letter-spacing: 0.8px;
        }


        .grand-total-label {

            margin-top: 5px;

            font-size: 17px;

            font-weight: 800;
        }


        .grand-total span:last-child {

            position: relative;

            z-index: 1;

            font-size: 28px;

            font-weight: 900;
        }


        /* ================= EMPTY ================= */

        .empty {

            background: white;

            padding: 65px 30px;

            text-align: center;

            border-radius: 22px;

            border: 1px solid #e8edf0;

            box-shadow:
                0 8px 30px
                rgba(15, 23, 42, 0.06);
        }


        .empty-icon {

            width: 65px;

            height: 65px;

            margin: 0 auto 18px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 18px;

            background: #eef9f3;

            color: #198754;

            font-size: 27px;

            font-weight: bold;
        }


        .empty h3 {

            margin: 0 0 7px;

            color: #222;

            font-size: 20px;
        }


        .empty p {

            margin: 0;

            color: #8a929b;

            font-size: 14px;
        }


        /* ================= ANIMATION ================= */

        @keyframes fadeUp {

            from {

                opacity: 0;

                transform:
                    translateY(22px);
            }

            to {

                opacity: 1;

                transform:
                    translateY(0);
            }
        }


        @keyframes slideDown {

            from {

                opacity: 0;

                transform:
                    translateY(-22px);
            }

            to {

                opacity: 1;

                transform:
                    translateY(0);
            }
        }


        /* ================= RESPONSIVE ================= */

        @media (max-width: 800px) {

            .container {

                width: 94%;

                margin: 25px auto;
            }


            .header {

                padding: 22px;
            }


            .header-left {

                align-items:
                    flex-start;
            }


            .header h2 {

                font-size: 22px;
            }


            .form-grid {

                grid-template-columns:
                    1fr;
            }


            .product-actions {

                justify-content:
                    stretch;
            }


            .edit-btn,
            .delete-btn {

                flex: 1;

                text-align:
                    center;
            }
        }


        @media (max-width: 600px) {

            .header {

                flex-direction:
                    column;

                align-items:
                    stretch;

                gap: 20px;
            }


            .header-left {

                width: 100%;
            }


            .create-btn {

                width: 100%;
            }


            .product-card {

                padding: 20px;

                border-radius: 18px;
            }


            .product-header {

                align-items:
                    flex-start;

                gap: 15px;
            }


            .product-header h3 {

                font-size: 17px;
            }


            .product-id {

                white-space:
                    nowrap;
            }


            .product-actions {

                flex-direction:
                    column;

                align-items:
                    stretch;
            }


            .edit-btn,
            .delete-btn {

                width: 100%;

                text-align:
                    center;
            }


            .grand-total {

                padding: 22px;

                flex-direction:
                    column;

                align-items:
                    flex-start;

                gap: 10px;
            }


            .grand-total span:last-child {

                font-size: 25px;
            }
        }



        /* ================= RELOAD BUTTON ================= */

        .reload-btn {

            text-decoration: none;

            border: 1px solid #198754;

            background: #ffffff;

            color: #198754;

            padding: 12px 17px;

            border-radius: 12px;

            font-size: 13px;

            font-weight: 800;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            cursor: pointer;

            transition: all 0.25s ease;
        }


        .reload-btn:hover {

            color: #ffffff;

            background: #198754;

            transform: translateY(-2px);

            box-shadow: 0 8px 18px rgba(25, 135, 84, 0.20);
        }

    </style>

</head>


<body>


    <div class="container">


        <!-- HEADER -->

        <div class="header">


            <div class="header-left">


                <div class="header-icon">

                    ☰

                </div>


                <div>

                    <h2>

                        LIST PRODUCT INFORMATION

                    </h2>


                    <p>

                        Manage all your products information

                    </p>

                </div>

                    <button
                        type="button"
                        class="reload-btn"
                        onclick="window.location.reload()"
                        title="Reload product list"
                    >
                        ↻ RELOAD PAGE
                    </button>


            </div>


            <a
                href="{{ route("store") }}"
                class="create-btn"
            >

                + CREATE PRODUCT

            </a>


        </div>


        <!-- SUCCESS MESSAGE -->

        @if(session('success'))

            <div class="success-message">

                ✓ {{ session('success') }}

            </div>

        @endif


        <!-- PRODUCT LIST -->

        <div class="product-list">


            @php

                $grandTotal = 0;

            @endphp


            @forelse($products as $product)


                @php

                    $totalPrice =
                        $product->price *
                        $product->quantity;

                    $grandTotal +=
                        $totalPrice;

                @endphp


                <!-- PRODUCT CARD -->

                <div class="product-card">


                    <!-- PRODUCT HEADER -->

                    <div class="product-header">


                        <div class="product-title">


                            <div class="product-number">

                                #

                            </div>


                            <h3>

                                {{ $product->productname }}

                            </h3>


                        </div>


                        <span class="product-id">

                            ID:
                            {{ $product->productid }}

                        </span>


                    </div>


                    <!-- PRODUCT INFORMATION -->

                    <div class="form-grid">


                        <!-- PRODUCT NAME -->

                        <div class="form-group">


                            <label>

                                PRODUCT NAME

                            </label>


                            <input
                                type="text"
                                class="form-control product-name"
                                value="{{ $product->productname }}"
                                readonly
                            >


                        </div>


                        <!-- PRICE -->

                        <div class="form-group">


                            <label>

                                PRICE

                            </label>


                            <input
                                type="text"
                                class="form-control price"
                                value="${{ number_format($product->price, 2) }}"
                                readonly
                            >


                        </div>


                        <!-- QUANTITY -->

                        <div class="form-group">


                            <label>

                                QUANTITY

                            </label>


                            <input
                                type="text"
                                class="form-control quantity"
                                value="{{ $product->quantity }}"
                                readonly
                            >


                        </div>


                        <!-- CATEGORY NAME -->

                        <div class="form-group">


                            <label>

                                CATEGORY NAME

                            </label>


                            <input
                                type="text"
                                class="form-control category"
                                value="{{ $product->cat->categoryname ?? '' }}"
                                readonly
                            >


                        </div>


                        <!-- TOTAL PRICE -->

                        <div class="form-group">


                            <label>

                                TOTAL PRICE

                            </label>


                            <input
                                type="text"
                                class="form-control total-price"
                                value="${{ number_format($totalPrice, 2) }}"
                                readonly
                            >


                        </div>


                        <!-- DESCRIPTION -->

                        <div class="form-group">


                            <label>

                                DESCRIPTION

                            </label>


                            <input
                                type="text"
                                class="form-control description"
                                value="{{ $product->description }}"
                                readonly
                            >


                        </div>


                    </div>


                    <!-- ACTION -->

                    <div class="product-actions">


                        <!-- EDIT -->

                        <a
                            href="{{ route(
                                'product.edit',
                                $product->productid
                            ) }}"
                            class="edit-btn"
                        >

                            EDIT PRODUCT

                        </a>


                        <!-- DELETE -->

                        <a
                            href="{{ route(
                                'product.delete',
                                $product->productid
                            ) }}"
                            class="delete-btn"
                        >

                            DELETE PRODUCT

                        </a>


                    </div>


                </div>


            @empty


                <div class="empty">


                    <div class="empty-icon">

                        +

                    </div>


                    <h3>

                        No Products Found

                    </h3>


                    <p>

                        There are currently no products
                        in the database.

                    </p>


                </div>


            @endforelse


            <!-- GRAND TOTAL -->

            @if($products->count() > 0)


                <div class="grand-total">


                    <div class="grand-total-info">


                        <span>

                            ALL PRODUCTS

                        </span>


                        <div class="grand-total-label">

                            TOTAL PRICE OF ALL PRODUCTS

                        </div>


                    </div>


                    <span>

                        ${{ number_format(
                            $grandTotal,
                            2
                        ) }}

                    </span>


                </div>


            @endif


        </div>


    </div>


</body>

</html>