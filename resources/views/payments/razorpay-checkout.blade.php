@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | Payment')

@section('customerContent')

<div class="min-h-screen bg-gray-50 flex items-center justify-center px-4 py-12">

    <div class="w-full max-w-md">

        <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-8 text-center">

            <div class="w-16 h-16 mx-auto rounded-2xl bg-black text-white flex items-center justify-center text-2xl">
                ₹
            </div>

            <h1 class="text-2xl font-bold mt-5">
                Complete Your Payment
            </h1>

            <p class="text-sm text-gray-500 mt-2">
                Order #{{ $order->order_number }}
            </p>

            <div class="mt-6 bg-gray-50 rounded-2xl p-5">

                <p class="text-sm text-gray-500">
                    Amount Payable
                </p>

                <p class="text-3xl font-bold mt-1">
                    ₹{{ number_format($order->total_amount, 2) }}
                </p>

            </div>

            <button
                type="button"
                id="pay-button"
                class="w-full mt-6 h-12 rounded-xl bg-black text-white font-semibold hover:bg-gray-800 transition"
            >
                Pay ₹{{ number_format($order->total_amount, 2) }}
            </button>

            <p class="text-xs text-gray-400 mt-4">
                Secure payment powered by Razorpay
            </p>

        </div>

    </div>

</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const payButton = document.getElementById('pay-button');

    const options = {

        key: @json($key),

        amount: @json($razorpayOrder['amount']),

        currency: @json($razorpayOrder['currency']),

        name: "SSSN",

        description: "Order #{{ $order->order_number }}",

        order_id: @json($razorpayOrder['id']),

        prefill: {
            name: @json($customer->name),
            email: @json($customer->email),
        },

        theme: {
            color: "#000000"
        },

        /*
        |--------------------------------------------------------------------------
        | PAYMENT SUCCESS
        |--------------------------------------------------------------------------
        */

        handler: function (response) {

            const form = document.createElement('form');

            form.method = 'POST';
            form.action = "{{ route('razorpay.verify') }}";

            const csrf = document.createElement('input');
            csrf.type = 'hidden';
            csrf.name = '_token';
            csrf.value = "{{ csrf_token() }}";

            const orderId = document.createElement('input');
            orderId.type = 'hidden';
            orderId.name = 'order_id';
            orderId.value = "{{ $order->id }}";

            const razorpayOrderId = document.createElement('input');
            razorpayOrderId.type = 'hidden';
            razorpayOrderId.name = 'razorpay_order_id';
            razorpayOrderId.value = response.razorpay_order_id;

            const paymentId = document.createElement('input');
            paymentId.type = 'hidden';
            paymentId.name = 'razorpay_payment_id';
            paymentId.value = response.razorpay_payment_id;

            const signature = document.createElement('input');
            signature.type = 'hidden';
            signature.name = 'razorpay_signature';
            signature.value = response.razorpay_signature;

            form.appendChild(csrf);
            form.appendChild(orderId);
            form.appendChild(razorpayOrderId);
            form.appendChild(paymentId);
            form.appendChild(signature);

            document.body.appendChild(form);

            form.submit();
        },

        /*
        |--------------------------------------------------------------------------
        | PAYMENT FAILED
        |--------------------------------------------------------------------------
        */

        modal: {
            ondismiss: function () {

                payButton.disabled = false;

                payButton.innerText =
                    'Pay ₹{{ number_format($order->total_amount, 2) }}';

                console.log('Razorpay checkout closed');
            }
        }

    };

    const razorpay = new Razorpay(options);

    /*
    |--------------------------------------------------------------------------
    | Razorpay Payment Failed Event
    |--------------------------------------------------------------------------
    */

    razorpay.on('payment.failed', function (response) {

        console.error('Razorpay Payment Failed:', response.error);

        const errorCode = response.error.code ?? '';
        const errorDescription = response.error.description ?? 'Payment failed.';
        const errorReason = response.error.reason ?? '';

        /*
        |--------------------------------------------------------------------------
        | Send Failure To Laravel
        |--------------------------------------------------------------------------
        */

        fetch("{{ route('razorpay.failed') }}", {

            method: 'POST',

            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                'Accept': 'application/json'
            },

            body: JSON.stringify({

                order_id: "{{ $order->id }}",

                razorpay_order_id:
                    response.error.metadata?.order_id ?? "{{ $razorpayOrder['id'] }}",

                razorpay_payment_id:
                    response.error.metadata?.payment_id ?? null,

                error_code: errorCode,

                error_description: errorDescription,

                error_reason: errorReason

            })

        })
        .then(res => res.json())
        .then(data => {

            console.log('Failure saved:', data);

            /*
            |--------------------------------------------------------------------------
            | Show Error To Customer
            |--------------------------------------------------------------------------
            */

            alert(errorDescription);

            payButton.disabled = false;

            payButton.innerText =
                'Pay ₹{{ number_format($order->total_amount, 2) }}';

        })
        .catch(error => {

            console.error('Failed to save payment failure:', error);

            alert(errorDescription);

            payButton.disabled = false;

            payButton.innerText =
                'Pay ₹{{ number_format($order->total_amount, 2) }}';
        });

    });

    /*
    |--------------------------------------------------------------------------
    | OPEN RAZORPAY
    |--------------------------------------------------------------------------
    */

    payButton.addEventListener('click', function (e) {

        e.preventDefault();

        payButton.disabled = true;

        payButton.innerText = 'Opening Payment...';

        razorpay.open();

        setTimeout(() => {

            if (payButton.disabled) {

                payButton.disabled = false;

                payButton.innerText =
                    'Pay ₹{{ number_format($order->total_amount, 2) }}';

            }

        }, 3000);

    });

});

</script>

@endsection