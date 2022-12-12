@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <h2>Lista de Chamados</h2>

        @can('create', App\Chamado::class)
        <p>Criar Chamado</p>
        @endcan

        @forelse($chamados as $chamado)
            <p>{{ $chamado->titulo }} 
            @can('view',$chamado)
            <a href="/home/{{ $chamado->id }}">Visualizar</a>
            @endcan
            @can('update',$chamado)
            <a href="/home/{{ $chamado->id }}">Atualizar</a>
            @endcan
            @can('delete',$chamado)
            <a href="/home/{{ $chamado->id }}">Deletar</a>
            @endcan
        @empty
            <p>Não existem chamados</p>
        @endforelse

    </div>
</div>
@endsection
