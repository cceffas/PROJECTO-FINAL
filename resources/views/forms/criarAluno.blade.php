@extends('layouts.App')

@section('content')
    <div class=" mt-20 space-y-10">


        <x-bladewind::card>
            <div class="flex justify-between items-center">
                <h1 class="uppercase text-gray-500"><i class="bi-people-fill"></i> alunos>Registrar </h1>
                <x-bladewind::button type='secondary' tag='a' href='/alunos/'>voltar</x-bladewind::button>
            </div>
        </x-bladewind::card>
        <x-bladewind::card>
            <div>
                <form action="/alunos/criar" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col justify-center items-center text-gray-600 mb-4">
                        <i class="bi-people-fill text-4xl"></i>
                        <h1>Registrar aluno</h1>
                    </div>
                    {{-- end --}}
                    <x-bladewind::input type="text" label='Nome' name='nome' required id='any-text' />
                    <x-bladewind::input type="email" label='Email' name='email' />
                    <div class="flex gap-2">
                        <x-bladewind::input label='telefone' type='text' name='tel' id='any-tel' errorMessage='deve conter 9 numeros' maxlengh='9'/>
                        <x-bladewind::input label='numero de BI' name='bi' required />
                    </div>
                    {{-- end --}}
                    <livewire:datetime label='data de nascimento' name='dt_nascimento' />
                    {{-- end --}}
                    <x-bladewind::select label='curso' name='curso' :data="$cursos" />
                    {{-- end --}}
                    <x-bladewind::card>
                        <h1 class="capitalize">sexo</h1>
                        <div class="flex flex-wrap p-2">
                            <x-bladewind::radio label="Masculino" value="M" name='sexo' />
                            <x-bladewind::radio label="Femenino" value="F" name='sexo' />
                        </div>
                    </x-bladewind::card>
                    <div class="mt-4 mb-4"></div>
                    {{-- end select radius --}}
                    {{-- end --}}
                    <x-bladewind.filepicker name='foto' acceptedFileTypes='image/*' placeholder="Foto passe" required />
                    {{-- file --}}
                    @if ($cursos)
                        <div class="flex justify-end gap-4 mt-2">
                            <x-bladewind::button type='secondary'
                                onclick="hideModal('aluno')">cancelar</x-bladewind::button>
                            <x-bladewind::button can_submit=true>confirmar</x-bladewind::button>
                        </div>
                    @else
                        <div class="flex flex-col gap-2 items-center justify-center w-full">
                            <p class="text-red-500">Não é possivel registrar um aluno sem existir um cursos!</p>
                            <a href="/cursos/" class="text-blue-500 underline">criar um curso!</a>
                        </div>
                    @endif
                </form>
            </div>
        </x-bladewind::card>

    </div>
@endsection
