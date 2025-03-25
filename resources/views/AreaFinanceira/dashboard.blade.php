<x-screen>


    <div class="flex flex-row flex-wrap w-full  gap-2">

        <x-bladewind::card has_shadow="true" class="grow">


            <div class="flex flex-col items-center justify-center p-2">
                <x-bladewind::statistic number="657" label="total alunos">
                    <x-slot name="icon">
                        <i class="bi-people-fill text-2xl text-gray-500"></i>
                    </x-slot>
                </x-bladewind::statistic>
            </div>
            {{-- end --}}

            <x-bladewind::horizontal-line-graph label="Masculinos" percentage="55" />
            <!-- end -->
            <x-bladewind::horizontal-line-graph label="femeninos" percentage="55" color="red" />
            <!-- end -->
            <x-bladewind::horizontal-line-graph label="desempenho" percentage="35" color="yellow" />
            <!-- end -->

        </x-bladewind::card>
        <!-- end -->
        <x-bladewind::card has_shadow="true" class="grow">


            <div class="flex flex-col items-center justify-center p-2">
                <x-bladewind::statistic number="7" label="total cursos">
                    <x-slot name="icon">
                        <i class="bi-collection-fill text-2xl text-gray-500"></i>
                    </x-slot>
                </x-bladewind::statistic>
            </div>
            {{-- end --}}
            <x-bladewind::horizontal-line-graph label="Masculinos" percentage="55" />
            <!-- end -->
            <x-bladewind::horizontal-line-graph label="femeninos" percentage="55" color="red" />
            <!-- end -->
            <x-bladewind::horizontal-line-graph label="desempenho" percentage="35" color="yellow" />
            <!-- end -->

        </x-bladewind::card>
        <!-- end -->
        <x-bladewind::card has_shadow="true" class="grow">


            <div class="flex flex-col items-center justify-center p-2">
                <x-bladewind::statistic number="16" label="total Turmas">
                    <x-slot name="icon">
                        <i class="bi-door-closed-fill text-2xl text-gray-500"></i>
                    </x-slot>
                </x-bladewind::statistic>
            </div>
            {{-- end --}}

            <x-bladewind::horizontal-line-graph label="Masculinos" percentage="55" />
            <!-- end -->
            <x-bladewind::horizontal-line-graph label="femeninos" percentage="55" />
            <!-- end -->

        </x-bladewind::card>
        <!-- end -->
        <x-bladewind::card has_shadow="true" class="grow">


            <div class="flex flex-col items-center justify-center p-2">
                <x-bladewind::statistic number="8" label="total instrutores">
                    <x-slot name="icon">
                        <i class="bi-people-fill text-2xl text-gray-500"></i>
                    </x-slot>
                </x-bladewind::statistic>
            </div>
            {{-- end --}}

            <x-bladewind::horizontal-line-graph label="Masculinos" percentage="55" />
            <!-- end -->
            <x-bladewind::horizontal-line-graph label="femeninos" percentage="55" />
            <!-- end -->

        </x-bladewind::card>
        <!-- end -->

    </div>
    {{-- end header --}}


    <div class="flex flex-col w-full grow">

        <x-bladewind.card>
            <div class="flex">
                <canvas id="chart"  class="w-full"></canvas>
            </div>
        </x-bladewind.card>
        {{-- grafico --}}
    </div>
    {{-- end content --}}

    @php

        $months = [3, 3, 43, 45, 44, 23, 23, 89, 54];

        function getItemArray($array)
        {
            $count = 0;
            $limit = sizeof($array);

            foreach ($array as $item) {
                if ($count < $limit - 1) {
                    echo $item . ',';
                } else {
                    echo $item;
                }
                $count++;
            }
        }
    @endphp


    <script>
        var ctx = document.getElementById("chart").getContext('2d')



        var graph = new Chart(ctx, {
            type: "line",
            data: {
                labels: ["jan", "fev", "mar", "abr", "mai", "jun", "jul", "Ago", "set", "out", "nov", "dez"],
                datasets: [{
                    label: ['Alunos'],

                    data: [{{ getItemArray($months) }}],
                    // backgroundColor,
                    // borderColor:['red'],
                    borderWith: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginZero: true
                    }
                }
            }
        });
    </script>



</x-screen>
