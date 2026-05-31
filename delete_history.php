<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method not allowed']);
    exit;
}

$filename = $_POST['filename'] ?? '';

if (!preg_match('/^\d{4}-\d{2}-\d{2}-\d{2}-\d{2}-\d{2}_ranking\.txt$/', $filename)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Invalid filename']);
    exit;
}

$filepath = 'history/' . basename($filename);

if (!is_file($filepath)) {
    http_response_code(404);
    echo json_encode(['success' => false, 'error' => 'File not found']);
    exit;
}

if (!unlink($filepath)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Failed to delete file']);
    exit;
}

echo json_encode(['success' => true]);
