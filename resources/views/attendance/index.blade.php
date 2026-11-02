
<x-app-layout>
    <style>
        .attendance-page {
            padding: 25px;
            color: #1e293b;
        }

        .attendance-card {
            background: #fff;
            border-radius: 14px;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        .attendance-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .attendance-subtitle {
            color: #64748b;
            margin-bottom: 22px;
        }

        .attendance-form {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .attendance-form .full-width {
            grid-column: 1 / -1;
        }

        .attendance-form label {
            display: block;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .attendance-form input,
        .attendance-form select,
        .attendance-form textarea {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #dbe2ea;
            border-radius: 8px;
            outline: none;
        }

        .attendance-form input:focus,
        .attendance-form select:focus,
        .attendance-form textarea:focus {
            border-color: #6366f1;
        }

        .btn-save {
            background: #4f46e5;
            color: white;
            padding: 11px 22px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-save:hover {
            background: #4338ca;
        }

        .attendance-table {
            width: 100%;
            border-collapse: collapse;
        }

        .attendance-table th,
        .attendance-table td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
            white-space: nowrap;
        }

        .attendance-table th {
            background: #f8fafc;
            font-weight: 700;
        }

        .status {
            padding: 5px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .status-present {
            background: #dcfce7;
            color: #15803d;
        }

        .status-absent {
            background: #fee2e2;
            color: #b91c1c;
        }

        .status-late {
            background: #fef3c7;
            color: #b45309;
        }

        .status-permission {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .btn-qr {
            display: inline-block;
            padding: 7px 12px;
            background: #eef2ff;
            color: #4338ca;
            border-radius: 7px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            padding: 13px;
            border-radius: 8px;
            margin-bottom: 18px;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            padding: 13px;
            border-radius: 8px;
            margin-bottom: 18px;
        }

        /* ATTENDANCE SUMMARY */
        .attendance-summary {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 18px;
            margin-bottom: 25px;
        }

        .summary-card {
            background: #fff;
            border-radius: 14px;
            padding: 22px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        .summary-title {
            color: #64748b;
            font-size: 14px;
            font-weight: 600;
        }

        .summary-number {
            font-size: 30px;
            font-weight: 800;
            margin-top: 8px;
        }

        .summary-description {
            color: #94a3b8;
            font-size: 12px;
            margin-top: 4px;
        }

        @media (max-width: 600px) {
            .attendance-page {
                padding: 15px;
            }

            .attendance-form {
                grid-template-columns: 1fr;
            }

            .attendance-form .full-width {
                grid-column: auto;
            }
        }
    </style>

    <div class="attendance-page">

        <div style="margin-bottom: 25px;">
            <h2 class="attendance-title">Attendance Management</h2>
            <p class="attendance-subtitle">
                Manage student attendance and QR Code check-in.
            </p>
        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert-error">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-error">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- ATTENDANCE SUMMARY -->
        <div class="attendance-summary">

            <!-- Total Students -->
            <div class="summary-card">
                <div class="summary-title">Total Students</div>

                <div class="summary-number" style="color: #2563eb;">
                    {{ $totalStudents }}
                </div>

                <div class="summary-description">
                    Registered students
                </div>
            </div>

            <!-- Present -->
            <div class="summary-card">
                <div class="summary-title">Present</div>

                <div class="summary-number" style="color: #16a34a;">
                    {{ $presentCount }}
                </div>

                <div class="summary-description">
                    Students present today
                </div>
            </div>

            <!-- Absent -->
            <div class="summary-card">
                <div class="summary-title">Absent</div>

                <div class="summary-number" style="color: #dc2626;">
                    {{ $absentCount }}
                </div>

                <div class="summary-description">
                    Students absent today
                </div>
            </div>

            <!-- Late -->
            <div class="summary-card">
                <div class="summary-title">Late</div>

                <div class="summary-number" style="color: #d97706;">
                    {{ $lateCount }}
                </div>

                <div class="summary-description">
                    Students late today
                </div>
            </div>

            <!-- Permission -->
            <div class="summary-card">
                <div class="summary-title">Permission</div>

                <div class="summary-number" style="color: #2563eb;">
                    {{ $permissionCount }}
                </div>

                <div class="summary-description">
                    Students with permission
                </div>
            </div>

        </div>

        <!-- MANUAL ATTENDANCE FORM -->
        <div class="attendance-card">
            <h3 style="font-size: 19px; font-weight: 700; margin-bottom: 5px;">
                Manual Attendance
            </h3>

            <p style="color: #64748b; margin-bottom: 20px;">
                Record student attendance manually.
            </p>

            <form action="{{ route('attendance.manual') }}" method="POST">
                @csrf

                <div class="attendance-form">

                    <div>
                        <label>Student</label>
                        <select name="studentid" required>
                            <option value="">Select Student</option>

                            @foreach($students as $student)
                                <option value="{{ $student->studentid }}"
                                    {{ old('studentid') == $student->studentid ? 'selected' : '' }}>
                                    {{ $student->studentname }}
                                    ({{ $student->studentid }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label>Attendance Date</label>
                        <input
                            type="date"
                            name="attendance_date"
                            value="{{ old('attendance_date', date('Y-m-d')) }}"
                            required
                        >
                    </div>

                    <div>
                        <label>Status</label>
                        <select name="status" required>
                            <option value="Present" {{ old('status') == 'Present' ? 'selected' : '' }}>Present</option>
                            <option value="Absent" {{ old('status') == 'Absent' ? 'selected' : '' }}>Absent</option>
                            <option value="Late" {{ old('status') == 'Late' ? 'selected' : '' }}>Late</option>
                            <option value="Permission" {{ old('status') == 'Permission' ? 'selected' : '' }}>Permission</option>
                        </select>
                    </div>

                    <div>
                        <label>Description</label>
                        <input
                            type="text"
                            name="description"
                            value="{{ old('description') }}"
                            placeholder="Optional description"
                        >
                    </div>

                    <div class="full-width">
                        <button type="submit" class="btn-save">
                            Save Attendance
                        </button>
                    </div>

                </div>
            </form>
        </div>

        <!-- CLASSROOM QR CODE -->
        <div class="attendance-card">
            <h3 style="font-size: 19px; font-weight: 700; margin-bottom: 8px;">
                Classroom QR Code
            </h3>

            <p style="color: #64748b; margin-bottom: 20px;">
                Students can scan this QR Code to check in their attendance.
            </p>

            <div style="text-align: center; padding: 20px;">
                <img
                    src="{{ route('attendance.classroom.qr') }}"
                    alt="Classroom QR Code"
                    style="width: 250px; max-width: 100%; height: auto;"
                >

                <p style="font-weight: 600; margin-top: 15px; color: #1e293b;">
                    Scan to Check In
                </p>

                <p style="color: #64748b; font-size: 13px; margin-top: 5px;">
                    Students must log in before checking in.
                </p>
            </div>
        </div>

        <!-- TODAY ATTENDANCE LIST -->
        <div class="attendance-card">
            <h3 style="font-size: 19px; font-weight: 700; margin-bottom: 5px;">
                Today's Attendance
            </h3>

            <p style="color: #64748b; margin-bottom: 18px;">
                Date: {{ now()->format('d M Y') }}
            </p>

            <div class="table-wrapper">
                <table class="attendance-table">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Check-in Time</th>
                            <th>Status</th>
                            <th>Description</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($attendances as $attendance)
                            <tr>
                                <td>{{ $attendance->studentid }}</td>
                                <td>{{ $attendance->student->studentname ?? 'N/A' }}</td>
                                <td>
                                    {{ $attendance->check_in_time ?? '-' }}
                                </td>
                                <td>
                                    <span class="status status-{{ strtolower($attendance->status) }}">
                                        {{ $attendance->status }}
                                    </span>
                                </td>
                                <td>{{ $attendance->description ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center; color: #64748b;">
                                    No attendance recorded today.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>
