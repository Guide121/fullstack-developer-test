<?php
ob_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header( 'content-type: text/html; charset=utf-8' );

error_reporting(E_USER_NOTICE);

require_once __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$rotas = new Router(URL_SITE);

/*paginas*/
$rotas->namespace('Controller')->group(null);
$rotas->get("/", "Paginas:home");
$rotas->get("/api","Paginas:api");
$rotas->get("/cadastro", "Paginas:cadastro");
$rotas->get("/cadastro/{id_produto}", "Paginas:cadastro");
$rotas->get("/erro/{coderro}","Paginas:erro");

/*Api rotas */
$rotas->namespace('Controller')->group('api');
$rotas->post("/cadastro_produto", "Api:cadastroProduto");
$rotas->delete("/remove_produto/{id_produto}", "Api:removeProduto");
$rotas->put("/altera_produtos", "Api:alteraProdutos");
$rotas->get("/lista_produtos", "Api:listaProdutos");
$rotas->get("/lista_produtos/{pesquisa}", "Api:listaProdutos");
$rotas->get("/produto/{id_produto}", "Api:listaProdutos");


$rotas->dispatch();

if($rotas->error()){
  $rotas->redirect("/erro/{$rotas->error()}");
}
