                <!-- FOOTER -->
                <div class="mt-8 border-t border-slate-200 pt-6 text-center">

                    <p class="text-xs text-slate-400">
                        © {{date('Y')}} {{ __('messages.brand') }} AdminPanel. All rights reserved.
                    </p>

                </div>

            </div>

        </div>

    </main>

</div>


<!-- Mobile Sidebar Overlay -->
<div
    id="overlay"
    onclick="toggleSidebar()"
    class="fixed inset-0 z-40 hidden bg-black/40 lg:hidden"
></div>


<script>

    function toggleSidebar() {

        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        sidebar.classList.toggle('hidden');
        overlay.classList.toggle('hidden');

    }

</script>

</body>
</html>