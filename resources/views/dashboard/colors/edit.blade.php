@extends('layouts.admin.page')

@section('title', 'Edit Color')

@section('adminPage')

<div class="min-h-screen bg-[#faf9f6] p-4 sm:p-6 lg:p-8">

    <div class="mx-auto max-w-7xl">

        {{-- Header --}}
        

        {{-- Form Card --}}
        <div class="mt-8 overflow-hidden rounded-[28px] border border-white/80 bg-white/65 shadow-[0_15px_45px_rgba(100,75,45,0.06)] backdrop-blur-2xl">


           
                <x-admin.sub-header :arr="[
            'eyebrow' => 'Store Management',
            'title' => 'Color Information',
            'subtitle' => 'Update the name, slug and hex code of your color.'
        ]"/>
               

            

            <form
                action="{{ route('colors.update', $color->id) }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                {{-- Form Fields --}}
                <div class="p-6 sm:p-8">

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        {{-- Color Name --}}
                        <div>

                            <label for="name"
                                   class="mb-2 block text-xs font-bold uppercase tracking-[1.5px] text-[#806e5a]">

                                Color Name
                                <span class="text-red-500">*</span>

                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $color->name) }}"
                                placeholder="e.g. Royal Blue"
                                class="w-full rounded-xl border border-[#e9e0d5] bg-white/80 px-4 py-3.5 text-sm text-[#514638] outline-none transition placeholder:text-[#b4a797] focus:border-[#b49a7b] focus:ring-4 focus:ring-[#b49a7b]/10"
                            >

                            @error('name')
                                <p class="mt-2 text-xs font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Slug --}}
                        <div>

                            <label for="slug"
                                   class="mb-2 block text-xs font-bold uppercase tracking-[1.5px] text-[#806e5a]">

                                Slug
                                <span class="text-red-500">*</span>

                            </label>

                            <input
                                type="text"
                                name="slug"
                                id="slug"
                                value="{{ old('slug', $color->slug) }}"
                                placeholder="e.g. royal-blue"
                                class="w-full rounded-xl border border-[#e9e0d5] bg-white/80 px-4 py-3.5 text-sm text-[#514638] outline-none transition placeholder:text-[#b4a797] focus:border-[#b49a7b] focus:ring-4 focus:ring-[#b49a7b]/10"
                            >

                            @error('slug')
                                <p class="mt-2 text-xs font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Hex Code --}}
                        <div>

                            <label for="hex_code"
                                   class="mb-2 block text-xs font-bold uppercase tracking-[1.5px] text-[#806e5a]">

                                Hex Code
                                <span class="text-red-500">*</span>

                            </label>

                            <div class="flex items-center gap-3">

                                <input
                                    type="text"
                                    name="hex_code"
                                    id="hex_code"
                                    value="{{ old('hex_code', $color->hex_code) }}"
                                    placeholder="#ffffff"
                                    class="min-w-0 flex-1 rounded-xl border border-[#e9e0d5] bg-white/80 px-4 py-3.5 text-sm text-[#514638] outline-none transition placeholder:text-[#b4a797] focus:border-[#b49a7b] focus:ring-4 focus:ring-[#b49a7b]/10"
                                >

                                <div
                                    id="colorPreview"
                                    class="h-12 w-12 shrink-0 rounded-xl border border-black/10 shadow-sm"
                                    style="background-color: {{ old('hex_code', $color->hex_code ?: '#ffffff') }}"
                                ></div>

                            </div>

                            @error('hex_code')
                                <p class="mt-2 text-xs font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- Footer --}}
                <div class="flex flex-wrap items-center justify-end gap-3 border-t border-[#eee8df] bg-[#faf8f4] px-6 py-5 sm:px-8">

                    <a
                        href="{{ route('colors.index') }}"
                        class="rounded-full border border-[#e9e0d5] bg-white px-6 py-3 text-[10px] font-bold uppercase tracking-[2px] text-[#927e67] transition hover:bg-[#f7f2eb]"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="rounded-full bg-[#a58a6d] px-7 py-3 text-[10px] font-bold uppercase tracking-[2px] text-white shadow-sm transition hover:bg-[#765b3e]"
                    >
                        Update Color
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- Live Color Preview --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const hexInput = document.getElementById('hex_code');
        const preview = document.getElementById('colorPreview');

        hexInput.addEventListener('input', function () {

            const hex = this.value.trim();

            if (/^#([0-9A-Fa-f]{3}|[0-9A-Fa-f]{6})$/.test(hex)) {
                preview.style.backgroundColor = hex;
            }

        });

    });
</script>

@endsection