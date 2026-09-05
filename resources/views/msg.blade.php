{{-- TOAST NOTIFICATION --}}
<div
    id="toast"
    class="fixed top-24 right-5 z-[9999] w-[360px]
           transform translate-x-[120%]
           transition-all duration-500 ease-out"
>

    @if(session('success'))
        <div class="flex items-start gap-3
                    rounded-2xl
                    border border-emerald-200
                    bg-white
                    px-4 py-4
                    shadow-[0_15px_40px_rgba(0,0,0,0.12)]">

            <div class="flex h-9 w-9 shrink-0 items-center justify-center
                        rounded-full bg-emerald-100 text-emerald-600
                        font-bold">
                ✓
            </div>

            <div class="flex-1">
                <p class="font-semibold text-slate-900">
                    Success
                </p>

                <p class="mt-0.5 text-sm text-slate-500">
                    {{ session('success') }}
                </p>
            </div>

            <button
                onclick="hideToast()"
                class="text-slate-400 hover:text-slate-900 text-lg"
            >
                ×
            </button>

        </div>
    @endif


    @if(session('error'))
        <div class="flex items-start gap-3
                    rounded-2xl
                    border border-red-200
                    bg-white
                    px-4 py-4
                    shadow-[0_15px_40px_rgba(0,0,0,0.12)]">

            <div class="flex h-9 w-9 shrink-0 items-center justify-center
                        rounded-full bg-red-100 text-red-600
                        font-bold">
                !
            </div>

            <div class="flex-1">
                <p class="font-semibold text-slate-900">
                    Error
                </p>

                <p class="mt-0.5 text-sm text-slate-500">
                    {{ session('error') }}
                </p>
            </div>

            <button
                onclick="hideToast()"
                class="text-slate-400 hover:text-slate-900 text-lg"
            >
                ×
            </button>

        </div>
    @endif

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        const toast = document.getElementById('toast');

        if (!toast || !toast.innerHTML.trim()) {
            return;
        }

        // Show toast
        setTimeout(() => {
            toast.classList.remove('translate-x-[120%]');
            toast.classList.add('translate-x-0');
        }, 100);

        // Auto hide after 4 seconds
        setTimeout(() => {
            hideToast();
        }, 4000);

    });


    function hideToast() {

        const toast = document.getElementById('toast');

        if (!toast) return;

        toast.classList.remove('translate-x-0');
        toast.classList.add('translate-x-[120%]');

    }
</script>