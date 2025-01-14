@extends('principal')
@section('title', 'Listagem de Contas')

@section('content')
<link rel="stylesheet" href="css/principal.css">
<h1>Cadastro de Contas</h1>
@if (count($errors) > 0)
	<div class="alert alert-danger">
	<strong>Erros:</strong>
		<ul>	
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach		
		</ul>
	</div>
@endif

<form action="{{ action('ContasPagarController@salvar') }}" method="POST">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
	<input type="hidden" name="insert" value="insert">

	 @if (Auth::check())
		<div class="form-group">
			<label>Usuário:</label>
			<input type="text" name="user" readonly="readonly" class="form-control" value="{{Auth::user()->name}}">
		</div>
	@endif

	<div class="form-group">
		<label>Descrição:</label>
		<input type="text" name="descricao" class="form-control" value="{{old('descricao')}}">
	</div>
	<div class="form-group">
		<label>Valor:</label>
		<input type="text" name="valor" class="form-control">
	</div>
	<button type="submit" class="btn btn-success">Cadastrar</button>
</form>
@stop