<!doctype html>

<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Programação para WEB</title>
  <!-- CSS files -->
  <link href="./dist/css/tabler.css" rel="stylesheet" />
</head>

<body class="antialiased">
  <div class="page">
    <!-- HEADER -->
    <header class="navbar navbar-expand-md navbar-light d-print-none">
      <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
          <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
          <a href=".">
            <img src="./static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
          </a>
        </h1>
      </div>
    </header>
    <div class="navbar-expand-md">
      <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
          <div class="container-xl">
            <ul class="navbar-nav">
              <!-- INICIO -->
              <li class="nav-item <?php echo !isset($_GET['modulo']) ? 'active' : ''; ?>">
                <a class="nav-link" href="./">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <polyline points="5 12 3 12 12 3 21 12 19 12" />
                      <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                      <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                    </svg>
                  </span>
                  <span class="nav-link-title"> Início </span>
                </a>
              </li>
              <!-- APOSTADORES -->
              <li class="nav-item <?php echo (isset($_GET['modulo']) && $_GET['modulo'] == 'apostador') ? "active" : ""; ?>">
                <a class="nav-link" href="?modulo=apostador" role="button" aria-expanded="false">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/users -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <circle cx="9" cy="7" r="4" />
                      <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                      <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                      <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                    </svg>
                  </span>
                  <span class="nav-link-title"> Apostadores </span>
                </a>
              </li>
              <!-- APOSTAS -->
              <li class="nav-item dropdown <?php echo (isset($_GET['modulo']) && $_GET['modulo'] == 'aposta') ? "active" : ""; ?>">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <polyline points="9 11 12 14 20 6" />
                      <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                    </svg>
                  </span>
                  <span class="nav-link-title"> Apostas </span>
                </a>


                <div class="dropdown-menu">
                  <div class="dropend">
                    <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false"> Apostar </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="?modulo=aposta&acao=apostar&tipo-de-aposta=grupo-simples"> Grupo Simples </a>
                      <a class="dropdown-item" href="?modulo=aposta&acao=apostar&tipo-de-aposta=milhar"> Milhar </a>
                      <a class="dropdown-item" href="?modulo=aposta&acao=apostar&tipo-de-aposta=duque-de-dezena"> Duque de Dezena </a>
                    </div>
                  </div>

                  <a class="dropdown-item" href="?modulo=aposta&acao=listar"> Listar </a>
                </div>
              </li>
              <!-- JOGOS -->
              <li class="nav-item <?php echo (isset($_GET['modulo']) && $_GET['modulo'] == 'jogo') ? "active" : ""; ?>">
                <a class="nav-link" role="button" aria-expanded="false" href="?modulo=jogo">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                      <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                      <line x1="9" y1="9" x2="10" y2="9" />
                      <line x1="9" y1="13" x2="15" y2="13" />
                      <line x1="9" y1="17" x2="15" y2="17" />
                    </svg>
                  </span>
                  <span class="nav-link-title"> Jogos </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- FIM HEADER -->
    <div class="page-wrapper">
      <!-- CONTEUDO -->
      <?php

      if (!isset($_GET['modulo'])) {
        include_once('./src/modulos/index.php');
      } else if (!isset($_GET['acao'])) {
        $modulo = $_GET['modulo'];
        $file = './src/modulos/' . $modulo . '/index.php';
        include_once(file_exists($file) ? $file : './index.php');
      } else {
        $modulo = $_GET['modulo'];
        $acao = $_GET['acao'];
        $file = './src/modulos/' . $modulo . '/' . $acao . '.php';
        include_once(file_exists($file) ? $file : './index.php');
      }

      ?>
      <!-- FIM CONTEUDO -->
      <!-- FOOTER -->
      <footer class="footer footer-transparent d-print-none">
        <div class="container">
          <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ms-lg-auto">
              <ul class="list-inline list-inline-dots mb-0">
                <li class="list-inline-item"><a href="./docs/index.html" class="link-secondary">Documentation</a></li>
                <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
                <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
                <li class="list-inline-item">
                  <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
                    <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                    </svg>
                    Sponsor
                  </a>
                </li>
              </ul>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
              <ul class="list-inline list-inline-dots mb-0">
                <li class="list-inline-item">
                  Copyright &copy; 2021
                  <a href="." class="link-secondary">Tabler</a>.
                  All rights reserved.
                </li>
                <li class="list-inline-item">
                  <a href="./changelog.html" class="link-secondary" rel="noopener">v1.0.0-beta2</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
      <!-- FIM FOOTER -->
    </div>
  </div>
  <!-- Libs JS -->
  <!-- Tabler Core -->
  <script src="./dist/js/tabler.js"></script>
</body>

</html>