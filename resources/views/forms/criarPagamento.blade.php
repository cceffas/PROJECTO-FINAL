@extends('layouts.App')
@section('content')
    @php
        $class_input =
            'appearance-none bg-transparent w-full border-none outline outline-1 outline-slate-300 focus:outline-blue-500 text-slate-500 placeholder-slate-400/50';
    @endphp

    <div class="mt-20 space-y-10">
        <x-Title-app title='pagamentos > registrar' icon='bi-credit-card' action='/pagamentos' text_action='voltar'
            type='secondary' />

        <x-bladewind::card>
            <form action="/pagamentos/criar" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
                @csrf

                <!-- Aluno -->
                <div>
                    <label for="aluno_id" class="block text-sm font-medium text-slate-600 mb-1">Codigo Aluno</label>
                    <div class="flex items-center border border-slate-300 rounded">
                        <i class="bi-person text-slate-400 p-2"></i>
                        <input type="number" step="0.01" name="aluno_id" id="aluno_id" required min="0"
                            class="{{ $class_input }}" placeholder="1">
                    </div>
                </div>

                <!-- Valor -->
                <div>
                    <label for="valor" class="block text-sm font-medium text-slate-600 mb-1">Valor (KZ)</label>
                    <div class="flex items-center border border-slate-300 rounded">
                        <i class="bi-cash-coin text-slate-400 p-2"></i>
                        <input type="number" step="0.01" name="valor" id="valor" max="900000" required
                            class="{{ $class_input }}" placeholder="Ex: 15000.00">
                    </div>
                </div>

                <!-- Método de Pagamento -->
                <div>
                    <label for="m_pagamento" class="block text-sm font-medium text-slate-600 mb-1">Método de
                        Pagamento</label>
                    <div class="flex items-center border border-slate-300 rounded">
                        <i class="bi-wallet2 text-slate-400 p-2"></i>
                        <select name="m_pagamento" id="m_pagamento" required class="{{ $class_input }}">
                            <option value="Transferência">Transferência</option>
                            <option value="Dinheiro">Dinheiro</option>
                            <option value="POS">POS</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>

                <!-- Referência -->
                <div>
                    <label for="referencia" class="block text-sm font-medium text-slate-600 mb-1">Referência</label>
                    <div class="flex items-center border border-slate-300 rounded">
                        <i class="bi-hash text-slate-400 p-2"></i>
                        <input type="number" name="referencia" id="referencia" step="1" required
                            class="{{ $class_input }}" placeholder="Ex: 20250401001">
                    </div>
                </div>

                <!-- Descrição -->
                <div>
                    <label for="descricao" class="block text-sm font-medium text-slate-600 mb-1">Descrição</label>
                    <div class="border border-slate-300 rounded">
                        <textarea name="descricao" id="descricao" rows="3" class="w-full p-2 text-slate-500 outline-none resize-none"
                            placeholder="Observações ou detalhes do pagamento..." required></textarea>
                    </div>
                </div>

                <!-- Comprovativo -->
                <div>
                    <label for="comprovativo" class="block text-sm font-medium text-slate-600 mb-1">Comprovativo (PDF ou
                        imagem)</label>
                    <x-bladewind::filepicker name="comprovativo" accepted_file_types="application/pdf,image/*"
                        max_file_size="5mb" placeholder="Selecione o comprovativo" required />
                </div>

                <!-- Usuário logado (hidden ou dropdown se admin) -->
                <input type="hidden" name="usuario_id" value="{{ session()->get('user_id') }}" />

                <!-- Ação -->
                <div class="flex justify-end">
                    <x-bladewind::button can_submit="true">Registrar Pagamento</x-bladewind::button>
                </div>
            </form>
        </x-bladewind::card>
    </div>
@endsection
