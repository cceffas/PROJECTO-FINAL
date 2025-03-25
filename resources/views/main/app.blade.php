@extends('layouts.main')





@section('content')
    <div class="flex grow max-w-full">
 
        <x-Asidebar screen="#view-port" />
        {{-- end --}}

        <section class="flex flex-col w-full max-h-screen " id="view-port">

            {{-- area onde o conteudo sera exibido --}}
            @include('AreaFinanceira.dashboard')
        </section>

    </div>
@endsection
<!-- end -->
