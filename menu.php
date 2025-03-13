<?php
header('Content-Type: application/json');

$menuFile = 'menu.json';

$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action === 'get') {
    if (file_exists($menuFile)) {
        echo file_get_contents($menuFile);
    } else {
        echo json_encode([]);
    }
} elseif ($action === 'save') {
    $data = json_decode(file_get_contents('php://input'), true);
    file_put_contents($menuFile, json_encode($data, JSON_PRETTY_PRINT));
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['error' => 'Invalid action']);
}
