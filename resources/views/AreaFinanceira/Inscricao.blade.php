<div class="container-column w-100 p-8 g-16">

    @php

        $genero = [['label' => 'Masculino', 'value' => 'M'], ['label' => 'Femenino', 'value' => 'F']];
    @endphp
    <x-bladewind::card class="grow"></x-bladewind::card>
    {{-- end --}}
    <x-bladewind::card>




        <form action="/" method="post" class="p-8">



            <div class="container-row g-8  ">
                <x-bladewind::input label='Nome aluno' required />
                <x-bladewind::input type="email" label='email' />
                <x-bladewind::input type="number" numeric=true label='telefone' />
            </div>
            {{-- end --}}


            <div class="container-column p-8 g-8">

                <label for="" class="text-gray-500 shadow-sm" >Genero</label>
                <div class="container-row g-8 shadow-sm">
                    <x-bladewind::radio-button name="genero" label='Masculino' value="M" />

                    <x-bladewind::radio-button name="genero" label='Femenino' value="F" />
                </div>
            </div>
            {{-- end --}}

            <x-bladewind::filepicker name="documentos" required=true placeholder="selecione outros documentos" />
            {{-- end --}}
            <x-bladewind::filepicker name="foto" required=true placeholder="selecione uma foto" />
            {{-- end --}}

            <div class="container-row g-8">
                <div class="grow"></div>
                <div class="container-row g-8">
                    <x-bladewind::button type="secondary">cancelar</x-bladewind::button>
                    <x-bladewind::button can_submit=true>confirmar</x-bladewind::button>
                </div>

            </div>
            {{-- end --}}
        </form>

    </x-bladewind::card>
    {{-- end --}}

    <x-bladewind::card>

        <x-bladewind::table>



            <x-slot name="header">
                <th>Nome</th>
                <th>genero</th>
                <th>idade</th>
                <th>telefone</th>
                <th>status</th>
                <th>data</th>
            </x-slot>
            {{-- end --}}
            <tr>
                <td>pedro moises</td>
                <td>M</td>
                <td>20</td>
                <td>932809844</td>
                <td>pago</td>
                <td>{{ date('d/m/y') }}</td>
            </tr>
            {{-- end --}}
            <tr>
                <td>pedro moises</td>
                <td>M</td>
                <td>20</td>
                <td>932809844</td>
                <td>pago</td>
                <td>{{ date('d/m/y') }}</td>
            </tr>
            {{-- end --}}
            <tr>
                <td>pedro moises</td>
                <td>M</td>
                <td>20</td>
                <td>932809844</td>
                <td>pago</td>
                <td>{{ date('d/m/y') }}</td>
            </tr>
            {{-- end --}}

        </x-bladewind::table>
    </x-bladewind::card>
    {{-- end --}}
</div>
