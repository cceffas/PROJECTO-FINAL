@props(['screen'])

<div class="x-asidebar-app container-column g-32">

    <div class="container-row  g-16 ">

        {{-- <button class="asidebar-btn-tool"><i class="bi-x"></i></button>
        end --}}

        <button class="asidebar-btn-tool" onclick="asidebarCollaps()"><i class="bi-arrow-left"></i></button>
        {{-- end --}}

        {{-- <button class="asidebar-btn-tool"><i class="bi-layout-sidebar"></i></button>
        end --}}
    </div>
    {{-- end --}}

    <aside>

        <nav class="container-column g-8">

            <div class="aside-group-options  ">

                {{-- <h1 class="aside-title-option ">
                    inicio
                </h1> --}}
                {{-- end --}}

                <button class="aside-btn-option active-btn-option" onclick="reloadScreen()">
                    <i class="bi-house-fill"></i>
                    dashboard
                </button>
                {{-- end --}}

            </div>
            {{-- end  inicio --}}
            <hr>
            {{-- end --}}
            <div class="aside-group-options  ">

                <h1 class="aside-title-option">
                    area financeira
                </h1>
                {{-- end --}}


                <button class="aside-btn-option" onclick="changeScreen('/insc','{{ $screen }}')">
                    <i class="bi-person-fill-add"></i>
                    inscrição
                </button>
                {{-- end --}}
                <button class="aside-btn-option">
                    <i class="bi-person-vcard-fill"></i>
                    pagamentos
                </button>
                {{-- end --}}
                <button class="aside-btn-option">
                    <i class="bi-person-fill-gear"></i>
                    gerenciar aluno
                </button>
                {{-- end --}}

            </div>
            {{-- end  area financeira --}}
            <hr>
            {{-- end --}}
            <div class="aside-group-options">

                <h1 class="aside-title-option">
                    area pedagica
                </h1>
                {{-- end --}}

                <button class="aside-btn-option">
                    <i class="bi-people-fill"></i>
                    painel Alunos
                </button>
                {{-- end --}}

                <button class="aside-btn-option">
                    <i class="bi-postcard-fill"></i>
                    certificados
                </button>
                {{-- end --}}

                <button class="aside-btn-option">
                    <i class="bi-calendar-month-fill"></i>
                    assiduidade
                </button>
                {{-- end --}}


            </div>
            {{-- end area pedagica --}}
            <hr>
            {{-- end --}}
            <div class="aside-group-options">

                <h1 class="aside-title-option">
                    admin
                </h1>
                {{-- end --}}
                <button class="aside-btn-option">
                    <i class="bi-gear-fill"></i>
                    option
                </button>
                {{-- end --}}


            </div>
            {{-- end  admin --}}
            <hr>
            {{-- end --}}
            <div class="aside-group-options">

                <h1 class="aside-title-option">
                    definições
                </h1>
                {{-- end --}}
                <div class="flex space-b">
                    <label>modo escuro</label>
                    <x-bladewind::toggle />
                </div>
                {{-- end --}}
                <div class="flex space-b">
                    <label>relogio</label>
                    <x-bladewind::toggle />
                </div>


            </div>
            {{-- end  admin --}}

        </nav>
        {{-- end --}}

    </aside>
    {{-- end --}}

</div>
