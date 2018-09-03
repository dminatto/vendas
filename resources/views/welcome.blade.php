<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/home.css" rel="stylesheet">
        <script src="/js/home.js"></script> 
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

        <title>Sistema</title>
        
    </head>

<body>
  <div id="wrapper" class="animate">
    <nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark">
      <span class="navbar-toggler-icon leftmenutrigger"></span>
      <a class="navbar-brand" href="#">Gestão de Vendas</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav animate side-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{action('Auth\LoginController@index')}}" title="Home"><i class="fas fa-home"></i> Home <i class="fas fa-home shortmenu animate"></i></a>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="{{action('SellerController@list')}}" title="Vendedores"><i class="fas fa-briefcase"></i> Vendedores <i class="fas fa-briefcase shortmenu animate"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{action('ItemController@list')}}" title="Estoque"><i class="fas fa-cube"></i>Estoque<i class="fas fa-cube shortmenu animate"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{action('SaleController@list')}}" title="Venda"><i class="fas fa-cart-plus"></i> Venda <i class="fas fa-cart-plus shortmenu animate"></i></a>
          </li>
        </ul>
        <ul class="navbar-nav ml-md-auto d-md-flex">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-user"></i>  @if(Auth::check()) {{Auth::user()->name}} @endif  </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{action('Auth\LoginController@logout')}}" <i class="fas fa-sign-out-alt"></i> Logout</a>
          </li>
        </ul>
      </div>
    </nav>
    <script>
      $(document).ready( function () {
        $('.leftmenutrigger').on('click', function (e) {
          $('.side-nav').toggleClass("open");
          $('#wrapper').toggleClass("open");
          e.preventDefault();
        });
      });
    </script>
    <div class="container">
      @yield('conteudo')
    </div>
  </div>
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    </body>
</html>
