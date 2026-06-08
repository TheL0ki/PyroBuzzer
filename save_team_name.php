<?php
require 'teams.php';

header('Content-Type: application/json');

function respond($ok, $error = null, $extra = [])
{
    echo json_encode(array_merge($ok ? ['ok' => true] : ['ok' => false, 'error' => $error], $extra));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(false, 'Invalid request method');
}

$team = $_POST['team'] ?? '';
$name = $_POST['name'] ?? '';

if (!set_team_name($team, $name)) {
    respond(false, 'Invalid port or name');
}

respond(true, null, [
    'name' => get_team_name($team),
    'default_name' => team_default_name($team),
    'is_custom' => trim(load_teams_config()[$team] ?? '') !== '',
]);
