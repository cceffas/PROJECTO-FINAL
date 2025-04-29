@props(['screen'])
<aside class="w-64 h-full lex flex-col items-center z-50  overflow-y-auto border-r-4 border-r-blue-500">
    <x-bladewind::card class='rounded-none'>
    <div class="flex text-2xl font-bold text-white items-center justify-center bg-gradient-to-br from-slate-600 rounded-md p-2 ">
        <h1>G</h1>
        <h1 class="text-white">Center</h1>
        <i class="bi-plus-circle-dotted mt-1"></i>
    </div>
    {{-- end logo --}}
    <nav class="mt-10 w-full text-white space-y-10">
        <ul>
            <li class=" w-full"><a href="/panel" class=" text-blue-500 flex items-center p-2 h-12 min-w-full rounded-md hover:outline outline-blue-500 capitalize gap-2 "><i class="bi-house-fill text-2xl"></i>painel</a></li>
        </ul>
        {{-- end --}}
        <details class="cursor-pointer  p-2 rounded-md" open>
            <summary class=" flex items-center gap-2  selection:text-current p-2">
                <i class="bi-folder-fill text-gray-300 text-xl"></i>
                <h1 class="text-white">Area financeira</h1>
            </summary>
            {{-- end --}}
            <ul class='flex flex-col justify-center items-center gap-2 text-gray-50'>
                <li class=" w-full"><a href="/alunos" class=" text-blue-500 flex items-center p-2 h-12 min-w-full rounded-md hover:outline outline-blue-500 capitalize gap-2 "><i class="bi-people-fill text-2xl"></i>Alunos</a></li>
                {{-- end --}}
                {{-- <li class=" w-full"><a href="/estagiarios" class=" text-blue-500 flex items-center p-2 h-12 min-w-full rounded-md hover:outline outline-blue-500 capitalize gap-2 "><i class="bi-people-fill text-2xl"></i>Estagiarios</a></li> --}}
                {{-- end --}}
                <li class=" w-full"><a href="/pagamentos/" class=" text-blue-500 flex items-center p-2 h-12 min-w-full rounded-md hover:outline outline-blue-500 capitalize gap-2 "><i class="bi-credit-card text-2xl"></i> Pagamentos</a></li>
            </ul>
        </details>
        {{-- end group area financeira --}}
        <details class="cursor-pointer  p-2 rounded-md" open>
            <summary class=" flex items-center gap-2  selection:text-current p-2">
                <i class="bi-folder-fill text-gray-300 text-xl"></i>
                <h1 class="text-white">Area Pedagogica</h1>
            </summary>
            {{-- end --}}
            <ul class='flex flex-col justify-center items-center gap-2 text-gray-50'>
                <li class=" w-full"><a href="/faltas" class=" text-blue-500 flex items-center p-2 h-12 min-w-full rounded-md hover:outline outline-blue-500 capitalize gap-2 "><i class="bi-alarm text-2xl"></i>Assiduidade</a></li>
                {{-- end --}}
                <li class=" w-full"><a href="/desempenho" class=" text-blue-500 flex items-center p-2 h-12 min-w-full rounded-md hover:outline outline-blue-500 capitalize gap-2 "><i class="bi-graph-down text-2xl"></i>Desempenho</a></li>
                {{-- end --}}
                <li class=" w-full"><a href="/certificados/" class=" text-blue-500 flex items-center p-2 h-12 min-w-full rounded-md hover:outline outline-blue-500 capitalize gap-2 "><i class="bi-card-heading text-2xl"></i>certificados</a></li>
            </ul>
        </details>
        {{-- end group area pedadogica --}}
        <details class="cursor-pointer  p-2 rounded-md" open>
            <summary class=" flex items-center gap-2  selection:text-current p-2">
                <i class="bi-shield-shaded text-gray-300 text-xl"></i>
                <h1 class="text-white">Admin</h1>
            </summary>
            {{-- end --}}
            <ul class='flex flex-col justify-center items-center gap-2 text-gray-50'>
                <li class=" w-full"><a href="/usuarios/" class=" text-blue-500 flex items-center p-2 h-12 min-w-full rounded-md hover:outline outline-blue-500 capitalize gap-2 "><i class="bi-people-fill text-2xl"></i>usuarios</a></li>
                {{-- end --}}
                <li class=" w-full"><a href="/turmas/" class=" text-blue-500 flex items-center p-2 h-12 min-w-full rounded-md hover:outline outline-blue-500 capitalize gap-2 "><i class="bi-collection text-2xl"></i>Turmas</a></li>
                {{-- end --}}
                <li class=" w-full"><a href="/cursos/" class=" text-blue-500 flex items-center p-2 h-12 min-w-full rounded-md hover:outline outline-blue-500 capitalize gap-2 "><i class="bi-collection text-2xl"></i>cursos</a></li>
            </ul>
        </details>
        {{-- end group area pedadogica --}}
        <details class="cursor-pointer  p-2 rounded-md">
            <summary class=" flex items-center gap-2  selection:text-current p-2">
                <i class="bi-gear-fill text-gray-300 text-xl"></i>
                <h1 class="text-white">configurações</h1>
            </summary>
            {{-- end --}}
        </details>
        {{-- end group area pedadogica --}}
    </nav>
    {{-- end --}}
    </x-bladewind::card>
</aside>
