@extends('layouts.App')







@section('content')

<div class="mt-20 space-y-10">

    <x-bladewind::card>
        <div class="flex justify-between items-center">
            <h1 class="uppercase text-gray-500"><i class="bi bi-graph-down"></i> Desempenho</h1>
            <x-bladewind::button type='secondary' tag='a' href='/'>voltar</x-bladewind::button>
        </div>
    </x-bladewind::card>

    <x-bladewind::card class="rounded-none">

        <x-bladewind::table>


            <x-slot name='header'>
                <tr>
                    <th>Nome</th>
                    <th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                    <th>E</th>
                    <th>F</th>
                    <th>Media</th>

                </tr>
            </x-slot>


            @for ($n=0;$n<12;$n++)
                <tr>
                <td>aluno{{$n}}</td>
                <td>9</td>
                <td>9</td>
                <td>9</td>
                <td>9</td>
                <td>9</td>
                <td>9</td>
                <td>9</td>
         
                </tr>
                @endfor

        </x-bladewind::table>



    </x-bladewind::card>

</div>

@endsection