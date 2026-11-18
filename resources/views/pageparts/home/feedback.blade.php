
{{-- Feedback Section --}}
<section class="relative py-20 md:py-24 overflow-hidden">

    {{-- Background Decoration --}}
    <div class="absolute -top-24 -left-24 w-72 h-72
                bg-[#d2b99c]/30 rounded-full blur-3xl"></div>

    <div class="absolute -bottom-24 -right-24 w-72 h-72
                bg-[#d2b99c]/30 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            {{-- LEFT CONTENT --}}
            <div>

                <span class="inline-flex items-center gap-2 px-4 py-2
                             rounded-full bg-[#fffdf9]
                             border border-[#e8dccb]
                             text-xs font-semibold uppercase
                             tracking-widest text-[#8b704f]">

                    <span class="w-2 h-2 rounded-full bg-[#a58a67]"></span>
                    Customer Feedback

                </span>

                <h2 class="text-4xl sm:text-5xl font-bold
                           leading-tight mt-6 text-[#493825]">

                    Your opinion
                    <span class="text-[#a58a67]">
                        matters to us.
                    </span>

                </h2>

                <p class="text-[#79654e] text-lg leading-8
                          mt-5 max-w-lg">

                    Had a great experience? Have an idea for us?
                    Or something we could improve?

                    We'd love to hear from you.

                </p>

                {{-- Customer Rating --}}
                <div class="flex items-center gap-4 mt-8">

                    <div class="flex -space-x-3">

                        <div class="w-10 h-10 rounded-full bg-[#d2b99c]
                                    border-2 border-[#f5efe6]
                                    flex items-center justify-center text-lg">
                            <i class="fa-solid fa-user text-[#493825]"></i>
                        </div>

                        <div class="w-10 h-10 rounded-full bg-[#c4aa8b]
                                    border-2 border-[#f5efe6]
                                    flex items-center justify-center text-lg">
                            <i class="fa-solid fa-user text-[#493825]"></i>
                        </div>

                        <div class="w-10 h-10 rounded-full bg-[#b99b76]
                                    border-2 border-[#f5efe6]
                                    flex items-center justify-center text-lg">
                            <i class="fa-solid fa-user text-[#493825]"></i>
                        </div>

                        <div class="w-10 h-10 rounded-full bg-[#493825]
                                    text-white border-2 border-[#f5efe6]
                                    flex items-center justify-center
                                    text-xs font-bold">
                            +1K
                        </div>

                    </div>

                    <div>
                        <div class="flex items-center gap-1 text-[#bd9556] text-lg">
                            ★★★★★
                        </div>

                        <p class="text-xs text-[#8b755c]">
                            Trusted by our customers
                        </p>
                    </div>

                </div>

                {{-- Features --}}
                <div class="grid sm:grid-cols-2 gap-5 mt-10">

                    <div class="flex gap-3">

                        <div class="w-11 h-11 shrink-0 rounded-xl
                                    bg-[#fffdf9] border border-[#e8dccb]
                                    flex items-center justify-center">
                            <i class="fa-solid fa-comments text-[#8b704f]"></i>
                        </div>

                        <div>
                            <p class="font-semibold text-sm text-[#493825]">
                                Honest Feedback
                            </p>

                            <p class="text-xs text-[#8b755c] mt-1">
                                We listen to every opinion.
                            </p>
                        </div>

                    </div>

                    <div class="flex gap-3">

                        <div class="w-11 h-11 shrink-0 rounded-xl
                                    bg-[#fffdf9] border border-[#e8dccb]
                                    flex items-center justify-center">
                            <i class="fa-solid fa-bolt text-[#8b704f]"></i>
                        </div>

                        <div>
                            <p class="font-semibold text-sm text-[#493825]">
                                Continuous Improvement
                            </p>

                            <p class="text-xs text-[#8b755c] mt-1">
                                Your feedback helps us grow.
                            </p>
                        </div>

                    </div>

                </div>

            </div>

            {{-- RIGHT FORM --}}
            <div class="bg-[#fffdf9] rounded-3xl
                        border border-[#e8dccb]
                        shadow-xl p-6 sm:p-9">

                {{-- Form Header --}}
                <div class="flex items-start justify-between gap-4">

                    <div>
                        <h3 class="text-2xl font-bold text-[#493825]">
                            Share your thoughts
                        </h3>

                        <p class="text-sm text-[#9b8060] mt-2">
                            It only takes a minute.
                        </p>
                    </div>

                    <div class="w-12 h-12 rounded-xl bg-[#493825]
                                text-white flex items-center justify-center">
                        <i class="fa-solid fa-star"></i>
                    </div>

                </div>

                <form action="{{ url('/feedback') }}"
                      method="POST"
                      class="mt-8 space-y-5">

                    @csrf

                    {{-- Name + Email --}}
                    <div class="grid sm:grid-cols-2 gap-4">

                        <div>
                            <label class="block text-sm font-semibold
                                          text-[#493825] mb-2">
                                Your Name
                            </label>

                            <input type="text"
                                   name="name"
                                   value="{{ old('name') }}"
                                   placeholder="Your name"
                                   class="w-full h-12 px-4 rounded-xl
                                          border border-[#e8dccb]
                                          bg-[#faf7f2] text-[#493825]
                                          outline-none focus:bg-white
                                          focus:border-[#a58a67] transition">

                            @error('name')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold
                                          text-[#493825] mb-2">
                                Email Address
                            </label>

                            <input type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   placeholder="you@example.com"
                                   class="w-full h-12 px-4 rounded-xl
                                          border border-[#e8dccb]
                                          bg-[#faf7f2] text-[#493825]
                                          outline-none focus:bg-white
                                          focus:border-[#a58a67] transition">

                            @error('email')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    {{-- Rating --}}
                    <div>

                        <label class="block text-sm font-semibold
                                      text-[#493825] mb-3">
                            How was your experience?
                        </label>

                        <div class="flex gap-2">

                            @for($i = 1; $i <= 5; $i++)

                                <label class="cursor-pointer">
                                    <input type="radio"
                                           name="rating"
                                           value="{{ $i }}"
                                           {{ old('rating') == $i ? 'checked' : '' }}
                                           class="peer sr-only">

                                    <span class="w-11 h-11 rounded-xl
                                                 border border-[#e8dccb]
                                                 bg-[#faf7f2]
                                                 flex items-center justify-center
                                                 text-sm font-semibold text-[#79654e]
                                                 peer-checked:bg-[#493825]
                                                 peer-checked:text-white
                                                 peer-checked:border-[#493825]
                                                 hover:border-[#a58a67]
                                                 transition">
                                        {{ $i }}
                                    </span>
                                </label>

                            @endfor

                        </div>

                        @error('rating')
                            <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                    {{-- Feedback --}}
                    <div>

                        <label class="block text-sm font-semibold
                                      text-[#493825] mb-2">
                            Your Feedback
                        </label>

                        <textarea name="message"
                                  rows="5"
                                  placeholder="Tell us about your experience..."
                                  class="w-full px-4 py-3 rounded-xl
                                         border border-[#e8dccb]
                                         bg-[#faf7f2] text-[#493825]
                                         outline-none focus:bg-white
                                         focus:border-[#a58a67]
                                         resize-none transition">{{ old('message') }}</textarea>

                        @error('message')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror

                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                            class="w-full bg-[#493825] px-8 py-4
                                   rounded-xl text-xs font-bold
                                   uppercase tracking-[2px] text-white
                                   hover:bg-[#5c4630] hover:shadow-lg
                                   transition-all duration-300">

                        Submit Feedback

                        <i class="fa-solid fa-arrow-right ml-2"></i>

                    </button>

                    <p class="text-center text-xs text-[#9b8060]">
                        Thank you for helping us improve ❤️
                    </p>

                </form>

            </div>

        </div>

    </div>
</section>
