@extends('layouts.App')

@section('content')
    @php
        $class_input =
            'apaerence-none bg-transparent w-full border-none outline outline-1 outline-slate-300 focus:outline-blue-500 text-slate-500 placeholder-slate-400/50';
    @endphp
    <div class="mt-20 space-y-10">
        <div class="mt-20 space-y-10">

            {{-- first --}}
            <x-Title-app title='Usuarios > editar' icon='bi bi-people-fill' action='/usuarios' text_action='voltar'
                type='secondary' />
            {{-- end title section --}}

            <x-bladewind::card>
                <form action="/usuarios/atualizar" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <input type="hidden" name='id' value="{{ $usuario->id }}">
                    <!-- Nome -->
                    <div>
                        <label for="nome" class="block text-sm font-medium text-slate-600 mb-1">Nome</label>
                        <div class="flex items-center border border-slate-300 rounded">
                            <i class="bi-person-fill text-slate-400 p-2"></i>
                            <input type="text" id="any-text" name="nome" maxlength="50" required
                                pattern="^[A-Za-zÀ-ÿ\s]{3,50}$" class="{{ $class_input }}" value='{{ $usuario->nome }}'
                                placeholder="administrador..(no máximo 50 caracteres)">
                        </div>
                    </div>


                    <!-- acesso -->


                    <div>
                        <label for="acesso" class="block text-sm font-medium text-slate-600 mb-1">Nivel Acesso</label>
                        <div class="flex items-center border border-slate-300 rounded">
                            <i class="bi-eyeglasses text-slate-400 p-2"></i>
                            <select name="acesso" required class="{{ $class_input }}">

                                <option value="admin" {{ $usuario->acesso == 'admin' ? 'selected' : '' }}>Administrador
                                </option>
                                <option value="secretaria" {{ $usuario->acesso == 'secretaria' ? 'selected' : '' }}>
                                    Secretaria
                                </option>


                            </select>
                        </div>
                    </div>
        </div>

        <!--Nova senha-->
        <div>
            <label for="senhaNova" class="block text-sm font-medium text-slate-600 mb-1">confitmar senha</label>
            <div class="flex items-center border border-slate-300 rounded">
                <i class="bi-key-fill text-slate-400 p-2"></i>
                <input type="text" name="senhaNova" maxlength="50" class="{{ $class_input }}" placeholder="******">
            </div>
        </div>

        <!--confirmar senha -->
        <div>
            <label for="senha" class="block text-sm font-medium text-slate-600 mb-1">confitmar senha</label>
            <div class="flex items-center border border-slate-300 rounded">
                <i class="bi-key-fill text-slate-400 p-2"></i>
                <input type="text" name="senha" maxlength="50" required class="{{ $class_input }}"
                    placeholder="******">
            </div>
        </div>


        <!-- Ações -->
        <div class="flex justify-end gap-4 mt-4">
            <x-bladewind::button can_submit='true'>confirmar</x-bladewind::button>
        </div>
        </form>

        </x-bladewind::card>
    </div>
@endsection
