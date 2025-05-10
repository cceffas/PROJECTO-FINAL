@extends('layouts.App')


@section('content')
    <div class="mt-20 space-y-10">

        <x-Title-app title='desempenho > turma > {{ $turma->nome }}' action='/desempenho' text_action='voltar'
            type='secondary' />


        <x-bladewind::card>
            <form action="/desempenho/criar" method="POST">
                @csrf
                <x-bladewind::table>

                    <x-slot name='header'>

                        <tr>
                            <th>Nº de processo</th>
                            <th>Nome</th>
                            <th>Nota 1</th>
                            <th>Nota 2</th>
                            <th>Nota 3</th>
                            <th>Media</th>
                            <th><x-bladewind::button can_submit='true'>salvar</x-bladewind::button></th>



                        </tr>
                    </x-slot>

                    @foreach ($turma->alunos()->get() as $aluno)
                        <tr>
                            <td>{{ $aluno->id }}</td>
                            <td>{{ $aluno->nome }}</td>

                            @foreach ($aluno->notas()->get() as $nota)
                                <td><input
                                    type="number"
                                    step="0.01"
                                    min="0"
                                    max="20"
                                    name="notas[{{ $nota->id }}][{{ $nota->valor }}]"
                                    value="{{ $nota->valor }}"
                                    style="width: 50px; font-size: 13px; border:none;"
                                    class="rounded text-blue-500 cursor-pointer"
                                />
                                </td>
                            @endforeach

                            <td>{{ number_format($nota->sum('valor') / $aluno->notas()->count() ,1)}}</td>
                            <td></td>

                        </tr>
                    @endforeach

                </x-bladewind::table>
            </form>





        </x-bladewind::card>

    </div>
@endsection
