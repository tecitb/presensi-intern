<?php
use RedBeanPHP\R;
/**
 * API routes
 */

define("MEETING_STATUS_CREATED", 0);
define("MEETING_STATUS_STARTED", 1);
define("MEETING_STATUS_FINISHED", 2);

/**
 * List meetings
 */
$app->get('/meetings/list/{begin}', function ($request, $response, $args) {
    /*if ($request->getAttribute("jwt")['isAdmin'] != 1) {
        $error = ['error' => ['text' => 'Permission denied']];
        return $response->withJson($error);
    }*/

    return $response->withJson(
        ["success" => true, "body" => array_values(R::find('meeting', 'LIMIT :begin, :total', [":begin" => (int) $args['begin'], ":total" => 20]))]
    );
});

/**
 * Create new meeting
 */
$app->post("/meetings/add", function ($request, $response, $args) {
    $meeting = R::dispense('meeting');

    /** @var $request \Slim\Http\Request name */
    $meeting->name = $request->getParam("name");
    $meeting->location = $request->getParam("location");
    $meeting->scheduled_on = $request->getParam("scheduled_on");
    $meeting->status = MEETING_STATUS_CREATED;
    $meeting->is_offline = $request->getParam("is_offline") == '1' ? true : false;
    $meeting->started_on = 0;
    $meeting->finished_on = 0;

    $id = R::store($meeting);

    return $response->withJson(["success" => true, "id" => $id]);
});

/**
 * Get details of meeting
 */
$app->get("/meetings/details/{mid}", function ($request, $response, $args) {
    $meeting = R::load('meeting', $args['mid']);

    if($meeting->id == 0) {
        // Not found
        return $response->withJson(["success" => false, "error" => "NOT_FOUND", "msg" => "Meeting is not found"]);
    }

    return $response->withJson(["success" => true, "body" => $meeting]);
});

/**
 * Update the details of meeting
 */
$app->put("/meetings/update/{mid}", function ($request, $response, $args) {
    $meeting = R::load('meeting', $args['mid']);

    if($meeting->id == 0) {
        // Not found
        return $response->withJson(["success" => false, "error" => "NOT_FOUND", "msg" => "Meeting is not found"]);
    }

    // Meeting found, update parameters

    /** @var $request \Slim\Http\Request name */
    if(!empty($request->getParam("name"))) $meeting->name = $request->getParam("name");
    if(!empty($request->getParam("location"))) $meeting->location = $request->getParam("location");
    if(!empty($request->getParam("scheduled_on"))) $meeting->scheduled_on = $request->getParam("scheduled_on");
    if(!empty($request->getParam("is_offline"))) $meeting->is_offline = $request->getParam("is_offline") == '1' ? true : false;

    R::store($meeting);

    return $response->withJson(["success" => true, "body" => $meeting]);
});

/**
 * Delete a meeting
 */
$app->post("/meetings/delete/{mid}", function ($request, $response, $args) {
    $meeting = R::load('meeting', $args['mid']);

    if($meeting->id == 0) {
        // Not found
        return $response->withJson(["success" => false, "error" => "NOT_FOUND", "msg" => "Meeting is not found"]);
    }

    // Meeting found, delete meeting
    R::trash($meeting);

    return $response->withJson(["success" => true]);
});

/**
 * Start meeting
 */
$app->post("/meetings/start/{mid}", function ($request, $response, $args) {
    $meeting = R::load('meeting', $args['mid']);

    if($meeting->id == 0) {
        // Not found
        return $response->withJson(["success" => false, "error" => "NOT_FOUND", "msg" => "Meeting is not found"]);
    }

    if($meeting->status != MEETING_STATUS_CREATED) {
        return $response->withJson(["success" => false, "error" => "MEETING_ALREADY_STARTED", "msg" => "Meeting is already started or finished"]);
    }

    $meeting->status = MEETING_STATUS_STARTED;
    $meeting->started_on = time();

    R::store($meeting);

    return $response->withJson(["success" => true]);
});

/**
 * Finish meeting
 */
$app->post("/meetings/finish/{mid}", function ($request, $response, $args) {
    $meeting = R::load('meeting', $args['mid']);

    if($meeting->id == 0) {
        // Not found
        return $response->withJson(["success" => false, "error" => "NOT_FOUND", "msg" => "Meeting is not found"]);
    }

    if($meeting->status != MEETING_STATUS_STARTED) {
        return $response->withJson(["success" => false, "error" => "MEETING_ALREADY_STARTED", "msg" => "Meeting is not started or already finished"]);
    }

    $meeting->status = MEETING_STATUS_FINISHED;
    $meeting->finished_on = time();

    R::store($meeting);

    return $response->withJson(["success" => true]);
});