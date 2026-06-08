<?php
header('Content-Type: application/json');

const MAX_FILE_SIZE = 5 * 1024 * 1024;
const SOUNDS_DIR = 'sounds';

function respond($ok, $error = null) {
    echo json_encode($ok ? ['ok' => true] : ['ok' => false, 'error' => $error]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(false, 'Invalid request method');
}

$team = $_POST['team'] ?? '';
if (!preg_match('/^(0[1-9]|1[0-6])$/', $team)) {
    respond(false, 'Invalid team');
}

if (!isset($_FILES['sound']) || $_FILES['sound']['error'] !== UPLOAD_ERR_OK) {
    respond(false, 'Upload failed');
}

$file = $_FILES['sound'];
if ($file['size'] > MAX_FILE_SIZE) {
    respond(false, 'File too large (max 5 MB)');
}

$ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
if ($ext !== 'mp3') {
    respond(false, 'Only MP3 files are allowed');
}

$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $file['tmp_name']);
finfo_close($finfo);

$allowedMimes = ['audio/mpeg', 'audio/mp3'];
if (!in_array($mime, $allowedMimes, true)) {
    respond(false, 'Invalid file type');
}

if (!is_dir(SOUNDS_DIR)) {
    mkdir(SOUNDS_DIR, 0755, true);
}

$destination = SOUNDS_DIR . '/team_' . $team . '.mp3';
if (!move_uploaded_file($file['tmp_name'], $destination)) {
    respond(false, 'Failed to save file');
}

chmod($destination, 0664);
respond(true);
