<?php
ob_start();
ini_set('session.cookie_lifetime', 60);
session_start();

require_once __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$rotas = new Router(URL_SITE);

/*paginas*/
$rotas->namespace('Controller')->group(null);
$rotas->get("/", "Paginas:home");
$rotas->get("/valida", "Paginas:valida");
$rotas->get("/cadastro", "Paginas:cadastro");
$rotas->get("/api","Paginas:api");
$rotas->get("/erro/{coderro}","Paginas:erro");

/*Api rotas */
$rotas->namespace('Controller')->group('api');
$rotas->post("/cadastro_produto", "Api:cadastroProduto"); /*novo*/
$rotas->delete("/remove_produto/{id_produto}", "Api:removeProduto");/*novo*/
$rotas->put("/altera_produtos", "Api:alteraProdutos");/*novo*/
$rotas->get("/lista_produtos", "Api:listaProdutos");
$rotas->get("/lista_produtos/{pesquisa}", "Api:listaProdutos");
$rotas->get("/produto/{id_produto}", "Api:listaProdutos");


$rotas->dispatch();

if($rotas->error()){
  $rotas->redirect("/erro/{$rotas->error()}");
}
