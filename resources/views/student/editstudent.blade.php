
<x-app-layout>

    <x-slot name="header">
        <div class="edit-page-heading">
            <div>
                <h2>Edit Student</h2>
                <p>Update student information and save your changes.</p>
            </div>

            <a href="{{ route('student.list') }}" class="edit-back-btn">
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
        .edit-student-page {
            background: #f0f7fc;
            min-height: 100vh;
            padding: 30px;
            font-family: 'Figtree', sans-serif;
        }

        .edit-page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            width: 100%;
        }

        .edit-page-heading h2 {
            color: #1e293b;
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .edit-page-heading p {
            color: #64748b;
            font-size: 14px;
            margin: 0;
        }

        .edit-back-btn {
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

        .edit-back-btn:hover {
            background: #f8fafc;
            color: #2563eb;
        }

        .edit-form-card {
            background: #fff;
            border: none;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0,0,0,.04);
        }

        .edit-section-title {
            color: #2563eb;
            font-size: 16px;
            font-weight: 800;
            padding-bottom: 17px;
            border-bottom: 1px solid #edf2f7;
            margin-bottom: 25px;
        }

        .edit-student-page .form-label {
            color: #334155;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .edit-student-page .form-control,
        .edit-student-page .form-select {
            min-height: 45px;
            padding: 10px 13px;
            border: 1px solid #dbe2ea;
            border-radius: 8px;
            font-size: 14px;
            color: #334155;
        }

        .edit-student-page textarea.form-control {
            min-height: 110px;
        }

        .edit-student-page .form-control:focus,
        .edit-student-page .form-select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,.10);
        }

        .edit-required {
            color: #dc3545;
        }

        .edit-student-page .input-group-text {
            background: #f8fafc;
            border-color: #dbe2ea;
            color: #64748b;
            border-radius: 8px 0 0 8px;
        }

        .edit-student-page .input-group .form-control {
            border-radius: 0 8px 8px 0;
        }

        .edit-submit-btn {
            background: #2563eb;
            color: white;
            border: 1px solid #2563eb;
            border-radius: 8px;
            padding: 11px 22px;
            font-size: 13px;
            font-weight: 700;
        }

        .edit-submit-btn:hover {
            background: #1d4ed8;
            color: white;
        }

        .edit-cancel-btn {
            background: #f8fafc;
            color: #475569;
            border: 1px solid #dbe2ea;
            border-radius: 8px;
            padding: 11px 20px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }

        .edit-cancel-btn:hover {
            background: #e2e8f0;
            color: #334155;
        }

        .edit-student-page .alert {
            border-radius: 9px;
            font-size: 13px;
        }

        @media(max-width: 768px) {
            .edit-student-page {
                padding: 18px 13px;
            }

            .edit-page-heading {
                flex-direction: column;
                align-items: flex-start;
            }

            .edit-page-heading h2 {
                font-size: 21px;
            }

            .edit-back-btn {
                width: 100%;
                justify-content: center;
            }

            .edit-student-page .card-body {
                padding: 20px !important;
            }

            .edit-form-actions {
                flex-direction: column;
            }

            .edit-form-actions a,
            .edit-form-actions button {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <div class="edit-student-page">

        <div class="card edit-form-card">

            <div class="card-body p-4 p-md-5">

                <!-- SECTION TITLE -->
                <div class="edit-section-title">
                    <i class="bi bi-pencil-square me-2"></i>
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

                <!-- EDIT STUDENT FORM -->
                <form action="{{ route('student.update', $student->studentid) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row g-4">

                        <!-- NAME -->
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Student Name <span class="edit-required">*</span>
                            </label>

                            <input
                                type="text"
                                name="studentname"
                                class="form-control"
                                placeholder="Enter student name"
                                value="{{ old('studentname', $student->studentname) }}"
                                required
                            >

                        </div>

                        <!-- GENDER -->
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Gender <span class="edit-required">*</span>
                            </label>

                            <select name="gender" class="form-select" required>

                                <option value="">Select Gender</option>

                                <option
                                    value="Male"
                                    {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}
                                >
                                    Male
                                </option>

                                <option
                                    value="Female"
                                    {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}
                                >
                                    Female
                                </option>

                            </select>

                        </div>

                        <!-- AGE -->
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Age <span class="edit-required">*</span>
                            </label>

                            <input
                                type="number"
                                name="ege"
                                class="form-control"
                                placeholder="Enter age"
                                min="1"
                                value="{{ old('ege', $student->ege) }}"
                                required
                            >

                        </div>

                        <!-- DATE OF BIRTH -->
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Date of Birth <span class="edit-required">*</span>
                            </label>

                            <input
                                type="date"
                                name="dob"
                                class="form-control"
                                value="{{ old('dob', \Carbon\Carbon::parse($student->dob)->format('Y-m-d')) }}"
                                required
                            >

                        </div>

                        <!-- SUBJECT -->
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Subject <span class="edit-required">*</span>
                            </label>

                            <input
                                type="text"
                                name="subject"
                                class="form-control"
                                placeholder="Enter subject"
                                value="{{ old('subject', $student->subject) }}"
                                required
                            >

                        </div>

                        <!-- PAYMENT -->
                        <div class="col-12 col-md-6">

                            <label class="form-label">
                                Payment <span class="edit-required">*</span>
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
                                    value="{{ old('payment', $student->payment) }}"
                                    required
                                >

                            </div>

                        </div>

                        <!-- DEPARTMENT -->
                        <div class="col-12">

                            <label class="form-label">
                                Department <span class="edit-required">*</span>
                            </label>

                            <select name="dept_id" class="form-select" required>

                                <option value="">Select Department</option>

                                @foreach($departments as $department)

                                    <option
                                        value="{{ $department->id }}"
                                        {{ old('dept_id', $student->dept_id) == $department->id ? 'selected' : '' }}
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
                            >{{ old('description', $student->description) }}</textarea>

                        </div>

                    </div>

                    <!-- BUTTONS -->
                    <div class="d-flex flex-wrap justify-content-end gap-2 mt-5 edit-form-actions">

                        <a
                            href="{{ route('student.list') }}"
                            class="edit-cancel-btn d-inline-flex align-items-center"
                        >
                            <i class="bi bi-x-circle me-2"></i>
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="edit-submit-btn"
                        >
                            <i class="bi bi-check-circle me-2"></i>
                            Update Student
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
