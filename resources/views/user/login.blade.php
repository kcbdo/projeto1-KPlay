<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - KPlay</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f5f5f5; /* cinza claro */
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .card {
      background-color: #fff;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    .card h2 {
      text-align: center;
      color: #FFD600; /* amarelo */
      margin-bottom: 25px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group input {
      width: 100%;
      padding: 12px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-sizing: border-box;
    }

    .form-group input:focus {
      border-color: #FFD600;
      outline: none;
      box-shadow: 0 0 5px #FFD60044;
    }

    .btn-login {
      width: 100%;
      padding: 12px;
      background-color: #FFD600;
      color: #333;
      font-weight: bold;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn-login:hover {
      background-color: #e6c200;
    }

    .footer-text {
      text-align: center;
      font-size: 14px;
      margin-top: 20px;
      color: #666;
    }

    .footer-text a {
      color: #FFD600;
      text-decoration: none;
    }

    .footer-text a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="card">
    <h2>Entrar no KPlay</h2>
    <form method="POST" action="/login">
      @csrf
      <div class="form-group">
        <input type="email" name="email" placeholder="E-mail" required>
      </div>
      <div class="form-group">
        <input type="password" name="password" placeholder="Senha" required>
      </div>
      <button type="submit" class="btn-login">Entrar</button>
    </form>
    <div class="footer-text">
      Não tem uma conta? <a href="/register">Cadastre-se</a>
    </div>
  </div>

</body>
</html>
