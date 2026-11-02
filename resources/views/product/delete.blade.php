<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Delete Product
    </title>


    <!-- Bootstrap 5 -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <!-- Bootstrap Icons -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.css"
    >


    <style>

        body {

            min-height: 100vh;

            background:
                linear-gradient(
                    135deg,
                    #f8f9fa,
                    #e9ecef
                );

        }


        /* ================= MODAL ================= */

        .modal-content {

            border: none;

            border-radius: 24px;

            overflow: hidden;

            box-shadow:
                0 20px 60px
                rgba(0, 0, 0, 0.18);
        }


        /* ================= HEADER ================= */

        .delete-header {

            background:
                linear-gradient(
                    135deg,
                    #dc3545,
                    #b02a37
                );

            padding: 20px 24px;

            border: none;
        }


        .delete-header .modal-title {

            font-weight: 600;

            letter-spacing: 0.3px;
        }


        /* ================= WARNING ICON ================= */

        .warning-icon {

            width: 90px;

            height: 90px;

            margin:
                0 auto 20px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background: #fff1f2;

            color: #dc3545;

            font-size: 45px;

            box-shadow:
                0 10px 25px
                rgba(220, 53, 69, 0.15);

            animation:
                pulse 1.8s infinite;
        }


        @keyframes pulse {

            0% {

                box-shadow:
                    0 0 0 0
                    rgba(220, 53, 69, 0.35);
            }


            70% {

                box-shadow:
                    0 0 0 15px
                    rgba(220, 53, 69, 0);
            }


            100% {

                box-shadow:
                    0 0 0 0
                    rgba(220, 53, 69, 0);
            }

        }


        /* ================= PRODUCT CARD ================= */

        .product-card {

            background: #fff8e1;

            border:
                1px solid #ffe69c;

            border-radius: 15px;

            padding: 18px;
        }


        .product-label {

            font-size: 13px;

            font-weight: 600;

            color: #856404;

            text-transform:
                uppercase;

            letter-spacing: 0.8px;
        }


        .product-name {

            font-size: 20px;

            font-weight: 700;

            color: #212529;
        }


        /* ================= PRODUCT DETAILS ================= */

        .product-details {

            margin-top: 15px;

            padding-top: 15px;

            border-top:
                1px solid #ffe69c;
        }


        .detail-row {

            display: flex;

            justify-content:
                space-between;

            gap: 20px;

            padding: 7px 0;
        }


        .detail-label {

            color: #856404;

            font-size: 13px;

            font-weight: 600;
        }


        .detail-value {

            color: #212529;

            font-size: 13px;

            font-weight: 700;

            text-align: right;
        }


        .detail-price {

            color: #198754;
        }


        /* ================= FOOTER ================= */

        .modal-footer {

            border-top:
                1px solid #eee;

            padding:
                20px 24px 24px;
        }


        /* ================= BUTTONS ================= */

        .btn {

            border-radius: 10px;

            padding: 10px 20px;

            font-weight: 600;

            transition:
                all 0.2s ease;
        }


        .btn:hover {

            transform:
                translateY(-2px);
        }


        .btn-danger {

            box-shadow:
                0 5px 15px
                rgba(220, 53, 69, 0.25);
        }


        .btn-secondary {

            background: #6c757d;

            border: none;
        }


        /* ================= TEXT ================= */

        .delete-title {

            font-weight: 700;

            color: #212529;
        }


        .delete-description {

            color: #6c757d;

            font-size: 15px;
        }


        .warning-text {

            font-size: 14px;

            font-weight: 500;
        }

    </style>

</head>


