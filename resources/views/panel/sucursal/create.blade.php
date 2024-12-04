@extends('layouts.admin')

@section('content')
    <div class="relative overflow-x-auto pt-6 px-1">

        {{-- componente livewire --}}

        @livewire('sucursal.form-sucursal')

    </div>
@endsection
