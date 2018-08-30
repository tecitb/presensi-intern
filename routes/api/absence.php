<?php
use RedBeanPHP\R;

/**
 * Absence API routes
 */

/**
 * List absence of a meeting
 */
$app->get('/absence/list/{mid}/{begin}', function ($request, $response, $args) {
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
    $abs = R::findAll('absence', 'meeting_id = :mid LIMIT :begin, :total', [":mid" => $meeting->id, ":begin" => (int) $args['begin'], ":total" => 20]);

    return $response->withJson(
        ["success" => true, "body" => array_values($abs)]
    );
});

/**
 * Get absence of a meeting of a specific person
 */
$app->get('/absence/get/{mid}/{regno}', function ($request, $response, $args) {
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
    $abs = R::findAll('absence', 'meeting_id = :mid AND tec_regno = :regno', [":mid" => $meeting->id, ":regno" => $args['regno']]);

    return $response->withJson(
        ["success" => true, "body" => array_values($abs)]
    );
});

/**
 * Record absence
 * Note:
 * Absence type: 0 is not attending, 1 is coming late, 2 is leaving early
 * Urgency: 0 is not urgent, 1 is short notice
 */
$app->post('/absence/record/{mid}', function ($request, $response, $args) {
    if (!DEBUG_DISABLE_AUTH && $request->getAttribute("jwt")['isAdmin'] != 1) {
        $error = ['error' => ['text' => 'Permission denied']];
        return $response->withJson($error);
    }

    $meeting = R::load('meeting', $args['mid']);

    if($meeting->id == 0) {
        // Not found
        return $response->withJson(["success" => false, "error" => "NOT_FOUND", "msg" => "Meeting is not found"]);
    }

    // Meeting found, record absence

    /** @var $request \Slim\Http\Request name */
    $abs = R::dispense('absence');
    $abs->meeting_id = $meeting->id;
    $abs->tec_regno = $request->getParam("tec_regno");
    $abs->name = $request->getParam("name");
    $abs->notes = $request->getParam("notes");
    $abs->type = $request->getParam("type");
    $abs->urgency = $request->getParam("urgency");
    $abs->will_attend = $request->getParam("will_attend") ?: 0;
    $abs->will_leave = $request->getParam("will_leave") ?: 0;
    $abs->timestamp = time();

    $id = R::store($abs);

    return $response->withJson(
        ["success" => true, "id" => $id]
    );
});


/**
 * Delete absence record
 */
$app->post('/absence/delete/{aid}', function ($request, $response, $args) {
    if (!DEBUG_DISABLE_AUTH && $request->getAttribute("jwt")['isAdmin'] != 1) {
        $error = ['error' => ['text' => 'Permission denied']];
        return $response->withJson($error);
    }

    $attn = R::load('absence', $args['aid']);

    if($attn->id == 0) {
        // Not found
        return $response->withJson(["success" => false, "error" => "NOT_FOUND", "msg" => "Absence record is not found"]);
    }

    // Attendance record found, delete data
    R::trash($attn);

    return $response->withJson(["success" => true]);
});



/**
 * Update absence
 */
$app->put('/absence/update/{aid}', function ($request, $response, $args) {
    if (!DEBUG_DISABLE_AUTH && $request->getAttribute("jwt")['isAdmin'] != 1) {
        $error = ['error' => ['text' => 'Permission denied']];
        return $response->withJson($error);
    }

    $abs = R::load('absence', $args['aid']);

    if($abs->id == 0) {
        // Not found
        return $response->withJson(["success" => false, "error" => "NOT_FOUND", "msg" => "Absence record is not found"]);
    }

    // Attendance record found, update data
    if(!empty($request->getParam("notes"))) $abs->notes = $request->getParam("notes");
    if(!empty($request->getParam("type"))) $abs->type = $request->getParam("type");
    if(!empty($request->getParam("urgency"))) $abs->urgency = $request->getParam("urgency");
    if(!empty($request->getParam("will_attend"))) $abs->will_attend = $request->getParam("will_attend");
    if(!empty($request->getParam("will_leave"))) $abs->will_leave = $request->getParam("will_leave");

    R::store($abs);

    return $response->withJson(["success" => true]);
});
