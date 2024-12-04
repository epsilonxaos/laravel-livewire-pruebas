@extends('layouts.admin')

@section('content')
    <div class="relative overflow-x-auto pt-6 px-1">

        <a href="{{ route('sucursales.create') }}">Ir a crear</a>

        @foreach ($data as $item)
            <div>
                <img src="{{ asset($item->cover) }}" class="object-cover" width="200px" height="150px" alt="">
                <p>{{ $item->name }}</p>

                <a href="{{ route('sucursales.edit', ['id' => $item->id]) }}">Editar</a>
            </div>
        @endforeach

    </div>
@endsection
