<x-guest-layout>
    @php
        $activeStep = $activeStep ?? 1;
        $totalSteps = 5;
    @endphp

    <div class="w-full max-w-screen-xl mx-auto mt-12 mb-12 px-4 md:px-20">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold relative inline-block">
                <span class="bg-gradient-to-r from-[#384052] via-[#d4b64c] to-[#d4b64c] text-transparent bg-clip-text">
                    Temukan Kisahmu
                </span>
                <span class="block w-32 h-1 bg-[#fff3c4] mx-auto mt-2 rounded"></span>
            </h2>
        </div>

        <form action="{{ route('upload.image.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="bg-white rounded-xl shadow-md p-6 w-full">
                <div id="drop-zone"
                    class="border-2 border-dashed border-gray-300 rounded-lg bg-gray-100 p-10 flex flex-col items-center justify-center text-gray-600 w-full cursor-pointer transition duration-200 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 mb-3 text-gray-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M3 6a2 2 0 012-2h5l2 2h9a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V6z" />
                    </svg>
                    <p class="text-sm">Seret Gambar / Unggah Gambar</p>
                    <input type="file" name="image" class="hidden" id="image-upload" accept="image/*" required>
                </div>

                <div id="preview-container" class="hidden text-center mt-4">
                    <div class="flex justify-center items-center gap-4">
                        <img id="preview-img" src="" class="w-24 rounded shadow">
                        <div>
                            <p id="file-name" class="text-sm text-gray-700"></p>
                            <button type="button" id="remove-image"
                                class="text-red-500 hover:text-red-700 text-xl font-bold">&times;</button>
                        </div>
                    </div>
                </div>

                <button id="prediksi-button" type="submit"
                    class="block w-1/3 mx-auto mt-6 bg-yellow-300 text-white font-semibold py-2 rounded-lg text-center transition cursor-not-allowed pointer-events-none">
                    Prediksi
                </button>
            </div>
        </form>

        <div class="flex items-center w-full max-w-md justify-between mx-auto mt-10 " id="step-indicator">
            @for ($i = 1; $i <= $totalSteps; $i++)
                <div class="flex items-center w-full">
                    <div id="step-{{ $i }}"
                        class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm
                        @if ($i == $activeStep) bg-yellow-400 text-white
                        @elseif ($i < $activeStep)
                            bg-yellow-300 text-white
                        @else
                            border border-gray-300 text-gray-600 @endif">
                        {{ $i === $totalSteps ? '✓' : $i }}
                    </div>

                    @if ($i < $totalSteps)
                        <div
                            class="flex-grow h-1
                            @if ($i < $activeStep) bg-yellow-400
                            @else
                                bg-gray-300 @endif">
                        </div>
                    @endif
                </div>
            @endfor
        </div>
    </div>

    <script>
        const dropZone = document.getElementById('drop-zone');
        const fileInput = document.getElementById('image-upload');
        const previewContainer = document.getElementById('preview-container');
        const previewImg = document.getElementById('preview-img');
        const fileName = document.getElementById('file-name');
        const removeBtn = document.getElementById('remove-image');
        const prediksiBtn = document.getElementById('prediksi-button');
        const totalSteps = {{ $totalSteps }};
        const initialStep = {{ $activeStep }};

        document.addEventListener('DOMContentLoaded', () => {
            updateStepIndicator(2);

            const predictBtn = document.getElementById('predict-btn');
            predictBtn.addEventListener('click', () => {
                if (!hasCaptured && video && !video.classList.contains('hidden')) {
                    takePicture();
                } else {
                    setStep(4);
                    alert('Gambar telah dikirim untuk prediksi! (simulasi)');
                }
            });
        });

        dropZone.addEventListener('click', () => fileInput.click());

        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('border-yellow-500', 'bg-yellow-50');
        });

        dropZone.addEventListener('dragleave', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-yellow-500', 'bg-yellow-50');
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-yellow-500', 'bg-yellow-50');
            if (e.dataTransfer.files.length) {
                fileInput.files = e.dataTransfer.files;
                showPreview(e.dataTransfer.files[0]);
            }
        });

        fileInput.addEventListener('change', () => {
            if (fileInput.files.length) {
                showPreview(fileInput.files[0]);
            }
        });

        removeBtn.addEventListener('click', () => {
            fileInput.value = '';
            previewContainer.classList.add('hidden');
            dropZone.classList.remove('hidden');
            resetButton();
            updateStepIndicator(2);
        });

        function showPreview(file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImg.src = e.target.result;
                fileName.textContent = file.name;
                dropZone.classList.add('hidden');
                previewContainer.classList.remove('hidden');
                activateButton();
                updateStepIndicator(3);
            };
            reader.readAsDataURL(file);
        }

        function activateButton() {
            prediksiBtn.classList.remove('bg-yellow-300', 'cursor-not-allowed', 'pointer-events-none');
            prediksiBtn.classList.add('bg-yellow-500', 'hover:bg-yellow-600');
        }

        function resetButton() {
            prediksiBtn.classList.remove('bg-yellow-500', 'hover:bg-yellow-600');
            prediksiBtn.classList.add('bg-yellow-300', 'cursor-not-allowed', 'pointer-events-none');
        }

        function updateStepIndicator(activeStep) {
            for (let i = 1; i <= totalSteps; i++) {
                const step = document.getElementById('step-' + i);
                if (!step) continue;

                step.className = 'w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm';

                if (i < activeStep) {
                    step.classList.add('bg-yellow-300', 'text-white');
                } else if (i === activeStep) {
                    step.classList.add('bg-yellow-400', 'text-white');
                } else {
                    step.classList.add('border', 'border-gray-300', 'text-gray-600');
                }
            }

            for (let i = 1; i < totalSteps; i++) {
                const line = document.querySelector(`#step-${i}`).parentElement.querySelector('.flex-grow');
                if (line) {
                    line.classList.remove('bg-yellow-300', 'bg-yellow-400', 'bg-gray-300');
                    line.classList.add(i < activeStep ? 'bg-yellow-400' : 'bg-gray-300');
                }
            }
        }
        prediksiBtn.addEventListener('click', () => {
            if (!fileInput.files.length) return;

            updateStepIndicator(4);

            setTimeout(() => {
                prediksiBtn.closest('form').submit();
            }, 500); 
        });
    </script>
</x-guest-layout>
