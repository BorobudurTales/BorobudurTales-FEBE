<x-app-layout>
    <div class="flex flex-col items-center justify-center w-full max-w-screen-xl px-6 py-6 bg-white">
        <x-users.header />

        <div class="w-full px-5 py-5 mx-auto mb-10 space-y-4 bg-white border shadow-lg rounded-xl">
            <p class="text-sm text-center text-amber-600">
                Silahkan pilih di bawah ini untuk menemukan cerita dari relief
            </p>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <a href="{{ route('upload.image') }}">
                    <div class="flex flex-col items-center justify-center h-56 w-full border-2 border-gray-200 border-dashed rounded-xl hover:bg-gradient-to-r from-[#FFEDB0] to-[#CECECE] transition-all">
                        <img src="{{ asset('img/img.svg') }}" alt="" class="w-16 h-16 mx-auto mb-2">
                        <div class="font-semibold text-yellow-500">Unggah Gambar</div>
                        <div class="text-xs text-gray-400">Format mendukung jpg, jpeg, png</div>
                    </div>
                </a>

                <a href="{{ route('upload.camera') }}">
                    <div class="flex flex-col items-center justify-center h-56 w-full border-2 border-gray-200 border-dashed rounded-xl hover:bg-gradient-to-r from-[#FFEDB0] to-[#CECECE] transition-all">
                        <img src="{{ asset('img/camera.svg') }}" alt="" class="w-16 h-16 mx-auto mb-2">
                        <div class="font-semibold text-yellow-500">Ambil Gambar</div>
                        <div class="text-xs text-gray-400">Silahkan jepret gambar relief yang anda temukan</div>
                    </div>
                </a>
            </div>
        </div>

        <x-users.step :activeStep="1" :totalSteps="3" />
    </div>
</x-app-layout>
