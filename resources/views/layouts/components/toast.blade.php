@if (session('success'))
    <div id="toast" aria-live="assertive" aria-atomic="true"
        class="toast fixed bottom-3 right-3 fade show border hover:cursor-pointer border-gray-300 flex flex-col w-full max-w-xs text-white bg-green-500 hover:bg-green-600 transition-all ease-in-out rounded-lg p-3 gap-3"
        role="alert">
        <div class="flex items-center w-full border-gray-300">
            <h4 class="text-base text-white">Tailwind CSS</h4>
            {{-- <button type="button"
                class="btn-close ms-auto -mx-1.5 -my-1.5 bg-transparent text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 inline-flex items-center justify-center h-8 w-8"
                aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button> --}}
        </div>
        <div>
            <p>{{ session('success') }}</p>
        </div>
    </div>

    <script>
        document.getElementById('toast').addEventListener('click', function() {
            this.classList.add('fade-out');
            setTimeout(() => {
                this.remove();
            }, 500); // Durasi transisi harus sesuai dengan yang diatur di CSS
        });
    </script>
@endif
