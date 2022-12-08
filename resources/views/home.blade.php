@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <h2>Lista de Chamados</h2>

        @forelse($chamados as $chamado)
            <p>{{ $chamado->titulo }} 
            @can('ver_chamado',$chamado)
            <a href="/home/{{ $chamado->id }}">Visualizar</a></p> 
            @endcan
        @empty
            <p>Não existem chamados</p>
        @endforelse

    </div>
</div>
@endsection
