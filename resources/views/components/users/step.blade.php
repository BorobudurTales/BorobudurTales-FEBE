@props(['activeStep' => 1, 'totalSteps' => 3])

<div class="flex justify-center w-full mb-4">
    <div class="flex items-center">
        @for ($i = 1; $i <= $totalSteps; $i++)
            <div class="flex items-center">
                <div
                    class="w-8 h-8 rounded-full flex items-center justify-center font-bold
                    @if ($i == $activeStep && $i == $totalSteps)
                        bg-green-500 text-white
                    @elseif ($i == $activeStep)
                        bg-amber-400 text-white
                    @elseif ($i < $activeStep && $i == $totalSteps)
                        bg-green-500 text-white
                    @elseif ($i < $activeStep)
                        bg-amber-400 text-white
                    @else
                        border border-gray-300 text-gray-600
                    @endif
                ">
                    @if ($i < $totalSteps)
                        {{ $i }}
                    @else
                        &#10003;
                    @endif
                </div>

                @if ($i < $totalSteps)
                    <div
                        class="w-10 h-1 mx-1
                        @if ($i < $activeStep) bg-amber-400
                        @else bg-gray-300 @endif">
                    </div>
                @endif
            </div>
        @endfor
    </div>
</div>
