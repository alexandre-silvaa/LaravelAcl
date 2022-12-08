@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <h2>Lista de Chamados</h2>

        @forelse($chamados as $chamado)
            <p>{{ $chamado->titulo }} <a href="/home/{{ $chamado->id }}">Visualizar</a></p> 
        @empty
            <p>Não existem chamados</p>
        @endforelse

    </div>
</div>
@endsection
