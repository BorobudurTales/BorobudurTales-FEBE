<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="w-full max-w-screen-xl px-4 py-12 mx-auto mt-12 md:px-20">
        <x-users.header />
        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 border border-red-300 rounded-lg">
                <ul class="pl-5 space-y-1 list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="uploadForm" action="{{ route('upload.image.analyze') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="w-full p-6 bg-white border shadow-md rounded-xl">
                <div id="drop-zone"
                    class="flex flex-col items-center justify-center w-full p-10 text-gray-600 transition duration-200 ease-in-out bg-gray-100 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mb-3 text-gray-500 w-14 h-14" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M3 6a2 2 0 012-2h5l2 2h9a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V6z" />
                    </svg>
                    <p class="text-sm">Unggah Gambar Anda</p>
                    <input type="file" name="image" id="image-upload" accept="image/*" class="hidden" required>
                </div>

                <div id="preview-container" class="hidden mt-4 text-center">
                    <div class="flex items-center justify-center gap-4">
                        <img id="preview-img" src="" class="w-32 rounded shadow">
                        <div class="flex items-center justify-center">
                            <p id="file-name" class="text-sm text-gray-700 md:text-lg"></p>
                            <button type="button" id="remove-image"
                                class="text-xl font-bold text-red-500 text-end hover:text-red-700">&times;</button>
                        </div>
                    </div>
                </div>

                <button id="prediksi-button" type="submit"
                    class="block w-1/3 py-2 mx-auto mt-6 font-semibold text-center text-white transition bg-yellow-600 rounded-lg hover:bg-yellow-500">
                    Prediksi
                </button>
            </div>
        </form>
    </div>
    <div id="loading-overlay" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-40">
        <div class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-e-transparent align-[-0.125em] text-surface motion-reduce:animate-[spin_1.5s_linear_infinite] text-white"
            role="status">
            <span
                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
        </div>
    </div>
    <x-users.step :activeStep="2" :totalSteps="3" />
    <script>
        const dropZone = document.getElementById('drop-zone');
        const inputFile = document.getElementById('image-upload');
        const previewContainer = document.getElementById('preview-container');
        const previewImage = document.getElementById('preview-img');
        const fileNameText = document.getElementById('file-name');
        const removeButton = document.getElementById('remove-image');
        const form = document.getElementById('uploadForm');
        const submitButton = document.getElementById('prediksi-button');
        const loadingOverlay = document.getElementById('loading-overlay');

        // Klik pada drop-zone membuka file picker
        dropZone.addEventListener('click', () => {
            inputFile.click();
        });

        // Saat file dipilih, tampilkan preview
        inputFile.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                const url = URL.createObjectURL(file);
                previewImage.src = url;
                fileNameText.textContent = file.name;
                previewContainer.classList.remove('hidden');
                dropZone.classList.add('hidden');
            }
        });

        // Hapus gambar & reset input
        removeButton.addEventListener('click', () => {
            inputFile.value = '';
            previewImage.src = '';
            fileNameText.textContent = '';
            previewContainer.classList.add('hidden');
            dropZone.classList.remove('hidden');
        });

        form.addEventListener('submit', () => {
            // e.preventDefault();
            submitButton.disabled = true;
            submitButton.classList.add('opacity-60', 'cursor-not-allowed');
            submitButton.textContent = 'Memproses...';
            loadingOverlay.classList.remove('hidden');
        });
    </script>
</x-app-layout>
