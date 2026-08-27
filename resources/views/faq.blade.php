@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | FAQ')

@section('customerContent')

<section class="bg-white border-b">

    <div class="max-w-4xl mx-auto px-4
                py-16 text-center">

        <span class="inline-flex px-4 py-2 rounded-full
                     bg-gray-100 text-gray-600
                     text-xs font-semibold uppercase
                     tracking-widest">

            Help Center

        </span>

        <h1 class="text-4xl sm:text-5xl font-bold mt-5">

            Frequently Asked
            <span class="text-gray-400">
                Questions
            </span>

        </h1>

        <p class="text-gray-500 leading-7 mt-5">

            Find quick answers to the most common
            questions about orders, payments, delivery
            and returns.

        </p>


        {{-- Search --}}
        <div class="relative max-w-xl mx-auto mt-8">

            <input
                id="faqSearch"
                type="text"
                placeholder="Search your question..."
                class="w-full h-14 pl-12 pr-5
                       rounded-2xl
                       border border-gray-200
                       bg-gray-50
                       focus:bg-white
                       focus:border-black
                       outline-none">

            <span class="absolute left-4 top-1/2
                         -translate-y-1/2 text-gray-400">
                🔍
            </span>

        </div>

    </div>

</section>



{{-- ========================================================= --}}
{{-- FAQ CONTENT --}}
{{-- ========================================================= --}}

