<?php
require 'teams.php';

header('Content-Type: application/json');

$entries = [];

if (file_exists('ranking.txt') && filesize('ranking.txt') > 0) {
    $file = fopen('ranking.txt', 'r');
    while (!feof($file)) {
        $line = json_decode(fgets($file), true);
        if ($line && !empty($line['team'])) {
            $entries[] = [
                'rank' => $line['rank'],
                'team' => $line['team'],
                'name' => get_entry_team_name($line),
                'date' => $line['date'],
            ];
        }
    }
    fclose($file);
}

echo json_encode($entries);
