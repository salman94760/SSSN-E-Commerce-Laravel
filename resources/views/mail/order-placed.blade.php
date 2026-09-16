@extends('layouts.mail.mail')

@section('mailContent')
@php
$totalDiscount = 0;
@endphp
<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td align="center" style="padding:30px 15px;">

            <table width="600" cellpadding="0" cellspacing="0" border="0"
                   style="max-width:600px; width:100%; background:#ffffff;">

                <!-- Main Content -->
                <tr>
                    <td style="padding:40px;">

                        <div style="text-align:center; margin-bottom:25px;">
                            <div style="
                                display:inline-block;
                                width:60px;
                                height:60px;
                                line-height:60px;
                                border-radius:50%;
                                background:#dcfce7;
                                color:#16a34a;
                                font-size:30px;
                                font-weight:bold;
                            ">
                                ✓
                            </div>
                        </div>

                        <h1 style="
                            margin:0 0 10px;
                            text-align:center;
                            color:#111827;
                            font-size:28px;
                        ">
                            Order Confirmed!
                        </h1>

                        <p style="
                            margin:0 0 30px;
                            text-align:center;
                            color:#6b7280;
                            font-size:15px;
                            line-height:1.6;
                        ">
                            Thank you for your order. We've received your order
                            and will start processing it shortly.
                        </p>

                        <!-- Order Info -->
                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                               style="background:#f9fafb; border-radius:6px;">

                            <tr>
                                <td style="padding:20px;">

                                    <p style="margin:0 0 10px; color:#6b7280; font-size:13px;">
                                        ORDER NUMBER
                                    </p>

                                    <p style="
                                        margin:0;
                                        color:#111827;
                                        font-size:18px;
                                        font-weight:bold;
                                    ">

                                        {{$order->order_number}}
                                    </p>

                                </td>

                                <td align="right" style="padding:20px;">

                                    <p style="margin:0 0 10px; color:#6b7280; font-size:13px;">
                                        ORDER DATE
                                    </p>

                                    <p style="
                                        margin:0;
                                        color:#111827;
                                        font-size:15px;
                                        font-weight:bold;
                                    ">
                                    	{{date('d-M-Y', strtotime($order->created_at))}}

                                    </p>

                                </td>
                            </tr>

                        </table>

                        <!-- Product -->
                        <h2 style="
                            margin:30px 0 15px;
                            color:#111827;
                            font-size:19px;
                        ">
                            Order Details
                        </h2>

                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                               style="border:1px solid #e5e7eb;">
                               @if(!empty($order->items))
                               @foreach($order->items as $item)
                               @php
                               $totalDiscount .= $item->discount_amount;
                               @endphp
                               <tr>
                                <td style="padding:15px; width:80px;">
                                    <img
                                        src="{{asset('storage/'.$item->product->images->first()->name)}}"
                                        alt="Product"
                                        width="80"
                                        height="80"
                                        style="display:block;"
                                    >
                                 
                                </td>

                                <td style="padding:15px;">
                                    <p style="
                                        margin:0 0 7px;
                                        color:#111827;
                                        font-size:16px;
                                        font-weight:bold;
                                    ">
                                 
                                      	{{$item->product->name}}
                                    </p>

                                    <p style="
                                        margin:0;
                                        color:#6b7280;
                                        font-size:14px;
                                    ">
                                        Quantity: {{$item->quantity}}
                                    </p>
                                </td>

                                <td align="right" style="padding:15px;">
                                	Price : 
                                    <p style="
                                        margin:0;
                                        color:#111827;
                                        font-size:16px;
                                        font-weight:bold;
                                    ">
                                         ₹{{$item->price}}
                                    </p>
                                </td>
                            </tr>
                               @endforeach
                               @endif

         

                        </table>

                        <!-- Total -->
                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                               style="margin-top:20px;">

                            <tr>
                                <td style="padding:7px 0; color:#6b7280; font-size:14px;">
                                    Subtotal
                                </td>

                                <td align="right" style="padding:7px 0; color:#111827; font-size:14px;">
                                    ₹{{number_format($order->items->sum('total'),2)}}
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:7px 0; color:#6b7280; font-size:14px;">
                                    Shipping
                                </td>

                                <td align="right" style="padding:7px 0; color:#111827; font-size:14px;">
                                    ₹0
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:7px 0; color:#6b7280; font-size:14px;">
                                    Discount
                                </td>

                                <td align="right" style="padding:7px 0; color:#111827; font-size:14px;">
                                    -₹{{$totalDiscount}}
                                </td>
                            </tr>

                            <tr>
                                <td style="
                                    padding:15px 0 0;
                                    border-top:1px solid #e5e7eb;
                                    color:#111827;
                                    font-size:18px;
                                    font-weight:bold;
                                ">
                                    Total
                                </td>

                                <td align="right" style="
                                    padding:15px 0 0;
                                    border-top:1px solid #e5e7eb;
                                    color:#111827;
                                    font-size:18px;
                                    font-weight:bold;
                                ">
                                    ₹{{number_format($order->items->sum('total')-$totalDiscount,2)}}
                                </td>
                            </tr>

                        </table>

                        <!-- CTA -->
                        <div style="text-align:center; margin-top:30px;">

                            <a href="{{route('customer.my-orders')}}"
                               style="
                                   display:inline-block;
                                   padding:14px 30px;
                                   background:#2563eb;
                                   color:#ffffff;
                                   text-decoration:none;
                                   font-size:15px;
                                   font-weight:bold;
                                   border-radius:6px;
                               ">
                                View My Order
                            </a>

                        </div>

                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

@endsection