
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/login.css" rel="stylesheet">
        <title>Sistema</title>
    </head>
    <div class="container">
        <div class="sidenav">
         <div class="login-main-text">
            <h2>Sistema<br>de Vendas</h2>
            <p>Faça Login ou registre-se para ter acesso.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form method="POST" action='/authenticate' aria-label="{{ __('Login') }}">
               @csrf
                  <div class="form-group">
                     <label>E-mail</label>
                     <input type="email" class="form-control" name= "email" id="email" required autofocus>
                     <div class="invalid-feedback">
                        Informe um e-mail válido.
                    </div>
                  </div>
                  <div class="form-group">
                     <label>Senha</label>
                     <input type="password" class="form-control" name="password" id="password" required>
                     <div class="invalid-feedback">
                        Informe uma senha.
                    </div>
                  </div>
                  <button type="submit" class="btn btn-black">{{ __('Login') }}</button>
                  <a type="submit" class="btn btn-secondary"  href="{{ route('register') }}">Registrar</a>
               </form>
            </div>
         </div>
      </div>
</div>
