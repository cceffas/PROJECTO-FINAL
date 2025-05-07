@extends('layouts.App')






@section('content')
    <div class="mt-20 space-y-10">

        <x-Title-app title="Certificados" icon='bi-card-text' />


        <x-bladewind::card>


        <x-bladewind::table searchable=true has_border='true'>

        <x-slot name='header'>
            <tr>
                <th>code</th>
                <th>aluno</th>
                <th>curso</th>
                <th>turma</th>
                <th>estatus</th>
                <th>opcções</th>
            </tr>
        </x-slot>

        </x-bladewind::table>




        </x-bladewind::card>

    </div>
@endsection