<section class="max-w-5xl mx-auto
                px-4 sm:px-6 lg:px-8
                py-12">


    {{-- Categories --}}
    <div class="flex flex-wrap justify-center gap-3 mb-10">

        <button
            class="faq-category px-5 py-2.5 rounded-full
                   bg-black text-white text-sm font-medium"
            data-category="all">

            All

        </button>

        <button
            class="faq-category px-5 py-2.5 rounded-full
                   bg-white border text-sm font-medium"
            data-category="orders">

            Orders

        </button>

        <button
            class="faq-category px-5 py-2.5 rounded-full
                   bg-white border text-sm font-medium"
            data-category="payment">

            Payments

        </button>

        <button
            class="faq-category px-5 py-2.5 rounded-full
                   bg-white border text-sm font-medium"
            data-category="delivery">

            Delivery

        </button>

        <button
            class="faq-category px-5 py-2.5 rounded-full
                   bg-white border text-sm font-medium"
            data-category="returns">

            Returns

        </button>

        <button
            class="faq-category px-5 py-2.5 rounded-full
                   bg-white border text-sm font-medium"
            data-category="account">

            Account

        </button>

    </div>



    {{-- FAQ List --}}
    <div id="faqList" class="space-y-4">


        {{-- FAQ 1 --}}
        <div class="faq-item bg-white border
                    border-gray-200 rounded-2xl overflow-hidden"
             data-category="orders"
             data-search="how can i track my order order tracking">

            <button
                class="faq-question w-full p-6 text-left
                       flex items-center justify-between gap-5">

                <span class="font-semibold">
                    How can I track my order?
                </span>

                <span class="faq-icon w-8 h-8 shrink-0
                             rounded-full bg-gray-100
                             flex items-center justify-center
                             transition">
                    +
                </span>

            </button>

            <div class="faq-answer hidden px-6 pb-6">

                <p class="text-sm text-gray-500
                          leading-7">

                    You can track your order from the
                    <strong class="text-gray-900">
                        My Orders
                    </strong>
                    section of your account. Once your
                    order is shipped, the tracking details
                    will also be available there.

                </p>

            </div>

        </div>



        {{-- FAQ 2 --}}
        <div class="faq-item bg-white border
                    border-gray-200 rounded-2xl overflow-hidden"
             data-category="orders"
             data-search="can i cancel order cancel order">

            <button
                class="faq-question w-full p-6 text-left
                       flex items-center justify-between gap-5">

                <span class="font-semibold">
                    Can I cancel my order?
                </span>

                <span class="faq-icon w-8 h-8 shrink-0
                             rounded-full bg-gray-100
                             flex items-center justify-center">
                    +
                </span>

            </button>

            <div class="faq-answer hidden px-6 pb-6">

                <p class="text-sm text-gray-500 leading-7">

                    Yes. You can cancel your order before
                    it has been shipped. Go to
                    <strong class="text-gray-900">
                        My Orders
                    </strong>
                    and select the cancellation option.

                </p>

            </div>

        </div>



        {{-- FAQ 3 --}}
        <div class="faq-item bg-white border
                    border-gray-200 rounded-2xl overflow-hidden"
             data-category="payment"
             data-search="payment methods online payment cash card upi">

            <button
                class="faq-question w-full p-6 text-left
                       flex items-center justify-between gap-5">

                <span class="font-semibold">
                    What payment methods do you accept?
                </span>

                <span class="faq-icon w-8 h-8 shrink-0
                             rounded-full bg-gray-100
                             flex items-center justify-center">
                    +
                </span>

            </button>

            <div class="faq-answer hidden px-6 pb-6">

                <p class="text-sm text-gray-500 leading-7">

                    We accept major debit cards, credit
                    cards, UPI, net banking and other
                    available online payment methods.

                </p>

            </div>

        </div>



        {{-- FAQ 4 --}}
        <div class="faq-item bg-white border
                    border-gray-200 rounded-2xl overflow-hidden"
             data-category="payment"
             data-search="payment failed refund money deducted">

            <button
                class="faq-question w-full p-6 text-left
                       flex items-center justify-between gap-5">

                <span class="font-semibold">
                    What if my payment fails but money is deducted?
                </span>

                <span class="faq-icon w-8 h-8 shrink-0
                             rounded-full bg-gray-100
                             flex items-center justify-center">
                    +
                </span>

            </button>

            <div class="faq-answer hidden px-6 pb-6">

                <p class="text-sm text-gray-500 leading-7">

                    If your payment fails but the amount
                    is deducted, the amount is generally
                    reversed automatically. If it is not
                    reversed, please contact our support
                    team with your transaction details.

                </p>

            </div>

        </div>



        {{-- FAQ 5 --}}
        <div class="faq-item bg-white border
                    border-gray-200 rounded-2xl overflow-hidden"
             data-category="delivery"
             data-search="how long delivery take shipping delivery time">

            <button
                class="faq-question w-full p-6 text-left
                       flex items-center justify-between gap-5">

                <span class="font-semibold">
                    How long does delivery take?
                </span>

                <span class="faq-icon w-8 h-8 shrink-0
                             rounded-full bg-gray-100
                             flex items-center justify-center">
                    +
                </span>

            </button>

            <div class="faq-answer hidden px-6 pb-6">

                <p class="text-sm text-gray-500 leading-7">

                    Standard delivery usually takes
                    <strong class="text-gray-900">
                        3-7 business days
                    </strong>,
                    depending on your location.

                </p>

            </div>

        </div>



        {{-- FAQ 6 --}}
        <div class="faq-item bg-white border
                    border-gray-200 rounded-2xl overflow-hidden"
             data-category="delivery"
             data-search="delivery address change address shipping address">

            <button
                class="faq-question w-full p-6 text-left
                       flex items-center justify-between gap-5">

                <span class="font-semibold">
                    Can I change my delivery address?
                </span>

                <span class="faq-icon w-8 h-8 shrink-0
                             rounded-full bg-gray-100
                             flex items-center justify-center">
                    +
                </span>

            </button>

            <div class="faq-answer hidden px-6 pb-6">

                <p class="text-sm text-gray-500 leading-7">

                    You can request an address change before
                    your order is shipped. Contact our support
                    team as soon as possible.

                </p>

            </div>

        </div>



        {{-- FAQ 7 --}}
        <div class="faq-item bg-white border
                    border-gray-200 rounded-2xl overflow-hidden"
             data-category="returns"
             data-search="return product return policy refund">

            <button
                class="faq-question w-full p-6 text-left
                       flex items-center justify-between gap-5">

                <span class="font-semibold">
                    How can I return a product?
                </span>

                <span class="faq-icon w-8 h-8 shrink-0
                             rounded-full bg-gray-100
                             flex items-center justify-center">
                    +
                </span>

            </button>

            <div class="faq-answer hidden px-6 pb-6">

                <p class="text-sm text-gray-500 leading-7">

                    Go to
                    <strong class="text-gray-900">
                        My Orders
                    </strong>,
                    select the order and choose
                    <strong class="text-gray-900">
                        Return Product
                    </strong>.
                    Follow the instructions shown there.

                </p>

            </div>

        </div>



        {{-- FAQ 8 --}}
        <div class="faq-item bg-white border
                    border-gray-200 rounded-2xl overflow-hidden"
             data-category="returns"
             data-search="refund how long refund money">

            <button
                class="faq-question w-full p-6 text-left
                       flex items-center justify-between gap-5">

                <span class="font-semibold">
                    How long does a refund take?
                </span>

                <span class="faq-icon w-8 h-8 shrink-0
                             rounded-full bg-gray-100
                             flex items-center justify-center">
                    +
                </span>

            </button>

            <div class="faq-answer hidden px-6 pb-6">

                <p class="text-sm text-gray-500 leading-7">

                    Once your return is approved, the refund
                    will be processed according to the
                    payment method used for your order.

                </p>

            </div>

        </div>



        {{-- FAQ 9 --}}
        <div class="faq-item bg-white border
                    border-gray-200 rounded-2xl overflow-hidden"
             data-category="account"
             data-search="forgot password reset password account">

            <button
                class="faq-question w-full p-6 text-left
                       flex items-center justify-between gap-5">

                <span class="font-semibold">
                    I forgot my password. What should I do?
                </span>

                <span class="faq-icon w-8 h-8 shrink-0
                             rounded-full bg-gray-100
                             flex items-center justify-center">
                    +
                </span>

            </button>

            <div class="faq-answer hidden px-6 pb-6">

                <p class="text-sm text-gray-500 leading-7">

                    Click on
                    <strong class="text-gray-900">
                        Forgot Password
                    </strong>
                    on the login page and follow the
                    instructions sent to your email.

                </p>

            </div>

        </div>



        {{-- FAQ 10 --}}
        <div class="faq-item bg-white border
                    border-gray-200 rounded-2xl overflow-hidden"
             data-category="account"
             data-search="change profile account details email phone">

            <button
                class="faq-question w-full p-6 text-left
                       flex items-center justify-between gap-5">

                <span class="font-semibold">
                    Can I update my account information?
                </span>

                <span class="faq-icon w-8 h-8 shrink-0
                             rounded-full bg-gray-100
                             flex items-center justify-center">
                    +
                </span>

            </button>

            <div class="faq-answer hidden px-6 pb-6">

                <p class="text-sm text-gray-500 leading-7">

                    Yes. You can update your profile,
                    phone number and address from your
                    account settings.

                </p>

            </div>

        </div>


    </div>



    {{-- No Result --}}
    <div id="noResult"
         class="hidden text-center py-16">

        <div class="text-5xl">
            🔍
        </div>

        <h3 class="font-bold text-xl mt-5">
            No questions found
        </h3>

        <p class="text-sm text-gray-500 mt-2">
            Try searching with different keywords.
        </p>

    </div>

