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
            {{-- end --}}
            <div class="flex items-center gap-1 mb-2">
                {{--
                <x-bladewind::input prefix="<i class='bi-search'></i> " name='nome' /> --}}
                <input type="text" name="nome" class="border-slate-200 border-2 rounded-md placeholder-slate-300 text-slate-500" placeholder="nome do aluno">
                {{-- end --}}
                <select name="curso" class="border-slate-200 border-2 rounded-md placeholder-slate-300 text-slate-500">
                    @isset($cursos)
                    @foreach( $cursos as $curso)
                    <option value="{{ $curso->id }}">{{$curso->nome}}</option>
                    @endforeach
                    @endisset
                </select>
                <select name="estatus" class="border-slate-200 border-2 rounded-md placeholder-slate-300 text-slate-500">
                    <option value="pago">Pago</option>
                    <option value="devedor">sem pagamentos</option>
                </select>
            </div>
            {{-- end --}}
            <x-bladewind::button can_submit=true>pesquisar</x-bladewind::button>
        </form>
    </x-bladewind::card>
    {{-- end card pagamentos --}}
    @isset($alunos)
    <x-bladewind::card>
        @if(sizeof($alunos)>0)
        <x-bladewind::table has_border=true>
            <x-slot name='header'>
                <tr class="text-center">
                    <th>Nome</th>
                    <th>Curso</th>
                    <th>estatus</th>
                    <th>Opções</th>
                </tr>
            </x-slot>
            {{-- end --}}
            <tbody>
                @foreach ($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ $aluno->cursos()->get()[0]->nome }}</td>
              

                    @if(sizeof( $aluno->pagamentos()->get())==0)

                    <td><x-bladewind::tag label="sem pagamentos" color="red"/></td>
                    <td>
                        <x-bladewind::button onclick="showModal('pay{{$aluno->id}}')">
                            novo <i class="bi-cash-coin"></i>
                        </x-bladewind::button>
                    </td>
                    @else
                    <td><x-bladewind::tag label="pago" color="green"/></td>
                    {{-- end --}}
                    <td>
                        <x-bladewind::button color='orange' tag='a' href="/pagamentos/ver/{{$aluno->id}}">
                            fatura <i class="bi bi-file-earmark-text"></i>
                        </x-bladewind::button>
                    </td>
                    @endif
                    {{-- end --}}
                    <x-bladewind::modal name="pay{{ $aluno->id }}" size='big' show_action_buttons=false >
                        <form action='/pagamentos/criar' method="post">  
                        @csrf  
                        <x-bladewind::card>

                            <x-bladewind::input  name="montante" label="montante" numeric=true  required/>
                            <x-bladewind::input  name="assunto" label="Assunto" required/>
                            <x-bladewind::input  name="agente" label="responsavel" required/>
                            <input type="hidden" value="{{ $aluno->id }}" name='aluno'>
                            {{-- end --}}
                            <div class="flex gap-2 flex-wrap">

                                @if(sizeof( $aluno->pagamentos()->get())==0)
                                <x-bladewind::button type='secondary' onclick="hideModal('pay{{ $aluno->id }}')">cancelar</x-bladewind::button>
                                <x-bladewind::button color="green" can_submit=true>confirmar</x-bladewind::button>
                                @endif
                                
                            </div>

                        </x-bladewind::card>
                        </form>
                    </x-bladewind::modal>
                    {{-- end modal --}}
                </tr>
                @endforeach
            </tbody>
        </x-bladewind::table>
        @else
        <h1 class="text-slate-500 text-center">sem resultados da sua pesquisa !</h1>
        @endif
    </x-bladewind::card>
    @endisset
</div>
@endsection
