
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Student Management System</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Alpine JS for Sidebar -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            background-color: #f0f7fc;
            font-family: 'Figtree', sans-serif;
            color: #1e293b;
        }

        .page-container {
            padding: 30px;
            min-height: 100vh;
        }

        .page-title {
            font-size: 30px;
            font-weight: 800;
            color: #1e293b;
        }

        .page-subtitle {
            color: #64748b;
            font-size: 15px;
        }

        .main-card {
            background: #ffffff;
            border: none;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.04);
        }

        .table thead th {
            background: #f1f5f9;
            color: #334155;
            font-size: 13px;
            text-transform: uppercase;
            padding: 17px 15px;
            white-space: nowrap;
            border-bottom: 1px solid #e2e8f0;
        }

        .table tbody td {
            padding: 16px 15px;
            vertical-align: middle;
            color: #475569;
            white-space: nowrap;
            border-color: #e2e8f0;
        }

        .table tbody tr:hover {
            background-color: #f8fafc;
        }

        .student-id {
            color: #2563eb;
            font-weight: 700;
        }

        .badge-gender {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
        }

        .male {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .female {
            background: #fce7f3;
            color: #be185d;
        }

        .department-badge {
            display: inline-block;
            background: #e0e7ff;
            color: #4338ca;
            padding: 7px 10px;
            border-radius: 6px;
            font-size: 12px;
        }

        .search-box {
            background: #f8fafc;
            border-radius: 8px;
            min-height: 44px;
        }

        .empty-state {
            padding: 50px 15px;
            text-align: center;
            color: #64748b;
        }

        .empty-state i {
            font-size: 45px;
            color: #94a3b8;
        }

        .btn-primary {
            background: #2563eb;
            border-color: #2563eb;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
        }

        .alert {
            border-radius: 10px;
        }

        @media (max-width: 768px) {
            .page-container {
                padding: 75px 15px 25px;
            }

            .page-title {
                font-size: 24px;
            }

            .page-header {
                align-items: flex-start !important;
            }

            .page-header .btn {
                width: 100%;
            }

            .main-card .card-body {
                padding: 15px !important;
            }

            .table thead th,
            .table tbody td {
                padding: 12px;
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

    <!-- ADMIN SIDEBAR -->
    @include('layouts.navigation')


    <!-- MAIN CONTENT -->
    <div class="page-container">

        <!-- PAGE HEADER -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3 page-header">

            <div>
                <h2 class="page-title mb-2">Student List</h2>

                <p class="page-subtitle mb-0">
                    Manage and view all student information.
                </p>
            </div>

            <a href="{{ route('student.create') }}" class="btn btn-primary px-4 py-2">
                <i class="bi bi-plus-circle me-2"></i>
                Add New Student
            </a>

        </div>


        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">

                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

            </div>
        @endif


        <!-- ERROR MESSAGE -->
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                <i class="bi bi-exclamation-circle-fill me-2"></i>
                {{ session('error') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

            </div>
        @endif


        <!-- STUDENT TABLE CARD -->
        <div class="card main-card">

            <div class="card-body p-4">

                <!-- SEARCH AND FILTER -->
                <form action="{{ route('student.list') }}" method="GET" class="mb-4">

                    <div class="row g-3 align-items-center">

                        <div class="col-12 col-md-5 col-lg-4">

                            <div class="input-group">

                                <span class="input-group-text bg-white">
                                    <i class="bi bi-search text-secondary"></i>
                                </span>

                                <input
                                    type="text"
                                    name="search"
                                    class="form-control search-box"
                                    placeholder="Search student name..."
                                    value="{{ request('search') }}"
                                >

                            </div>

                        </div>


                        <div class="col-12 col-md-4 col-lg-3">

                            <select name="dept_id" class="form-select search-box">

                                <option value="">All Departments</option>

                                @foreach($departments as $department)

                                    <option
                                        value="{{ $department->id }}"
                                        {{ request('dept_id') == $department->id ? 'selected' : '' }}
                                    >
                                        {{ $department->departmentname }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <div class="col-12 col-md-auto">

                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-funnel me-1"></i>
                                Search / Filter
                            </button>

                        </div>


                        <div class="col-12 col-md-auto">

                            <a href="{{ route('student.list') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-clockwise me-1"></i>
                                Reset
                            </a>

                        </div>

                    </div>

                </form>


                <!-- STUDENT TABLE -->
                @if($students->count() > 0)

                    <div class="table-responsive">

                        <table class="table table-hover align-middle mb-0">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Date of Birth</th>
                                    <th>Subject</th>
                                    <th>Payment</th>
                                    <th>Department</th>
                                    <th>Description</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>


                            <tbody>

                                @foreach($students as $student)

                                    <tr>

                                        <td class="student-id">
                                            #{{ $student->studentid }}
                                        </td>

                                        <td class="fw-semibold text-dark">
                                            {{ $student->studentname }}
                                        </td>

                                        <td>

                                            @if($student->gender == 'Male')

                                                <span class="badge-gender male">
                                                    <i class="bi bi-gender-male"></i>
                                                    Male
                                                </span>

                                            @else

                                                <span class="badge-gender female">
                                                    <i class="bi bi-gender-female"></i>
                                                    Female
                                                </span>

                                            @endif

                                        </td>

                                        <td>
                                            {{ $student->ege }}
                                        </td>

                                        <td>
                                            {{ $student->dob }}
                                        </td>

                                        <td>
                                            {{ $student->subject }}
                                        </td>

                                        <td class="fw-semibold">
                                            ${{ number_format($student->payment, 2) }}
                                        </td>

                                        <td>
                                            <span class="department-badge">
                                                {{ $student->department->departmentname ?? 'No Department' }}
                                            </span>
                                        </td>

                                        <td>
                                            {{ $student->description ?: '-' }}
                                        </td>

                                        <td class="text-center">

                                            <div class="d-flex justify-content-center gap-2">

                                                <a
                                                    href="{{ route('student.edit', $student->studentid) }}"
                                                    class="btn btn-sm btn-outline-primary"
                                                    title="Edit Student"
                                                >
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>


                                                <form
                                                    action="{{ route('student.destroy', $student->studentid) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this student?');"
                                                >

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="btn btn-sm btn-outline-danger"
                                                        title="Delete Student"
                                                    >
                                                        <i class="bi bi-trash"></i>
                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="empty-state">

                        <i class="bi bi-people"></i>

                        <h5 class="mt-3">No Students Found</h5>

                        <p class="mb-3">
                            There are no students matching your search.
                        </p>

                        <a href="{{ route('student.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>
                            Add New Student
                        </a>

                    </div>

                @endif

            </div>


            <!-- CARD FOOTER -->
            <div class="card-footer bg-white border-0 px-4 py-3">

                <small class="text-secondary">
                    <i class="bi bi-info-circle me-1"></i>
                    Total Students: {{ $students->count() }}
                </small>

            </div>

        </div>

    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
