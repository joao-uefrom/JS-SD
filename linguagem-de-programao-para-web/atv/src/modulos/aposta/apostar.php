<?php

require_once "bootstrap.php";

use Atv\Classes\Aposta;

if ($_GET['tipo-de-aposta'] == 'grupo-simples') {
    $tipoDeAposta = 1;
    $titulo = 'Grupo Simples';
    $aposta_campo =
        '<div class="mb-2">
    <label class="form-label">Bicho: <span id="valor"></span></label>
    <input type="range" class="form-range mb-2" value="1" min="1" max="25" step="1" name="bicho" id="bicho">
    </div>';
}
if ($_GET['tipo-de-aposta'] == 'milhar') {
    $tipoDeAposta = 2;
    $titulo = 'Milhar';
    $aposta_campo =
        '<div class="mb-3">
    <label class="form-label">Número da sorte</label>
    <input type="text" class="form-control" name="numero-da-sorte-1" data-mask="0000" data-mask-visible="false" autocomplete="off">
    </div>';
}
if ($_GET['tipo-de-aposta'] == 'duque-de-dezena') {
    $tipoDeAposta = 3;
    $titulo = 'Duque de Dezena';
    $aposta_campo =
        '<div class="mb-3">
            <label class="form-label">Números da sorte</label>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="numero-da-sorte-1" data-mask="0000" data-mask-visible="false" autocomplete="off">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="numero-da-sorte-2" data-mask="0000" data-mask-visible="false" autocomplete="off">
                </div>
            </div>
        </div>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $apostador = $entityManager->getRepository('Atv\Classes\Apostador')
        ->findOneBy(array('cpf' => $_POST['cpf']));
    if ($apostador !== null) {

        $aposta = new Aposta();
        $aposta->setApostador($apostador);
        $aposta->setTipoDeAposta($tipoDeAposta);
        $aposta->setValor($_POST['valor']);
        $aposta->setData(new DateTime('NOW'));

        if ($_GET['tipo-de-aposta'] == 'grupo-simples') {
            $aposta->setBicho($_POST['bicho']);
            $aposta->setTipoDeJogo($_POST['tipo-de-jogo']);
        }

        if ($_GET['tipo-de-aposta'] == 'milhar') {
            $aposta->setNumeroDaSorte1($_POST['numero-da-sorte-1']);
            $aposta->setTipoDeJogo($_POST['tipo-de-jogo']);
        }

        if ($_GET['tipo-de-aposta'] == 'duque-de-dezena') {
            $aposta->setNumeroDaSorte1($_POST['numero-da-sorte-1']);
            $aposta->setNumeroDaSorte2($_POST['numero-da-sorte-2']);
        }

        $entityManager->persist($aposta);
        $entityManager->flush();
    }
}

?>


<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title"> Adicione uma aposta </h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <!-- Content here -->
        <div class="row row-cards justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <form method="post" class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo $titulo; ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">CPF</label>
                            <input type="text" class="form-control" name="cpf" data-mask="000.000.000-00" data-mask-visible="false" autocomplete="off">
                        </div>
                        <?php echo $aposta_campo; ?>
                        <div class="mb-3">
                            <label class="form-label">Valor</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text"> R$ </span>
                                <input type="text" class="form-control" placeholder="100,00" autocomplete="off" name="valor">
                            </div>
                        </div>
                        <?php

                        echo $_GET['tipo-de-aposta'] !== 'duque-de-dezena' ? '<div class="mb-3">
                        <label class="form-label">Tipo de Jogo</label>
                        <div class="form-selectgroup">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="tipo-de-jogo" value="1" class="form-selectgroup-input">
                                <span class="form-selectgroup-label">Cabeça</span>
                            </label>
                            <label class="form-selectgroup-item">
                                <input type="radio" name="tipo-de-jogo" value="2" class="form-selectgroup-input" checked>
                                <span class="form-selectgroup-label">Cercar</span>
                            </label>
                        </div>
                    </div>' : null;

                        ?>

                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary ms-auto"> Adicionar </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const bichos = [
        ["Avestruz", [1, 2, 3, 4]],
        ["Águia", [5, 6, 7, 8]],
        ["Burro", [9, 10, 11, 12]],
        ["Borboleta", [13, 14, 15, 16]],
        ["Cachorro", [17, 18, 19, 20]],
        ["Cabra", [21, 22, 23, 24]],
        ["Carneiro", [25, 26, 27, 28]],
        ["Camelo", [29, 30, 31, 32]],
        ["Cobra", [33, 34, 35, 36]],
        ["Coelho", [37, 38, 39, 40]],
        ["Cavalo", [41, 42, 43, 44]],
        ["Elefante", [45, 46, 47, 48]],
        ["Galo", [49, 50, 51, 52]],
        ["Gato", [53, 54, 55, 56]],
        ["Jacaré", [57, 58, 59, 60]],
        ["Leão", [61, 62, 63, 64]],
        ["Macaco", [65, 66, 67, 68]],
        ["Porco", [69, 70, 71, 72]],
        ["Pavão", [73, 74, 75, 76]],
        ["Peru", [77, 78, 79, 80]],
        ["Touro", [81, 82, 83, 84]],
        ["Tigre", [85, 86, 87, 88]],
        ["Urso", [89, 90, 91, 92]],
        ["Veado", [93, 94, 95, 96]],
        ["Vaca", [97, 98, 99, 0]]
    ]
    const slider = document.getElementById("bicho");
    const output = document.getElementById("valor");

    output.innerHTML = slider.value + " - " + bichos[slider.value - 1][0] + " - (" + bichos[slider.value - 1][1] + ")";

    slider.oninput = function() {
        output.innerHTML = slider.value + " - " + bichos[this.value - 1][0] + " - (" + bichos[slider.value - 1][1] + ")";
    }
</script>