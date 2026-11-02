
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MIS - Management Information Systems') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background: #f0f7fc;
        }

        .mis-topbar {
            height: 75px;
            background: #ffffff;
            border-bottom: 1px solid #e8edf3;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            gap: 20px;
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .mis-search {
            width: 100%;
            max-width: 600px;
            position: relative;
        }

        .mis-search input {
            width: 100%;
            height: 43px;
            border: 1px solid #dce5ef;
            border-radius: 30px;
            background: #f8fbff;
            padding: 0 18px 0 43px;
            outline: none;
            font-size: 13px;
            transition: .2s;
        }

        .mis-search input:focus {
            border-color: #60a5fa;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(59,130,246,.08);
        }

        .mis-search-icon {
            position: absolute;
            left: 16px;
            top: 12px;
            color: #64748b;
            font-size: 15px;
        }

        .mis-topbar-right {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .mis-icon-btn {
            width: 38px;
            height: 38px;
            border: none;
            border-radius: 50%;
            background: transparent;
            color: #64748b;
            font-size: 19px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .mis-icon-btn:hover {
            background: #f1f5f9;
            color: #2563eb;
        }

        .mis-institution {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #334155;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .mis-institution-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: linear-gradient(135deg, #2563eb, #8b5cf6);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .mis-page-header {
            background: #fff;
            padding: 18px 30px;
            border-bottom: 1px solid #edf1f5;
        }

        .mis-page-header h2 {
            font-size: 20px;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
        }

        .mis-content {
            min-height: calc(100vh - 130px);
            background: #f0f7fc;
        }

        @media(max-width: 768px) {
            .mis-topbar {
                height: 65px;
                padding: 0 15px;
                gap: 10px;
            }

            .mis-search {
                max-width: none;
            }

            .mis-search input {
                height: 39px;
                font-size: 12px;
            }

            .mis-topbar-right {
                gap: 8px;
            }

            .mis-institution span {
                display: none;
            }

            .mis-institution {
                gap: 0;
            }

            .mis-page-header {
                padding: 15px;
            }

            .mis-content {
                min-height: calc(100vh - 110px);
            }
        }

        @media(max-width: 380px) {
            .mis-topbar-right {
                gap: 3px;
            }

            .mis-icon-btn {
                width: 32px;
                height: 32px;
            }
        }
    </style>

</head>

<body class="font-sans antialiased">

    <div class="min-h-screen">

        <!-- SIDEBAR -->
        @include('layouts.navigation')

        <!-- MAIN AREA -->
        <div class="mis-main-area">

            <!-- TOP NAVBAR -->
            <nav class="mis-topbar">

                <!-- SEARCH -->
                <form action="{{ route('student.list') }}" method="GET" class="mis-search">

                    <i class="bi bi-search mis-search-icon"></i>

                    <input
                        type="text"
                        name="search"
                        placeholder="Search student name..."
                        value="{{ request('search') }}"
                    >

                </form>

                <!-- RIGHT SIDE -->
                <div class="mis-topbar-right">

                    <!-- Notification Icon -->
                    <a href="{{ route('dashboard') }}"
                       class="mis-icon-btn text-decoration-none"
                       title="Dashboard">
                        <i class="bi bi-bell"></i>
                    </a>

                    <!-- Institution -->
                    <a href="{{ route('dashboard') }}" class="mis-institution">

                        <div class="mis-institution-icon">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>

                        <span>
                            Management Information Systems
                        </span>

                        <i class="bi bi-chevron-down"></i>

                    </a>

                </div>

            </nav>


            <!-- PAGE HEADING -->
            @isset($header)

                <header class="mis-page-header">

                    {{ $header }}

                </header>

            @endisset


            <!-- PAGE CONTENT -->
            <main class="mis-content">

                {{ $slot }}

            </main>

        </div>

    </div>

</body>

</html>
