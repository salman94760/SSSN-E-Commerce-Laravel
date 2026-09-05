@extends('layouts.mail.mail')

@section('mailContent')

<!-- Hero -->
<div style="
    padding:45px 35px 35px;
    text-align:center;
">

    <div style="
        font-size:13px;
        color:#777777;
        letter-spacing:2px;
        text-transform:uppercase;
    ">
        Welcome to SSSN
    </div>

    <h1 style="
        font-size:32px;
        line-height:1.25;
        margin:12px 0 15px;
    ">
        Hi {{ $name ?? 'there' }},<br>
        Welcome to SSSN! 🎉
    </h1>

    <p style="
        font-size:15px;
        line-height:1.7;
        color:#666666;
        margin:0 auto;
        max-width:500px;
    ">
        Thank you for subscribing to SSSN.
        We're excited to have you with us.
    </p>


    <!-- Discount -->
    <div style="
        margin:28px auto 20px;
        padding:20px;
        background:#f8f8f8;
        border:1px dashed #cccccc;
        max-width:400px;
    ">

        <div style="
            font-size:12px;
            color:#777777;
            text-transform:uppercase;
            letter-spacing:1px;
        ">
            Your Welcome Gift
        </div>

        <div style="
            font-size:30px;
            font-weight:bold;
            margin:8px 0;
        ">
            10% OFF
        </div>

        <div style="
            font-size:13px;
            color:#666666;
        ">
            On your first order
        </div>

        <div style="
            margin-top:12px;
            font-size:14px;
            font-weight:bold;
            letter-spacing:2px;
        ">
            WELCOME10
        </div>

    </div>


    <!-- CTA -->
    <div style="text-align:center;">

        <a href="{{ url('/shop') }}"
           style="
               display:inline-block;
               padding:14px 30px;
               background:#000000;
               color:#ffffff;
               text-decoration:none;
               font-size:14px;
               font-weight:bold;
               border-radius:7px;
           ">
            SHOP NOW →
        </a>

    </div>

</div>


<!-- Divider -->
<div style="
    margin:0 35px;
    height:1px;
    background:#eeeeee;
"></div>


<!-- Featured Heading -->
<div style="
    padding:35px 35px 20px;
">

    <h2 style="
        font-size:22px;
        margin:0 0 7px;
    ">
        Featured for you
    </h2>

    <p style="
        margin:0;
        font-size:13px;
        color:#888888;
    ">
        A few products worth checking out.
    </p>

</div>


<!-- Products -->

@if(isset($products) && count($products))

    @foreach($products as $product)

        <div style="
            margin:0 35px 18px;
            border:1px solid #eeeeee;
        ">

            <table width="100%"
                   cellpadding="0"
                   cellspacing="0"
                   border="0">

                <tr>

                    <!-- Image -->

                    <td width="150"
                        valign="middle"
                        style="
                            padding:12px;
                            background:#fafafa;
                        ">

                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            width="126"
                            style="
                                display:block;
                                width:126px;
                                height:126px;
                                object-fit:cover;
                                margin:auto;
                            "
                        >

                    </td>


                    <!-- Details -->

                    <td valign="middle"
                        style="padding:18px;">

                        <div style="
                            font-size:11px;
                            color:#999999;
                            text-transform:uppercase;
                            letter-spacing:1px;
                        ">
                            {{ $product->category->name ?? 'Featured' }}
                        </div>

                        <h3 style="
                            font-size:17px;
                            margin:7px 0;
                            line-height:1.3;
                        ">
                            {{ $product->name }}
                        </h3>

                        <div style="
                            font-size:16px;
                            font-weight:bold;
                            margin-bottom:13px;
                        ">
                            ₹{{ number_format($product->sale_price, 2) }}
                        </div>

                        <a href="{{ url('/shop/' . $product->slug) }}"
                           style="
                               font-size:12px;
                               font-weight:bold;
                               color:#111111;
                               text-decoration:none;
                               border-bottom:1px solid #111111;
                               padding-bottom:3px;
                           ">
                            VIEW PRODUCT →
                        </a>

                    </td>

                </tr>

            </table>

        </div>

    @endforeach

@else

    <div style="
        padding:10px 35px 35px;
        color:#777777;
    ">
        Discover our latest collection at SSSN.
    </div>

@endif


<!-- Benefits -->

<div style="
    background:#fafafa;
    padding:30px 35px;
">

    <table width="100%"
           cellpadding="0"
           cellspacing="0"
           border="0">

        <tr>

            <td width="33%"
                align="center"
                style="padding:5px;">

                <div style="font-size:22px;">✦</div>

                <div style="
                    font-size:12px;
                    font-weight:bold;
                    margin-top:7px;
                ">
                    New Arrivals
                </div>

                <div style="
                    font-size:11px;
                    color:#888888;
                    margin-top:4px;
                ">
                    Stay updated
                </div>

            </td>


            <td width="33%"
                align="center"
                style="padding:5px;">

                <div style="font-size:22px;">%</div>

                <div style="
                    font-size:12px;
                    font-weight:bold;
                    margin-top:7px;
                ">
                    Exclusive Deals
                </div>

                <div style="
                    font-size:11px;
                    color:#888888;
                    margin-top:4px;
                ">
                    Special offers
                </div>

            </td>


            <td width="33%"
                align="center"
                style="padding:5px;">

                <div style="font-size:22px;">♡</div>

                <div style="
                    font-size:12px;
                    font-weight:bold;
                    margin-top:7px;
                ">
                    Curated Picks
                </div>

                <div style="
                    font-size:11px;
                    color:#888888;
                    margin-top:4px;
                ">
                    Just for you
                </div>

            </td>

        </tr>

    </table>

</div>

@endsection