@extends('principal')
@section('title', 'Listagem de Contas')

@section('content')
<script type="text/javascript">
	function apagar(url){
		if (window.confirm('Deseja realmente apagar?')){
			window.location = url;
		}
	}	
</script>

<h1>Lista de Contas Pagar</h1>

@if(old('insert'))
	<div class="alert alert-success">
		<strong>Sucesso</strong>
			{{ old('descricao')}} cadastrado!
	</div>
@endif

@if(old('update'))
	<div class="alert alert-success">
		<strong>Sucesso</strong>
			{{ old('descricao')}} alterada!
	</div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<table width="100%" class="table table-striped table-bordered table-hover">
	<tr style=" background-color: #0056b3; color:white">
		<td>ID</td>
		<td>DESCRIÇÃO</td>
		<td>Valor</td>
		<td>Editar</td>
		<td>Apagar</td>
	</tr>
@foreach ($contas_pagar as $c)
	<tr>
		<td>{{ $c->id}}</td>
		<td>{{ $c->descricao}}</td>
		<td>{{ $c->valor}}</td>
		<td><a class="btn btn-small btn-info" href="{{ action("ContasPagarController@editar", $c->id) }}">Editar</a></td>
		<td><a class="btn btn-small btn-danger" href="{{ action('ContasPagarController@apagar', $c->id) }}">Apagar</a></td>
	</tr>
@endforeach
</table>

<a class="btn btn-small btn-success" href="{{ action("ContasPagarController@cadastro") }}">Cadastrar</a>
@stop