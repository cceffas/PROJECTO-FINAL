@props(['screen'])


<div class="flex flex-col max-h-screen min-w-52 overflow-y-auto   gap-4">

    <x-bladewind.card>
        <div class="flex flex-col items-center p-4 ">

            <x-bladewind.theme-switcher />
            {{-- end --}}

        </div>
        {{-- end --}}

        <aside>

            <nav class="flex flex-col p-4 gap-4">

                <div class="flex flex-col items-start gap-2 ">

                    <x-bladewind::button class=" text-gray-500 active-btn-option" onclick="reloadScreen()">
                        <i class="text-base bi-house-fill "></i>
                        dashboard
                    </x-bladewind::button>

                </div>
                {{-- end  inicio --}}

                <hr>
                {{-- end --}}

                <div class="flex flex-col items-start gap-2 ">

                    <h1 class="text-gray-600 capitalize">
                        area financeira
                    </h1>
                    {{-- end --}}


                    <x-bladewind::button class=" text-gray-500" onclick="changeScreen('/insc','{{ $screen }}')">
                        <i class="text-base bi-person-fill-add "></i>
                        inscrição
                    </x-bladewind::button>
                    {{-- end --}}
                    <x-bladewind::button class=" text-gray-500">
                        <i class="text-base bi-person-vcard-fill "></i>
                        pagamentos
                    </x-bladewind::button>
                    {{-- end --}}
                    <x-bladewind::button class=" text-gray-500">
                        <i class="text-base bi-person-fill-gear "></i>
                        gerenciar aluno
                    </x-bladewind::button>
                    {{-- end --}}

                </div>
                {{-- end  area financeira --}}
                <hr>
                {{-- end --}}
                <div class="flex flex-col items-start gap-2">

                    <h1 class="text-gray-600 capitalize">
                        area pedagica
                    </h1>
                    {{-- end --}}

                    <x-bladewind::button class=" text-gray-500">
                        <i class="text-base bi-people-fill "></i>
                        painel Alunos
                    </x-bladewind::button>
                    {{-- end --}}

                    <x-bladewind::button class=" text-gray-500">
                        <i class="text-base bi-postcard-fill "></i>
                        certificados
                    </x-bladewind::button>
                    {{-- end --}}

                    <x-bladewind::button class=" text-gray-500">
                        <i class="text-base bi-calendar-month-fill "></i>
                        assiduidade
                    </x-bladewind::button>
                    {{-- end --}}


                </div>
                {{-- end area pedagica --}}
                <hr>
                {{-- end --}}
                <div class="flex flex-col items-start gap-2">

                    <h1 class="text-gray-600 capitalize">
                        admin
                    </h1>
                    {{-- end --}}
                    <x-bladewind::button class=" text-gray-500">
                        <i class="text-base bi-gear-fill "></i>
                        option
                    </x-bladewind::button>
                    {{-- end --}}


                </div>
                {{-- end  admin --}}
                <hr>
                {{-- end --}}
                <div class="flex flex-col items-start gap-2">

                    <h1 class="text-gray-600 capitalize">
                        definições
                    </h1>
                    {{-- end --}}
                    <div class="flex w-full justify-between">
                        <label class="text-gray-600 capitalize text-base">noturno</label>
                        <x-bladewind::toggle />
                    </div>
                    {{-- end --}}
                    <div class="flex w-full justify-between">
                        <label class="text-gray-600 capitalize text-base">tempo</label>
                        <x-bladewind::toggle />
                    </div>


                </div>
                {{-- end  admin --}}

            </nav>
            {{-- end --}}

        </aside>
        {{-- end --}}
    </x-bladewind.card>
</div>
