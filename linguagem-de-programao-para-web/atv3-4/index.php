<html>

<head>

    <title>Programação para WEB</title>

</head>

<body>

    <h1>Programação para WEB</h1>

    <h3>Formulário</h3>
    <form name="formCadastro" method="post">
        <p>Nome: <input type="text" name="nome" /></p>
        <p>E-mail: <input type="text" name="email" /></p>
        <p>Curso: <input type="text" name="curso" /></p>
        <input name="buttao" type="submit" value="Cadastrar" />
    </form>

    <?php
    $estudantes = array();
    $estudantes[] = array(
        'id' => 0,
        'nome' => 'Artur',
        'email' => 'artur@meta.edu.br',
        'curso' => 'Engenharia'
    );
    $estudantes[] = array(
        'id' => 1,
        'nome' => 'Felipe',
        'email' => 'felipe@meta.edu.br',
        'curso' => 'Jogos'
    );
    $estudantes[] = array(
        'id' => 2,
        'nome' => 'Roberto',
        'email' => 'roberto@meta.edu.br',
        'curso' => 'Redes'
    );
    $estudantes[] = array(
        'id' => 3,
        'nome' => 'Ramom',
        'email' => 'ramom@meta.edu.br',
        'curso' => 'Sistemas'
    );

    if (
        !empty($_POST['nome']) &&
        !empty($_POST['email']) &&
        !empty($_POST['curso'])
    ) {
        $estudantes[] = array(
            'id' => 5,
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'curso' => $_POST['curso']
        );
    }
    $linha = "<br />";
    $linha .= "<h3>Cadastrados</h3>";
    $linha .= "<table border='1'>";
    $linha .= "<thead>";
    $linha .= "<tr>";
    $linha .= "<th>ID</th>";
    $linha .= "<th>Nome</th>";
    $linha .= "<th>E-mail</th>";
    $linha .= "<th>Curso</th>";
    $linha .= "</tr>";
    $linha .= "</thead>";
    echo $linha;

    foreach ($estudantes as $estudante) {
        $linha = "<tr>";
        $linha .= "<td>" . $estudante['id'] . "</td>";
        $linha .= "<td>" . $estudante['nome'] . "</td>";
        $linha .= "<td>" . $estudante['email'] . "</td>";
        $linha .= "<td>" . $estudante['curso'] . "</td>";
        $linha .= "</tr>";
        echo $linha;
    }
    ?>

    </table>

</body>

</html>
