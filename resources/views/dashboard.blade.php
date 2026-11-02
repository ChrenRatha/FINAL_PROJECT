
<x-app-layout>

    @php
        $totalStudents = \App\Models\Student::count();
        $totalDepartments = \App\Models\Department::count();

        $maleStudents = \App\Models\Student::where('gender', 'Male')->count();
        $femaleStudents = \App\Models\Student::where('gender', 'Female')->count();

        $recentStudents = \App\Models\Student::with('department')
            ->latest('studentid')
            ->take(5)
            ->get();

        $departmentStats = \App\Models\Department::withCount('students')->get();

        $maxDepartmentStudents = max(1, $departmentStats->max('students_count') ?? 0);

        $malePercentage = $totalStudents > 0
            ? ($maleStudents / $totalStudents) * 100
            : 0;

        $femalePercentage = $totalStudents > 0
            ? ($femaleStudents / $totalStudents) * 100
            : 0;
    @endphp

    <x-slot name="header">
        <div class="dashboard-heading">
            <div>
                <h2>Dashboard</h2>
                <p>Welcome back! Here's your student management overview.</p>
            </div>

            <a href="{{ route('student.create') }}" class="dashboard-add-btn">
                <i class="bi bi-plus-circle"></i>
                Add New Student
            </a>
        </div>
    </x-slot>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .dashboard-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            width: 100%;
        }

        .dashboard-heading h2 {
            font-size: 25px;
            font-weight: 800;
            color: #1e293b;
            margin: 0 0 5px;
        }

        .dashboard-heading p {
            font-size: 14px;
            color: #64748b;
            margin: 0;
        }

        .dashboard-add-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #2563eb;
            color: white;
            padding: 11px 18px;
            border-radius: 9px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
        }

        .dashboard-add-btn:hover {
            background: #1d4ed8;
            color: white;
        }

        .dashboard-wrapper {
            background: #f0f7fc;
            min-height: 100vh;
            padding: 28px;
            font-family: 'Figtree', sans-serif;
        }

        .dashboard-wrapper .stat-card {
            border: none;
            border-radius: 13px;
            color: white;
            min-height: 125px;
            padding: 22px;
            box-shadow: 0 5px 14px rgba(0,0,0,.10);
            display: flex;
            align-items: center;
            gap: 18px;
            transition: transform .2s;
        }

        .dashboard-wrapper .stat-card:hover {
            transform: translateY(-4px);
        }

        .stat-card.green {
            background: linear-gradient(110deg, #28c982, #27d9b2);
        }

        .stat-card.blue {
            background: linear-gradient(110deg, #1684ed, #59b5f7);
        }

        .stat-card.purple {
            background: linear-gradient(110deg, #8066ed, #a59afa);
        }

        .stat-card.orange {
            background: linear-gradient(110deg, #f59e0b, #ffc64b);
        }

        .stat-icon {
            font-size: 38px;
            opacity: .95;
        }

        .stat-number {
            font-size: 30px;
            font-weight: 800;
            line-height: 1.2;
        }

        .stat-label {
            font-size: 15px;
            font-weight: 600;
            margin-top: 4px;
        }

        .stat-description {
            font-size: 11px;
            opacity: .85;
            margin-top: 7px;
        }

        .dashboard-panel {
            background: white;
            border-radius: 13px;
            padding: 22px;
            height: 100%;
            box-shadow: 0 3px 15px rgba(0,0,0,.035);
        }

        .panel-title {
            color: #1e293b;
            font-size: 17px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .gender-chart {
            width: 175px;
            height: 175px;
            border-radius: 50%;
            background: conic-gradient(
                #c084fc 0% {{ $femalePercentage }}%,
                #60a5fa {{ $femalePercentage }}% 100%
            );
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px auto;
        }

        .gender-chart-inner {
            width: 115px;
            height: 115px;
            background: white;
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .gender-chart-inner strong {
            font-size: 25px;
            color: #1e293b;
        }

        .gender-chart-inner span {
            font-size: 12px;
            color: #64748b;
        }

        .gender-legend {
            display: flex;
            align-items: center;
            gap: 9px;
            margin: 13px 0;
            color: #475569;
            font-size: 13px;
        }

        .legend-dot {
            width: 11px;
            height: 11px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .department-item {
            margin-bottom: 21px;
        }

        .department-info {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            font-size: 13px;
            margin-bottom: 8px;
            color: #475569;
        }

        .department-info strong {
            color: #1e293b;
            white-space: nowrap;
        }

        .department-progress {
            height: 9px;
            background: #edf2f7;
            border-radius: 20px;
            overflow: hidden;
        }

        .department-progress-bar {
            height: 100%;
            border-radius: 20px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
        }

        .recent-table {
            width: 100%;
            border-collapse: collapse;
        }

        .recent-table th {
            background: #f8fafc;
            color: #64748b;
            font-size: 11px;
            text-transform: uppercase;
            padding: 13px;
            white-space: nowrap;
        }

        .recent-table td {
            padding: 14px 13px;
            border-bottom: 1px solid #edf2f7;
            color: #475569;
            font-size: 13px;
            white-space: nowrap;
        }

        .recent-table tr:hover td {
            background: #f8fafc;
        }

        .student-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            background: #dbeafe;
            color: #2563eb;
            font-weight: 700;
            margin-right: 8px;
        }

        .view-all {
            color: #2563eb;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }

        .view-all:hover {
            text-decoration: underline;
        }

        @media(max-width: 768px) {
            .dashboard-wrapper {
                padding: 18px 13px;
            }

            .dashboard-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .dashboard-heading h2 {
                font-size: 22px;
            }

            .dashboard-add-btn {
                width: 100%;
                justify-content: center;
            }

            .dashboard-wrapper .stat-card {
                min-height: 105px;
                padding: 16px;
            }

            .stat-number {
                font-size: 25px;
            }

            .stat-icon {
                font-size: 30px;
            }

            .dashboard-panel {
                padding: 17px;
            }
        }
    </style>

    <div class="dashboard-wrapper">

        <!-- STATISTICS CARDS -->
        <div class="row g-4 mb-4">

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card green">
                    <div class="stat-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div>
                        <div class="stat-number">{{ $totalStudents }}</div>
                        <div class="stat-label">Students</div>
                        <div class="stat-description">Total registered students</div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card blue">
                    <div class="stat-icon">
                        <i class="bi bi-building"></i>
                    </div>
                    <div>
                        <div class="stat-number">{{ $totalDepartments }}</div>
                        <div class="stat-label">Departments</div>
                        <div class="stat-description">Available departments</div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card purple">
                    <div class="stat-icon">
                        <i class="bi bi-gender-male"></i>
                    </div>
                    <div>
                        <div class="stat-number">{{ $maleStudents }}</div>
                        <div class="stat-label">Male Students</div>
                        <div class="stat-description">Registered male students</div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card orange">
                    <div class="stat-icon">
                        <i class="bi bi-gender-female"></i>
                    </div>
                    <div>
                        <div class="stat-number">{{ $femaleStudents }}</div>
                        <div class="stat-label">Female Students</div>
                        <div class="stat-description">Registered female students</div>
                    </div>
                </div>
            </div>

        </div>


        <!-- CHARTS -->
        <div class="row g-4 mb-4">

            <!-- GENDER STATISTICS -->
            <div class="col-12 col-lg-5">
                <div class="dashboard-panel">

                    <h5 class="panel-title">
                        <i class="bi bi-pie-chart-fill me-2 text-primary"></i>
                        Student Statistics
                    </h5>

                    <div class="row align-items-center">

                        <div class="col-12 col-md-6">

                            <div class="gender-chart">
                                <div class="gender-chart-inner">
                                    <strong>{{ $totalStudents }}</strong>
                                    <span>Total Students</span>
                                </div>
                            </div>

                        </div>

                        <div class="col-12 col-md-6">

                            <div class="gender-legend">
                                <span class="legend-dot" style="background:#c084fc;"></span>
                                Female Students
                            </div>

                            <h5 class="fw-bold ms-3">{{ $femaleStudents }}</h5>

                            <div class="gender-legend">
                                <span class="legend-dot" style="background:#60a5fa;"></span>
                                Male Students
                            </div>

                            <h5 class="fw-bold ms-3">{{ $maleStudents }}</h5>

                        </div>

                    </div>

                </div>
            </div>


            <!-- DEPARTMENT STATISTICS -->
            <div class="col-12 col-lg-7">
                <div class="dashboard-panel">

                    <h5 class="panel-title">
                        <i class="bi bi-bar-chart-fill me-2 text-primary"></i>
                        Department Statistics
                    </h5>

                    @forelse($departmentStats as $department)

                        <div class="department-item">

                            <div class="department-info">
                                <span>{{ $department->departmentname }}</span>

                                <strong>
                                    {{ $department->students_count }} Students
                                </strong>
                            </div>

                            <div class="department-progress">
                                <div
                                    class="department-progress-bar"
                                    style="width: {{ ($department->students_count / $maxDepartmentStudents) * 100 }}%;"
                                ></div>
                            </div>

                        </div>

                    @empty

                        <p class="text-secondary">
                            No departments available.
                        </p>

                    @endforelse

                </div>
            </div>

        </div>


        <!-- RECENT STUDENTS -->
        <div class="dashboard-panel">

            <div class="d-flex justify-content-between align-items-center mb-3 gap-2">

                <h5 class="panel-title mb-0">
                    <i class="bi bi-clock-history me-2 text-primary"></i>
                    Recent Students
                </h5>

                <a href="{{ route('student.list') }}" class="view-all">
                    View All <i class="bi bi-arrow-right"></i>
                </a>

            </div>

            <div class="table-responsive">

                <table class="recent-table">

                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Gender</th>
                            <th>Subject</th>
                            <th>Department</th>
                            <th>Payment</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($recentStudents as $student)

                            <tr>

                                <td>
                                    <span class="student-avatar">
                                        {{ strtoupper(substr($student->studentname, 0, 1)) }}
                                    </span>

                                    <strong>{{ $student->studentname }}</strong>
                                </td>

                                <td>{{ $student->gender }}</td>

                                <td>{{ $student->subject }}</td>

                                <td>
                                    {{ $student->department->departmentname ?? 'No Department' }}
                                </td>

                                <td class="fw-bold">
                                    ${{ number_format($student->payment, 2) }}
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    No students available.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>
