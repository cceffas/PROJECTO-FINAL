@extends('layouts.main')
@section('content')
<div class="flex w-full items-center justify-center h-screen bg-slate-200">
    {{-- end --}}
    <x-bladewind::card>
            <x-bladewind::card has_shadow=true class='rounded-none'>
                <form class="flex flex-col gap-4 min-h-96 min-w-96" method="post" action='/entrar'>
                    @csrf
                    <!-- end -->
                    <div class="flex flex-col items-center gap-2 text-slate-500">
                          <h1 class="font-bold text-3xl p-2 flex justify-center items-center bg-blue-500 rounded-full text-white">G+</h1>
                        <h1>iniciar sessão</h1>
                    </div>
                    <div class="flex flex-col">
                        <x-bladewind::input type="text" name='nome' autofocus label="Nome do usuario" id='any-text' />
                        {{-- end --}}
                        <x-bladewind::input type="password" viewable name='senha' label='Senha' />
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
                    <div class="flex flex-col ">
                        <x-bladewind::button can_submit>
                            entrar
                        </x-bladewind::button>
                    </div>
                    <!-- end -->
                </form>
            </x-bladewind::card>
        </div>
    </x-bladewind::card>
</div>
{{-- end --}}
@endsection
