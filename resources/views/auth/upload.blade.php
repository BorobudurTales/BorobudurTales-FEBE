<x-guest-layout>
    <div class="w-full max-w-screen-xl bg-white flex flex-col items-center justify-center px-6 py-12">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold relative inline-block">
                <span class="bg-gradient-to-r from-[#384052] via-[#d4b64c] to-[#d4b64c] text-transparent bg-clip-text">
                    Temukan Kisahmu
                </span>
                <span class="block w-32 h-1 bg-[#fff3c4] mx-auto mt-2 rounded"></span>
            </h2>
            <p class="mt-4 text-yellow-500 text-sm">
                Silahkan Pilih dibawah ini untuk menemukan cerita dari relief
            </p>
        </div>

        <div
            class="bg-white rounded-2xl shadow-md px-5 py-5 w-full max-w-[1000px] mx-auto flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-6 mb-10">
            <a href="{{ route('upload.image') }}"
                class="flex-1 border-2 border-dashed border-yellow-400 rounded-xl flex flex-col items-center justify-center h-48 hover:bg-yellow-50 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-yellow-500 mb-2" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 16l5-5a3 3 0 014 0l5 5M14 10l5 5m0 0v-6m0 6H9" />
                </svg>
                <div class="text-yellow-500 font-semibold">Unggah Gambar</div>
                <div class="text-gray-400 text-xs">Format mendukung jpg, jpeg, png</div>
            </a>

            <div class="text-gray-400 text-sm">atau</div>

            <a href="{{ route('upload.camera') }}"
                class="flex-1 border-2 border-dashed border-yellow-400 rounded-xl flex flex-col items-center justify-center h-48 hover:bg-yellow-50 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-yellow-500  mb-2" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7h4l1-2h8l1 2h4v13H3V7z" />
                    <circle cx="12" cy="13" r="4" />
                </svg>
                <div class="text-yellow-500 font-semibold">Ambil Gambar</div>
                <div class="text-gray-400 text-xs text-center px-2">
                    Silahkan jepret gambar relief yang anda temukan
                </div>
            </a>
        </div>

        @php
            $activeStep = 1;
            $totalSteps = 5;
        @endphp

        <div class="flex items-center w-full max-w-md justify-between">
            @for ($i = 1; $i <= $totalSteps; $i++)
                <div class="flex items-center w-full">
                    <div
                        class="w-8 h-8 rounded-full flex items-center justify-center font-bold
                        @if ($i == $activeStep) bg-yellow-400 text-white
                        @elseif ($i < $activeStep)
                            bg-yellow-300 text-white
                        @else
                            border border-gray-300 text-gray-600 @endif
                    ">
                        @if ($i < $totalSteps)
                            {{ $i }}
                        @else
                            &#10003;
                        @endif
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
</x-guest-layout>
