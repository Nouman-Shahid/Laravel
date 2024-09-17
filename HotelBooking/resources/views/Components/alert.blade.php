<div class="flex w-full h-full justify-end items-end pr-5">

    @if (session('success'))
        <div id="alert-1"
            class="flex items-center p-4 my-4 border border-red-800 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
            </div>

        </div>

        <script>
            setTimeout(() => {
                const alert = document.getElementById('alert-1');
                if (alert) {
                    alert.style.opacity = 0;
                    setTimeout(() => alert.style.display = 'none', 500);
                }
            }, 5000);
        </script>
    @endif
</div>