<body>


    <!-- ========================================= -->
    <!-- DELETE PRODUCT MODAL -->
    <!-- ========================================= -->


    <div
        class="modal fade show"
        id="deleteModal"
        tabindex="-1"
        aria-labelledby="deleteModalLabel"
        aria-hidden="false"
        style="display: block;"
    >


        <div
            class="modal-dialog modal-dialog-centered"
        >


            <div class="modal-content">


                <!-- HEADER -->

                <div
                    class="modal-header delete-header text-white"
                >


                    <h5
                        class="modal-title"
                        id="deleteModalLabel"
                    >

                        <i
                            class="bi bi-trash3-fill me-2"
                        ></i>

                        Delete Product

                    </h5>


                    <a
                        href="{{ route('product.list') }}"
                        class="btn-close btn-close-white"
                        aria-label="Close"
                    ></a>


                </div>


                <!-- BODY -->

                <div
                    class="modal-body text-center p-4"
                >


                    <!-- WARNING ICON -->

                    <div class="warning-icon">

                        <i
                            class="bi bi-trash3-fill"
                        ></i>

                    </div>


                    <!-- TITLE -->

                    <h3
                        class="delete-title mb-2"
                    >

                        Are you sure?

                    </h3>


                    <!-- DESCRIPTION -->

                    <p
                        class="delete-description mb-4"
                    >

                        You are about to permanently
                        delete this product.

                        Please confirm that you want
                        to continue.

                    </p>


                    <!-- PRODUCT CARD -->

                    <div
                        class="product-card text-start mb-4"
                    >


                        <div
                            class="d-flex align-items-center"
                        >


                            <!-- PRODUCT ICON -->

                            <div
                                class="
                                    rounded-circle
                                    bg-warning-subtle
                                    text-warning-emphasis
                                    d-flex
                                    align-items-center
                                    justify-content-center
                                    me-3
                                "
                                style="
                                    width:50px;
                                    height:50px;
                                "
                            >

                                <i
                                    class="bi bi-box-seam fs-4"
                                ></i>

                            </div>


                            <!-- PRODUCT INFO -->

                            <div>


                                <div
                                    class="product-label"
                                >

                                    Product Name

                                </div>


                                <div
                                    class="product-name"
                                >

                                    {{ $product->productname }}

                                </div>


                            </div>


                        </div>


                        <!-- PRODUCT DETAILS -->

                        <div
                            class="product-details"
                        >


                            <!-- PRODUCT ID -->

                            <div
                                class="detail-row"
                            >

                                <span
                                    class="detail-label"
                                >

                                    Product ID

                                </span>


                                <span
                                    class="detail-value"
                                >

                                    {{ $product->productid }}

                                </span>

                            </div>


                            <!-- PRICE -->

                            <div
                                class="detail-row"
                            >

                                <span
                                    class="detail-label"
                                >

                                    Price

                                </span>


                                <span
                                    class="
                                        detail-value
                                        detail-price
                                    "
                                >

                                    ${{ number_format(
                                        $product->price,
                                        2
                                    ) }}

                                </span>

                            </div>


                            <!-- QUANTITY -->

                            <div
                                class="detail-row"
                            >

                                <span
                                    class="detail-label"
                                >

                                    Quantity

                                </span>


                                <span
                                    class="detail-value"
                                >

                                    {{ $product->quantity }}

                                </span>

                            </div>


                            <!-- CATEGORY -->

                            <div
                                class="detail-row"
                            >

                                <span
                                    class="detail-label"
                                >

                                    Category

                                </span>


                                <span
                                    class="detail-value"
                                >

                                    {{ $product->cat->categoryname ?? '' }}

                                </span>

                            </div>


                            <!-- TOTAL PRICE -->

                            <div
                                class="detail-row"
                            >

                                <span
                                    class="detail-label"
                                >

                                    Total Price

                                </span>


                                <span
                                    class="
                                        detail-value
                                        detail-price
                                    "
                                >

                                    ${{ number_format(
                                        $product->price *
                                        $product->quantity,
                                        2
                                    ) }}

                                </span>

                            </div>


                        </div>


                    </div>


                    <!-- WARNING -->

                    <div
                        class="text-danger warning-text"
                    >

                        <i
                            class="
                                bi
                                bi-exclamation-triangle-fill
                                me-1
                            "
                        ></i>

                        This action cannot be undone.

                    </div>


                </div>


                <!-- FOOTER -->

                <div
                    class="
                        modal-footer
                        justify-content-center
                        gap-2
                    "
                >


                    <!-- CANCEL -->

                    <a
                        href="{{ route('product.list') }}"
                        class="btn btn-secondary"
                    >

                        <i
                            class="bi bi-x-circle me-1"
                        ></i>

                        Cancel

                    </a>


                    <!-- DELETE FORM -->

                    <form
                        action="{{
                            route(
                                'product.destroy',
                                $product->productid
                            )
                        }}"
                        method="POST"
                        class="d-inline"
                    >

                        @csrf

                        @method('DELETE')


                        <button
                            type="submit"
                            class="btn btn-danger"
                        >

                            <i
                                class="
                                    bi
                                    bi-trash3-fill
                                    me-1
                                "
                            ></i>

                            Yes, Delete

                        </button>


                    </form>


                </div>


            </div>

        </div>

    </div>


</body>

</html>