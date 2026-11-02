
<nav x-data="{ open: false }" class="admin-sidebar">

    <style>
        .admin-sidebar {
            font-family: 'Figtree', sans-serif;
        }

        .sidebar-desktop {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background: #fff;
            border-right: 1px solid #e5e7eb;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            transition: transform .3s ease;
        }

        .sidebar-logo {
            height: 75px;
            display: flex;
            align-items: center;
            padding: 0 25px;
            border-bottom: 1px solid #f1f3f5;
            font-size: 23px;
            font-weight: 800;
            color: #2563eb;
            text-decoration: none;
            gap: 10px;
        }

        .sidebar-logo span {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            color: white;
            font-size: 20px;
        }

        .sidebar-menu {
            padding: 22px 13px;
            flex: 1;
            overflow-y: auto;
        }

        .sidebar-label {
            color: #9ca3af;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            padding: 12px 13px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 12px 14px;
            margin-bottom: 6px;
            border-radius: 10px;
            color: #64748b;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: all .2s ease;
        }

        .sidebar-link:hover {
            background: #eff6ff;
            color: #2563eb;
        }

        .sidebar-link.active {
            background: #e8f2ff;
            color: #2563eb;
        }

        .sidebar-icon {
            width: 22px;
            text-align: center;
            font-size: 19px;
        }

        .sidebar-bottom {
            padding: 15px;
            border-top: 1px solid #f1f3f5;
        }

        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 10px;
            background: #f8fafc;
            border-radius: 12px;
        }

        .sidebar-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
        }

        .sidebar-mobile-toggle {
            display: none;
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1100;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 9px 12px;
            font-size: 20px;
        }

        .sidebar-overlay {
            display: none;
        }

        @media (max-width: 768px) {
            body {
                padding-left: 0 !important;
            }

            .sidebar-desktop {
                transform: translateX(-100%);
            }

            .sidebar-desktop.mobile-open {
                transform: translateX(0);
            }

            .sidebar-mobile-toggle {
                display: block;
            }

            .sidebar-overlay.show {
                display: block;
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,.4);
                z-index: 999;
            }
        }

        @media (min-width: 769px) {
            body {
                padding-left: 260px;
            }
        }
    </style>

    <!-- Mobile Toggle -->
    <button
        type="button"
        class="sidebar-mobile-toggle"
        @click="open = !open"
    >
        ☰
    </button>

    <!-- Mobile Overlay -->
    <div
        class="sidebar-overlay"
        :class="{ 'show': open }"
        @click="open = false"
    ></div>

    <!-- Sidebar -->
    <aside
        class="sidebar-desktop"
        :class="{ 'mobile-open': open }"
    >

        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="sidebar-logo">
            <span>🎓</span>
            Student MIS
        </a>

        <!-- Navigation -->
        <div class="sidebar-menu">

            <div class="sidebar-label">MAIN MENU</div>

            <a href="{{ route('dashboard') }}"
               class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span class="sidebar-icon">▦</span>
                Dashboard
            </a>

            <div class="sidebar-label">STUDENT MANAGEMENT</div>

            <a href="{{ route('student.list') }}"
               class="sidebar-link {{ request()->routeIs('student.list') ? 'active' : '' }}">
                <span class="sidebar-icon">👨‍🎓</span>
                Student List
            </a>

            <a href="{{ route('student.create') }}"
               class="sidebar-link {{ request()->routeIs('student.create') ? 'active' : '' }}">
                <span class="sidebar-icon">➕</span>
                Add Student
            </a>

            <div class="sidebar-label">DEPARTMENT MANAGEMENT</div>

            <a href="{{ route('department.list') }}"
               class="sidebar-link {{ request()->routeIs('department.list') ? 'active' : '' }}">
                <span class="sidebar-icon">🏢</span>
                Department List
            </a>

            <a href="{{ route('department.create') }}"
               class="sidebar-link {{ request()->routeIs('department.create') ? 'active' : '' }}">
                <span class="sidebar-icon">➕</span>
                Add Department
            </a>

            <div class="sidebar-label">ACCOUNT</div>

            <a href="{{ route('profile.edit') }}"
               class="sidebar-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                <span class="sidebar-icon">⚙️</span>
                Settings
            </a>

        </div>

        <!-- User Profile -->
        <div class="sidebar-bottom">

            <div class="sidebar-user">

                <div class="sidebar-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

                <div style="flex:1; min-width:0;">
                    <div style="font-size:13px;font-weight:700;color:#1e293b;">
                        {{ Auth::user()->name }}
                    </div>

                    <div style="font-size:11px;color:#94a3b8;">
                        Administrator
                    </div>
                </div>

            </div>

            <a href="{{ route('profile.edit') }}"
               class="sidebar-link mt-2">
                <span class="sidebar-icon">👤</span>
                My Profile
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                    class="sidebar-link w-100 border-0 bg-transparent text-start"
                    style="cursor:pointer;">
                    <span class="sidebar-icon">↪</span>
                    Logout
                </button>
            </form>

        </div>

    </aside>

</nav>
