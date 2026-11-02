
<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="fw-bold mb-1">Add New Department</h2>
            <p class="text-secondary mb-0">
                Enter department information to create a new department.
            </p>
        </div>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .department-page {
            background-color: #f4f7fb;
            min-height: 100vh;
            padding: 30px;
        }

        .form-card {
            background: #ffffff;
            border: none;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }

        .page-title {
            color: #1e293b;
            font-weight: 700;
        }

        .form-label {
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }

        .form-control {
            padding: 11px 13px;
            border-radius: 8px;
            border: 1px solid #dbe2ea;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.10);
        }

        .required {
            color: #dc3545;
        }

        .section-title {
            font-weight: 700;
            color: #2563eb;
            font-size: 15px;
        }

        @media (max-width: 768px) {
            .department-page {
                padding: 18px 12px;
            }
        }
    </style>

    <div class="department-page">

        <!-- FORM CARD -->
        <div class="card form-card">

            <div class="card-body p-4 p-md-5">

                <div class="section-title mb-4">
                    <i class="bi bi-building me-2"></i>
                    Department Information
                </div>

                <!-- VALIDATION ERRORS -->
                @if($errors->any())

                    <div class="alert alert-danger">

                        <strong>Please check the following errors:</strong>

                        <ul class="mb-0 mt-2">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <!-- DEPARTMENT FORM -->
                <form action="{{ route('department.store') }}" method="POST">

                    @csrf

                    <div class="row g-4">

                        <!-- DEPARTMENT NAME -->
                        <div class="col-12">

                            <label class="form-label">
                                Department Name <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="departmentname"
                                class="form-control"
                                placeholder="Enter department name"
                                value="{{ old('departmentname') }}"
                                required
                            >

                        </div>

                        <!-- SHORT NAME -->
                        <div class="col-12">

                            <label class="form-label">
                                Short Name
                            </label>

                            <input
                                type="text"
                                name="shortname"
                                class="form-control"
                                placeholder="Example: IT, MIS, BA"
                                value="{{ old('shortname') }}"
                            >

                        </div>

                        <!-- DESCRIPTION -->
                        <div class="col-12">

                            <label class="form-label">
                                Description
                            </label>

                            <textarea
                                name="description"
                                class="form-control"
                                rows="4"
                                placeholder="Enter department description..."
                            >{{ old('description') }}</textarea>

                        </div>

                    </div>

                    <!-- BUTTONS -->
                    <div class="d-flex flex-wrap justify-content-end gap-2 mt-5">

                        <a
                            href="{{ route('department.list') }}"
                            class="btn btn-outline-secondary px-4 py-2"
                        >
                            <i class="bi bi-arrow-left me-2"></i>
                            Back
                        </a>

                        <button
                            type="reset"
                            class="btn btn-light border px-4 py-2"
                        >
                            <i class="bi bi-arrow-counterclockwise me-2"></i>
                            Clear
                        </button>

                        <button
                            type="submit"
                            class="btn btn-primary px-4 py-2"
                        >
                            <i class="bi bi-check-circle me-2"></i>
                            Save Department
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</x-app-layout>
