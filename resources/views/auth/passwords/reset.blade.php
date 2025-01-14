
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Redefinir Senha</h2>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">

        <div class="form-group">
            <label for="password">Nova Senha</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmar Nova Senha</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-primary">Redefinir Senha</button>
    </form>
</div>
@endsection
