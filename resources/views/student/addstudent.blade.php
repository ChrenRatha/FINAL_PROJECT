
<x-app-layout>

    <x-slot name="header">
        <div class="student-page-heading">
            <div>
                <h2>Add New Student</h2>
                <p>Enter student information to register a new student.</p>
            </div>

            <a href="{{ route('student.list') }}" class="student-back-btn">
                <i class="bi bi-arrow-left"></i>
                Back to Student List
            </a>
        </div>
    </x-slot>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .student-form-page {
            background: #f0f7fc;
            min-height: 100vh;
            padding: 30px;
            font-family: 'Figtree', sans-serif;
        }

        .student-page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            width: 100%;
        }

        .student-page-heading h2 {
            color: #1e293b;
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .student-page-heading p {
            color: #64748b;
            font-size: 14px;
            margin: 0;
        }

        .student-back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 17px;
            border: 1px solid #dbe2ea;
            border-radius: 8px;
            color: #475569;
            background: white;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .student-back-btn:hover {
            background: #f8fafc;
            color: #2563eb;
        }

        .student-form-card {
            background: #fff;
            border: none;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0,0,0,.04);
        }

        .student-section-title {
            color: #2563eb;
            font-size: 16px;
            font-weight: 800;
            padding-bottom: 17px;
            border-bottom: 1px solid #edf2f7;
            margin-bottom: 25px;
        }

        .student-form-page .form-label {
            color: #334155;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .student-form-page .form-control,
        .student-form-page .form-select {
            min-height: 45px;
            padding: 10px 13px;
            border: 1px solid #dbe2ea;
            border-radius: 8px;
            font-size: 14px;
            color: #334155;
        }

        .student-form-page textarea.form-control {
            min-height: 110px;
        }

        .student-form-page .form-control:focus,
        .student-form-page .form-select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,.10);
        }

        .student-required {
            color: #dc3545;
        }

        .student-form-page .input-group-text {
            background: #f8fafc;
            border-color: #dbe2ea;
            color: #64748b;
            border-radius: 8px 0 0 8px;
        }

        .student-form-page .input-group .form-control {
            border-radius: 0 8px 8px 0;
        }

        .student-submit-btn {
            background: #2563eb;
            color: white;
            border: 1px solid #2563eb;
            border-radius: 8px;
            padding: 11px 22px;
            font-size: 13px;
            font-weight: 700;
        }

        .student-submit-btn:hover {
            background: #1d4ed8;
            color: white;
        }

        .student-clear-btn {
            background: #f8fafc;
            color: #475569;
            border: 1px solid #dbe2ea;
            border-radius: 8px;
            padding: 11px 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .student-clear-btn:hover {
            background: #e2e8f0;
        }

        .student-form-page .alert {
            border-radius: 9px;
            font-size: 13px;
        }

        @media(max-width: 768px) {
            .student-form-page {
                padding: 18px 13px;
            }

            .student-page-heading {
                flex-direction: column;
                align-items: flex-start;
            }

            .student-page-heading h2 {
                font-size: 21px;
            }

            .student-back-btn {
                width: 100%;
                justify-content: center;
            }

            .student-form-page .card-body {
                padding: 20px !important;
            }

            .student-form-actions {
                flex-direction: column;
            }

            .student-form-actions a,
            .student-form-actions button {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <div class="student-form-page">

        <div class="card student-form-card">

            <div class="card-body p-4 p-md-5">

                <!-- SECTION TITLE -->
                <div class="student-section-title">
                    <i class="bi bi-person-lines-fill me-2"></i>
                    Student Information
                </div>

                <!-- VALIDATION ERRORS -->
                @if($errors->any())

                    <div class="alert alert-danger">

                        <strong>
                            <i class="bi bi-exclamation-circle me-1"></i>
                            Please check the following errors:
                        </strong>

                        <ul class="mb-0 mt-2">

                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                @endif

                <!-- STUDENT FORM -->
                <form action="{{ route('student.store') }}" method="POST">

                    @csrf

                    <div class="row g-4">

                        <!-- NAME -->
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Student Name <span class="student-required">*</span>
                            </label>

                            <input
                                type="text"
                                name="studentname"
                                class="form-control"
                                placeholder="Enter student name"
                                value="{{ old('studentname') }}"
                                required
                            >

                        </div>

                        <!-- GENDER -->
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Gender <span class="student-required">*</span>
                            </label>

                            <select name="gender" class="form-select" required>

                                <option value="">Select Gender</option>

                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>
                                    Male
                                </option>

                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                                    Female
                                </option>

                            </select>

                        </div>

                        <!-- AGE -->
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Age <span class="student-required">*</span>
                            </label>

                            <input
                                type="number"
                                name="ege"
                                class="form-control"
                                placeholder="Enter age"
                                min="1"
                                value="{{ old('ege') }}"
                                required
                            >

                        </div>

                        <!-- DATE OF BIRTH -->
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Date of Birth <span class="student-required">*</span>
                            </label>

                            <input
                                type="date"
                                name="dob"
                                class="form-control"
                                value="{{ old('dob') }}"
                                required
                            >

                        </div>

                        <!-- SUBJECT -->
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Subject <span class="student-required">*</span>
                            </label>

                            <input
                                type="text"
                                name="subject"
                                class="form-control"
                                placeholder="Enter subject"
                                value="{{ old('subject') }}"
                                required
                            >

                        </div>

                        <!-- PAYMENT -->
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Payment <span class="student-required">*</span>
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">$</span>

                                <input
                                    type="number"
                                    name="payment"
                                    class="form-control"
                                    placeholder="0.00"
                                    min="0"
                                    step="0.01"
                                    value="{{ old('payment') }}"
                                    required
                                >

                            </div>

                        </div>

                        <!-- DEPARTMENT -->
                        <div class="col-12">

                            <label class="form-label">
                                Department <span class="student-required">*</span>
                            </label>

                            <select name="dept_id" class="form-select" required>

                                <option value="">Select Department</option>

                                @foreach($departments as $department)

                                    <option
                                        value="{{ $department->id }}"
                                        {{ old('dept_id') == $department->id ? 'selected' : '' }}
                                    >
                                        {{ $department->departmentname }}
                                    </option>

                                @endforeach

                            </select>

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
                                placeholder="Enter student description..."
                            >{{ old('description') }}</textarea>

                        </div>

                    </div>

                    <!-- BUTTONS -->
                    <div class="d-flex flex-wrap justify-content-end gap-2 mt-5 student-form-actions">

                        <a
                            href="{{ route('student.list') }}"
                            class="btn btn-outline-secondary px-4 py-2"
                        >
                            <i class="bi bi-arrow-left me-2"></i>
                            Back
                        </a>

                        <button
                            type="reset"
                            class="student-clear-btn"
                        >
                            <i class="bi bi-arrow-counterclockwise me-2"></i>
                            Clear
                        </button>

                        <button
                            type="submit"
                            class="student-submit-btn"
                        >
                            <i class="bi bi-check-circle me-2"></i>
                            Save Student
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
