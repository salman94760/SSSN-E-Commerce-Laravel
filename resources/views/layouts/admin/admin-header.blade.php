<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Dashboard')</title>
    <link
    href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
    rel="stylesheet"
/>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<header class="bg-slate-950 text-white">
    <div class="flex h-24 items-center justify-between px-8">

        {{-- Left --}}
        <div>
            <h1 class="text-3xl font-bold">
                Admin Dashboard
            </h1>
        </div>


        {{-- Right --}}
        <div class="flex items-center gap-4">

            {{-- User Info --}}
            <div class="text-right">

                <p class="text-sm font-semibold">
                    {{ auth()->user()->name }}
                </p>

                <p class="text-xs text-slate-400">
                    {{ ucfirst(auth()->user()->role) }}
                </p>

            </div>


            {{-- Profile --}}
            <a
                href="{{ route('adminprofile.index') }}"
                class="rounded-lg border border-slate-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-slate-800"
            >
                Profile
            </a>


            {{-- Sign Out --}}
            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-red-700"
                >
                    Sign Out
                </button>

            </form>

        </div>

    </div>
</header>