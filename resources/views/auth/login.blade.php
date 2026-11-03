
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Login | SSSN Fashion')</title>

    <link rel="icon" type="image/png" href="{{ asset('logo/logo.ico') }}">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'DM Sans', sans-serif;
        }

        .fashion-font {
            font-family: 'Playfair Display', serif;
        }

        [x-cloak] {
            display: none !important;
        }

        /* Main background */
        .login-background {
            background-image:
                linear-gradient(
                    90deg,
                    rgba(20, 17, 15, 0.78) 0%,
                    rgba(20, 17, 15, 0.50) 48%,
                    rgba(20, 17, 15, 0.20) 100%
                ),
                url('https://images.unsplash.com/photo-1539109136881-3be0616acf4b?w=2000');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.20);
        }

        .form-input {
            transition: border-color .25s ease, box-shadow .25s ease;
        }

        .form-input:focus {
            border-color: #a58a6d;
            box-shadow: 0 0 0 3px rgba(165, 138, 109, 0.12);
        }

        .login-button {
            transition: background-color .25s ease, box-shadow .25s ease;
        }

        .login-button:hover {
            background-color: #514237;
            box-shadow: 0 8px 20px rgba(41, 37, 36, 0.18);
        }

        .social-button {
            transition: background-color .2s ease, border-color .2s ease;
        }

        .social-button:hover {
            background-color: #f7f4f0;
            border-color: #c9b8a4;
        }

        @media (max-width: 1023px) {
            .login-background {
                background-image:
                    linear-gradient(
                        rgba(20, 17, 15, 0.65),
                        rgba(20, 17, 15, 0.75)
                    ),
                    url('https://images.unsplash.com/photo-1539109136881-3be0616acf4b?w=1200');

                background-position: center;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>

<body>

    @include('msg')

    <main class="login-background relative flex min-h-screen items-center justify-center overflow-hidden px-4 py-8 sm:px-8 lg:justify-end lg:px-16">

        <!-- Background overlay -->
        <div class="absolute inset-0 bg-black/10"></div>

        <!-- Left branding section -->
        <section class="relative z-10 hidden flex-1 flex-col justify-between self-stretch py-8 pr-10 text-white lg:flex">

            <!-- Brand -->
            <div>
                <h1 class="text-4xl font-extrabold tracking-[7px]">
                    SSSN
                </h1>

                <p class="mt-2 text-[10px] uppercase tracking-[5px] text-white/70">
                    Fashion & Lifestyle
                </p>
            </div>

            <!-- Main text -->
            <div class="max-w-2xl pb-10">

                <p class="mb-6 text-xs font-semibold uppercase tracking-[6px] text-[#d2b99c]">
                    The New Fashion Experience
                </p>

                <h2 class="fashion-font text-6xl leading-tight xl:text-7xl">
                    Wear Your
                    <span class="italic text-[#d2b99c]">Confidence.</span>
                </h2>

                <p class="mt-7 max-w-lg text-sm leading-8 text-white/75">
                    Discover timeless fashion, explore modern essentials
                    and express your personality with styles made for you.
                </p>

                <div class="mt-10 flex items-center gap-5">
                    <div class="h-px w-16 bg-[#d2b99c]"></div>

                    <p class="text-[10px] uppercase tracking-[4px] text-white/70">
                        Style is always personal
                    </p>
                </div>

            </div>

            <!-- Footer -->
            <div class="flex items-center justify-between border-t border-white/20 pt-5">

                <p class="text-[10px] uppercase tracking-[3px] text-white/60">
                    SSSN Fashion
                </p>

                <p class="text-[10px] uppercase tracking-[3px] text-white/60">
                    © {{ date('Y') }} All Rights Reserved
                </p>

            </div>

        </section>


        <!-- Right login section -->
        <section class="relative z-10 flex w-full max-w-[470px] flex-col justify-center">

            <!-- Mobile branding -->
            <div class="mb-7 text-center lg:hidden">

                <h1 class="text-4xl font-extrabold tracking-[7px] text-white">
                    SSSN
                </h1>

                <p class="mt-2 text-[10px] uppercase tracking-[5px] text-white/80">
                    Fashion & Lifestyle
                </p>

            </div>


            <!-- Login card -->
            <div class="login-card rounded-3xl border border-white/50 px-6 py-8 sm:px-10 sm:py-10">

                <!-- Heading -->
                <div class="mb-8">

                    <div class="mb-5 flex items-center gap-3">

                        <span class="h-px w-10 bg-[#a58a6d]"></span>

                        <span class="text-[10px] font-bold uppercase tracking-[4px] text-[#a58a6d]">
                            Welcome Back
                        </span>

                    </div>

                    <h2 class="fashion-font text-4xl font-semibold leading-tight text-[#292524]">
                        Your Style,
                        <span class="italic text-[#a58a6d]">Your Space.</span>
                    </h2>

                    <p class="mt-4 text-sm leading-6 text-[#89837d]">
                        Sign in to discover your favourite fashion collections.
                    </p>

                </div>


                <!-- Login form -->
                <form action="{{ route('userLogin') }}" method="POST" class="space-y-5">

                    @csrf

                    <!-- Email -->
                    <div>

                        <label for="email" class="mb-2 block text-xs font-bold uppercase tracking-[2px] text-[#57504a]">
                            Email Address
                        </label>

                        <div class="relative">

                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#a49a8e]">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                                    <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                                    <path d="m3 7 9 6 9-6"></path>
                                </svg>
                            </span>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email') }}"
                                placeholder="Enter your email"
                                required
                                autofocus
                                class="form-input w-full rounded-xl border border-[#e8e2da] bg-[#faf9f7] py-3.5 pl-12 pr-4 text-sm text-[#292524] outline-none placeholder:text-[#b5ada4]"
                            >

                        </div>

                        @error('email')
                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                    </div>


                    <!-- Password -->
                    <div x-data="{ showPassword: false }">

                        <div class="mb-2 flex items-center justify-between">

                            <label for="password" class="block text-xs font-bold uppercase tracking-[2px] text-[#57504a]">
                                Password
                            </label>

                            <a href="#" class="text-xs font-medium text-[#a58a6d] hover:text-[#292524]">
                                Forgot Password?
                            </a>

                        </div>

                        <div class="relative">

                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#a49a8e]">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                                    <rect x="4" y="10" width="16" height="11" rx="2"></rect>
                                    <path d="M8 10V7a4 4 0 1 1 8 0v3"></path>
                                </svg>
                            </span>

                            <input
                                :type="showPassword ? 'text' : 'password'"
                                name="password"
                                id="password"
                                placeholder="Enter your password"
                                required
                                class="form-input w-full rounded-xl border border-[#e8e2da] bg-[#faf9f7] py-3.5 pl-12 pr-12 text-sm text-[#292524] outline-none placeholder:text-[#b5ada4]"
                            >

                            <button
                                type="button"
                                @click="showPassword = !showPassword"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-[#a49a8e] hover:text-[#292524]"
                                aria-label="Toggle password visibility"
                            >

                                <svg x-show="!showPassword" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                                    <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>

                                <svg x-show="showPassword" x-cloak class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                                    <path d="m3 3 18 18"></path>
                                    <path d="M10.6 10.6a2 2 0 0 0 2.8 2.8"></path>
                                    <path d="M9.9 5.2A11 11 0 0 1 12 5c6.5 0 10 7 10 7a14 14 0 0 1-3.2 3.9"></path>
                                    <path d="M6.2 6.2C3.5 8 2 12 2 12s3.5 7 10 7a10 10 0 0 0 4-.8"></path>
                                </svg>

                            </button>

                        </div>

                        @error('password')
                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                    </div>


                    <!-- Remember me -->
                    <div class="flex items-center justify-between pt-1">

                        <label class="flex cursor-pointer items-center gap-2.5 text-xs text-[#817970]">

                            <input
                                type="checkbox"
                                name="remember"
                                id="remember"
                                class="h-4 w-4 rounded border-[#d9d0c5] accent-[#292524]"
                            >

                            Remember me

                        </label>

                        <span class="text-[10px] uppercase tracking-[2px] text-[#a58a6d]">
                            Secure Login
                        </span>

                    </div>


                    <!-- Submit -->
                    <button
                        type="submit"
                        class="login-button flex w-full items-center justify-center gap-3 rounded-xl bg-[#292524] px-5 py-4 text-xs font-bold uppercase tracking-[3px] text-white"
                    >

                        Sign In

                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M5 12h14"></path>
                            <path d="m13 6 6 6-6 6"></path>
                        </svg>

                    </button>

                </form>


                <!-- Divider -->
                <div class="my-7 flex items-center gap-4">

                    <div class="h-px flex-1 bg-[#eee9e2]"></div>

                    <span class="text-[10px] uppercase tracking-[3px] text-[#aaa198]">
                        Or continue with
                    </span>

                    <div class="h-px flex-1 bg-[#eee9e2]"></div>

                </div>


                <!-- Social login -->
                <div class="grid grid-cols-3 gap-3">

                    <!-- Google -->
                    <a
                        href="{{ route('social.redirect', 'google') }}"
                        aria-label="Login with Google"
                        class="social-button flex items-center justify-center rounded-xl border border-[#e8e2da] bg-white py-3.5"
                    >
                        <svg class="h-5 w-5" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M21.35 12.2c0-.7-.06-1.4-.18-2H12v3.8h5.24a4.48 4.48 0 0 1-1.94 2.94v2.45h3.14c1.84-1.7 2.91-4.2 2.91-7.19z"/>
                            <path fill="#34A853" d="M12 21.6c2.64 0 4.86-.87 6.48-2.35l-3.14-2.45c-.87.58-1.98.92-3.34.92-2.56 0-4.73-1.73-5.51-4.05H3.24v2.53A9.8 9.8 0 0 0 12 21.6z"/>
                            <path fill="#FBBC05" d="M6.49 13.67A5.9 5.9 0 0 1 6.18 12c0-.58.1-1.14.31-1.67V7.8H3.24A9.8 9.8 0 0 0 2.2 12c0 1.58.38 3.08 1.04 4.2l3.25-2.53z"/>
                            <path fill="#EA4335" d="M12 6.28c1.44 0 2.73.5 3.75 1.48l2.81-2.81C16.85 3.33 14.64 2.4 12 2.4a9.8 9.8 0 0 0-8.76 5.4l3.25 2.53C7.27 8.01 9.44 6.28 12 6.28z"/>
                        </svg>
                    </a>


                    <!-- Facebook -->
                    <a
                        href="{{ route('social.redirect', 'facebook') }}"
                        aria-label="Login with Facebook"
                        class="social-button flex items-center justify-center rounded-xl border border-[#e8e2da] bg-white py-3.5 text-[#1877F2]"
                    >
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.07C24 5.4 18.63 0 12 0S0 5.4 0 12.07C0 18.1 4.39 23.16 10.13 24v-8.44H7.08v-3.49h3.05V9.41c0-3.03 1.79-4.7 4.53-4.7 1.31 0 2.68.24 2.68.24v2.97h-1.51c-1.49 0-1.96.93-1.96 1.88v2.26h3.33l-.53 3.49h-2.8V24C19.61 23.16 24 18.1 24 12.07z"/>
                        </svg>
                    </a>


                    <!-- X -->
                    <a
                        href="{{ route('social.redirect', 'x') }}"
                        aria-label="Login with X"
                        class="social-button flex items-center justify-center rounded-xl border border-[#e8e2da] bg-white py-3.5 text-black"
                    >
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.9 2H22l-6.77 7.74L23.2 22h-6.24l-4.89-6.39L6.48 22H3.36l7.24-8.28L2.8 2h6.4l4.42 5.84L18.9 2zm-1.1 17.8h1.73L8.28 4.08H6.42L17.8 19.8z"/>
                        </svg>
                    </a>

                </div>


                <!-- Register -->
                <div class="mt-7 border-t border-[#eee9e2] pt-6 text-center">

                    <p class="text-xs text-[#8d867e]">
                        Don't have an account?

                        <a
                            href="{{ route('userRegister') }}"
                            class="ml-1 font-bold text-[#292524] underline decoration-[#b59a7c] underline-offset-4 hover:text-[#9b8062]"
                        >
                            Create Account
                        </a>
                    </p>

                </div>

            </div>


            <!-- Mobile footer -->
            <p class="mt-6 text-center text-[10px] uppercase tracking-[2px] text-white/70 lg:hidden">
                © {{ date('Y') }} SSSN Fashion. All rights reserved.
            </p>

        </section>

    </main>

</body>
</html>
