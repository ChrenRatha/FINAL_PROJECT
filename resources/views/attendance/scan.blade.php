<x-app-layout>
    <style>
        .scan-page {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
        }

        .scan-card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 5px 25px rgba(0,0,0,0.06);
        }

        .scan-icon {
            width: 75px;
            height: 75px;
            background: #eef2ff;
            color: #4f46e5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin: 0 auto 20px;
        }

        .scan-title {
            font-size: 25px;
            font-weight: 700;
            color: #1e293b;
        }

        .scan-info {
            background: #f8fafc;
            border-radius: 12px;
            padding: 18px;
            margin: 25px 0;
            text-align: left;
        }

        .scan-info p {
            margin-bottom: 12px;
            color: #475569;
        }

        .scan-info p:last-child {
            margin-bottom: 0;
        }

        .scan-info strong {
            color: #1e293b;
        }

        .btn-checkin {
            width: 100%;
            padding: 13px;
            background: #4f46e5;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-checkin:hover {
            background: #4338ca;
        }

        .scan-success {
            background: #dcfce7;
            color: #166534;
            padding: 13px;
            border-radius: 9px;
            margin-bottom: 18px;
        }

        .scan-error {
            background: #fee2e2;
            color: #991b1b;
            padding: 13px;
            border-radius: 9px;
            margin-bottom: 18px;
        }

        .scan-done {
            background: #dcfce7;
            color: #166534;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 18px;
        }

        .scan-done-icon {
            width: 65px;
            height: 65px;
            background: #16a34a;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin: 0 auto 12px;
        }

        .scan-done h3 {
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 5px;
        }
    </style>

    <div class="scan-page">
        <div class="scan-card">

            <div class="scan-icon">
                <i class="bi bi-qr-code-scan"></i>
            </div>

            <h2 class="scan-title">Student Attendance</h2>

            <p style="color: #64748b; margin-top: 8px;">
                Please confirm your information before checking in.
            </p>

            @if(session('success'))
                <div class="scan-done">
                    <div class="scan-done-icon">
                        <i class="bi bi-check-lg"></i>
                    </div>

                    <h3>DONE!</h3>

                    <p style="font-weight: 600;">
                        {{ session('success') }}
                    </p>
                </div>
            @endif

            @if(session('error'))
                <div class="scan-error">
                    {{ session('error') }}
                </div>
            @endif

            <div class="scan-info">
                <p>
                    <strong>Student ID:</strong>
                    {{ $student->studentid }}
                </p>

                <p>
                    <strong>Student Name:</strong>
                    {{ $student->studentname }}
                </p>

                <p>
                    <strong>Department:</strong>
                    {{ $student->department->departmentname ?? 'N/A' }}
                </p>

                <p>
                    <strong>Date:</strong>
                    {{ now()->format('d M Y') }}
                </p>
            </div>

            @if(session('success') || (session('error') && str_contains(session('error'), 'already recorded')))
                <div style="background: #dcfce7; color: #166534; padding: 13px; border-radius: 9px; font-weight: 700;">
                    <i class="bi bi-check-circle-fill"></i>
                    Attendance Completed
                </div>
            @else
                <form
                    action="{{ route('attendance.checkin') }}"
                    method="POST"
                >
                    @csrf

                    <button type="submit" class="btn-checkin">
                        <i class="bi bi-check-circle"></i>
                        Confirm Check In
                    </button>
                </form>
            @endif

            <p style="color: #94a3b8; font-size: 13px; margin-top: 18px;">
                Your attendance can only be recorded once per day.
            </p>

        </div>
    </div>
</x-app-layout>
