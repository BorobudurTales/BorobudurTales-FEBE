<x-guest-layout>
    @php
        $activeStep = $activeStep ?? 1;
        $totalSteps = 5;
    @endphp

    <div class="w-full max-w-screen-xl mx-auto mt-12 px-4 md:px-20">
        {{-- Judul --}}
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold relative inline-block">
                <span class="bg-gradient-to-r from-[#384052] via-[#d4b64c] to-[#d4b64c] text-transparent bg-clip-text">
                    Temukan Kisahmu
                </span>
                <span class="block w-32 h-1 bg-[#fff3c4] mx-auto mt-2 rounded"></span>
            </h2>
        </div>

        <div class="bg-white shadow-md rounded-xl p-8">
            <h3 class="text-2xl font-semibold text-yellow-500 mb-4">Killing Living</h3>
            <div class="flex flex-col md:flex-row gap-6">
                <div class="flex-shrink-0">
                    <img src="{{ asset('images/relief.png') }}" alt="Relief"
                        class="w-full md:w-96 rounded-md grayscale">
                    <p class="mt-4 text-lg text-gray-700 font-medium">
                        Tingkat Akurasi : <span class="text-yellow-500 font-bold">89%</span>
                    </p>
                </div>
                <div class="text-gray-600 text-justify space-y-4">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pisum auctor ligula in ante
                        convallis,
                        ac dictum nisl mattis. Integer facilisis, urna eu faucibus lacinia, nisi mauris ultrices
                        lacus,
                        ac elementum tellus lacus sed justo.
                    </p>
                    <p>
                        Fusce ut pulvinar nisl. Nullam blandit felis sed posuere posuere. Aliquam erat volutpat.
                        Pisum
                        fermentum, sapien a tincidunt consequat, risus orci tristique justo, at porta lorem justo
                        sit
                        amet erat.
                    </p>
                    <p>
                        Cras et erat vel arcu cursus commodo nec nec leo. Sed ac nulla in risus rhoncus lacinia.
                    </p>
                </div>
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('result.scan') }}"
                    class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 px-6 rounded-full shadow-md transition">
                    Scan Relief Baru
                </a>
            </div>
        </div>

        <div class="mt-10 flex justify-center gap-6">
            @for ($i = 1; $i <= 4; $i++)
                <div
                    class="w-10 h-10 flex items-center justify-center border-2 border-yellow-400 rounded-full text-yellow-500 font-bold">
                    {{ $i }}
                </div>
            @endfor
            <div class="w-10 h-10 flex items-center justify-center bg-green-500 text-white rounded-full">
                ✓
            </div>
        </div>
    </div>
</x-guest-layout>
