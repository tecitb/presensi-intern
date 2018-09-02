<?php
use RedBeanPHP\R;

/**
 * Attendance API routes
 */

/**
 * List attendance of a meeting
 */
$app->get('/attn/list/{mid}/{begin}', function ($request, $response, $args) {
    if (!DEBUG_DISABLE_AUTH && $request->getAttribute("jwt")['isAdmin'] != 1) {
        $error = ['error' => ['text' => 'Permission denied']];
        return $response->withJson($error);
    }

    $meeting = R::load('meeting', $args['mid']);

    if($meeting->id == 0) {
        // Not found
        return $response->withJson(["success" => false, "error" => "NOT_FOUND", "msg" => "Meeting is not found"]);
    }

    // Meeting found, list attendance
    $attn = R::findAll('attendance', 'meeting_id = :mid LIMIT :begin, :total', [":mid" => $meeting->id, ":begin" => (int) $args['begin'], ":total" => 20]);

    return $response->withJson(
        ["success" => true, "body" => array_values($attn)]
    );
});

/**
 * Record attendance
 */
$app->post('/attn/record/{mid}', function ($request, $response, $args) {
    if (!DEBUG_DISABLE_AUTH && $request->getAttribute("jwt")['isAdmin'] != 1) {
        $error = ['error' => ['text' => 'Permission denied']];
        return $response->withJson($error);
    }

    $meeting = R::load('meeting', $args['mid']);

    if($meeting->id == 0) {
        // Not found
        return $response->withJson(["success" => false, "error" => "NOT_FOUND", "msg" => "Meeting is not found"]);
    }

    // Meeting found, record attendance

    /** @var $request \Slim\Http\Request name */
    $attn = R::dispense('attendance');
    $attn->meeting_id = $meeting->id;
    $attn->tec_regno = $request->getParam("tec_regno");
    $attn->name = $request->getParam("name");
    $attn->notes = $request->getParam("notes");
    $attn->timestamp = time();

    $id = R::store($attn);

    $totalattn = R::count('attendance', 'meeting_id = :mid', [':mid' => $meeting->id]);

    return $response->withJson(
        ["success" => true, "id" => $id, "total_attendee" => $totalattn]
    );
});


/**
 * Delete attendance record
 */
$app->post('/attn/delete/{aid}', function ($request, $response, $args) {
    if (!DEBUG_DISABLE_AUTH && $request->getAttribute("jwt")['isAdmin'] != 1) {
        $error = ['error' => ['text' => 'Permission denied']];
        return $response->withJson($error);
    }

    $attn = R::load('attendance', $args['aid']);

    if($attn->id == 0) {
        // Not found
        return $response->withJson(["success" => false, "error" => "NOT_FOUND", "msg" => "Attendance record is not found"]);
    }

    // Attendance record found, delete data
    R::trash($attn);

    return $response->withJson(["success" => true]);
});



/**
 * Update attendance notes
 */
$app->put('/attn/notes/{aid}', function ($request, $response, $args) {
    if (!DEBUG_DISABLE_AUTH && $request->getAttribute("jwt")['isAdmin'] != 1) {
        $error = ['error' => ['text' => 'Permission denied']];
        return $response->withJson($error);
    }

    $attn = R::load('attendance', $args['aid']);

    if($attn->id == 0) {
        // Not found
        return $response->withJson(["success" => false, "error" => "NOT_FOUND", "msg" => "Attendance record is not found"]);
    }

    // Attendance record found, update notes
    $attn->notes = $request->getParam("notes");

    R::store($attn);

    return $response->withJson(["success" => true]);
});
