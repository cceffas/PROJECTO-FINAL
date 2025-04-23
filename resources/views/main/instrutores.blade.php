@extends('layouts.App')





@section('content')

<div class="mt-20">
	
</div>

<x-bladewind::card>
    <div>
        <form action="/instrutores/criar" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col justify-center items-center text-gray-600 mb-4">
                <i class="bi-person-badge text-4xl"></i>
                <h1>Registrar instrutor</h1>
            </div>

            {{-- Nome e Email --}}
            <x-bladewind::input type="text" label="Nome" name="nome" required />
            <x-bladewind::input type="email" label="Email" name="email" />

            {{-- Telefone e BI --}}
            <div class="flex gap-2">
                <x-bladewind::input label="Telefone" name="tel" numeric=true />
                <x-bladewind::input label="Número de BI" name="bi" required />
            </div>

            {{-- Sexo --}}
            <x-bladewind::card>
                <h1 class="capitalize">Sexo</h1>
                <div class="flex flex-wrap p-2">
                    <x-bladewind::radio label="Masculino" value="M" name="sexo" />
                    <x-bladewind::radio label="Feminino" value="F" name="sexo" />
                </div>
            </x-bladewind::card>

            {{-- Foto --}}
            <x-bladewind::filepicker
                name="foto"
                label="Foto do Instrutor"
                placeholder="Foto do instrutor"
                acceptedFileTypes="image/*"
                required
            />

            {{-- Documentos --}}
            <x-bladewind::filepicker
                name="documentos[]"
                label="Documentos (PDF, imagens, etc)"
                max_files="5"
                acceptedFileTypes="application/pdf,image/*"
                placeholder="Selecione os documentos"
            />

            {{-- Especialidades --}}
            <x-bladewind::textarea
                name="especialidade"
                label="Especialidades"
                placeholder="Separe por vírgula ou escreva livremente"
                required
            />

            {{-- Botões --}}
            <div class="flex justify-end gap-4 mt-2">
                <x-bladewind::button type="secondary" onclick="hideModal('instrutor')">cancelar</x-bladewind::button>
                <x-bladewind::button can_submit=true>confirmar</x-bladewind::button>
            </div>
        </form>
    </div>
</x-bladewind::card>




@endsection