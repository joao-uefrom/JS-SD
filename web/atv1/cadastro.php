<?php
$tabela = "<table border='1'>";
$tabela .= '<thead>';
$tabela .= '<tr>';
$tabela .= '<td>Nome</td>';
$tabela .= '<td>E-mail</td>';
$tabela .= '<td>Curso</td>';
$tabela .= '</tr>';
$tabela .= '</thead>';
$tabela .= '<tbody>';
$tabela .= '<tr>';
$tabela .= "<td>{$_POST['nome']}</td>";
$tabela .= "<td>{$_POST['email']}</td>";
$tabela .= "<td>{$_POST['curso']}</td>";
$tabela .= '</tr>';
$tabela .= '</tbody>';
$tabela .= '</table>';

echo $tabela;
