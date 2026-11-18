
@if(!empty($product->sizes) && count($product->sizes) > 0)

    @php
        $availableSizes = collect($product->sizes);
    @endphp

    <form action="{{ route('cart.add', $product->id) }}" method="POST">
        @csrf

        <input type="hidden" name="quantity" value="1">

        {{-- MULTIPLE SIZES --}}
        @if($availableSizes->count() > 1)

            <div class="mb-3">
                <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-[#79654e]">
                    Select Size
                </label>

                <select name="size_id" required
                    class="h-11 w-full rounded-xl border border-[#e8dccb] bg-white px-3 text-sm font-semibold text-[#493825] outline-none focus:border-[#5c4630]">

                    <option value="">Choose Size</option>

                    @foreach($availableSizes as $size)
                        <option value="{{ $size->id }}">
                            {{ $size->name }}
                        </option>
                    @endforeach

                </select>
            </div>

        @else

            {{-- SINGLE SIZE AUTO SELECT --}}
            <input type="hidden"
                name="size_id"
                value="{{ $availableSizes->first()->id }}">

        @endif

        {{-- ADD TO CART --}}
        <div class="mt-5">
            <button type="submit"
                class="group flex h-12 w-full items-center justify-center gap-2 rounded-xl border border-[#493825] bg-[#493825] px-5 text-sm font-semibold text-white shadow-md transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#5c4630] hover:shadow-lg active:scale-[0.98]">

                Add to Cart

            </button>
        </div>

    </form>

@else

    {{-- NOTIFY ME --}}
    <form action="{{ route('product.notify', $product->id) }}" method="POST">
        @csrf

        <button type="submit"
            class="mt-5 flex h-12 w-full items-center justify-center rounded-xl border border-[#c9b69e] bg-[#f5efe6] text-sm font-semibold text-[#493825] hover:bg-[#e8dccb]">
            Notify Me
        </button>
    </form>

@endif
