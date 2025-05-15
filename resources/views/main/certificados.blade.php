@extends('layouts.App')






@section('content')
    <div class="mt-20 space-y-10">

        <x-Title-app title="Certificados" icon='bi-card-text' text_action='voltar' action='/desempenho' type='secondary' />


        @foreach ($turmas as $turma)
            <x-bladewind::card title="{{ $turma->nome }} / {{ $turma->curso->nome }}">


                <x-bladewind::table has_border='true'>

                    <x-slot name='header'>
                        <tr>
                            <th>Nº de processo</th>
                            <th>nome</th>
                            <th>tel</th>
                            <th>media</th>


                            <th>opcções</th>
                        </tr>
                    </x-slot>

                    @foreach ($turma->alunos()->get() as $aluno)
                        <tr>
                            <td>{{ $turma->id }}</td>
                            <td>{{ $aluno->nome }}</td>
                            <td>{{ $aluno->tel }}</td>
                            <td>
                                {{ number_format($aluno->notas()->sum('valor') / 3,1)  }}
                            </td>
                            <td>
                                <x-bladewind::button tag='a' href='/certificados/{{$aluno->id}}'>gerar</x-bladewind::button>
                            </td>





                        </tr>
                    @endforeach

                </x-bladewind::table>




            </x-bladewind::card>
        @endforeach

    </div>
@endsection
