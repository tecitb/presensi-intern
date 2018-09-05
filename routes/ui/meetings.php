<?php
/**
 * Created by PhpStorm.
 * User: didithilmy
 * Date: 26/08/18
 * Time: 11.24
 */

/**
 * Meetings view
 */
$app->get('/meetings', function ($request, $response, $args) {
    $this->renderer->render($response, "/header.php", $args);
    $this->renderer->render($response, "/meetings.php", $args);
    return $this->renderer->render($response, "/footer.php", $args);
});

/**
 * Add meeting view
 */
$app->get('/meetings/add', function ($request, $response, $args) {
    $this->renderer->render($response, "/header.php", $args);
    $this->renderer->render($response, "/meetings_add.php", $args);
    return $this->renderer->render($response, "/footer.php", $args);
});


/**
 * Add meeting view
 */
$app->get('/meetings/view/{id}', function ($request, $response, $args) {
    $this->renderer->render($response, "/header.php", $args);
    $this->renderer->render($response, "/meetings_view.php", $args);
    return $this->renderer->render($response, "/footer.php", $args);
});


/**
 * Add meeting view
 */
$app->get('/meetings/rdattn/{id}', function ($request, $response, $args) {
    $this->renderer->render($response, "/header.php", $args);
    $this->renderer->render($response, "/meetings_view_attn_record.php", $args);
    return $this->renderer->render($response, "/footer.php", $args);
});



/**
 * Add meeting view
 */
$app->get('/meetings/attn/{id}', function ($request, $response, $args) {
    $this->renderer->render($response, "/header.php", $args);
    $this->renderer->render($response, "/meetings_view_attn_edit.php", $args);
    return $this->renderer->render($response, "/footer.php", $args);
});
