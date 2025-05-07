@extends('layouts.App')
@section('content')
    @php
        $class_input =
            'apaerence-none bg-transparent w-full border-none outline outline-1 outline-slate-300 focus:outline-blue-500 text-slate-500 placeholder-slate-400/50';
    @endphp
    <div class="mt-20 space-y-10">
        <x-Title-app title='pagamentos' icon='bi-credit-card' action='/pagamentos/form' />
        {{-- end --}}
        <x-bladewind::card>
            <form action="/pagamentos/" method="get">
                <h1 class="text-slate-500 mb-3">pesquise o pagamento pelo nome e filtre por curso</h1>

                <div class="flex items-center gap-1 mb-2">

                    <input type="text" name="nome"
                        class="border-slate-200 border-2  rounded-md placeholder-slate-300 grow text-slate-500 bg-transparent"
                        placeholder="pesquise pelo codigo do pagamento">
                    {{-- end --}}
                    <select name="curso"
                        class="border-slate-200 border-2 rounded-md placeholder-slate-300 text-slate-500">
                        @isset($cursos)
                            @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                            @endforeach
                        @endisset
                    </select>
                    <select name="estatus"
                        class="border-slate-200 border-2 rounded-md placeholder-slate-300 text-slate-500">
                        <option value="pago">Pago</option>
                        <option value="devedor">sem pagamentos</option>
                    </select>
                </div>
                {{-- end --}}
                <x-bladewind::button can_submit=true>pesquisar</x-bladewind::button>
            </form>
        </x-bladewind::card>
        {{-- end card pagamentos --}}

        <x-bladewind::card title="pagamentos efetuados">
            <x-bladewind::table>

                <x-slot name="header">
                    <tr>
                        <th>Nº de processo</th>
                        <th>Cliente</th>
                        <th>curso</th>
                        <th>Descricao</th>
                        <th>quantia</th>
                        <th>agente</th>
                        <th>fatura</th>
                        <th>data de emição</th>



                    </tr>
                </x-slot>


                @if ($pagamentos != null)
                    @foreach ($pagamentos as $pagamento)
                        <tr>

                            <td>{{ $pagamento->aluno->id }}</td>
                            <td>{{ $pagamento->aluno->nome }}</td>
                            <td>{{ $pagamento->aluno->cursos()->get()[0]->nome }}</td>
                            <td>{{ $pagamento->descricao }}</td>
                            <td>{{ $pagamento->valor . ' kz' }}</td>
                            <td>{{ $pagamento->usuario->nome }}</td>
                            <td><a href="{{asset('uploads/'.$pagamento->fatura) }}">fatura</a></td>
                            <td>{{ $pagamento->created_at->format('d-m-Y') }}</td>



                        </tr>
                    @endforeach
                @endif






            </x-bladewind::table>
        </x-bladewind::card>

    </div>
@endsection
