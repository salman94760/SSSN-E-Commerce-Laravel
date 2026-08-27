{{-- Feedback --}}
<section class="relative py-20 bg-gray-50 overflow-hidden">

    {{-- Background Decoration --}}
    <div class="absolute -top-24 -left-24
                w-72 h-72
                bg-gray-200
                rounded-full
                blur-3xl
                opacity-60">
    </div>

    <div class="absolute -bottom-24 -right-24
                w-72 h-72
                bg-gray-200
                rounded-full
                blur-3xl
                opacity-60">
    </div>


    <div class="relative max-w-7xl mx-auto
                px-4 sm:px-6 lg:px-8">

        <div class="grid lg:grid-cols-2
                    gap-10 lg:gap-16
                    items-center">


            {{-- LEFT CONTENT --}}
            <div>

                <span class="inline-flex items-center gap-2
                             px-4 py-2
                             rounded-full
                             bg-white
                             border border-gray-200
                             text-xs font-semibold
                             uppercase tracking-widest
                             text-gray-500">

                    <span class="w-2 h-2
                                 rounded-full
                                 bg-green-500">
                    </span>

                    Customer Feedback

                </span>


                <h2 class="text-4xl sm:text-5xl
                           font-bold
                           leading-tight
                           mt-6">

                    Your opinion
                    <span class="text-gray-400">
                        matters to us.
                    </span>

                </h2>


                <p class="text-gray-500
                          text-lg
                          leading-8
                          mt-5
                          max-w-lg">

                    Had a great experience?
                    Have an idea for us?
                    Or something we could improve?

                    We'd love to hear from you.

                </p>


                {{-- Rating --}}
                <div class="flex items-center gap-4 mt-8">

                    <div class="flex -space-x-3">

                        <div class="w-10 h-10 rounded-full
                                    bg-gray-300
                                    border-2 border-gray-50
                                    flex items-center justify-center">
                            👤
                        </div>

                        <div class="w-10 h-10 rounded-full
                                    bg-gray-400
                                    border-2 border-gray-50
                                    flex items-center justify-center">
                            👤
                        </div>

                        <div class="w-10 h-10 rounded-full
                                    bg-gray-500
                                    border-2 border-gray-50
                                    flex items-center justify-center">
                            👤
                        </div>

                        <div class="w-10 h-10 rounded-full
                                    bg-black text-white
                                    border-2 border-gray-50
                                    flex items-center justify-center
                                    text-xs font-bold">
                            +1K
                        </div>

                    </div>


                    <div>

                        <div class="flex items-center gap-1">

                            <span class="text-yellow-500 text-lg">
                                ★★★★★
                            </span>

                        </div>

                        <p class="text-xs text-gray-400">
                            Trusted by our customers
                        </p>

                    </div>

                </div>


                {{-- Small Features --}}
                <div class="grid sm:grid-cols-2
                            gap-4 mt-10">

                    <div class="flex gap-3">

                        <div class="w-10 h-10
                                    rounded-xl
                                    bg-white
                                    border border-gray-200
                                    flex items-center
                                    justify-center">

                            💬

                        </div>

                        <div>

                            <p class="font-semibold text-sm">
                                Honest Feedback
                            </p>

                            <p class="text-xs text-gray-400 mt-1">
                                We listen to every opinion.
                            </p>

                        </div>

                    </div>


                    <div class="flex gap-3">

                        <div class="w-10 h-10
                                    rounded-xl
                                    bg-white
                                    border border-gray-200
                                    flex items-center
                                    justify-center">

                            ⚡

                        </div>

                        <div>

                            <p class="font-semibold text-sm">
                                Continuous Improvement
                            </p>

                            <p class="text-xs text-gray-400 mt-1">
                                Your feedback helps us grow.
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- RIGHT FORM --}}
            <div class="bg-white
                        rounded-3xl
                        border border-gray-200
                        shadow-xl
                        p-6 sm:p-8">

                {{-- Form Header --}}
                <div class="flex items-start
                            justify-between
                            gap-4">

                    <div>

                        <h3 class="text-2xl font-bold">
                            Share your thoughts
                        </h3>

                        <p class="text-sm text-gray-400 mt-1">
                            It only takes a minute.
                        </p>

                    </div>


                    <div class="w-11 h-11
                                rounded-xl
                                bg-black text-white
                                flex items-center
                                justify-center">

                        ✦

                    </div>

                </div>


                <form
                    action="{{ url('/feedback') }}"
                    method="POST"
                    class="mt-7 space-y-5"
                >

                    @csrf


                    {{-- Name + Email --}}
                    <div class="grid sm:grid-cols-2 gap-4">

                        <div>

                            <label class="block text-sm
                                          font-semibold mb-2">

                                Your Name

                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="John Doe"
                                class="w-full h-12
                                       px-4
                                       rounded-xl
                                       border border-gray-200
                                       bg-gray-50
                                       outline-none
                                       focus:bg-white
                                       focus:border-black
                                       transition"
                            >

                        </div>


                        <div>

                            <label class="block text-sm
                                          font-semibold mb-2">

                                Email

                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="john@example.com"
                                class="w-full h-12
                                       px-4
                                       rounded-xl
                                       border border-gray-200
                                       bg-gray-50
                                       outline-none
                                       focus:bg-white
                                       focus:border-black
                                       transition"
                            >

                        </div>

                    </div>


                    {{-- Rating --}}
                    <div>

                        <label class="block text-sm
                                      font-semibold mb-3">

                            How was your experience?

                        </label>

                        <div class="flex gap-2">

                            <label class="cursor-pointer">

                                <input
                                    type="radio"
                                    name="rating"
                                    value="1"
                                    class="peer hidden"
                                >

                                <span class="w-10 h-10
                                             rounded-xl
                                             border border-gray-200
                                             bg-gray-50
                                             flex items-center
                                             justify-center
                                             text-sm
                                             peer-checked:bg-black
                                             peer-checked:text-white
                                             peer-checked:border-black">

                                    1

                                </span>

                            </label>


                            <label class="cursor-pointer">

                                <input
                                    type="radio"
                                    name="rating"
                                    value="2"
                                    class="peer hidden"
                                >

                                <span class="w-10 h-10
                                             rounded-xl
                                             border border-gray-200
                                             bg-gray-50
                                             flex items-center
                                             justify-center
                                             text-sm
                                             peer-checked:bg-black
                                             peer-checked:text-white
                                             peer-checked:border-black">

                                    2

                                </span>

                            </label>


                            <label class="cursor-pointer">

                                <input
                                    type="radio"
                                    name="rating"
                                    value="3"
                                    class="peer hidden"
                                >

                                <span class="w-10 h-10
                                             rounded-xl
                                             border border-gray-200
                                             bg-gray-50
                                             flex items-center
                                             justify-center
                                             text-sm
                                             peer-checked:bg-black
                                             peer-checked:text-white
                                             peer-checked:border-black">

                                    3

                                </span>

                            </label>


                            <label class="cursor-pointer">

                                <input
                                    type="radio"
                                    name="rating"
                                    value="4"
                                    class="peer hidden"
                                >

                                <span class="w-10 h-10
                                             rounded-xl
                                             border border-gray-200
                                             bg-gray-50
                                             flex items-center
                                             justify-center
                                             text-sm
                                             peer-checked:bg-black
                                             peer-checked:text-white
                                             peer-checked:border-black">

                                    4

                                </span>

                            </label>


                            <label class="cursor-pointer">

                                <input
                                    type="radio"
                                    name="rating"
                                    value="5"
                                    class="peer hidden"
                                >

                                <span class="w-10 h-10
                                             rounded-xl
                                             border border-gray-200
                                             bg-gray-50
                                             flex items-center
                                             justify-center
                                             text-sm
                                             peer-checked:bg-black
                                             peer-checked:text-white
                                             peer-checked:border-black">

                                    5

                                </span>

                            </label>

                        </div>

                    </div>


                    {{-- Feedback --}}
                    <div>

                        <label class="block text-sm
                                      font-semibold mb-2">

                            Your Feedback

                        </label>

                        <textarea
                            name="message"
                            rows="5"
                            placeholder="Tell us about your experience..."
                            class="w-full
                                   px-4 py-3
                                   rounded-xl
                                   border border-gray-200
                                   bg-gray-50
                                   outline-none
                                   focus:bg-white
                                   focus:border-black
                                   resize-none
                                   transition"
                        >{{ old('message') }}</textarea>

                    </div>


                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="w-full
                               h-13
                               py-3.5
                               rounded-xl
                               bg-black
                               text-white
                               font-semibold
                               hover:bg-gray-800
                               transition
                               flex items-center
                               justify-center
                               gap-2"
                    >

                        Submit Feedback

                        <span>→</span>

                    </button>


                    <p class="text-center
                              text-xs
                              text-gray-400">

                        Thank you for helping us improve ❤️

                    </p>

                </form>

            </div>

        </div>

    </div>

</section>