<?php

$request = explode('?', $_SERVER['REQUEST_URI'])[0];

if (isset($_SESSION['usuario'])) {
    switch ($request) {
        case '/' :
            header('Location: /aulas/listar', true, 302);
            break;
        case '/aulas/listar' :
            require __DIR__ . '/modulos/aulas/listar.php';
            break;
        case '/aulas/adicionar' :
            require __DIR__ . '/modulos/aulas/adicionar.php';
            break;
        case '/aulas/editar' :
            require __DIR__ . '/modulos/aulas/editar.php';
            break;
        case '/aulas/excluir' :
            require __DIR__ . '/modulos/aulas/excluir.php';
            break;
        default:
            http_response_code(404);
            header('Location: /erro-404.php', false, 302);
            break;
    }
} else {
    switch ($request) {
        case '/entrar' :
            require __DIR__ . '/modulos/login/entrar.php';
            break;
        default:
            http_response_code(404);
            header('Location: /entrar', false, 302);
            break;
    }

}

