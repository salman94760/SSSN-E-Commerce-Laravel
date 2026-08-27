<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
 <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
 
</head>

<body class="min-h-screen bg-slate-100">

    <div class="flex min-h-screen items-center justify-center px-4">

        <div class="w-full max-w-md">

            {{-- Logo / Heading --}}
            <div class="mb-8 text-center">

                <div class="mx-auto mb-4 flex h-14 w-20 items-center justify-center rounded-xl bg-slate-800 text-xl font-bold text-white">
                    SSSN
                </div>

                <h1 class="text-3xl font-bold text-slate-800">
                    Welcome
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Login to your account
                </p>

            </div>


            {{-- Login Card --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">

                {{-- Validation Errors --}}
                @if($errors->any())
                    <div class="mb-5 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                        <ul class="list-disc space-y-1 pl-5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                {{-- Success Message --}}
                @if(session('success'))
                    <div class="mb-5 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                        {{ session('success') }}
                    </div>
                @endif


                <form action="{{ route('userLogin') }}" method="POST" class="space-y-5">

                    @csrf

                    {{-- Email --}}
                    <div>
                        <label
                            for="email"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            id="email"
                            value="{{ old('email') }}"
                            placeholder="Enter your email"
                            required
                            autofocus
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
                        >
                    </div>


                    {{-- Password --}}
                    <div>
                        <div class="mb-2 flex items-center justify-between">

                            <label
                                for="password"
                                class="block text-sm font-medium text-slate-700"
                            >
                                Password
                            </label>

                            <a
                                
                                class="text-sm font-medium text-slate-600 hover:text-slate-900"
                            >
                                Forgot Password?
                            </a>

                        </div>

                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Enter your password"
                            required
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-slate-800 focus:ring-2 focus:ring-slate-200"
                        >
                    </div>


                    {{-- Remember Me --}}
                    <div class="flex items-center">

                        <input
                            type="checkbox"
                            name="remember"
                            id="remember"
                            class="h-4 w-4 rounded border-slate-300 text-slate-800 focus:ring-slate-500"
                        >

                        <label
                            for="remember"
                            class="ml-2 text-sm text-slate-600"
                        >
                            Remember me
                        </label>

                    </div>


                    {{-- Login Button --}}
                    <button
                        type="submit"
                        class="w-full rounded-lg bg-slate-800 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2"
                    >
                        Login
                    </button>

                </form>
                {{-- Social Login --}}
<div class="mt-6">

    <div class="relative">
        <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-slate-200"></div>
        </div>

        <div class="relative flex justify-center">
            <span class="bg-white px-3 text-sm text-slate-400">
                Or continue with
            </span>
        </div>
    </div>


    <div class="mt-5 grid grid-cols-3 gap-3">

        {{-- Google --}}
        <a
            href="{{ route('social.redirect', 'google') }}"
            class="flex items-center justify-center rounded-lg border border-slate-300 bg-white py-3 transition hover:bg-slate-50"
        >
            <svg class="h-5 w-5" viewBox="0 0 24 24">
                <path
                    fill="#4285F4"
                    d="M21.35 12.2c0-.7-.06-1.4-.18-2H12v3.8h5.24a4.48 4.48 0 0 1-1.94 2.94v2.45h3.14c1.84-1.7 2.91-4.2 2.91-7.19z"
                />
                <path
                    fill="#34A853"
                    d="M12 21.6c2.64 0 4.86-.87 6.48-2.35l-3.14-2.45c-.87.58-1.98.92-3.34.92-2.56 0-4.73-1.73-5.51-4.05H3.24v2.53A9.8 9.8 0 0 0 12 21.6z"
                />
                <path
                    fill="#FBBC05"
                    d="M6.49 13.67A5.9 5.9 0 0 1 6.18 12c0-.58.1-1.14.31-1.67V7.8H3.24A9.8 9.8 0 0 0 2.2 12c0 1.58.38 3.08 1.04 4.2l3.25-2.53z"
                />
                <path
                    fill="#EA4335"
                    d="M12 6.28c1.44 0 2.73.5 3.75 1.48l2.81-2.81C16.85 3.33 14.64 2.4 12 2.4a9.8 9.8 0 0 0-8.76 5.4l3.25 2.53C7.27 8.01 9.44 6.28 12 6.28z"
                />
            </svg>
        </a>


        {{-- Facebook --}}
        <a
            href="{{ route('social.redirect', 'facebook') }}"
            class="flex items-center justify-center rounded-lg border border-slate-300 bg-white py-3 text-blue-600 transition hover:bg-slate-50"
        >
            <svg
                class="h-5 w-5"
                fill="currentColor"
                viewBox="0 0 24 24"
            >
                <path d="M24 12.07C24 5.4 18.63 0 12 0S0 5.4 0 12.07C0 18.1 4.39 23.16 10.13 24v-8.44H7.08v-3.49h3.05V9.41c0-3.03 1.79-4.7 4.53-4.7 1.31 0 2.68.24 2.68.24v2.97h-1.51c-1.49 0-1.96.93-1.96 1.88v2.26h3.33l-.53 3.49h-2.8V24C19.61 23.16 24 18.1 24 12.07z"/>
            </svg>
        </a>


        {{-- X --}}
        <a
            href="{{ route('social.redirect', 'x') }}"
            class="flex items-center justify-center rounded-lg border border-slate-300 bg-white py-3 text-black transition hover:bg-slate-50"
        >
            <svg
                class="h-5 w-5"
                fill="currentColor"
                viewBox="0 0 24 24"
            >
                <path d="M18.9 2H22l-6.77 7.74L23.2 22h-6.24l-4.89-6.39L6.48 22H3.36l7.24-8.28L2.8 2h6.4l4.42 5.84L18.9 2zm-1.1 17.8h1.73L8.28 4.08H6.42L17.8 19.8z"/>
            </svg>
        </a>

    </div>

</div>

                {{-- Register --}}
                <div class="mt-6 border-t border-slate-200 pt-6 text-center">

                    <p class="text-sm text-slate-500">
                        Don't have an account?

                        <a
                            href="{{ route('userRegister') }}"
                            class="font-semibold text-slate-800 hover:underline"
                        >
                            Create Account
                        </a>
                    </p>

                </div>

            </div>

            <p class="mt-6 text-center text-xs text-slate-400">
                © {{ date('Y') }} Admin Panel. All rights reserved.
            </p>

        </div>

    </div>

</body>
</html>