@props(['screen'])
<aside class="w-64 h-full flex flex-col items-center overflow-y-auto p-2" id="asidebar">
    {{-- <x-bladewind::card class='rounded-none'> --}}
        {{-- end logo --}}
        <nav class="mt-20 w-full  space-y-10">
            <ul>
                <li class=" w-full"><a href="/panel" class=" text-slate-500 flex items-center p-2 h-12 min-w-full rounded-md hover:outline outline-blue-500 capitalize gap-2 "><i class="bi-house-fill text-2xl"></i>painel</a></li>
            </ul>
            {{-- end --}}
            <details class="cursor-pointer p-2 rounded-md font-bold text-white" open>
                <summary class="flex items-center gap-2 selection:text-current p-2">
                    {{-- <i class="bi-folder-fill text-gray-300 text-xl"></i> --}}
                    <h1 class="">Area financeira</h1>
                </summary>
                {{-- end --}}
                <ul class='flex flex-col justify-center items-center gap-2 text-gray-50'>
                    <li class=" w-full"><a href="/alunos" class=" text-slate-500 flex items-center p-2 h-12 min-w-full rounded-md hover:outline outline-blue-500 capitalize gap-2 "><i class="bi-people-fill text-2xl"></i>Alunos</a></li>
                    {{-- end --}}
                    <li class=" w-full"><a href="/estagiarios" class=" text-slate-500 flex items-center p-2 h-12 min-w-full rounded-md hover:outline outline-blue-500 capitalize gap-2 "><i class="bi-people-fill text-2xl"></i>Estagiarios</a></li>
                    {{-- end --}}
                    <li class=" w-full"><a href="/pagamentos/" class=" text-slate-500 flex items-center p-2 h-12 min-w-full rounded-md hover:outline outline-blue-500 capitalize gap-2 "><i class="bi-credit-card text-2xl"></i> Pagamentos</a></li>
                </ul>
            </details>
            {{-- end group area financeira --}}
            <details class="cursor-pointer p-2 rounded-md font-bold text-white" open>
                <summary class="flex items-center gap-2 selection:text-current p-2">
                    <i class="bi-folder-fill text-gray-300 text-xl"></i>
                    <h1 class="">Area Pedagogica</h1>
                </summary>
                {{-- end --}}
                <ul class='flex flex-col justify-center items-center gap-2 text-gray-50'>
                    <li class=" w-full"><a href="/faltas" class=" text-slate-500 flex items-center p-2 h-12 min-w-full rounded-md hover:outline outline-blue-500 capitalize gap-2 "><i class="bi-alarm text-2xl"></i>Assiduidade</a></li>
                    {{-- end --}}
                    <li class=" w-full"><a href="/desempenho" class=" text-slate-500 flex items-center p-2 h-12 min-w-full rounded-md hover:outline outline-blue-500 capitalize gap-2 "><i class="bi-graph-down text-2xl"></i>Desempenho</a></li>
                    {{-- end --}}
                    <li class=" w-full"><a href="/certificados/" class=" text-slate-500 flex items-center p-2 h-12 min-w-full rounded-md hover:outline outline-blue-500 capitalize gap-2 "><i class="bi-card-heading text-2xl"></i>certificados</a></li>
                </ul>
            </details>
            {{-- end group area pedadogica --}}
            <details class="cursor-pointer p-2 rounded-md font-bold text-white" open>
                <summary class="flex items-center gap-2 selection:text-current p-2">
                    <i class="bi-shield-shaded text-gray-300 text-xl"></i>
                    <h1 class="">Admin</h1>
                </summary>
                {{-- end --}}
                <ul class='flex flex-col justify-center items-center gap-2 text-gray-50'>
                    <li class=" w-full"><a href="/usuarios/" class=" text-slate-500 flex items-center p-2 h-12 min-w-full rounded-md hover:outline outline-blue-500 capitalize gap-2 "><i class="bi-people-fill text-2xl"></i>usuarios</a></li>
                    {{-- end --}}
                    <li class=" w-full"><a href="/turmas/" class=" text-slate-500 flex items-center p-2 h-12 min-w-full rounded-md hover:outline outline-blue-500 capitalize gap-2 "><i class="bi-collection text-2xl"></i>Turmas</a></li>
                    {{-- end --}}
                    <li class=" w-full"><a href="/cursos/" class=" text-slate-500 flex items-center p-2 h-12 min-w-full rounded-md hover:outline outline-blue-500 capitalize gap-2 "><i class="bi-collection text-2xl"></i>cursos</a></li>
                </ul>
            </details>
            {{-- end group area pedadogica --}}
            <hr class="border-slate-600">
            <ul class='flex flex-col justify-center items-center gap-2 text-gray-50'>
                <li><button class='text-red-500'><i class="bi bi-box-arrow-left"></i> terminar sessão</button></li>
            </ul>
            {{-- end group area pedadogica --}}
        </nav>
        {{-- end --}}
        {{-- </x-bladewind::card> --}}
</aside>
