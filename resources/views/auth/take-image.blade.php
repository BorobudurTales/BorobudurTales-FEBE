<x-guest-layout>
    @php
        $activeStep = $activeStep ?? 1;
        $totalSteps = 5;
    @endphp

    <div class="w-full max-w-screen-md mx-auto mt-12 mb-12 px-4 md:px-0">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold relative inline-block">
                <span class="bg-gradient-to-r from-[#384052] via-[#d4b64c] to-[#d4b64c] text-transparent bg-clip-text">
                    Temukan Kisahmu
                </span>
                <span class="block w-32 h-1 bg-[#fff3c4] mx-auto mt-2 rounded"></span>
            </h2>
        </div>

        <div id="camera-container"
            class="border-2 border-dotted border-yellow-400 px-6 py-8 transition-all duration-300">
            <div id="preview-container" class="text-center hidden mb-6">
                <img id="preview" class="w-full max-w-md max-h-96 rounded-xl object-contain mx-auto" alt="Preview">
                <div>
                    <button type="button" id="remove-btn"
                        class="text-red-500 hover:text-red-700 text-xl font-bold">&times;</button>

                </div>
            </div>

            <div id="camera-placeholder" class="cursor-pointer" onclick="startCamera()">
                <div class="flex flex-col items-center text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7h2l1-2h10l1 2h2a2 2 0 012 2v10a2 2 0 01-2 2H3a2 2 0 01-2-2V9a2 2 0 012-2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 13a3 3 0 100-6 3 3 0 000 6z" />
                    </svg>
                    <p class="text-sm font-semibold mt-2">Ambil Gambar</p>
                    <p class="text-xs text-gray-400 text-center">Silahkan jepret gambar relief yang anda temukan</p>
                </div>
            </div>

            <video id="video" autoplay class="rounded-xl max-h-96 w-full object-contain hidden mt-4"></video>

            <canvas id="canvas" class="hidden"></canvas>

            <button id="predict-btn" type="button"
                class="block w-1/2 mx-auto mt-6 bg-yellow-300 text-white font-semibold py-2 rounded-lg text-center transition cursor-not-allowed pointer-events-none"
                disabled>
                Prediksi
            </button>
        </div>

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
        const totalSteps = 4;
        let video = null;
        let canvas = null;
        let preview = null;
        let hasCaptured = false;
        let cameraActive = false;

        document.addEventListener('DOMContentLoaded', () => {
            setStep(2);

            const predictBtn = document.getElementById('predict-btn');

            predictBtn.addEventListener('click', () => {
                if (cameraActive && !hasCaptured) {
                    takePicture(); 
                } else if (hasCaptured) {
                    setStep(4);
                }
            });

            document.getElementById('remove-btn').addEventListener('click', () => {
                canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height);
                preview.src = '';
                preview.classList.add('hidden');
                document.getElementById('preview-container').classList.add('hidden');
                document.getElementById('camera-placeholder').classList.remove('hidden');
                hasCaptured = false;
                cameraActive = false;
                setStep(2);

                updatePredictButton(false, 'Prediksi');
            });
        });

        function setStep(activeStep) {
            for (let i = 1; i <= totalSteps; i++) {
                const step = document.getElementById('step-' + i);
                if (!step) continue;

                step.className = 'w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm';

                if (i < activeStep) {
                    step.classList.add('bg-yellow-400', 'text-white');
                } else if (i === activeStep) {
                    step.classList.add('bg-yellow-500', 'text-white');
                } else {
                    step.classList.add('border', 'border-gray-300', 'text-gray-600', 'bg-white');
                }

                const line = step.parentElement.querySelector('div.flex-grow');
                if (line) {
                    if (i < activeStep) {
                        line.classList.remove('bg-gray-300');
                        line.classList.add('bg-yellow-400');
                    } else {
                        line.classList.remove('bg-yellow-400');
                        line.classList.add('bg-gray-300');
                    }
                }
            }
        }

        function startCamera() {
            video = document.getElementById('video');
            canvas = document.getElementById('canvas');
            preview = document.getElementById('preview');

            document.getElementById('camera-placeholder').classList.add('hidden');
            video.classList.remove('hidden');

            navigator.mediaDevices.getUserMedia({
                    video: true
                })
                .then((stream) => {
                    video.srcObject = stream;
                    cameraActive = true;
                    setStep(2);
                    updatePredictButton(true, 'Ambil Gambar');
                })
                .catch((err) => {
                    alert("Tidak bisa mengakses kamera: " + err.message);
                    document.getElementById('camera-placeholder').classList.remove('hidden');
                    video.classList.add('hidden');
                });
        }

        function takePicture() {
            if (!video) return;

            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            canvas.getContext('2d').drawImage(video, 0, 0);

            const imageDataURL = canvas.toDataURL('image/png');
            preview.src = imageDataURL;
            preview.classList.remove('hidden');
            video.classList.add('hidden');
            document.getElementById('preview-container').classList.remove('hidden');

            if (video.srcObject) {
                video.srcObject.getTracks().forEach(track => track.stop());
            }

            hasCaptured = true;
            cameraActive = false;
            setStep(3);
            updatePredictButton(true, 'Prediksi');
        }

        function updatePredictButton(enable, labelText) {
            const predictBtn = document.getElementById('predict-btn');
            predictBtn.disabled = !enable;

            if (enable) {
                predictBtn.classList.remove('cursor-not-allowed', 'pointer-events-none', 'bg-yellow-300');
                predictBtn.classList.add('bg-yellow-500', 'hover:bg-yellow-600');
            } else {
                predictBtn.classList.add('cursor-not-allowed', 'pointer-events-none', 'bg-yellow-300');
                predictBtn.classList.remove('bg-yellow-500', 'hover:bg-yellow-600');
            }

            predictBtn.innerText = labelText;
        }
    </script>
</x-guest-layout>
