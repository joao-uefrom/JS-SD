<?php
require_once "bootstrap.php";

use Atv\Classes\Apostador;

// VALIDAÇÕES

$nomeErro = $emailErro = $cpfErro = "";
$nome = $email = $cpf = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST['nome'])) {
    $nomeErro = "Nome invalido";
  } else {
    $nome = sanitizarInput($_POST['nome']);
  }
  if (empty($_POST['email'])) {
    $emailErro = "Email invalido";
  } else {
    $email = sanitizarInput($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErro = "Email invalido";
    }
  }

  $cpf = str_replace("_", "", $_POST['cpf']);

  if (strlen($cpf) < 14) {
    $cpfErro = "CPF invalido";
  } else {
    $cpf = $_POST['cpf'];
  }

  if (
    $nomeErro === "" &&
    $emailErro  === "" &&
    $cpfErro === ""
  ) {
    $apostador = new Apostador();
    $apostador->setNome($nome);
    $apostador->setEmail($email);
    $apostador->setCpf($cpf);
    $entityManager->persist($apostador);
    $entityManager->flush();
    $nome = $email = $cpf = "";
  }
}

function sanitizarInput($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// TABELA

$apostadorRepository = $entityManager->getRepository('Atv\Classes\Apostador');
$apostadores = $apostadorRepository->findBy([], ["id" => "DESC"]);

$tabela = '';

foreach ($apostadores as $apostador) {
  $linha = "<tr>";
  $linha .= "<td>" . $apostador->getId() . "</td>";
  $linha .= "<td>" . $apostador->getNome() . "</td>";
  $linha .= "<td>" . $apostador->getCpf() . "</td>";
  $linha .= "<td class='text-muted'><a href='mailto:" . $apostador->getEmail() . "' class='text-reset'>" . $apostador->getEmail() . "</a></td>";
  $linha .= "</tr>";
  $tabela .= $linha;
}

?>

<div class="container-xl">
  <!-- Page title -->
  <div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title"> Apostadores </h2>
      </div>
    </div>
  </div>
</div>

<div class="page-body">
  <div class="container-xl">
    <!-- Content here -->
    <div class="row row-cards">
      <div class="col-md-4">
        <form method="post" class="card">
          <div class="card-header">
            <h4 class="card-title">Adicionar um Apostador</h4>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label required">Nome:</label>
              <input type="text" class="form-control <?php echo $nomeErro !== "" ? "is-invalid" : "" ?>" name="nome" value="<?php echo $nome; ?>">
              <?php echo $nomeErro !== "" ? '<div class="invalid-feedback">' . $nomeErro . '</div>' : "" ?>
            </div>
            <div class="mb-3">
              <label class="form-label required">Email:</label>
              <input type="text" class="form-control <?php echo $emailErro !== "" ? "is-invalid" : "" ?>" name="email" value="<?php echo $email; ?>">
              <?php echo $emailErro !== "" ? '<div class="invalid-feedback">' . $emailErro . '</div>' : "" ?>
            </div>
            <div class="mb-3">
              <label class="form-label required">CPF:</label>
              <input type="text" class="form-control <?php echo $cpfErro !== "" ? "is-invalid" : "" ?>" name="cpf" data-mask="000.000.000-00" data-mask-visible="false" value="<?php echo $cpf; ?>">
              <?php echo $cpfErro !== "" ? '<div class="invalid-feedback">' . $cpfErro . '</div>' : "" ?>
            </div>
          </div>
          <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary ms-auto"> Adicionar </button>
          </div>
        </form>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Lista de Apostadores</h3>
          </div>
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nome</th>
                  <th>CPF</th>
                  <th>E-mail</th>
                </tr>
              </thead>
              <tbody>
                <?php echo $tabela; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>