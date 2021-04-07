<?php

require_once "bootstrap.php";

use Atv\Classes\Apostador;

// APOSTADORES
$apostadores = array(
	[
		"Sueli Pinto",
		"648.136.246-69",
		"suelihapinto@telefonica.com"
	],
	[
		"Nicolas Guilherme",
		"834.618.928-15",
		"nicolasgui@cotamtambores.com.br"
	],
	[
		"Sophie Cardoso",
		"270.993.541-40",
		"sophiecardoso-72@urbam.com.br"
	],
	[
		"Fabiana Caldeira",
		"938.522.784-06",
		"ffabianacaldeira@tecsysbrasil.com"
	],
	[
		"Guilherme Barros",
		"681.923.681-65",
		"guilhermebar@gmapst.com"
	]
);

foreach ($apostadores as $apostador) {
	$instancia = new Apostador();
	$instancia->setNome($apostador[0]);
	$instancia->setCpf($apostador[1]);
	$instancia->setEmail($apostador[2]);

	$entityManager->persist($instancia);
}

$entityManager->flush();
