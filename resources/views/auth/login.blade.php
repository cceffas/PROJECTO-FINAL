@extends('layouts.main')

@section('content')

    <div class="flex w-full items-center justify-center h-screen  bg-gray-200">

        <x-bladewind::card>

            <form class="flex flex-col gap-4 min-h-96 min-w-96" method="post" action="/logar">

                @csrf

                <div class="flex flex-col items-center justify-center gap-2">
                    <h1><i class='bi-person-circle  text-gray-500 text-7xl'></i></h1>
                    <p class='text-gray-500 text-base'>Iniciar sessão</p>
                </div>
                <!-- end -->

                <div class="flex flex-col">
                    <x-bladewind::input type="text" name='nome' autofocus label="Nome usuario" required />
                    {{-- end --}}
                    <x-bladewind::input type="password" viewable name='senha' label="Senha" required />
                </div>
                <!-- end -->
          
                <div class="container-row">
                    <x-bladewind::checkbox name="lembrar" label='lembrar' value='true' />
                </div>
                <!-- end -->

                @if (session()->has('error'))
                    <x-bladewind::alert type="error"> {{ session()->get('error') }}</x-bladewind::alert>
                @endif
                <!-- end -->

                <div class="flex flex-col ">
                    <x-bladewind::button can_submit>
                        iniciar sessão
                    </x-bladewind::button>
                </div>
                <!-- end -->

            </form>

        </x-bladewind::card>

    </div>

@endsection
