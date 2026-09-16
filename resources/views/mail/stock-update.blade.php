@extends('layouts.mail.mail')
@section('mailContent')

<div style="margin:0; background:#f5f7fa; font-family:Arial, Helvetica, sans-serif;">
    <div style="max-width:650px; margin:0 auto; background:#ffffff;">
        <div style="padding:40px 30px;">
            <div style="text-align:center; margin-bottom:35px;">
                <div style="font-size:42px; margin-bottom:10px;">🔔</div>
                <h1 style="margin:0 0 12px; font-size:28px; color:#111827;">
                    Your Product Is Back in Stock!
                </h1>

                <p style="margin:0; font-size:15px; line-height:1.6; color:#6b7280;">
                    Great news! The product you were waiting for is now available.
                </p>
            </div>

            <div style="border:1px solid #e5e7eb;border-radius:10px;padding:20px;margin-bottom:20px;">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="140" valign="top" style="padding-right:20px;">
                            @if($product->images && $product->images->isNotEmpty())
                            
                            <img src="{{ asset('storage/' . $product->images->first()->name) }}" alt="{{ $product->name }}" width="130" height="130" style="width:130px;height:130px;object-fit:contain;border-radius:8px;display:block;">

                            @elseif(!empty($product->image))
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="130" height="130" style="width:130px;height:130px;object-fit:contain;border-radius:8px;display:block;">

                            @endif
                        </td>

                        <td valign="top">
                            <h2 style="margin:0 0 8px;font-size:19px;color:#111827;">
                                {{ $product->name }}
                            </h2>

                            @if(isset($product->sizes))
                            @foreach($product->sizes as $size)
                                <p style="margin:0 0 12px;font-size:17px;font-weight:bold;color:#111827;">
                                    {{ $size->name }} - ₹{{ number_format($size->pivot->price, 2) }} - Stock : {{ $size->pivot->stock }}
                                </p>
                            @endforeach
                            @endif

                            <span style="display:inline-block;padding:6px 12px;background:#dcfce7;color:#166534;border-radius:20px;font-size:13px;font-weight:bold;
                                margin-bottom:15px;">
                                ✓ In Stock
                            </span><br>

                            <a href="{{ route('products.show', $product->id) }}" style="display:inline-block;padding:10px 18px;background:#111827;color:#ffffff;text-decoration:none;border-radius:6px;font-size:13px;font-weight:bold;">
                                Shop Now →
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection