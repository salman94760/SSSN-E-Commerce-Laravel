
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


            <div class="login-card rounded-3xl border border-white/50 px-6 py-8 sm:px-10 sm:py-9">

                <!-- Heading -->
                <div class="mb-7">

                    <div class="mb-5 flex items-center gap-3">

                        <span class="h-px w-10 bg-[#a58a6d]"></span>

                        <span class="text-[10px] font-bold uppercase tracking-[4px] text-[#a58a6d]">
                            Join Our Community
                        </span>

                    </div>

                    <h2 class="fashion-font text-4xl font-semibold leading-tight text-[#292524]">
                        Create Your
                        <span class="italic text-[#a58a6d]">Account.</span>
                    </h2>

                    <p class="mt-3 text-sm leading-6 text-[#89837d]">
                        Become a part of SSSN Fashion and discover your style.
                    </p>

                </div>


                <!-- Register Form -->
                <form action="http://localhost:8000/register" method="POST" class="space-y-4">

                    <input type="hidden" name="_token" value="jnPSNYXsP7Wh6iFGMJ475ZdFFhkyaq9Z9odT7ijB" autocomplete="off">
                    <!-- Full Name -->
                    <div>

                        <label for="name" class="mb-2 block text-xs font-bold uppercase tracking-[2px] text-[#57504a]">
                            Full Name
                        </label>

                        <input type="text" name="name" id="name" value="" placeholder="Enter your full name" required="" autocomplete="name" class="form-input w-full rounded-xl border border-[#e8e2da] bg-[#faf9f7] px-4 py-3.5 text-sm text-[#292524] outline-none placeholder:text-[#b5ada4]">

                        
                    </div>


                    <!-- Email -->
                    <div>

                        <label for="email" class="mb-2 block text-xs font-bold uppercase tracking-[2px] text-[#57504a]">
                            Email Address
                        </label>

                        <input type="email" name="email" id="email" value="" placeholder="Enter your email" required="" autocomplete="email" class="form-input w-full rounded-xl border border-[#e8e2da] bg-[#faf9f7] px-4 py-3.5 text-sm text-[#292524] outline-none placeholder:text-[#b5ada4]">

                        
                    </div>


                    <!-- Phone -->
                    <div>

                        <label for="phone" class="mb-2 block text-xs font-bold uppercase tracking-[2px] text-[#57504a]">
                            Phone Number
                        </label>

                        <input type="tel" name="phone" id="phone" value="" placeholder="Enter your phone number" autocomplete="tel" class="form-input w-full rounded-xl border border-[#e8e2da] bg-[#faf9f7] px-4 py-3.5 text-sm text-[#292524] outline-none placeholder:text-[#b5ada4]">

                        
                    </div>


                    <!-- Password -->
                    <div x-data="{ showPassword: false }">

                        <label for="password" class="mb-2 block text-xs font-bold uppercase tracking-[2px] text-[#57504a]">
                            Password
                        </label>

                        <div class="relative">

                            <input :type="showPassword ? 'text' : 'password'" name="password" id="password" placeholder="Create a password" required="" autocomplete="new-password" class="form-input w-full rounded-xl border border-[#e8e2da] bg-[#faf9f7] px-4 py-3.5 pr-12 text-sm text-[#292524] outline-none placeholder:text-[#b5ada4]" type="password">

                            <button type="button" @click="showPassword = !showPassword" class="absolute right-4 top-1/2 -translate-y-1/2 text-[#a49a8e]" aria-label="Toggle password visibility">

                                <svg x-show="!showPassword" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                                    <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>

                                <svg x-show="showPassword" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24" style="display: none;">
                                    <path d="m3 3 18 18"></path>
                                    <path d="M10.6 10.6a2 2 0 0 0 2.8 2.8"></path>
                                    <path d="M9.9 5.2A11 11 0 0 1 12 5c6.5 0 10 7 10 7"></path>
                                </svg>

                            </button>

                        </div>

                        
                    </div>


                    <!-- Confirm Password -->
                    <div x-data="{ showConfirm: false }">

                        <label for="password_confirmation" class="mb-2 block text-xs font-bold uppercase tracking-[2px] text-[#57504a]">
                            Confirm Password
                        </label>

                        <div class="relative">

                            <input :type="showConfirm ? 'text' : 'password'" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password" required="" autocomplete="new-password" class="form-input w-full rounded-xl border border-[#e8e2da] bg-[#faf9f7] px-4 py-3.5 pr-12 text-sm text-[#292524] outline-none placeholder:text-[#b5ada4]" type="password">

                            <button type="button" @click="showConfirm = !showConfirm" class="absolute right-4 top-1/2 -translate-y-1/2 text-[#a49a8e]" aria-label="Toggle confirm password visibility">

                                <svg x-show="!showConfirm" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                                    <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>

                                <svg x-show="showConfirm" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24" style="display: none;">
                                    <path d="m3 3 18 18"></path>
                                    <path d="M10.6 10.6a2 2 0 0 0 2.8 2.8"></path>
                                </svg>

                            </button>

                        </div>

                        
                    </div>


                    <!-- Terms -->
                    <div class="pt-1">

                        <label class="flex cursor-pointer items-start gap-2.5 text-xs leading-5 text-[#817970]">

                            <input type="checkbox" name="terms" value="1" required="" class="mt-1 h-4 w-4 rounded border-[#d9d0c5] accent-[#292524]">

                            <span>
                                I agree to the
                                <a href="#" class="font-semibold text-[#a58a6d] underline">
                                    Terms &amp; Conditions
                                </a>
                                and Privacy Policy.
                            </span>

                        </label>

                    </div>


                    <!-- Submit -->
                    <button type="submit" class="register-button flex w-full items-center justify-center gap-3 rounded-xl bg-[#292524] px-5 py-4 text-xs font-bold uppercase tracking-[3px] text-white">

                        Create Account

                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M5 12h14"></path>
                            <path d="m13 6 6 6-6 6"></path>
                        </svg>

                    </button>

                </form>


                <!-- Divider -->
                <div class="my-6 flex items-center gap-4">

                    <div class="h-px flex-1 bg-[#eee9e2]"></div>

                    <span class="text-[10px] uppercase tracking-[3px] text-[#aaa198]">
                        Or sign up with
                    </span>

                    <div class="h-px flex-1 bg-[#eee9e2]"></div>

                </div>


                <!-- Social Register -->
                <div class="grid grid-cols-3 gap-3">

                    <a href="http://localhost:8000/auth/google" aria-label="Register with Google" class="social-button flex items-center justify-center rounded-xl border border-[#e8e2da] bg-white py-3.5">
                        <svg class="h-5 w-5" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M21.35 12.2c0-.7-.06-1.4-.18-2H12v3.8h5.24a4.48 4.48 0 0 1-1.94 2.94v2.45h3.14c1.84-1.7 2.91-4.2 2.91-7.19z"></path>
                            <path fill="#34A853" d="M12 21.6c2.64 0 4.86-.87 6.48-2.35l-3.14-2.45c-.87.58-1.98.92-3.34.92-2.56 0-4.73-1.73-5.51-4.05H3.24v2.53A9.8 9.8 0 0 0 12 21.6z"></path>
                            <path fill="#FBBC05" d="M6.49 13.67A5.9 5.9 0 0 1 6.18 12c0-.58.1-1.14.31-1.67V7.8H3.24A9.8 9.8 0 0 0 2.2 12c0 1.58.38 3.08 1.04 4.2l3.25-2.53z"></path>
                            <path fill="#EA4335" d="M12 6.28c1.44 0 2.73.5 3.75 1.48l2.81-2.81C16.85 3.33 14.64 2.4 12 2.4a9.8 9.8 0 0 0-8.76 5.4l3.25 2.53C7.27 8.01 9.44 6.28 12 6.28z"></path>
                        </svg>
                    </a>

                    <a href="http://localhost:8000/auth/facebook" aria-label="Register with Facebook" class="social-button flex items-center justify-center rounded-xl border border-[#e8e2da] bg-white py-3.5 text-[#1877F2]">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.07C24 5.4 18.63 0 12 0S0 5.4 0 12.07C0 18.1 4.39 23.16 10.13 24v-8.44H7.08v-3.49h3.05V9.41c0-3.03 1.79-4.7 4.53-4.7 1.31 0 2.68.24 2.68.24v2.97h-1.51c-1.49 0-1.96.93-1.96 1.88v2.26h3.33l-.53 3.49h-2.8V24C19.61 23.16 24 18.1 24 12.07z"></path>
                        </svg>
                    </a>

                    <a href="http://localhost:8000/auth/x" aria-label="Register with X" class="social-button flex items-center justify-center rounded-xl border border-[#e8e2da] bg-white py-3.5 text-black">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.9 2H22l-6.77 7.74L23.2 22h-6.24l-4.89-6.39L6.48 22H3.36l7.24-8.28L2.8 2h6.4l4.42 5.84L18.9 2zm-1.1 17.8h1.73L8.28 4.08H6.42L17.8 19.8z"></path>
                        </svg>
                    </a>

                </div>


                <!-- Login link -->
                <div class="mt-6 border-t border-[#eee9e2] pt-5 text-center">

                    <p class="text-xs text-[#8d867e]">
                        Already have an account?

                        <a href="http://localhost:8000/login" class="ml-1 font-bold text-[#292524] underline decoration-[#b59a7c] underline-offset-4 hover:text-[#9b8062]">
                            Sign In
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
