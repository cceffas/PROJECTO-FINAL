@extends('layouts.main')

@section('content')

<div class="flex center p-8 w-100 h-screen">

    <form class="panel container-column box p-16 r-8 g-16" method="post" action="/logar">

        @csrf

        <div class="container-column center">
            <h1><i class='bi-person-circle  f-5x'></i></h1>
            <p class='f-1x'>Iniciar sessão</p>
        </div>
        <!-- end -->

        <div class="container-column">
            <x-bladewind::input type="text" name='nome' autofocus label="Nome usuario" required />
        </div>
        <!-- end -->
        <div class="container-column">
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

        <div class="container-column">
            <x-bladewind::button can_submit>
                iniciar sessão
            </x-bladewind::button>
        </div>
        <!-- end -->

    </form>

</div>
@endsection