@extends('template')
@section('page-container')

<div class="container d-flex justify-content-center align-items-center min-vh-100">
  <div class="card card-login p-4 w-100" style="max-width: 400px;">
     <div class ="kplay-logo mb-3"> KPlaysy </div>

    <h2></h2>

    <form method="POST" action="/login">
      @csrf
      <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="E-mail" required>
      </div>
      <div class="mb-3">
        <input type="password" name="password" class="form-control" placeholder="Senha" required>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn-pastel">Entrar</button>
      </div>
    </form>

    <div class="text-center mt-4">
      <span class="text-muted">Não tem uma conta?</span>
        <a href="/register" class="link-yellow">Cadastre-se</a>

@endsection