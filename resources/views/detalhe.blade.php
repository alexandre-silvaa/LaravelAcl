@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <h2>Detalhes de chamados - Chamado {{ $chamado->id }}</h2>

        <b>Título: {{ $chamado->titulo }}</b>
        <p>{{ $chamado->descricao }}</p>

    </div>
</div>
@endsection
