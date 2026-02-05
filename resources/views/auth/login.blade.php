@extends('layouts.main')
@section('content')

    <div class="relative flex w-full items-center justify-center h-full  bg-slate-200">
        {{-- end --}}
        <div class="absolute left-0 top-0 w-full h-full opacity-5 z-0" id="particles-js"></div>

        <form
            class="flex flex-col gap-4 min-h-96 min-w-96 z-10 bg-white backdrop-blur p-8 rounded-md shadow-sm"
            method="post" action='/entrar'>
            @csrf
            <!-- end -->

            <div class="flex flex-col items-center gap-2 text-slate-600">
                <img src="{{ asset('icon.svg') }}" alt="logomark" class="size-16">

                <h1>iniciar sessão</h1>

            </div>
            {{-- end --}}

            <div class="flex flex-col">

                <x-bladewind::input type="text" name='nome' autofocus label="Nome do usuario" id='any-text' required />

                <x-bladewind::input type="password" viewable name='senha' label='Senha' required />

            </div>
            <!-- end -->
            <div class="container-row">
                <x-bladewind::checkbox name="lembrar" label='lembrar' value='true' label_css='text-gray-500' />
            </div>
            <!-- end -->
            @if (session()->has('error'))
                <x-bladewind::alert type="error"> {{ session()->get('error') }}</x-bladewind::alert>
            @endif
            <!-- end -->
            <div class="flex flex-col z-10">
                <x-bladewind::button can_submit name='login' has_spinner="true" onclick="showButtonSpinner('.login')">
                    entrar
                </x-bladewind::button>
            </div>
            <!-- end -->
        </form>


    </div>
    {{-- end --}}

@endsection
