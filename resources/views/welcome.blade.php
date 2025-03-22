@extends('layouts.main')


@section('content')
<div class="container-column center grow w-100 p-8 g-16 " id="view">


    <i class="bi-gear f-6x"></i>

    @if (session()->has('message'))
    <p class="bg-red-400">{{ session()->get('message') }}</p>
    @else




    <x-bladewind::button.circle onclick=" change_page_request('http://127.0.0.1:8000/','view')" />
    @endif


</div>
@endsection