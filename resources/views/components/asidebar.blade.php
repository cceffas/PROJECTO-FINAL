@props(['screen'])
<aside class="transition-all w-52 h-full flex flex-col items-center overflow-y-auto p-8" id="asidebar">

    <nav class="mt-20 w-full  space-y-6">

        <ul>

            <li class=" w-full">
                <a href="/panel"
                    class=" text-slate-500 flex items-center p-2 h-12 min-w-full  rounded-md hover:text-blue-500 capitalize gap-2 ">
                    <i class="bi-house-fill text-xl "></i>
                    <p class='text-ellipsis overflow-hidden '>painel</p>
                </a>
            </li>
        </ul>
        {{-- end --}}
        <hr class="border-slate-600">
        {{-- end --}}

        <ul class='flex flex-col justify-center items-center gap-2 text-gray-50'>
            <li class=" w-full"><a href="/alunos"
                    class=" text-slate-500 flex items-center p-2 h-12 min-w-full rounded-md hover:text-blue-500 capitalize gap-2 "><i
                        class="bi-people-fill text-xl"></i>Alunos</a></li>
            {{-- end --}}
            <li class=" w-full"><a href="/estagiarios"
                    class=" text-slate-500 flex items-center p-2 h-12 min-w-full rounded-md hover:text-blue-500 capitalize gap-2 "><i
                        class="bi-people-fill text-xl"></i>Estagiarios</a></li>
            {{-- end --}}
            <li class=" w-full"><a href="/pagamentos/"
                    class=" text-slate-500 flex items-center p-2 h-12 min-w-full rounded-md hover:text-blue-500 capitalize gap-2 "><i
                        class="bi-credit-card text-xl"></i> Pagamentos</a></li>
        </ul>
        {{-- end --}}
        <hr class="border-slate-600">
        {{-- end --}}
        <ul class='flex flex-col justify-center items-center gap-2 text-gray-50'>
            <li class=" w-full"><a href="/instrutores"
                    class=" text-slate-500 flex items-center p-2 h-12 min-w-full rounded-md hover:text-blue-500 capitalize gap-2 "><i
                        class="bi-people-fill text-xl"></i>Instrutores</a></li>
            {{-- end --}}
            <li class=" w-full"><a href="/desempenho"
                    class=" text-slate-500 flex items-center p-2 h-12 min-w-full rounded-md hover:text-blue-500 capitalize gap-2 "><i
                        class="bi-graph-down text-xl"></i>Desempenho</a></li>
            {{-- end --}}
            <li class=" w-full"><a href="/certificados/"
                    class=" text-slate-500 flex items-center p-2 h-12 min-w-full rounded-md hover:text-blue-500 capitalize gap-2 "><i
                        class="bi-card-heading text-xl"></i>certificados</a></li>
        </ul>
        {{-- end --}}
        <hr class="border-slate-600">
        {{-- end --}}

        <ul class='flex flex-col justify-center items-center gap-2 text-gray-50'>
            <li class=" w-full"><a href="/usuarios/"
                    class=" text-slate-500 flex items-center p-2 h-12 min-w-full rounded-md hover:text-blue-500 capitalize gap-2 "><i
                        class="bi-people-fill text-xl"></i>usuarios</a></li>
            {{-- end --}}
            <li class=" w-full"><a href="/turmas/"
                    class=" text-slate-500 flex items-center p-2 h-12 min-w-full rounded-md hover:text-blue-500 capitalize gap-2 "><i
                        class="bi-collection text-xl"></i>Turmas</a></li>
            {{-- end --}}
            <li class=" w-full"><a href="/cursos/"
                    class=" text-slate-500 flex items-center p-2 h-12 min-w-full rounded-md hover:text-blue-500 capitalize gap-2 "><i
                        class="bi-collection text-xl"></i>cursos</a></li>
        </ul>

        <hr class="border-slate-600">
        <ul class='flex flex-col justify-center items-center gap-2 text-gray-50'>
            <li><button class='text-red-500' onclick="showModal('sair')"><i class="bi bi-box-arrow-left"></i> terminar
                    sessão</button></li>
        </ul>
        {{-- end group area pedadogica --}}
    </nav>
    {{-- end --}}
    {{-- </x-bladewind::card> --}}
</aside>
