
<x-guest-layout>
    <style>
        * {
            box-sizing: border-box;
        }

        /* Keep Original Graduation Background */
        .min-h-screen {
            min-height: 100vh !important;
            background:
                linear-gradient(rgba(15, 23, 42, 0.45), rgba(15, 23, 42, 0.45)),
                url('/images/login-background.jpg') center center / cover no-repeat fixed !important;
        }

        /* Remove Breeze White Container */
        .min-h-screen > div {
            width: 100% !important;
            max-width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            background: transparent !important;
            box-shadow: none !important;
            border: none !important;
            border-radius: 0 !important;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 35px 15px;
        }

        .login-container {
            width: 100%;
            max-width: 470px;
            text-align: center;
        }

        /* Brand */
        .login-brand {
            margin-bottom: 30px;
            color: #ffffff;
        }

        .login-logo {
            width: 78px;
            height: 78px;
            margin: 0 auto 18px;
            border-radius: 22px;
            background: linear-gradient(135deg, #2563eb, #6366f1);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.35);
        }

        .login-logo svg {
            width: 40px;
            height: 40px;
            color: white;
        }

        .login-brand h1 {
            font-size: 30px;
            font-weight: 800;
            color: #ffffff;
            margin: 0 0 8px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .login-brand p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            margin: 0;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
        }

        /* Dark Purple Glass Login Card */
        .login-card {
            width: 100%;
            padding: 40px;
            text-align: left;

            background: rgba(30, 5, 55, 0.25) !important;

            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);

            border: 1px solid rgba(255, 255, 255, 0.55);
            border-radius: 28px;

            box-shadow:
                0 15px 45px rgba(0, 0, 0, 0.25),
                inset 0 1px 2px rgba(255, 255, 255, 0.15);
        }

        .login-card h2 {
            font-size: 23px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 8px;
        }

        .login-card .subtitle {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 32px;
        }

        .login-card label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 9px;
        }

        /* Input Fields */
        .login-input-wrapper {
            position: relative;
            margin-bottom: 20px;
        }

        .login-input {
            width: 100%;
            height: 54px;
            padding: 12px 16px;

            background: rgba(20, 5, 35, 0.20) !important;
            border: 1.5px solid rgba(255, 255, 255, 0.9);
            border-radius: 13px;

            color: #ffffff !important;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
        }

        .login-input::placeholder {
            color: rgba(255, 255, 255, 0.65);
        }

        .login-input:focus {
            background: rgba(40, 10, 65, 0.3) !important;
            border-color: #d8b4fe;
            color: #ffffff !important;
            box-shadow: 0 0 12px rgba(192, 132, 252, 0.25);
        }

        .password-input {
            padding-right: 50px;
        }

        /* Password Eye */
        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #ffffff;
            cursor: pointer;
            font-size: 19px;
            padding: 5px;
        }

        .password-toggle:hover {
            color: #d8b4fe;
        }

        /* Remember Me & Forgot Password */
        .login-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-top: 5px;
            margin-bottom: 32px;
        }

        .remember-label {
            display: flex !important;
            align-items: center;
            gap: 9px;
            margin: 0 !important;
            font-size: 13px !important;
            font-weight: 400 !important;
            color: #ffffff !important;
            cursor: pointer;
        }

        .remember-label input {
            width: 17px;
            height: 17px;
            accent-color: #a855f7;
        }

        .forgot-link {
            font-size: 13px;
            color: #e9d5ff;
            text-decoration: none;
            font-weight: 500;
        }

        .forgot-link:hover {
            text-decoration: underline;
            color: #ffffff;
        }

        /* Purple Gradient Login Button */
        .login-button {
            width: 100%;
            height: 54px;

            background: linear-gradient(135deg, #c084fc, #9333ea);
            border: 1.5px solid rgba(255, 255, 255, 0.9);
            border-radius: 13px;

            color: #ffffff;
            font-size: 17px;
            font-weight: 700;

            box-shadow: 0 5px 20px rgba(147, 51, 234, 0.3);
            transition: 0.3s;
            cursor: pointer;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(192, 132, 252, 0.4);
        }

        /* Register Link */
        .register-link {
            text-align: center;
            margin-top: 22px;
            color: #ffffff;
            font-size: 13px;
        }

        .register-link a {
            color: #e9d5ff;
            font-weight: 700;
            text-decoration: none;
            margin-left: 4px;
        }

        .register-link a:hover {
            color: #ffffff;
            text-decoration: underline;
        }

        /* Footer */
        .login-footer {
            color: rgba(255, 255, 255, 0.9);
            font-size: 12px;
            margin-top: 28px;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
        }

        /* Validation Error */
        .login-error {
            color: #fca5a5;
            font-size: 13px;
            margin-top: 6px;
        }

        @media (max-width: 576px) {
            .login-card {
                padding: 28px 22px;
            }

            .login-brand h1 {
                font-size: 26px;
            }

            .login-options {
                flex-wrap: wrap;
            }
        }
    </style>

    <div class="login-wrapper">
        <div class="login-container">

            <!-- Brand -->
            <div class="login-brand">
                <div class="login-logo">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M3 9l9-5 9 5-9 5-9-5z" />
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M7 11.2V16c3.2 2.3 6.8 2.3 10 0v-4.8" />
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M21 9v6" />
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M20 17h2v3h-2z" />
                    </svg>
                </div>

                <h1>Student MIS</h1>
                <p>Student Management System</p>
            </div>

            <!-- Glass Login Card -->
            <div class="login-card">

                <h2>Welcome Back!</h2>
                <p class="subtitle">
                    Please login to access your dashboard.
                </p>

                <x-auth-session-status
                    class="mb-4"
                    :status="session('status')"
                />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="login-input-wrapper">
                        <label for="email">Email Address</label>

                        <input
                            id="email"
                            class="login-input"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Enter your email"
                            required
                            autofocus
                            autocomplete="username"
                        />

                        @error('email')
                            <div class="login-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="login-input-wrapper">
                        <label for="password">Password</label>

                        <input
                            id="password"
                            class="login-input password-input"
                            type="password"
                            name="password"
                            placeholder="Enter your password"
                            required
                            autocomplete="current-password"
                        />

                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword()"
                            aria-label="Show or hide password"
                        >
                            <i class="bi bi-eye" id="passwordIcon"></i>
                        </button>

                        @error('password')
                            <div class="login-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="login-options">
                        <label for="remember_me" class="remember-label">
                            <input
                                id="remember_me"
                                type="checkbox"
                                name="remember"
                            />
                            Remember me
                        </label>

                        @if (Route::has('password.request'))
                            <a
                                class="forgot-link"
                                href="{{ route('password.request') }}"
                            >
                                Forgot your password?
                            </a>
                        @endif
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="login-button">
                        <i class="bi bi-box-arrow-in-right me-2"></i>
                        LOG IN
                    </button>
                </form>

                <!-- Register as Student -->
                @if (Route::has('register'))
                    <div class="register-link">
                        Don't have an account?
                        <a href="{{ route('register') }}">
                            Register as Student
                        </a>
                    </div>
                @endif

            </div>

            <!-- Footer -->
            <div class="login-footer">
                © {{ date('Y') }} Student MIS. All rights reserved.
            </div>

        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('passwordIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('bi-eye');
                passwordIcon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('bi-eye-slash');
                passwordIcon.classList.add('bi-eye');
            }
        }
    </script>
</x-guest-layout>
