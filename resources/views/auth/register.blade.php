@extends('template')
@section('page-container')

<div class="container d-flex justify-content-center align-items-center min-vh-100">
  <div class="card card-login p-4 w-100" style="max-width: 400px;">
     <div class="kplay-logo mb-3"> KPlay </div>
    

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="mb-3">
        <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ old('name') }}" required autofocus>
      </div>

      <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="E-mail" value="{{ old('email') }}" required>
      </div>

      <div class="mb-3">
        <input type="password" name="password" class="form-control" placeholder="Senha" required>
      </div>

      <div class="mb-3">
        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme a Senha" required>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn-pastel">Cadastrar</button>
      </div>
    </form>

    <div class="text-center mt-4">
      <span class="text-muted">Já tem uma conta?</span>
      <a href="{{ route('login') }}" class="link-yellow">Entrar</a>
    </div>
  </div>
</div>

@endsection
