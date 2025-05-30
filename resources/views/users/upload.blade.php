<x-guest-layout>
    <div x-data="{ step: 1, method: null }" class="min-h-screen flex flex-col items-center justify-center bg-white px-4 py-10">

        <div class="text-center mb-10">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800">
                Temukan <span class="text-yellow-500">Kisah</span><span class="text-gray-500">mu</span>
            </h1>
            <div class="mt-2 w-28 h-1 bg-yellow-400 mx-auto rounded-full"></div>
        </div>

        <div x-show="step === 1" class="bg-white shadow-lg rounded-xl p-6 w-full max-w-4xl transition">
            <p class="text-yellow-600 text-center font-medium mb-8 text-lg">
                Silahkan pilih di bawah ini untuk menemukan cerita dari relief
            </p>

            <div class="flex flex-col md:flex-row justify-center items-center gap-6">
                <button @click="method = 'upload'; step = 2"
                    class="cursor-pointer border-2 border-dashed border-yellow-300 p-8 rounded-lg text-center w-full md:w-1/2 hover:shadow-md transition duration-300">
                    <img src="https://img.icons8.com/ios-filled/50/CCCC66/image.png" class="mx-auto mb-4"
                        alt="Upload">
                    <p class="font-semibold text-gray-600">Unggah Gambar</p>
                    <p class="text-sm text-gray-500">Format mendukung jpg, jpeg, png</p>
                </button>

                <p class="text-gray-500 font-semibold">atau</p>

                <button @click="method = 'camera'; step = 2"
                    class="cursor-pointer border-2 border-dashed border-yellow-300 p-8 rounded-lg text-center w-full md:w-1/2 hover:shadow-md transition duration-300">
                    <img src="https://img.icons8.com/ios-filled/50/999999/camera.png" class="mx-auto mb-4"
                        alt="Camera">
                    <p class="font-semibold text-gray-600">Ambil Gambar</p>
                    <p class="text-sm text-gray-500">Silahkan ambil gambar relief yang anda temukan</p>
                </button>
            </div>
        </div>

        <div x-show="step === 2 && method === 'upload'" class="bg-white shadow-lg rounded-xl p-6 w-full max-w-5xl"
            x-data="{ preview: null }">
            <h2 class="text-center text-xl font-semibold text-gray-800 mb-4">Unggah Gambar</h2>

            <label for="fileInput"
                class="block border-dashed border-2 border-gray-300 bg-gray-50 p-12 text-center rounded-lg cursor-pointer w-full">
                <img src="https://img.icons8.com/ios/50/999999/folder-invoices--v1.png" class="mx-auto mb-2" />
                <p class="text-gray-500">Seret Gambar / Unggah Gambar</p>
                <input type="file" id="fileInput" class="hidden" accept="image/*"
                    @change="const file = $event.target.files[0]; if (file) { preview = URL.createObjectURL(file); }" />
            </label>

            <template x-if="preview">
                <img :src="preview" class="mt-4 mx-auto rounded-lg max-h-64 object-contain" />
            </template>

            <button class="mt-6 w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600 transition">
                Prediksi
            </button>
        </div>


        <!-- Step 2B: Ambil Gambar -->
        <div x-show="step === 2 && method === 'camera'" x-data="{ stream: null, photo: null }" x-init="navigator.mediaDevices.getUserMedia({ video: true })
            .then(s => { stream = s;
                $refs.video.srcObject = s; })
            .catch(e => alert('Gagal mengakses kamera: ' + e.message));"
            class="bg-white shadow-lg rounded-xl p-6 w-full max-w-3xl">

            <h2 class="text-center text-xl font-semibold text-gray-800 mb-4">Ambil Gambar</h2>

            <div class="flex justify-center mb-4">
                <template x-if="!photo">
                    <video x-ref="video" autoplay playsinline class="rounded-lg w-full max-w-md"></video>
                </template>
                <template x-if="photo">
                    <img :src="photo" class="rounded-lg w-full max-w-md" />
                </template>
            </div>

            <div class="flex justify-center gap-4">
                <button
                    @click="
                    const canvas = document.createElement('canvas');
                    canvas.width = $refs.video.videoWidth;
                    canvas.height = $refs.video.videoHeight;
                    const ctx = canvas.getContext('2d');
                    ctx.drawImage($refs.video, 0, 0);
                    photo = canvas.toDataURL('image/png');
                "
                    class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                    Ambil Gambar
                </button>

                <button x-show="photo" @click="photo = null"
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                    Ulangi
                </button>
            </div>

            <button class="mt-6 w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600 transition">
                Prediksi
            </button>
        </div>

        <!-- Step Indicator -->
        <div class="flex justify-center mt-10 space-x-4">
            <template x-for="i in 5" :key="i">
                <div class="flex items-center justify-center w-10 h-10 rounded-full border-2"
                    :class="{
                        'bg-yellow-500 border-yellow-500 text-white': i === step,
                        'border-gray-300 text-gray-500': i !== step
                    }">
                    <template x-if="i < 5">
                        <span x-text="i"></span>
                    </template>
                    <template x-if="i === 5">
                        &#10003;
                    </template>
                </div>
            </template>
        </div>
    </div>
</x-guest-layout>
