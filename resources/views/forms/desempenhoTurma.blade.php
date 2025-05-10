@extends('layouts.App')


@section('content')
    <div class="mt-20 space-y-10">

        <x-Title-app title='desempenho > turma > {{ $turma->nome }}' action='/desempenho' text_action='voltar'
            type='secondary' />

        <x-bladewind::card>
            <x-bladewind::table>

                <x-slot name='header'>

                    <tr>
                        <th>Nº de processo</th>
                        <th>Nome</th>
                        <th>Nota 1</th>
                        <th>Nota 2</th>
                        <th>Nota 3</th>
                        <th>Media</th>
                        <th>acçoes</th>


                    </tr>
                </x-slot>

                @foreach ($turma->alunos()->get() as $aluno)
                    <tr>
                        <td>{{ $aluno->id }}</td>
                        <td>{{ $aluno->nome }}</td>

                        @foreach ($aluno->notas()->get() as $nota)
                            <td><span class="size-4 hover:bg-blue-500 text-blue-500 rounded p-2" contenteditable="true">{{ $nota->valor }}</span></td>
                        @endforeach

                        <td>{{ $nota->sum('valor') / $aluno->notas()->count() }}</td>

                        <td><x-bladewind::button>salvar</x-bladewind::button></td>
                    </tr>
                @endforeach

            </x-bladewind::table>





        </x-bladewind::card>

    </div>
@endsection
