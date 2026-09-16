@extends('layouts.mail.mail')

@section('mailContent')
<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td align="center">

            <!-- Main Container -->
            <table width="600" cellpadding="0" cellspacing="0" border="0"
                   style="background:#ffffff; border-radius:10px; overflow:hidden;">

                <!-- Header -->
                <tr>
                    <td align="center" style="color:#000;padding:30px 20px;">
                        <h1 style="margin:0; color:#000; font-size:28px;">
                            New Product Launch 🚀
                        </h1>

                        <p style="margin:10px 0 0; color:#000; font-size:15px;">
                            Something exciting has arrived!
                        </p>
                    </td>
                </tr>

                <!-- Product Image -->
                <tr>
                    <td align="center" style="padding:30px 30px 10px;">
                        <img
                            src="https://via.placeholder.com/540x350"
                            alt="New Product"
                            width="540"
                            style="max-width:100%; height:auto; display:block; border-radius:8px;"
                        >
                    </td>
                </tr>

                <!-- Product Details -->
                <tr>
                    <td style="padding:20px 40px 30px;">

                        <h2 style="margin:0 0 12px; color:#111827; font-size:25px;">
                            Premium Wireless Headphones
                        </h2>

                        <p style="margin:0 0 15px; color:#6b7280; font-size:16px; line-height:1.6;">
                            Experience crystal-clear sound, powerful bass and
                            all-day comfort with our brand-new premium wireless
                            headphones.
                        </p>

                        <!-- Price -->
                        <p style="margin:20px 0; font-size:24px; font-weight:bold; color:#111827;">
                            $99.99
                        </p>

                        <!-- CTA -->
                        <table cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td style="border-radius:6px; background:#2563eb;">
                                    <a href="#"
                                       style="
                                            display:inline-block;
                                            padding:14px 28px;
                                            color:#ffffff;
                                            text-decoration:none;
                                            font-size:16px;
                                            font-weight:bold;
                                       ">
                                        Shop Now
                                    </a>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>




            </table>

        </td>
    </tr>
</table>

@endsection

