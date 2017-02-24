<?php
    date_default_timezone_set('America/Los_Angeles');

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";

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


    $app->get("/", function() use ($app) {
        return $app['twig']->render("index.html.twig", array('stylists'=> Stylist::getAll()));
    });
    $app->get("/edit_stylist/{id}", function($id) use ($app) {
        return $app['twig']->render("edit_stylist.html.twig", array('stylist'=> Stylist::find($id)));
    });


    $app->post("/add_stylist", function() use ($app) {
        $name = $_POST['name'];
        $new_stylist = new Stylist($id, $name);
        $new_stylist->save();
        return $app['twig']->render("index.html.twig", array('stylists'=> Stylist::getAll()));
    });
    $app->delete("/delete_stylist/{id}", function($id) use ($app) {
    $original_stylist = Stylist::find($id);
    $original_stylist->deleteOne();
    return $app['twig']->render("index.html.twig", array('stylists'=> Stylist::getAll()));
    });
    $app->patch("/edit_stylist/{id}", function($id) use ($app) {
    $new_name = filter_var($_POST['new_name'], FILTER_SANITIZE_MAGIC_QUOTES);
    $stylist_type = Stylist::find($id);
    $stylist_type->update($new_name);
    return $app['twig']->render("cuisine_type.html.twig", array('cuisines'=>Cuisine::getAll()));
 });


    return $app;
?>
