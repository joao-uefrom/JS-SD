<?php
require_once "bootstrap.php";

$bichos = [
    ['Avestruz', [1, 2, 3, 4]],
    ['Águia', [5, 6, 7, 8]],
    ['Burro', [9, 10, 11, 12]],
    ['Borboleta', [13, 14, 15, 16]],
    ['Cachorro', [17, 18, 19, 20]],
    ['Cabra', [21, 22, 23, 24]],
    ['Carneiro', [25, 26, 27, 28]],
    ['Camelo', [29, 30, 31, 32]],
    ['Cobra', [33, 34, 35, 36]],
    ['Coelho', [37, 38, 39, 40]],
    ['Cavalo', [41, 42, 43, 44]],
    ['Elefante', [45, 46, 47, 48]],
    ['Galo', [49, 50, 51, 52]],
    ['Gato', [53, 54, 55, 56]],
    ['Jacaré', [57, 58, 59, 60]],
    ['Leão', [61, 62, 63, 64]],
    ['Macaco', [65, 66, 67, 68]],
    ['Porco', [69, 70, 71, 72]],
    ['Pavão', [73, 74, 75, 76]],
    ['Peru', [77, 78, 79, 80]],
    ['Touro', [81, 82, 83, 84]],
    ['Tigre', [85, 86, 87, 88]],
    ['Urso', [89, 90, 91, 92]],
    ['Veado', [93, 94, 95, 96]],
    ['Vaca', [97, 98, 99, 00]]
];

$apostadorRepository = $entityManager->getRepository('Atv\Classes\Apostador');
$apostadores = $apostadorRepository->findAll();

$apostaRepository = $entityManager->getRepository('Atv\Classes\Aposta');

$apostas = $apostaRepository->findBy(['tipoDeAposta' => 1], ['id' => 'DESC']);
$tabela1 = '';
foreach ($apostas as $aposta) {
    $tipoDeJogo = $aposta->getTipoDeJogo() === 1 ? 'Cabeça' : 'Cerca';
    $linha = "<tr>";
    $linha .= "<td>" . $aposta->getId() . "</td>";
    $linha .= "<td class='text-muted'>" . $bichos[$aposta->getBicho() - 1][0] . "</td>";
    $linha .= "<td class='text-muted'><a href='mailto:" . $aposta->getApostador()->getEmail() . "' class='text-reset'>" . $aposta->getApostador()->getEmail() . "</a></td>";
    $linha .= "<td class='text-muted'>" . $tipoDeJogo . "</td>";
    $linha .= "<td class='text-muted'> R$ " . $aposta->getValor() . "</td>";
    $linha .= "</tr>";
    $tabela1 .= $linha;
}

$apostas = $apostaRepository->findBy(['tipoDeAposta' => 2], ['id' => 'DESC']);
$tabela2 = '';
foreach ($apostas as $aposta) {
    $tipoDeJogo = $aposta->getTipoDeJogo() === 1 ? 'Cabeça' : 'Cerca';
    $linha = "<tr>";
    $linha .= "<td>" . $aposta->getId() . "</td>";
    $linha .= "<td class='text-muted'>" . $aposta->getNumeroDaSorte1() . "</td>";
    $linha .= "<td class='text-muted'><a href='mailto:" . $aposta->getApostador()->getEmail() . "' class='text-reset'>" . $aposta->getApostador()->getEmail() . "</a></td>";
    $linha .= "<td class='text-muted'>" . $tipoDeJogo . "</td>";
    $linha .= "<td class='text-muted'> R$ " . $aposta->getValor() . "</td>";
    $linha .= "</tr>";
    $tabela2 .= $linha;
}

$apostas = $apostaRepository->findBy(['tipoDeAposta' => 3], ['id' => 'DESC']);
$tabela3 = '';
foreach ($apostas as $aposta) {
    $linha = "<tr>";
    $linha .= "<td>" . $aposta->getId() . "</td>";
    $linha .= "<td class='text-muted'>" . $aposta->getNumeroDaSorte1() . "</td>";
    $linha .= "<td class='text-muted'>" . $aposta->getNumeroDaSorte2() . "</td>";
    $linha .= "<td class='text-muted'><a href='mailto:" . $aposta->getApostador()->getEmail() . "' class='text-reset'>" . $aposta->getApostador()->getEmail() . "</a></td>";
    $linha .= "<td class='text-muted'> R$ " . $aposta->getValor() . "</td>";
    $linha .= "</tr>";
    $tabela3 .= $linha;
}

?>

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title"> Apostas </h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <!-- Content here -->
        <div class="col-12 mb-3">
            <div class="text-muted mb-2">Grupo Simples</div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Bicho</th>
                                <th>Email</th>
                                <th>Tipo de Jogo</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody><?php echo $tabela1; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="text-muted mb-2">Milhar</div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Número da Sorte</th>
                                <th>Email</th>
                                <th>Tipo de Jogo</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody><?php echo $tabela2; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="text-muted mb-2">Duque de Dezena</div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Número da Sorte 1</th>
                                <th>Número da Sorte 2</th>
                                <th>Email</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody><?php echo $tabela3; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>