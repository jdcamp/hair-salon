<?php
date_default_timezone_set('America/Los_Angeles');

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../src/Stylist.php";
require_once __DIR__ . "/../src/Client.php";

$app = new Silex\Application();

$app['debug'] = true;

$server = 'mysql:host=localhost:8889;dbname=hair_salon';
$username = 'root';
$password = 'root';
$DB = new PDO($server, $username, $password);

use Symfony\Component\HttpFoundation\Request;
Request::enableHttpMethodParameterOverride();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
));
$app->get("/", function () use($app){
	return $app['twig']->render("index.html.twig", array('stylists' => Stylist::getAll()));
});
$app->get("/edit_stylist/{id}", function ($id) use($app){
	return $app['twig']->render("edit_stylist.html.twig", array('stylist' => Stylist::find($id)));
});
$app->get("/edit_client/{id}", function ($id) use($app){
	return $app['twig']->render("edit_client.html.twig", array('client' => Client::find($id)));
});
$app->get("/view_clients/{id}", function ($id) use($app){
	$stylist = Stylist::find($id);
    return $app['twig']->render("view_clients.html.twig", array('stylist' => $stylist,'clients' => $stylist->getClients($id)));
});
$app->post("/add_stylist", function () use($app){
	$name = $_POST['name'];
	$new_stylist = new Stylist($id, $name);
	$new_stylist->save();
	return $app['twig']->render("index.html.twig", array('stylists' => Stylist::getAll()));
});
$app->post("/add_client/{id}", function ($id) use($app)
{
	$name = $_POST['client_name'];
	$stylist_id = $id;
	$new_client = new Client($default, $name, $id);
	$new_client->save();
	$stylist = Stylist::find($id);
	return $app['twig']->render("view_clients.html.twig", array('stylist' => $stylist,'clients' => $stylist->getClients()));
});
$app->delete("/delete_stylist/{id}", function ($id) use($app){
	$stylist = Stylist::find($id);
	$stylist->deleteOne();
	return $app['twig']->render("index.html.twig", array('stylists' => Stylist::getAll()));
});
$app->delete("/delete_all_stylists", function () use($app){
    Stylist::deleteAll();
    return $app['twig']->render("index.html.twig", array('stylists' => Stylist::getAll()));
});
$app->delete("/delete_client/{id}", function ($id) use($app){
	$client = Client::find($id);
	$stylist = Stylist::find($client->getStylistId());
	$client->deleteOne();
	return $app['twig']->render("view_clients.html.twig", array('stylist' => $stylist,'clients' => $stylist->getClients()));
});
$app->patch("/edit_stylist/{id}", function ($id) use($app)
{
	$new_name = filter_var($_POST['new_name'], FILTER_SANITIZE_MAGIC_QUOTES);
	$stylist = Stylist::find($id);
	$stylist->update($new_name);
	return $app['twig']->render("index.html.twig", array('stylists' => Stylist::getAll()));
});
$app->patch("/edit_client_name/{id}", function ($id) use($app)
{
	$new_name = filter_var($_POST['new_name'], FILTER_SANITIZE_MAGIC_QUOTES);
	$client = Client::find($id);
	$client->updateName($new_name);
	$stylist_id = $client->getStylistId();
	$stylist = Stylist::find($stylist_id);
	return $app['twig']->render("view_clients.html.twig", array('stylist' => $stylist,'clients' => $stylist->getClients()));
});
return $app;
?>
