<?php
header('Content-Type: application/json');
$menuFile = 'menu.json';

if ($_GET['action'] === 'get') {
    if (file_exists($menuFile)) {
        header('Cache-Control: no-cache, must-revalidate');
        echo file_get_contents($menuFile);
    } else {
        echo json_encode([]);
    }
} elseif ($_GET['action'] === 'save') {
    $data = file_get_contents('php://input');
    file_put_contents($menuFile, $data);
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['error' => 'Invalid action']);
}
?>
