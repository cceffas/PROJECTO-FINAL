<aside
    id="asidebar"
    class="transition-all duration-300 ease-in-out max-w-56 w-56 h-full flex flex-col bg-gray-900 text-gray-300 overflow-y-auto p-6"
>
    <button
        id="toggleSidebarBtn"
        class="mt-20 mb-4 self-end text-gray-400 hover:text-white focus:outline-none"
        aria-label="Toggle Sidebar"
        title="Encolher / Expandir menu"
    >
        <i class="bi bi-list text-2xl"></i>
    </button>

    <nav class="mt-4 flex flex-col space-y-8 flex-grow">

        @php
            function navLink($href, $label, $icon) {
                $isActive = request()->is(ltrim($href, '/').'*');
                $baseClasses = 'flex items-center gap-3 px-4 py-3 rounded-md transition-colors duration-200 cursor-pointer whitespace-nowrap';
                $activeClasses = 'bg-blue-600 text-white';
                $inactiveClasses = 'hover:bg-blue-700 hover:text-white text-gray-400';

                return '
                    <a href="' . $href . '" class="' . $baseClasses . ' ' . ($isActive ? $activeClasses : $inactiveClasses) . ' nav-link">
                        <i class="bi ' . $icon . ' text-xl ' . ($isActive ? 'text-white' : 'text-gray-400') . ' flex-shrink-0"></i>
                        <span class="aside-text">' . $label . '</span>
                    </a>
                ';
            }
        @endphp

        <ul class="flex flex-col gap-2">
            {!! navLink('/panel', 'painel', 'bi-house-fill') !!}
        </ul>

        <hr class="border-gray-700" />

        <ul class="flex flex-col gap-2">
            {!! navLink('/alunos', 'alunos', 'bi-people-fill') !!}
            {!! navLink('/estagiarios', 'estagiarios', 'bi-person-badge-fill') !!}
            {!! navLink('/pagamentos', 'pagamentos', 'bi-credit-card') !!}
        </ul>

        <hr class="border-gray-700" />

        <ul class="flex flex-col gap-2">
            {!! navLink('/instrutores', 'instrutores', 'bi-person-lines-fill') !!}
            {!! navLink('/desempenho', 'desempenho', 'bi-graph-up-arrow') !!}
            {!! navLink('/certificados', 'certificados', 'bi-card-text') !!}
        </ul>

        <hr class="border-gray-700" />

        <ul class="flex flex-col gap-2">
            {!! navLink('/usuarios', 'usuarios', 'bi-people') !!}
            {!! navLink('/turmas', 'turmas', 'bi-door-open') !!}
            {!! navLink('/cursos', 'cursos', 'bi-collection') !!}
            {!! navLink('/institutos', 'institutos', 'bi-building') !!}
            {!! navLink('/planos', 'estágios', 'bi-journal-text') !!}
        </ul>

        <hr class="border-gray-700" />

        <ul class="flex flex-col gap-2 mt-auto">
            <li>
                <button
                    onclick="showModal('sair')"
                    class="w-full text-left text-red-500 hover:text-red-600 flex items-center gap-2 px-4 py-3 rounded-md transition-colors duration-200"
                >
                    <i class="bi bi-box-arrow-left text-xl"></i>
                    <span class="aside-text">terminar sessão</span>
                </button>
            </li>
        </ul>

    </nav>
</aside>

<script>
const sidebar = document.getElementById('asidebar');
const toggleBtn = document.getElementById('toggleSidebarBtn');

let collapsed = false; // estado do sidebar

toggleBtn.addEventListener('click', () => {
    if (!collapsed) {
        // Encolher sidebar
        sidebar.classList.remove('w-56', 'p-6');
        sidebar.classList.add('w-16', 'p-2');
        document.querySelectorAll('.aside-text').forEach(el => el.classList.add('hidden'));

        // Ajustar links para centralizar ícone
        document.querySelectorAll('.nav-link').forEach(link => {
            link.classList.add('justify-center', 'px-0');
            link.classList.remove('px-4', 'gap-3');
        });

        collapsed = true;
    } else {
        // Expandir sidebar
        sidebar.classList.remove('w-16', 'p-2');
        sidebar.classList.add('w-56', 'p-6');
        document.querySelectorAll('.aside-text').forEach(el => el.classList.remove('hidden'));

        // Ajustar links para mostrar texto
        document.querySelectorAll('.nav-link').forEach(link => {
            link.classList.remove('justify-center', 'px-0');
            link.classList.add('px-4', 'gap-3');
        });

        collapsed = false;
    }
});
</script>
