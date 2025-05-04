@extends('layouts.App')
@section('content')
<div class="mt-20 space-y-10">
    {{-- first --}}
    <x-bladewind::card>
        <div class="flex justify-between items-center">
            <h1 class="uppercase text-gray-500"><i class="bi-people-fill"></i> alunos</h1>
            <x-bladewind::button tag='a' href='/alunos/form/'>criar novo</x-bladewind::button>
        </div>
    </x-bladewind::card>
    {{-- end title section --}}
    <x-bladewind::card>
        <x-bladewind::table has_border=true searchable=true>
            <x-slot name='header'>
                <tr class="text-center">
                    <th>nº de processo</th>
                    <th>Nome</th>
                    <th>curso</th>
                    <th>data emi</th>
                    <th>Opções</th>
                </tr>
            </x-slot>
            {{-- end --}}
            @isset($alunos)
            @foreach ($alunos as $aluno)
            <tr>
                {{-- <td>
                    <x-bladewind::avatar image='uploads/{{ $aluno->foto }}' />
                </td> --}}
                <td>{{$aluno->id}}</td>
                <td>{{$aluno->nome}}</td>
                <td>{{$aluno->cursos()->get()[0]->nome}}</td>
                <td>{{$aluno->created_at}}</td>
                <td>
                    <div class="flex gap-2">
                        <x-bladewind::button color="red" onclick="showModal('{{ $aluno->id }}')"><i class="bi-trash"></i></x-bladewind::button>
                        {{-- end --}}
                        <x-bladewind::button color='green' onclick="showModal('{{ $aluno->id }}edit')"><i class="bi-pencil"></i></x-bladewind::button>
                        {{-- end --}}
                        <x-bladewind::button color='blue' onclick="showModal('{{ $aluno->id }}show')"><i class="bi-person-bounding-box"></i></x-bladewind::button>
                    </div>
                </td>
            </tr>
            {{-- end --}}
            <x-bladewind::modal name="{{ $aluno->id }}" show_action_buttons=false>
                <div class="flex flex-col items-center justify-center">
                    <form action="/alunos/deletar/{{ $aluno->id }}" method="get">
                        @csrf
                        <i class="bi-trash text-4xl size-12 flex justify-center items-center bg-red-500/50 text-red-500 rounded-full mb-2"></i>
                        <h1>quer eliminar o aluno</h1>
                        <h2>{{ $aluno->nome }} ?</h2>
                        <div class="flex gap-4 mt-4">
                            <x-bladewind::button type="secondary" onclick="hideModal('{{ $aluno->id }}')">não</x-bladewind::button>
                            <x-bladewind::button can_submit=true>sim</x-bladewind::button>
                        </div>
                    </form>
                </div>
            </x-bladewind::modal>
            {{-- end modal delete --}}
            <x-bladewind::modal name="{{ $aluno->id }}edit" show_action_buttons=false size='large'>
                <x-bladewind::card>
                    <div>
                        <form action="/alunos/atualizar" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $aluno->id }}">
                            {{-- id element --}}
                            <div class="flex flex-col justify-center items-center text-gray-600 mb-4">
                                <i class="bi-people-fill text-4xl"></i>
                                <h1>Editar aluno</h1>
                            </div>
                            {{-- end --}}
                            <x-bladewind::input type="text" label='Nome' name='nome' value="{{ $aluno->nome }}" required />
                            <x-bladewind::input type="email" label='Email' name='email' value="{{ $aluno->email }}" />
                            <div class="flex gap-2">
                                <x-bladewind::input label='telefone' numeric=true name='tel' value="{{ $aluno->tel }}" />
                                <x-bladewind::input label='numero de BI' numeric=true name='bi' required value="{{$aluno->bi}}" />
                            </div>
                            {{-- end --}}
                            <livewire:datetime label='data de nascimento' name='dt_nascimento' date="{{ $aluno->dt_nascimento }}" />
                            {{-- end --}}
                            <x-bladewind::select label='curso' name="curso{{ $aluno->id }}" :data="$cursos" selected="{{ $aluno->curso }}" />
                            {{-- end --}}
                            <x-bladewind::card>
                                <h1 class="capitalize">sexo</h1>
                                <div class="flex flex-wrap p-2">
                                    @if($aluno->sexo=='M')
                                    <x-bladewind::radio label="Masculino" value="M" name='sexo' checked />
                                    <x-bladewind::radio label="Femenino" value="F" name='sexo' />
                                    @elseif($aluno->sexo=='F')
                                    <x-bladewind::radio label="Femenino" value="F" name='sexo' checked />
                                    <x-bladewind::radio label="Masculino" value="M" name='sexo' />
                                    @endif
                                </div>
                            </x-bladewind::card>
                            <div class="mt-4 mb-4"></div>
                            {{-- end select radius --}}
                            {{-- end --}}
                            <x-bladewind::filepicker name="foto{{ $aluno->id }}" acceptedFileTypes='image/*' placeholder="Foto passe" selectedValue="uploads/{{$aluno->foto}}" required />
                            {{-- {{public_path('uploads/'.$aluno->foto)}} --}}
                            {{-- file --}}
                            <div class="flex justify-end gap-4 mt-2">
                                <x-bladewind::button type='secondary' onclick="hideModal('{{ $aluno->id }}edit')">cancelar</x-bladewind::button>
                                <x-bladewind::button can_submit=true>confirmar</x-bladewind::button>
                            </div>
                        </form>
                    </div>
                </x-bladewind::card>
            </x-bladewind::modal>
            {{-- end modal edit --}}
            <x-bladewind::modal name="{{ $aluno->id }}show" show_action_buttons=false size='large'>
                <x-bladewind::card>
                    <div class="flex flex-col items-center gap-4">
                        <x-bladewind::avatar image="{{'/uploads/'.$aluno->foto }}" size='omg' />
                        <div class="flex flex-col gap-2">
                            <div class="flex gap-4 items-center">
                                <h1>curso: <i class="text-blue-500">{{ $aluno->cursos()->get()[0]->nome }}</i></h1>
                                <h1>Nome: <i class="text-blue-500">{{ $aluno->nome }}</i></h1>
                            </div>
                            {{-- end --}}
                            <div class="flex gap-4 items-center">
                                <h1>data de nascimento: <i class="text-blue-500">{{ $aluno->dt_nascimento }}</i></h1>
                                <h1>Email: <i class="text-blue-500">{{ $aluno->email }}</i></h1>
                            </div>
                            {{-- end --}}
                            <div class="flex gap-4 items-center">
                                <h1>Nº bilhete de identidade: <i class="text-blue-500">{{ $aluno->bi }}</i></h1>
                                <h1>sexo: <i class="text-blue-500">{{ $aluno->sexo }}</i></h1>
                            </div>
                            {{-- end --}}
                            <div class="flex gap-4 items-center">
                                <h1>telefone: <i class="text-blue-500">{{ $aluno->tel?:"sem contacto" }}</i></h1>
                                <h1>Nº processo: <i class="text-blue-500">{{ $aluno->id }}</i></h1>
                            </div>
                            {{-- end --}}
                            <hr>
                            {{-- end --}}
                            <h1>data de emição: <i class="text-blue-500">{{ $aluno->created_at }}</i></h1>
                            {{-- end --}}
      
                        </div>
                    </div>
                </x-bladewind::card>
            </x-bladewind::modal>
            @endforeach
            @endisset
            {{-- end --}}
          
            {{-- end modal form --}}
        </x-bladewind::table>
    </x-bladewind::card>
</div>
@endsection
