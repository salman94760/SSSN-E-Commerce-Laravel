    <footer class="bg-[#292524] text-white">

        <div class="mx-auto grid max-w-[1500px] gap-12 px-6 py-16 sm:grid-cols-2 lg:grid-cols-4 lg:px-12 lg:py-20">

            <!-- Brand -->
            <div>

                <h2 class="text-3xl font-extrabold tracking-[5px]">
                    SSSN
                </h2>

                <p class="mt-2 text-[9px] uppercase tracking-[4px] text-[#d2b99c]">
                    Fashion & Lifestyle
                </p>

                <p class="mt-6 max-w-xs text-sm leading-7 text-white/50">
                    Discover your style. Express your personality.
                    Make every moment fashionable.
                </p>

            </div>


            <!-- Quick Links -->
            <div>

                <h3 class="mb-6 text-xs font-bold uppercase tracking-[3px] text-[#d2b99c]">
                    Quick Links
                </h3>

                <div class="flex flex-col gap-4 text-sm text-white/60">

                    <a href="{{ url('/') }}" class="footer-link">Home</a>

                    <a href="#categories" class="footer-link">Categories</a>

                    <a href="#featured-products" class="footer-link">Featured Products</a>

                    <a href="#brands" class="footer-link">Brands</a>

                    <a href="#collection" class="footer-link">Shop Collection</a>

                </div>

            </div>


            <!-- Account -->
            <div>

                <h3 class="mb-6 text-xs font-bold uppercase tracking-[3px] text-[#d2b99c]">
                    My Account
                </h3>

                <div class="flex flex-col gap-4 text-sm text-white/60">

                    <a href="{{ url('/login') }}" class="footer-link">Login</a>

                    <a href="{{ url('/register') }}" class="footer-link">Create Account</a>

                    <a href="#" class="footer-link">My Orders</a>

                    <a href="#" class="footer-link">Wishlist</a>

                </div>

            </div>


            <!-- Contact -->
            <div>

                <h3 class="mb-6 text-xs font-bold uppercase tracking-[3px] text-[#d2b99c]">
                    Get In Touch
                </h3>

                <div class="flex flex-col gap-4 text-sm text-white/60">

                    <p>Fashion & Lifestyle</p>

                    <a href="mailto:info@sssnworld.com" class="footer-link">
                        info@sssnworld.com
                    </a>

                    <p>Thank you for shopping with SSSN.</p>

                </div>

            </div>

        </div>


        <!-- Copyright -->
        <div class="border-t border-white/10">

            <div class="mx-auto flex max-w-[1500px] flex-col justify-between gap-3 px-6 py-6 text-center text-[10px] uppercase tracking-[2px] text-white/40 sm:flex-row sm:text-left lg:px-12">

                <p>
                    © {{ date('Y') }} SSSN Fashion. All Rights Reserved.
                </p>

                <p>
                    Designed For Your Style.
                </p>

            </div>

        </div>

    </footer>

    <script>
async function wishListProduct(productId) {

    try {
        const response = await fetch('/wishlist/toggle', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                product_id: productId
            })
        });

        const res = await response.json();

        if (!response.ok) {
            throw new Error(res.message || 'Something went wrong');
        }

        const html = document.getElementById(`product_${productId}`);

        if (html) {
            if (res.status === 'added') {
                html.innerHTML = '<span class="heart_2">♥</span>';
            } else {
                html.innerHTML = '<span class="heart_2">♡</span>';
            }
        }

    } catch (error) {
        console.error(error);
        alert(error.message);
    }
}
    
function toggleUserMenu() {
    document.getElementById('userDropdown').classList.toggle('show');
}

document.addEventListener('click', function(event) {
    const menu = document.querySelector('.user-menu');
    const dropdown = document.getElementById('userDropdown');

    if (menu && dropdown && !menu.contains(event.target)) {
        dropdown.classList.remove('show');
    }
});

</script>