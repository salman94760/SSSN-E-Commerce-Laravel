@extends('layouts.customer.customer-layout')

@section('title', 'SSSN | NOTIFICATIONS')

@section('customerContent')
<div class="min-h-screen bg-[#faf7f2] py-10 px-4">
    <div class="max-w-6xl mx-auto">

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
            <div>
                <p class="text-sm text-[#9a846a] uppercase tracking-[3px] mb-2">
                    SSSN Fashion
                </p>
                <h1 class="text-3xl md:text-4xl font-serif text-[#493825]">
                    Notifications
                </h1>
                <p class="text-sm text-[#79654e] mt-2">
                    Stay updated with your latest orders and account activity.
                </p>
            </div>

            <button type="button"
                onclick="markAllRead()"
                class="px-5 py-3 border border-[#d2b99c] text-[#493825]
                       rounded-lg hover:bg-[#493825] hover:text-white transition">
                <i class="fas fa-check-double mr-2"></i>
                Mark All as Read
            </button>
        </div>

        {{-- Summary --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-7">

            <div class="bg-white border border-[#eee4d8] rounded-xl p-5">
                <p class="text-sm text-[#9a846a]">Total Notifications</p>
                <h2 class="text-3xl font-semibold text-[#493825] mt-2">08</h2>
            </div>

            <div class="bg-white border border-[#eee4d8] rounded-xl p-5">
                <p class="text-sm text-[#9a846a]">Unread Notifications</p>
                <h2 class="text-3xl font-semibold text-[#493825] mt-2" id="unreadCount">03</h2>
            </div>

            <div class="bg-white border border-[#eee4d8] rounded-xl p-5">
                <p class="text-sm text-[#9a846a]">Latest Update</p>
                <h2 class="text-xl font-semibold text-[#493825] mt-3">Today</h2>
            </div>

        </div>

        {{-- Notification List --}}
        <div class="bg-white border border-[#eee4d8] rounded-2xl overflow-hidden">

            <div class="flex items-center justify-between px-5 md:px-7 py-5 border-b border-[#eee4d8]">
                <h2 class="text-xl font-semibold text-[#493825]">
                    All Notifications
                </h2>
                <span class="text-xs text-[#9a846a]">Latest first</span>
            </div>

            <div id="notificationList">

                {{-- Notification 1 --}}
                <div class="notification-item unread flex gap-4 p-5 md:px-7 border-b border-[#f1e9df] hover:bg-[#faf7f2] transition">
                    <div class="w-12 h-12 shrink-0 rounded-full bg-[#f5efe6] flex items-center justify-center text-[#8b6845]">
                        <i class="fas fa-box text-lg"></i>
                    </div>
                    <div class="flex-1">
                        <div class="flex flex-wrap justify-between gap-2">
                            <h3 class="font-semibold text-[#493825]">Order Confirmed!</h3>
                            <span class="text-xs text-[#9a846a]">Today, 10:30 AM</span>
                        </div>
                        <p class="text-sm text-[#79654e] mt-1">
                            Your order #SSSN1028 has been successfully placed.
                        </p>
                        <span class="text-xs text-[#9a846a] mt-2 inline-block">Order Update</span>
                    </div>
                    <span class="unread-dot w-2.5 h-2.5 rounded-full bg-[#bd9556] mt-2"></span>
                </div>

                {{-- Notification 2 --}}
                <div class="notification-item unread flex gap-4 p-5 md:px-7 border-b border-[#f1e9df] hover:bg-[#faf7f2] transition">
                    <div class="w-12 h-12 shrink-0 rounded-full bg-[#f5efe6] flex items-center justify-center text-[#8b6845]">
                        <i class="fas fa-truck text-lg"></i>
                    </div>
                    <div class="flex-1">
                        <div class="flex flex-wrap justify-between gap-2">
                            <h3 class="font-semibold text-[#493825]">Your Order is Shipped</h3>
                            <span class="text-xs text-[#9a846a]">Yesterday, 04:15 PM</span>
                        </div>
                        <p class="text-sm text-[#79654e] mt-1">
                            Great news! Your order #SSSN1025 is on its way.
                        </p>
                        <span class="text-xs text-[#9a846a] mt-2 inline-block">Shipping Update</span>
                    </div>
                    <span class="unread-dot w-2.5 h-2.5 rounded-full bg-[#bd9556] mt-2"></span>
                </div>

                {{-- Notification 3 --}}
                <div class="notification-item unread flex gap-4 p-5 md:px-7 border-b border-[#f1e9df] hover:bg-[#faf7f2] transition">
                    <div class="w-12 h-12 shrink-0 rounded-full bg-[#f5efe6] flex items-center justify-center text-[#8b6845]">
                        <i class="fas fa-rupee-sign text-lg"></i>
                    </div>
                    <div class="flex-1">
                        <div class="flex flex-wrap justify-between gap-2">
                            <h3 class="font-semibold text-[#493825]">Refund Initiated</h3>
                            <span class="text-xs text-[#9a846a]">18 Nov 2026</span>
                        </div>
                        <p class="text-sm text-[#79654e] mt-1">
                            Your refund of ₹1,200 for order #SSSN1009 is being processed.
                        </p>
                        <span class="text-xs text-[#9a846a] mt-2 inline-block">Return & Refund</span>
                    </div>
                    <span class="unread-dot w-2.5 h-2.5 rounded-full bg-[#bd9556] mt-2"></span>
                </div>

                {{-- Notification 4 --}}
                <div class="notification-item flex gap-4 p-5 md:px-7 border-b border-[#f1e9df] hover:bg-[#faf7f2] transition">
                    <div class="w-12 h-12 shrink-0 rounded-full bg-[#f5efe6] flex items-center justify-center text-[#8b6845]">
                        <i class="fas fa-check-circle text-lg"></i>
                    </div>
                    <div class="flex-1">
                        <div class="flex flex-wrap justify-between gap-2">
                            <h3 class="font-semibold text-[#493825]">Payment Successful</h3>
                            <span class="text-xs text-[#9a846a]">17 Nov 2026</span>
                        </div>
                        <p class="text-sm text-[#79654e] mt-1">
                            Payment of ₹2,499 for order #SSSN1020 was successful.
                        </p>
                        <span class="text-xs text-[#9a846a] mt-2 inline-block">Payment Update</span>
                    </div>
                </div>

                {{-- Notification 5 --}}
                <div class="notification-item flex gap-4 p-5 md:px-7 border-b border-[#f1e9df] hover:bg-[#faf7f2] transition">
                    <div class="w-12 h-12 shrink-0 rounded-full bg-[#f5efe6] flex items-center justify-center text-[#8b6845]">
                        <i class="fas fa-gift text-lg"></i>
                    </div>
                    <div class="flex-1">
                        <div class="flex flex-wrap justify-between gap-2">
                            <h3 class="font-semibold text-[#493825]">Special Offer Just for You!</h3>
                            <span class="text-xs text-[#9a846a]">16 Nov 2026</span>
                        </div>
                        <p class="text-sm text-[#79654e] mt-1">
                            Enjoy 15% OFF on your next purchase. Happy Shopping!
                        </p>
                        <span class="text-xs text-[#9a846a] mt-2 inline-block">Offers & Promotions</span>
                    </div>
                </div>

                {{-- Notification 6 --}}
                <div class="notification-item flex gap-4 p-5 md:px-7 border-b border-[#f1e9df] hover:bg-[#faf7f2] transition">
                    <div class="w-12 h-12 shrink-0 rounded-full bg-[#f5efe6] flex items-center justify-center text-[#8b6845]">
                        <i class="fas fa-box-open text-lg"></i>
                    </div>
                    <div class="flex-1">
                        <div class="flex flex-wrap justify-between gap-2">
                            <h3 class="font-semibold text-[#493825]">Order Delivered</h3>
                            <span class="text-xs text-[#9a846a]">15 Nov 2026</span>
                        </div>
                        <p class="text-sm text-[#79654e] mt-1">
                            Your order #SSSN1018 has been delivered successfully.
                        </p>
                        <span class="text-xs text-[#9a846a] mt-2 inline-block">Delivery Update</span>
                    </div>
                </div>

                {{-- Notification 7 --}}
                <div class="notification-item flex gap-4 p-5 md:px-7 border-b border-[#f1e9df] hover:bg-[#faf7f2] transition">
                    <div class="w-12 h-12 shrink-0 rounded-full bg-[#f5efe6] flex items-center justify-center text-[#8b6845]">
                        <i class="fas fa-heart text-lg"></i>
                    </div>
                    <div class="flex-1">
                        <div class="flex flex-wrap justify-between gap-2">
                            <h3 class="font-semibold text-[#493825]">Wishlist Reminder</h3>
                            <span class="text-xs text-[#9a846a]">14 Nov 2026</span>
                        </div>
                        <p class="text-sm text-[#79654e] mt-1">
                            Your favourite products are waiting for you. Visit your wishlist today!
                        </p>
                        <span class="text-xs text-[#9a846a] mt-2 inline-block">Wishlist</span>
                    </div>
                </div>

                {{-- Notification 8 --}}
                <div class="notification-item flex gap-4 p-5 md:px-7 hover:bg-[#faf7f2] transition">
                    <div class="w-12 h-12 shrink-0 rounded-full bg-[#f5efe6] flex items-center justify-center text-[#8b6845]">
                        <i class="fas fa-user text-lg"></i>
                    </div>
                    <div class="flex-1">
                        <div class="flex flex-wrap justify-between gap-2">
                            <h3 class="font-semibold text-[#493825]">Welcome to SSSN Fashion</h3>
                            <span class="text-xs text-[#9a846a]">10 Nov 2026</span>
                        </div>
                        <p class="text-sm text-[#79654e] mt-1">
                            Thank you for being a part of SSSN Fashion. Happy Shopping!
                        </p>
                        <span class="text-xs text-[#9a846a] mt-2 inline-block">Account Update</span>
                    </div>
                </div>

            </div>
        </div>

        <p class="text-center text-xs text-[#9a846a] mt-6">
            You are all caught up with your notifications.
        </p>

    </div>
</div>

<script>
    function markAllRead() {
        document.querySelectorAll('.notification-item').forEach(item => {
            item.classList.remove('unread');
            const dot = item.querySelector('.unread-dot');
            if (dot) dot.remove();
        });

        document.getElementById('unreadCount').textContent = '00';
    }
</script>
@endsection