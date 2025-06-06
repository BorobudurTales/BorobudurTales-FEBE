<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="w-full max-w-screen-xl px-4 py-12 mx-auto mt-12 md:px-20">

        <div class="p-8 bg-white border shadow-lg rounded-xl">
            <h3 class="mb-4 text-3xl font-semibold text-center text-yellow-500"> {{ $data['tema'] }}
            </h3>
            <div class="">
                <div class="text-center">
                    <img src="{{ asset('uploads/' . $uploadedImage) }}" alt="Relief"
                        class="w-full mx-auto rounded-md md:w-96">
                    <div x-data="{ percent: 0 }" x-init="let target = {{ number_format($data['similarity'] * 100, 2) }};
                    let interval = setInterval(() => {
                        if (percent < target) {
                            percent += 0.5;
                        } else {
                            percent = target;
                            clearInterval(interval);
                        }
                    }, 15);" class="mt-4">
                        <p class="mb-1 text-lg font-medium text-gray-700">
                            Tingkat Akurasi: <span class="font-bold text-yellow-500"
                                x-text="percent.toFixed(2) + '%'"></span>
                        </p>
                        <div class="h-4 mx-auto overflow-hidden bg-gray-200 rounded-full w-44">
                            <div class="h-full transition-all duration-500 bg-yellow-500"
                                :style="'width:' + percent + '%'">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 space-y-4 text-justify text-gray-500">
                    <p>
                        {{ $data['narasi'] }}
                    </p>
                    <div class="p-4 text-center rounded-md bg-amber-100">
                        <p class="text-lg italic text-gray-400 text-semibold">~ Moral Cerita ~</p>
                        <p>
                            {{ $data['makna_moral'] }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('upload') }}"
                    class="inline-block px-6 py-3 font-semibold text-white transition bg-yellow-500 rounded-full shadow-md hover:bg-yellow-600">
                    Scan Relief Baru
                </a>
            </div>
        </div>
        <div class="mt-8">
            <x-users.step :activeStep="3" :totalSteps="3" />
        </div>
    </div>
</x-app-layout>
