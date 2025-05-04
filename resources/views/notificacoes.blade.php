@extends('layouts.App')






@section('content')
    <div class="mt-20 space-y-10">

        {{-- first --}}
        <x-bladewind::card>
            <div class="flex justify-between items-center">
                <h1 class="uppercase text-gray-500"><i class="bi-bell-fill"></i>Notificações</h1>

                <x-bladewind::button type='secondary' tag='a' href='/back'>voltar</x-bladewind::button>

            </div>
        </x-bladewind::card>
        {{-- end title section --}}

        <div class='flex flex-col gap-2'>


            @foreach ($notifications as $notification)
                <x-bladewind::alert showCloseIcon='false'>
                    {{ $notification->tipo }}
                    <div class='flex justify-between items-center'>

                        <p>{{ $notification->descricao }}</p>
                        <p>{{ $notification->created_at }}</p>

                    </div>
                </x-bladewind::alert>
            @endforeach
        </div>

    </div>
@endsection
