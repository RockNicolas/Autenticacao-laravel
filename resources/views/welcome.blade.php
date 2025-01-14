@extends('principal')
@section('title', 'Bem Vindo')

@section('content')
<link rel="stylesheet" href="css/welcome.css">
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default custom-panel">
                <div class="panel-heading" style="background-color: #0056b3; color: white;">
                    Bem Vindo
                </div>
                <div class="panel-body">
                    Bem vindo ao Sistema de Gerenciamento de materiais.
                </div>
            </div>
        </div>
        <div class="text-center">
            <img src="{{ asset('img/foto.png') }}" alt="Imagem de boas-vindas" class="img-fluid custom-img">
        </div>
    </div>
</div>
@endsection
