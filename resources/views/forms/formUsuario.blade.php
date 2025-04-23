@extends('layouts.App')
@section('content')
<div class="mt-20 space-y-10">
    {{-- first --}}
    <x-bladewind::card>
        <div class="flex justify-between items-center">
            <h1 class="uppercase text-gray-500"><i class="bi-people-fill"></i> Usuarios</h1>
            <x-bladewind::button onclick="showModal('usuario')">criar novo</x-bladewind::button>
        </div>
    </x-bladewind::card>
    {{-- end title section --}}
    <x-bladewind::card>
        <x-bladewind::table has_border=true searchable=true>
            <x-slot name='header'>
                <tr class="text-center">
                    <th>Code</th>
                    <th>Nome</th>
                    <th>acesso</th>
                    <th>estatus</th>
                    <th>Opções</th>
                </tr>
            </x-slot>
            {{-- end --}}
            @isset($usuarios)
            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{$usuario->id}}</td>
                <td>{{$usuario->nome}}</td>
                <td>{{$usuario->cargo}}</td>
                @if($usuario->estatus=='ON')
                <td><x-bladewind::tag color='green' label="{{$usuario->estatus}}" /></td>
                @else
                <td><x-bladewind::tag color='red' label="{{$usuario->estatus}}" /></td>
                @endif
                <td>
                    <div class="flex gap-2">
                        <x-bladewind::button color="red" onclick="showModal('{{ $usuario->id }}')"><i class="bi-trash"></i></x-bladewind::button>
                        {{-- end --}}
                        <x-bladewind::button color='green' onclick="showModal('{{ $usuario->id }}edit')"><i class="bi-pencil"></i></x-bladewind::button>
                    </div>
                </td>
            </tr>
            {{-- end --}}
            <x-bladewind::modal name="{{ $usuario->id }}" show_action_buttons=false>
                <div class="flex flex-col items-center justify-center">
                    <form action="/usuarios/deletar/{{ $usuario->id }}" method="get">
                        @csrf
                        <i class="bi-trash text-4xl size-12 flex justify-center items-center bg-red-500/50 text-red-500 rounded-full mb-2"></i>
                        <h1>quer eliminar o usuario</h1>
                        <h2>{{ $usuario->nome }} ?</h2>
                        <div class="flex gap-4 mt-4">
                            <x-bladewind::button type="secondary" onclick="hideModal('{{ $usuario->id }}')">não</x-bladewind::button>
                            <x-bladewind::button can_submit=true>sim</x-bladewind::button>
                        </div>
                    </form>
                </div>
            </x-bladewind::modal>
            {{-- end modal delete --}}
            <x-bladewind::modal name="{{ $usuario->id }}edit" show_action_buttons=false size='large'>
                <x-bladewind::card>
                    <div>
                        <form action="/usuarios/atualizar" method="post">
                            @csrf

                            <input type="hidden" name="id" value="{{ $usuario->id }}">
                            {{-- id element --}}
                            <div class="flex flex-col justify-center items-center text-gray-600 mb-4">
                                <i class="bi-people-fill text-4xl"></i>
                                <h1>Editar usuario</h1>
                            </div>
                            {{-- end --}}
                            <x-bladewind::input type="text" label='Nome' name='nome' required value="{{ $usuario->nome }}" />
                            <x-bladewind::input type="password" viwable label='senha' name='senha' required />
                            <x-bladewind::card>
                                <h1 class="">Nivel de acesso</h1>
                                <div class="flex flex-wrap p-2">
                                    @foreach($cargos as $item)
                                    @if(session()->get('cargo')==$item)
                                    <x-bladewind::radio label="{{ $item }}" value="{{$item}}" name='cargo' checked=true />
                                    @else
                                    <x-bladewind::radio label="{{ $item }}" value="{{$item}}" name='cargo' />
                                    @endif
                                    @endforeach
                                </div>
                            </x-bladewind::card>
                            {{-- end select radius --}}
                            <div class="flex justify-end gap-4 mt-2">
                                <x-bladewind::button type='secondary' onclick="hideModal('{{ $usuario->id }}edit')">cancelar</x-bladewind::button>
                                <x-bladewind::button can_submit=true>confirmar</x-bladewind::button>
                            </div>
                        </form>
                    </div>
                </x-bladewind::card>
            </x-bladewind::modal>
            {{-- end modal edit --}}
            @endforeach
            @endisset
            {{-- end --}}
            <x-bladewind::modal name="usuario" show_action_buttons=false size='large'>
                <x-bladewind::card>
                    <div>
                        <form action="/usuarios/criar" method="post">
                            @csrf
                            <div class="flex flex-col justify-center items-center text-gray-600 mb-4">
                                <i class="bi-people-fill text-4xl"></i>
                                <h1>Registrar usuario</h1>
                            </div>
                            {{-- end --}}
                            <x-bladewind::input type="text" label='Nome' name='nome' required />
                            <x-bladewind::input type="password" viwable label='senha' name='senha' required />
                            <x-bladewind::card>
                                <h1 class="">Nivel de acesso</h1>
                                <div class="flex flex-wrap p-2">
                                    @foreach($cargos as $item)
                                    <x-bladewind::radio label="{{ $item }}" value="{{$item}}" name='cargo' />
                                    @endforeach
                                </div>
                            </x-bladewind::card>
                            {{-- end select radius --}}
                            <div class="flex justify-end gap-4 mt-2">
                                <x-bladewind::button type='secondary' onclick="hideModal('usuario')">cancelar</x-bladewind::button>
                                <x-bladewind::button can_submit=true>confirmar</x-bladewind::button>
                            </div>
                        </form>
                    </div>
                </x-bladewind::card>
            </x-bladewind::modal>
            {{-- end modal form --}}
        </x-bladewind::table>
    </x-bladewind::card>
</div>
@endsection
