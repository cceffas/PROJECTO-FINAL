<x-screen>

    @php

        $genero = [['label' => 'Masculino', 'value' => 'M'], ['label' => 'Femenino', 'value' => 'F']];
    @endphp

    <x-bladewind.card>

        <form action="/" method="post" class="flex flex-col gap-2">

            @csrf

            <x-bladewind.card>

                <div class="flex flex-col items-center justify-center  text-gray-600">

                    <i class="bi-person-fill text-6xl"></i>
                    <h1 class="text-2xl">inscrição</h1>
                </div>

            </x-bladewind.card>
            {{-- end --}}
            <div class="flex flex-row flex-wrap w-full gap-2">
                <x-bladewind.input label='Nome aluno' required />
                <x-bladewind.input type="email" label='email' />
                <x-bladewind.input type="number" numeric=true label='telefone' />
            </div>
            {{-- end --}}

            <select name="genero"
                class="appearance-none  rounded-md  border-gray-200 border-2 text-xs text-gray-400 min-h-12">
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
            {{-- end --}}



            <x-bladewind.filepicker name="documentos" required=true placeholder="selecione outros documentos" />
            {{-- end --}}
            <x-bladewind.filepicker name="foto" required=true placeholder="selecione uma foto" />
            {{-- end --}}



            <div class="flex justify-end gap-3">
                <x-bladewind.button type="secondary">cancelar</x-bladewind.button>
                <x-bladewind.button can_submit=true>confirmar</x-bladewind.button>
            </div>

            {{-- end --}}
        </form>
    </x-bladewind.card>
    {{-- end --}}


</x-screen>
