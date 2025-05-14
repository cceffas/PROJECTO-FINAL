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
                            <th>Média</th>
                            <th>
                                <x-bladewind::button can_submit='true'>salvar</x-bladewind::button>
                            </th>
                        </tr>
                    </x-slot>

                    @foreach ($turma->alunos()->get() as $aluno)
                        <tr>
                            <td>{{ $aluno->id }}</td>
                            <td>{{ $aluno->nome }}</td>

                            @php
                                $notas = $aluno->notas()->get();
                                $somaNotas = $notas->sum('valor');
                                $media = $notas->count() > 0 ? $somaNotas / $notas->count() : 0;
                            @endphp

                            @foreach ($notas as $index => $nota)
                                <td>
                                    <input
                                        type="number"
                                        step="0.01"
                                        min="0"
                                        max="20"
                                        name="notas[{{ $aluno->id }}][{{ $nota->id }}]"
                                        value="{{ $nota->valor }}"
                                        style="width: 50px; font-size: 13px; border: none;"
                                        class="rounded text-blue-500 cursor-pointer"
                                    />
                                </td>
                            @endforeach

                            {{-- Preenche as colunas vazias se tiver menos de 3 notas --}}
                            @for ($i = $notas->count(); $i < 3; $i++)
                                <td>
                                    <input
                                        type="number"
                                        step="0.01"
                                        min="0"
                                        max="20"
                                        name="notas[{{ $aluno->id }}][nova_{{ $i }}]"
                                        value=""
                                        style="width: 50px; font-size: 13px; border: none;"
                                        class="rounded text-blue-500 cursor-pointer"
                                    />
                                </td>
                            @endfor

                            <td>{{ number_format($media, 1) }}</td>
                            <td></td>
                        </tr>
                    @endforeach

                </x-bladewind::table>
            </form>
        </x-bladewind::card>

    </div>
@endsection
