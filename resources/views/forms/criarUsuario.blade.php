@extends('layouts.App')

@section('content')
    @php
        $class_input =
            'apaerence-none bg-transparent w-full border-none outline outline-1 outline-slate-300 focus:outline-blue-500 text-slate-500 placeholder-slate-400/50';
    @endphp
    <div class="mt-20 space-y-10">
        <div class="mt-20 space-y-10">

            {{-- first --}}
            <x-Title-app title='Usuarios > Criar' icon='bi bi-people-fill' action='/usuarios' text_action='voltar'
                type='secondary' />
            {{-- end title section --}}

            <x-bladewind::card>
                <form action="/usuarios/criar" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf


                    <!-- Nome -->
                    <div>
                        <label for="nome" class="block text-sm font-medium text-slate-600 mb-1">Nome<x-obr/></label>
                        <div class="flex items-center border border-slate-300 rounded">
                            <i class="bi-person-fill text-slate-400 p-2"></i>
                            <input type="text" id="any-text" name="nome" maxlength="50" required
                                pattern="^[A-Za-zÀ-ÿ\s]{3,50}$" class="{{ $class_input }}"
                                placeholder="administrador..(no máximo 50 caracteres)">
                        </div>
                    </div>


                    <!-- acesso -->


                    <div>
                        <label for="acesso" class="block text-sm font-medium text-slate-600 mb-1">Nivel Acesso<x-obr/></label>
                        <div class="flex items-center border border-slate-300 rounded">
                            <i class="bi-eyeglasses text-slate-400 p-2"></i>
                            <select name="acesso" required class="{{ $class_input }}">


                                <option value="secretaria">
                                    Secretaria
                                </option>


                            </select>
                        </div>
                    </div>
        </div>



        <!--confirmar senha -->
        <div>
            <label for="senha" class="block text-sm font-medium text-slate-600 mb-1">senha<x-obr/></label>
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
