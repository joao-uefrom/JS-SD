<?php

require_once __DIR__ . '/../../classes/aula.php';

$id = $_GET['id'];

$aula = new Aula(false, $id);
$aula->excluir();

header('Location: /aulas/listar');
