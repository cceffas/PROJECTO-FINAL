@extends('layouts.App')
@section('content')
    <div class=" mt-20 space-y-10">

        <div>
            <x-bladewind::card>
                <x-bladewind::chart :data="$dados" title='Inscirções' />
            </x-bladewind::card>
        </div>
        {{-- grafico --}}
        <div class="flex flex-row flex-wrap w-full  gap-2">
            <x-bladewind::card has_shadow="true" class="grow">
                <div class="flex flex-col items-center justify-center p-2">
                    <x-bladewind::statistic number="{{ $alunos }}" label="total alunos">
                        <x-slot name="icon">
                            <i class="bi-people-fill text-2xl text-gray-500"></i>
                        </x-slot>
                    </x-bladewind::statistic>
                </div>
                {{-- end --}}
                <!-- end -->
            </x-bladewind::card>
            <!-- end -->
            <x-bladewind::card has_shadow="true" class="grow">
                <div class="flex flex-col items-center justify-center p-2">
                    <x-bladewind::statistic number="{{ $cursos }}" label="total cursos">
                        <x-slot name="icon">
                            <i class="bi-collection-fill text-2xl text-gray-500"></i>
                        </x-slot>
                    </x-bladewind::statistic>
                </div>
                <!-- end -->
            </x-bladewind::card>
            <!-- end -->
            <x-bladewind::card has_shadow="true" class="grow">
                <div class="flex flex-col items-center justify-center p-2">
                    <x-bladewind::statistic number="{{ $turmas }}" label="total Turmas">
                        <x-slot name="icon">
                            <i class="bi-door-closed-fill text-2xl text-gray-500"></i>
                        </x-slot>
                    </x-bladewind::statistic>
                </div>
            </x-bladewind::card>
            <!-- end -->
            <x-bladewind::card has_shadow="true" class="grow">
                <div class="flex flex-col items-center justify-center p-2">
                    <x-bladewind::statistic number="{{ $instrutores }}" label="total instrutores">
                        <x-slot name="icon">
                            <i class="bi-people-fill text-2xl text-gray-500"></i>
                        </x-slot>
                    </x-bladewind::statistic>
                </div>
            </x-bladewind::card>
            <!-- end -->
        </div>
        {{-- end header --}}

    </div>
@endsection
