<!doctype html>
<html lang="pt-br">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="/assets/bootstrap-4.2.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="/assets/css/slider.css">

   <title>Imoveis</title>
</head>

<body style="overflow-x: hidden;">
   <div class="container-fluid mx-2">
      <nav class="navbar navbar-expand-lg navbar-light bg-light row">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo03">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link active" href="/imoveis/novo">Cadastrar</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" href="/imoveis">Listar</a>
               </li>
               <li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                     @csrf
                     <button class="btn btn-primary">logout</button>
                  </form>
               </li>
            </ul>
         </div>
      </nav>
      @yield('conteudo')
      <section>
         <footer class="rodape">
            <script src="assets/js/jquery-3.3.1.min.js"></script>
            <script src="assets/bootstrap-4.2.1/js/bootstrap.min.js"></script>
         </footer>
      </section>
   </div>
</body>
</html>