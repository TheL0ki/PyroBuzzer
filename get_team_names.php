<?php
require 'teams.php';

header('Content-Type: application/json');
echo json_encode(get_team_names_map());