</section>



{{-- ========================================================= --}}
{{-- CONTACT CTA --}}
{{-- ========================================================= --}}

<section class="max-w-5xl mx-auto
                px-4 sm:px-6 lg:px-8
                pb-16">

    <div class="bg-gray-950 rounded-3xl
                p-8 sm:p-10
                text-center text-white">

        <div class="w-14 h-14 rounded-2xl
                    bg-white/10 mx-auto
                    flex items-center justify-center
                    text-2xl">

            💬

        </div>

        <h2 class="text-2xl sm:text-3xl
                   font-bold mt-5">

            Still have questions?

        </h2>

        <p class="text-sm text-gray-400
                  max-w-lg mx-auto mt-3">

            Can't find what you're looking for?
            Our support team is always happy to help.

        </p>

        <a href="{{ url('/contact') }}"
           class="inline-flex items-center
                  mt-6 px-6 py-3
                  rounded-xl bg-white
                  text-black text-sm
                  font-semibold
                  hover:bg-gray-200">

            Contact Support →

        </a>

    </div>

</section>
<script>

    // FAQ Accordion
    document.querySelectorAll('.faq-question').forEach(button => {

        button.addEventListener('click', () => {

            const item = button.closest('.faq-item');
            const answer = item.querySelector('.faq-answer');
            const icon = item.querySelector('.faq-icon');

            const isOpen = !answer.classList.contains('hidden');


            // Close all
            document.querySelectorAll('.faq-answer').forEach(el => {
                el.classList.add('hidden');
            });

            document.querySelectorAll('.faq-icon').forEach(el => {
                el.textContent = '+';
                el.classList.remove('rotate-45');
            });


            // Open clicked
            if (!isOpen) {

                answer.classList.remove('hidden');

                icon.textContent = '×';

                icon.classList.add('rotate-45');

            }

        });

    });



    // Category Filter
    document.querySelectorAll('.faq-category').forEach(button => {

        button.addEventListener('click', () => {

            const category = button.dataset.category;


            document.querySelectorAll('.faq-category').forEach(btn => {

                btn.classList.remove(
                    'bg-black',
                    'text-white'
                );

                btn.classList.add(
                    'bg-white',
                    'text-gray-900'
                );

            });


            button.classList.remove(
                'bg-white',
                'text-gray-900'
            );

            button.classList.add(
                'bg-black',
                'text-white'
            );


            document.querySelectorAll('.faq-item').forEach(item => {

                if (
                    category === 'all' ||
                    item.dataset.category === category
                ) {

                    item.classList.remove('hidden');

                } else {

                    item.classList.add('hidden');

                }

            });

        });

    });



    // Search
    const searchInput = document.getElementById('faqSearch');
    const noResult = document.getElementById('noResult');

    searchInput.addEventListener('input', function () {

        const search = this.value.toLowerCase().trim();

        let found = 0;


        document.querySelectorAll('.faq-item').forEach(item => {

            const text = item.dataset.search.toLowerCase();

            if (text.includes(search)) {

                item.classList.remove('hidden');

                found++;

            } else {

                item.classList.add('hidden');

            }

        });


        if (found === 0) {

            noResult.classList.remove('hidden');

        } else {

            noResult.classList.add('hidden');

        }

    });

</script>
@endsection