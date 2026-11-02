
<x-app-layout>

    <x-slot name="header">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
                <h2 class="fw-bold mb-1">Department List</h2>
                <p class="text-secondary mb-0">
                    View all departments and their registered students.
                </p>
            </div>

            <a href="{{ route('department.create') }}"
               class="btn btn-primary px-4 py-2">
                <i class="bi bi-plus-lg me-2"></i>
                Add Department
            </a>
        </div>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .department-page {
            background: #f4f7fb;
            min-height: 100vh;
            padding: 30px;
        }

        .main-card {
            background: #ffffff;
            border: none;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            overflow: hidden;
        }

        .table thead th {
            background: #f1f5f9;
            color: #334155;
            font-size: 12px;
            text-transform: uppercase;
            padding: 15px;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 16px;
            vertical-align: middle;
            color: #475569;
        }

        .table tbody tr:hover {
            background-color: #f8fafc;
        }

        .department-id {
            color: #2563eb;
            font-weight: 700;
        }

        .shortname-badge {
            background: #e0e7ff;
            color: #4338ca;
            padding: 7px 12px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 12px;
        }

        .student-count {
            background: #dbeafe;
            color: #1d4ed8;
            padding: 7px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 12px;
            white-space: nowrap;
        }

        .action-column {
            min-width: 150px;
            white-space: nowrap;
        }

        .action-column .btn {
            border-radius: 7px;
            padding: 6px 10px;
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

        @media (max-width: 768px) {
            .department-page {
                padding: 18px 12px;
            }
        }
    </style>

    <div class="department-page">

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

        <!-- DEPARTMENT TABLE CARD -->
        <div class="card main-card">

            <div class="card-body p-4">

                @if($departments->count() > 0)

                    <div class="table-responsive">

                        <table class="table table-hover align-middle mb-0">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Department Name</th>
                                    <th>Short Name</th>
                                    <th>Description</th>
                                    <th class="text-center">Total Students</th>
                                    <th class="text-center action-column">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($departments as $department)

                                    <tr>

                                        <td class="department-id">
                                            #{{ $department->id }}
                                        </td>

                                        <td class="fw-semibold text-dark">
                                            {{ $department->departmentname }}
                                        </td>

                                        <td>
                                            <span class="shortname-badge">
                                                {{ $department->shortname ?? '-' }}
                                            </span>
                                        </td>

                                        <td>
                                            {{ $department->description ?: '-' }}
                                        </td>

                                        <td class="text-center">
                                            <span class="student-count">
                                                <i class="bi bi-people me-1"></i>
                                                {{ $department->students->count() }} Students
                                            </span>
                                        </td>

                                        <!-- ACTION BUTTONS -->
                                        <td class="text-center action-column">

                                            <a href="{{ route('department.edit', $department->id) }}"
                                               class="btn btn-sm btn-outline-primary"
                                               title="Edit Department">
                                                <i class="bi bi-pencil-square"></i>
                                                Edit
                                            </a>

                                            <form action="{{ route('department.destroy', $department->id) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this department?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-danger"
                                                        title="Delete Department">
                                                    <i class="bi bi-trash"></i>
                                                    Delete
                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="empty-state">

                        <i class="bi bi-building"></i>

                        <h5 class="mt-3">No Departments Found</h5>

                        <p class="mb-3">
                            There are currently no departments available.
                        </p>

                        <a href="{{ route('department.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-lg me-2"></i>
                            Add First Department
                        </a>

                    </div>

                @endif

            </div>

            <!-- CARD FOOTER -->
            <div class="card-footer bg-white border-0 px-4 py-3">

                <small class="text-secondary">
                    <i class="bi bi-building me-1"></i>
                    Total Departments: {{ $departments->count() }}
                </small>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</x-app-layout>
