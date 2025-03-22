@extends('layouts.main')








@section('content')

<div class="h-80 w-100 center">


    <x-bladewind::card>


        <form class="container-column g-16">
            <div class="container-column center">
                <i class="bi-person-circle text-gray-500 f-6x"></i>
                <h1 class="text-gray-500">Matricular aluno</h1>
            </div>
            <!-- end -->
            <div class="container-row g-16">
                <x-bladewind::input label="nome" required />
                <x-bladewind::input label="apelido" />
            </div>
            <!-- end -->
            <div class="container-row g-16">
                <x-bladewind::datepicker label="data de nascimento" required />
                <x-bladewind::input label="telefone" type="tel" />
            </div>
            <!-- end -->
            <x-bladewind::filepicker required placeholder="selecion um ficheiro" />


            <!-- end -->
            <div class="container-row g-16">
                <div class="grow"></div>
                <x-bladewind::button color='red' onclick="backPage()">cancelar</x-bladewind::button>

                <x-bladewind::button color='green'>matricular</x-bladewind::button>
            </div>




        </form>
    </x-bladewind::card>

</div>
@endsection