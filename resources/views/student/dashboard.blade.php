
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    Welcome, {{ $student->studentname }}!
                </h2>

                <p class="text-gray-600 mt-2">
                    Student ID: {{ $student->studentid }}
                </p>

                <p class="text-gray-600">
                    Department: {{ $student->department->departmentname ?? 'N/A' }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">

                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-gray-500">Total Attendance</h3>
                    <p class="text-3xl font-bold">{{ $totalAttendance }}</p>
                </div>

                <div class="bg-green-100 p-6 rounded-lg shadow">
                    <h3 class="text-green-700">Present</h3>
                    <p class="text-3xl font-bold">{{ $presentCount }}</p>
                </div>

                <div class="bg-yellow-100 p-6 rounded-lg shadow">
                    <h3 class="text-yellow-700">Late</h3>
                    <p class="text-3xl font-bold">{{ $lateCount }}</p>
                </div>

                <div class="bg-red-100 p-6 rounded-lg shadow">
                    <h3 class="text-red-700">Absent</h3>
                    <p class="text-3xl font-bold">{{ $absentCount }}</p>
                </div>

            </div>

            <div class="bg-white p-6 rounded-lg shadow mb-6">
                <h3 class="text-xl font-bold mb-4">My Attendance History</h3>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-3 border">Date</th>
                                <th class="p-3 border">Check In Time</th>
                                <th class="p-3 border">Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($attendances as $attendance)
                                <tr>
                                    <td class="p-3 border">
                                        {{ $attendance->attendance_date }}
                                    </td>

                                    <td class="p-3 border">
                                        {{ $attendance->check_in_time ?? '-' }}
                                    </td>

                                    <td class="p-3 border">
                                        {{ $attendance->status }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="p-4 text-center text-gray-500">
                                        No attendance records found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
