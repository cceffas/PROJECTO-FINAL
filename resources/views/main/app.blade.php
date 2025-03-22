@extends('layouts.main')


{{-- @section('header')
    <header class=" layer-full flex center space-b p-8">

        <div class=" flex justify-center item-center p-2 r-8">
            <h1 class="bg-blue-500 text-white p-2 r-8">S</h1>
            <p class="text-blue-600 center">GCSC</p>
        </div>

        <div class="flex a-center g-16">

            <x-bladewind::avatar image="vendor/images/avatar.png" dotted="true" dot_position='top' dot_color="green"
                label="SG" bg_color="blue" size="medium" />

        </div>
        <!-- <x-bladewind::dropmenu>
                    <x-bladewind::dropmenu-item>perfil</x-bladewind::dropmenu-item>
                    <x-bladewind::dropmenu-item>definicoes</x-bladewind::dropmenu-item>
                    <x-bladewind::dropmenu-item><a href="/login">sair</a></x-bladewind::dropmenu-item>

                </x-bladewind::dropmenu> -->

    </header>
@endsection
<!-- end header --> --}}



@section('content')
    <div class="container-row grow w-100">
 
        <x-Asidebar screen="#view-port" />
        {{-- end --}}
        <section class="screen flex grow w-100 g-8 p-8 bg-white" id="view-port">

            {{-- area onde o conteudo sera exibido --}}
            @include('AreaFinanceira.dashboard')
        </section>

    </div>
@endsection
<!-- end -->
