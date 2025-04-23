@extends('layouts.App')
@section('content')
<div class="mt-20 space-y-10">
    <x-bladewind::card>
        <div class="flex justify-between items-center">
            <h1 class="uppercase text-gray-500"><i class="bi-credit-card-fill"></i> Pagamentos</h1>
            <x-bladewind::button tag='a' type="secondary" href='/turmas/'>voltar</x-bladewind::button>
        </div>
    </x-bladewind::card>
    {{-- end --}}
    <x-bladewind::card>
        <form action="/pagamentos/" method="get">
            <h1 class="text-slate-500 mb-3">pesquise o aluno pelo nome e filtre por curso</h1>
            {{-- end --}}
            <x-bladewind::input prefix="<i class='bi-search'></i> " name='nome' />
            {{-- end --}}
            <div class="flex items-stretch justify-stretch gap-1">

                <livewire:select :options="$cursos" label='cursos' />
                    {{--
                    <x-bladewind::select :data="$turmas" label='turmas' /> --}}
            </div>
            {{-- end --}}
            <x-bladewind::button can_submit=true>pesquisar</x-bladewind::button>
        </form>
    </x-bladewind::card>
    {{-- end --}}
    {{-- end card pagamentos --}}
</div>
@endsection
