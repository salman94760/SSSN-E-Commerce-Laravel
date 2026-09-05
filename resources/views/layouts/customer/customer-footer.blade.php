

<footer class="bg-gray-950 text-white border-t
               border-white/10">

    <div class="max-w-7xl mx-auto
                px-4 sm:px-6 lg:px-8
                py-12">

        <div class="grid sm:grid-cols-2
                    lg:grid-cols-4 gap-10">


            <div>

                <div class="flex items-center gap-3">

                    <a href="{{ url('/') }}" class=" items-center gap-3">
                    <div class="w-[110px] h-[90px] rounded-xl items-center justify-center font-bold"><img class="bg-white" src="{{asset('logo/'.$globalComapnyDetail->logo)}}" /><p class="text-[10px] uppercase tracking-widest text-gray-400">Clothing Store</p></div>
                    
                   <!--  <div>
                        <h1 class="font-bold text-xl">SSSN</h1>
                        <p class="text-[10px] uppercase tracking-widest text-gray-400">Clothing Store</p>
                    </div> -->
                </a>

                </div>

                <p class="text-sm text-gray-400
                          leading-6 mt-5">
                    Premium fashion and everyday
                    essentials for modern living.
                </p>

            </div>


            <div>

                <h3 class="font-semibold">
                    Shop
                </h3>

                <div class="mt-5 space-y-3">

                    <a href="{{ url('/shop') }}"
                       class="block text-sm text-gray-400 hover:text-white">
                        All Products
                    </a>

                    <a href="{{url('/shop/new-arrivals')}}"
                       class="block text-sm text-gray-400 hover:text-white">
                        New Arrivals
                    </a>

                    <a href="{{url('/shop/best-sellers')}}"
                       class="block text-sm text-gray-400 hover:text-white">
                        Best Sellers
                    </a>

                </div>

            </div>


            <div>

                <h3 class="font-semibold">
                    Customer
                </h3>

                <div class="mt-5 space-y-3">

                    <a href="{{ url('/my-orders') }}"
                       class="block text-sm text-gray-400 hover:text-white">
                        My Orders
                    </a>

                    <a href="{{ url('/wishlist') }}"
                       class="block text-sm text-gray-400 hover:text-white">
                        Wishlist
                    </a>

                    <a href="{{ url('/profile') }}"
                       class="block text-sm text-gray-400 hover:text-white">
                        My Account
                    </a>

                </div>

            </div>


            <div>

                <h3 class="font-semibold">
                    Support
                </h3>

                <div class="mt-5 space-y-3">

                    <a href="{{ url('/faq') }}"
                       class="block text-sm text-gray-400 hover:text-white">
                        FAQ
                    </a>

                    <a href="{{ url('/contact') }}"
                       class="block text-sm text-gray-400 hover:text-white">
                        Contact Us
                    </a>

                    <!-- <a href="#"
                       class="block text-sm text-gray-400 hover:text-white">
                        Privacy Policy
                    </a> -->

                </div>

            </div>

        </div>


        <div class="border-t border-white/10
                    mt-10 pt-6
                    flex flex-col sm:flex-row
                    justify-between gap-4">

            <p class="text-xs text-gray-500">
                © {{ date('Y') }} SSSN.
                All rights reserved.
            </p>

            <p class="text-xs text-gray-500">
                Secure Shopping · Fast Delivery · Easy Returns
            </p>

        </div>

    </div>

</footer>

<script>
function wishListProduct(productId) {

    fetch("{{ route('wishlist.toggle') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            "Accept": "application/json"
        },
        body: JSON.stringify({
            product_id: productId
        })
    })
    .then(response =>response.json())
    .then(data => {
        var heart = document.getElementById('heart_' + productId);

if (data.status === "removed") {
    heart.innerHTML = "♡";
} else {
    heart.innerHTML = "♥";
}
    window.location.reload();

    })
    .catch(error => {
        console.error(error);
        alert("Something went wrong.");
    });
}

function reloadFilter() {
    let filter = document.getElementById('filters').value;

    let url = new URL(window.location.href);

    if (filter) {
        url.searchParams.set('sort', filter);
    } else {
        url.searchParams.delete('sort');
    }

    window.location.href = url.toString();
}
</script>
</body>
</html>