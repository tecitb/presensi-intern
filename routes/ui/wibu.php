<?php
/**
 * Created by PhpStorm.
 * User: didithilmy
 * Date: 26/08/18
 * Time: 11.24
 */

/**
 * WiBU view
 */
$app->get('/wibu/{mid}', function ($request, $response, $args) {
    return $this->renderer->render($response, "/wibu.php", $args);
});