<?php

require_once("config.php");

use Cliente\Cadastro;//*Precisamos usar a nossa classe la do namespace,para fazer isso,para usar o namespace use o palavra 'use' e o que voce quer usar
//? o que voce quer usar? use 'O namespace Cliente'\'A classe Cadastro';
//*Isso quer dizer que a classe cadastro nesse ambiente aqui/nesse arquivo vai ser referente a classe que esta dentro do namespace Cliente

$cad = new Cadastro();//? É a classe que está dentro do namespace Cliente
$cad->setNome("Fernando Franco");
$cad->setEmail("Franco@gmail.com");
$cad->setSenha("franco54321");

$cad->registrarVenda();