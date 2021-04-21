<?php

use Atv\Classes\Sorteio;

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

if (isset($_GET['sortear'])) {
  $sorteio = new Sorteio();
  $numerosDaSorte = array(
    rand(1000, 9999),
    rand(1000, 9999),
    rand(1000, 9999),
    rand(1000, 9999),
    rand(1000, 9999),
    rand(100, 999)
  );

  $sorteio->setValores(json_encode($numerosDaSorte));
  $sorteio->setData(new DateTime('NOW'));

  $entityManager->persist($sorteio);
  $entityManager->flush();
}

$sorteioRepository = $entityManager->getRepository('Atv\Classes\Sorteio');
$sorteios = $sorteioRepository->findBy([], ['id' => 'DESC']);

$tabelas = '';
foreach ($sorteios as $sorteio) {

  $data = $sorteio->getData()
    ->setTimezone(new DateTimeZone('America/Sao_Paulo'))
    ->format('d/m/Y * H:i:s');

  $tabelas .= '
  <div class="col-12 mb-3">
    <div class="text-muted mb-2">Data: ' . $data . '</div>
    <div class="card">
      <div class="table-responsive">
        <table class="table table-vcenter card-table">
          <thead>
            <tr>
              <th>Posição</th>
              <th>Número da Sorte</th>
              <th>Bicho</th>
            </tr>
          </thead>
          <tbody>
  ';

  $numerosDaSorte = (array) json_decode($sorteio->getValores());

  foreach ($numerosDaSorte as $i => $numeroDaSorte) {

    settype($numeroDaSorte, "string");

    $bichoNumero = (int) $numeroDaSorte[strlen($numeroDaSorte) - 2] . $numeroDaSorte[strlen($numeroDaSorte) - 1];

    foreach ($bichos as $j => $bicho) {
      $encontrou = (string) array_search($bichoNumero, $bicho[1]);
      if ($encontrou !== "") {
        $bichoNome = $j + 1 . " - " . $bicho[0] . " (" . $bichoNumero . ")";
        break;
      }
    }

    $linha = "<tr>";
    $linha .= "<td> " . $i + 1 . "º </td>";
    $linha .= "<td class='text-muted'> " . $numeroDaSorte .  " </td>";
    $linha .= "<td class='text-muted'> " . $bichoNome . " </td>";
    $linha .= "</tr>";
    $tabelas .= $linha;
  }

  $tabelas .= '
          </tbody>
        </table>
      </div>
    </div>
  </div>
  ';
}

?>

<div class="container-xl">
  <!-- Page title -->
  <div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title"> Jogos </h2>
      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <a href="?modulo=jogo&sortear" class="btn btn-primary">
          <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <line x1="12" y1="5" x2="12" y2="19" />
            <line x1="5" y1="12" x2="19" y2="12" />
          </svg>
          Sortear jogo
        </a>
      </div>
    </div>
  </div>
</div>

<div class="page-body">
  <div class="container-xl">
    <!-- Content here -->
    <?php echo $tabelas; ?>
  </div>
</div>