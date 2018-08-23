<?php
/**
 * Slim framework entrypoint
 */

use Slim\Views\PhpRenderer;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require 'vendor/autoload.php';

header("X-Env-Hostname: ".gethostname());

$dotenv = new Dotenv\Dotenv(dirname(__DIR__));
$dotenv->load();

// Instantiate the app
$settings = require __DIR__ . '/settings.php';
$app = new \Slim\App($settings);


// Set up dependencies
require __DIR__ . '/dependencies.php';

/**
 * Home view
 */
/*$app->get('/', function ($request, $response, $args) {
    // $this->renderer->render($response, "/header.php", $args);
    // $this->renderer->render($response, "/home.php", $args);
    return $this->renderer->render($response, "/landing.php", $args);
});*/


$app->run();
