<?php
// create_product.php <name>
require_once "bootstrap.php";
use Model\Noticia;
$connection = new \Estrutura\DAO\Connection();
$tema = new Noticia();
$tema->setCorpo('Tema de tete');
$tema->setData(new \DateTime());
$tema->setResumo('pau no upisco');
$tema->setTitulo('pau no cu2');
$connection->merge($tema);
$connection->flush();

echo "Criado tema " . $tema->getId() . "\n";
