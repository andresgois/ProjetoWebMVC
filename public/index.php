<?php
// respodavel por chamar o composer e o arquivo despachante
header("Content-Type: text/html; charset=utf-8");
require_once("../config/config.php");
// carregara todas as classes
require_once("../src/vendor/autoload.php");

$Dispatch = new App\Dispatch();
//  $n = new App\Model\ClassConexao;
//  var_dump($n->conexaoDB());
// $n = new Src\Classes\ClassBreadcrumb;
// $n->addBreadcrumb();

//include_once(DIRREQ."app/view/Layout.php");

?>