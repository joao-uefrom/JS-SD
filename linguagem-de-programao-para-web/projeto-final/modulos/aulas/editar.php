<?php

require_once __DIR__ . '/../../classes/aula.php';

if ($_POST) {
    $aula = new Aula();
    $aula->setAula($_POST['aula']);
    $aula->setProfessor($_POST['professor']);
    $aula->setDia($_POST['dia']);
    $aula->atualizar();
    header('Location: /aulas/listar');
}

if ($_GET) {
    $aula = new Aula(false, $_GET['id']);
}

?>

<?php require_once __DIR__ . '/../../templates/header.php' ?>

<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title"> Editar Aula </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="/aulas/listar" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                   data-bs-target="#modal-report">
                    Listar
                </a>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card card-body">
                    <form action="/aulas/editar?id=<?= $_GET['id'] ?>" method="post">
                        <div class="form-group mb-3 ">
                            <label class="form-label">Aula</label>
                            <input type="text" value="<?= $aula->getAula() ?>" name="aula" class="form-control">
                        </div>
                        <div class="form-group mb-3 ">
                            <label class="form-label">Professor</label>
                            <input type="text" value="<?= $aula->getProfessor() ?>" name="professor" class="form-control">
                        </div>
                        <div class="form-group mb-3 ">
                            <label class="form-label">Dia da Semana</label>
                            <input type="text" value="<?= $aula->getDia() ?>" name="dia" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/../../templates/footer.php' ?>
