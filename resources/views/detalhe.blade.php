@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <h2>Detalhes de chamados - Chamado {{ $chamado->id }}</h2>

        @can('ver_chamado',$chamado)
        <b>Título: {{ $chamado->titulo }}</b>
        <p>{{ $chamado->descricao }}</p>
        @else
        <p>Você não tem permissão para ver esse registro!</p>
        @endcan

    </div>
</div>
@endsection
