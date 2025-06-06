<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="w-full px-4 py-12 mx-auto mt-12 md:px-6">
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
        <div class="max-w-screen-lg p-6 mx-auto bg-white border shadow-lg rounded-xl">
            <div id="camera-container"
                class="px-6 py-8 transition-all duration-300 border-2 border-gray-300 border-dashed rounded-lg">
                <div id="preview-container" class="hidden mb-6 text-center">
                    <img id="preview" class="object-contain w-full max-w-md mx-auto max-h-96 rounded-xl" alt="Preview">
                    <div>
                        <button type="button" id="remove-btn"
                            class="text-xl font-bold text-red-500 hover:text-red-700">&times;</button>

                    </div>
                </div>

                <div id="camera-placeholder" class="cursor-pointer" onclick="startCamera()">
                    <div class="flex flex-col items-center text-gray-500">
                        <img src="{{ asset('img/camera.svg') }}" alt="">
                        <p class="mt-2 text-sm font-semibold">Ambil Gambar</p>
                        <p class="text-xs text-center text-gray-400">Silahkan jepret gambar relief yang anda temukan</p>
                    </div>
                </div>

                <video id="video" autoplay class="hidden object-contain w-full mt-4 rounded-xl max-h-96"></video>

                <canvas id="canvas" class="hidden"></canvas>

            </div>
            <div class="mt-4 text-center">
                <form id="camera-form" method="POST" action="{{ route('upload.image.analyze') }}">
                    @csrf
                    <input type="hidden" name="camera_image" id="camera_image">
                    <button type="button" id="predict-btn"
                        class="w-1/3 py-2 font-semibold text-white transition duration-200 bg-yellow-600 rounded-md hover:bg-yellow-500">Prediksi</button>
                </form>
            </div>
        </div>
    </div>
    <div id="loading-overlay" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-40">
        <svg class="w-10 h-10 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24">
            <circle class="opacity-75" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2">
            </circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
        </svg>
    </div>
    <x-users.step :activeStep="2" :totalSteps="3" />

    <script>
        const totalSteps = 3;
        let video = null;
        let canvas = null;
        let preview = null;
        let hasCaptured = false;
        let cameraActive = false;
        const loadingOverlay = document.getElementById('loading-overlay');

        document.addEventListener('DOMContentLoaded', () => {
            setStep(2);

            const predictBtn = document.getElementById('predict-btn');
            predictBtn.addEventListener('click', () => {
                // e.preventDefault();
                if (cameraActive && !hasCaptured) {
                    //  e.preventDefault();
                    takePicture();
                    updatePredictButton(true, 'Prediksi');
                } else if (hasCaptured) {
                    setStep(3);
                    predictBtn.disabled = true;
                    predictBtn.classList.add('opacity-60', 'cursor-not-allowed');
                    predictBtn.textContent = 'Memproses...';
                    document.getElementById('camera-form').submit();
                    loadingOverlay.classList.remove('hidden');
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
                    video: {
                        facingMode: {
                            exact: "environment"
                        } // coba akses kamera belakang
                    }
                })
                .then((stream) => {
                    video.srcObject = stream;
                    cameraActive = true;
                    setStep(2);
                    updatePredictButton(true, 'Ambil Gambar');
                })
                .catch((err) => {
                    console.warn("Kamera belakang tidak tersedia, coba kamera depan:", err.message);
                    navigator.mediaDevices.getUserMedia({
                            video: {
                                facingMode: "user"
                            }
                        })
                        .then((stream) => {
                            video.srcObject = stream;
                            cameraActive = true;
                            setStep(2);
                            updatePredictButton(true, 'Ambil Gambar');
                        })
                        .catch((fallbackErr) => {
                            alert("Tidak bisa mengakses kamera: " + fallbackErr.message);
                            document.getElementById('camera-placeholder').classList.remove('hidden');
                            video.classList.add('hidden');
                        });
                });
        }

        function takePicture() {
            if (!video) return;

            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            canvas.getContext('2d').drawImage(video, 0, 0);

            const imageDataURL = canvas.toDataURL('image/png');
            document.getElementById('camera_image').value = imageDataURL;
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
</x-app-layout>
