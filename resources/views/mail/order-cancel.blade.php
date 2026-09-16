@extends('layouts.mail.mail')

@section('mailContent')

<div style="margin:0; padding:0; background:#f8fafc; font-family:Arial, Helvetica, sans-serif;">

    <div style="max-width:600px; margin:30px auto; background:#ffffff; border:1px solid #e5e7eb; border-radius:12px; overflow:hidden;">

        {{-- Header --}}
        <div style="padding:25px; text-align:center; border-bottom:1px solid #e5e7eb;">
            <h2 style="margin:0; color:#111827; font-size:24px;">
                Order Cancelled
            </h2>

            <p style="margin:8px 0 0; color:#6b7280; font-size:14px;">
                Your order has been successfully cancelled.
            </p>
        </div>


        {{-- Content --}}
        <div style="padding:25px;">

            <p style="margin:0 0 15px; color:#374151; font-size:15px;">
                Hi {{ $order->user->name ?? 'Customer' }},
            </p>

            <p style="margin:0 0 20px; color:#4b5563; font-size:14px; line-height:1.6;">
                We're writing to let you know that your order has been cancelled successfully.
                Here are the details of your cancelled order:
         	<br>


                If any amount was deducted from your account for this order, the refund will be processed and credited back to your original payment method within 7 business days.
            </p>


            {{-- Order Info --}}
            <div style="background:#f9fafb; border:1px solid #e5e7eb; border-radius:8px; padding:15px; margin-bottom:20px;">

                <p style="margin:0 0 8px; font-size:14px; color:#374151;">
                    <strong>Order ID:</strong>
                    #{{ $order->order_number }}
                </p>

                <p style="margin:0 0 8px; font-size:14px; color:#374151;">
                    <strong>Order Date:</strong>
                    {{ $order->created_at->format('d M Y, h:i A') }}
                </p>

                <p style="margin:0; font-size:14px; color:#374151;">
                    <strong>Status:</strong>
                    <span style="color:#dc2626; font-weight:bold;">
                        Cancelled
                    </span>
                </p>

            </div>


            {{-- Products --}}
            <h3 style="margin:0 0 12px; color:#111827; font-size:17px;">
                Cancelled Items
            </h3>

            @foreach($order->items as $item)

                <div style="padding:15px 0; border-bottom:1px solid #e5e7eb;">

                    <p style="margin:0 0 6px; color:#111827; font-size:14px; font-weight:bold;">
                        {{ $item->product->name ?? 'Product' }}
                    </p>

                    <p style="margin:0; color:#6b7280; font-size:13px;">
                        Quantity: {{ $item->quantity }}
                    </p>

                    <p style="margin:5px 0 0; color:#374151; font-size:14px;">
                        ₹{{ number_format($item->price * $item->quantity, 2) }}
                    </p>

                </div>

            @endforeach


            {{-- Total --}}
            <div style="padding-top:18px; text-align:right;">

                <span style="font-size:14px; color:#6b7280;">
                    Order Total
                </span>

                <strong style="display:block; margin-top:5px; font-size:20px; color:#111827;">
                    ₹{{ number_format($order->items->sum(fn($item) => $item->price * $item->quantity), 2) }}
                </strong>

            </div>


            {{-- Refund Message --}}
            @if(isset($order->payment_status) && $order->payment_status === 'paid')

                <div style="margin-top:25px; padding:15px; background:#eff6ff; border:1px solid #bfdbfe; border-radius:8px;">

                    <p style="margin:0; color:#1e40af; font-size:13px; line-height:1.6;">
                        Since your payment was already completed, your refund will be processed
                        according to our refund policy. The amount may take some time to appear
                        in your original payment method.
                    </p>

                </div>

            @endif


            {{-- CTA --}}
            <div style="margin-top:25px; text-align:center;">

                <a
                    href="{{ route('products.index') }}"
                    style="display:inline-block; padding:12px 22px; background:#111827; color:#ffffff; text-decoration:none; border-radius:7px; font-size:14px; font-weight:bold;"
                >
                    Continue Shopping
                </a>

            </div>

        </div>


        {{-- Bottom --}}
        <div style="padding:18px 25px; background:#f9fafb; border-top:1px solid #e5e7eb; text-align:center;">

            <p style="margin:0; color:#6b7280; font-size:12px;">
                We're sorry to see this order cancelled.
                We hope to serve you again soon.
            </p>

        </div>

    </div>

</div>
@endsection